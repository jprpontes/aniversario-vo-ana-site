<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\StoryResource;
use App\Models\Answer;
use App\Models\AnsweredQuestion;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function question()
    {
        $questions = Question::leftJoin('answered_questions', function ($query) {
            $query->on('answered_questions.question_id', 'questions.id');
            $query->on('answered_questions.user_id', DB::raw(auth()->user()->id));
        })
        ->whereNull('answered_questions.id')
        ->select('questions.id')
        ->get()
        ->pluck('id')
        ->toArray();

        $countQuestions = count($questions);

        if ($countQuestions == 0) {
            return $this->sendResponse('Todas as questões respondidas.', null, 'COMPLETED');
        }

        $questionId = $questions[rand(0, $countQuestions-1)];

        $question = Question::find($questionId);

        $totalCountQuestions = Question::count();

        return $this->sendResponse('Questão retornada com sucesso!', [
            'progress' => [
                'total'     => $totalCountQuestions,
                'completed' => $totalCountQuestions - $countQuestions
            ],
            'question' => QuestionResource::make($question)
        ]);
    }

    public function story(int $question_id)
    {
        $question = Question::findOrFail($question_id);
        return $this->sendResponse('História encontrada com sucesso!', ['story' => StoryResource::make($question->story)]);
    }

    public function answerQuestion(Request $request)
    {
        $question = Question::findOrFail($request->question_id);

        if (!$question) {
            return $this->sendError('Questão não encontrada.');
        }

        $answer = Answer::where('question_id', $question->id)->where('id', $request->answer_id)->first();

        if (!$answer) {
            return $this->sendError('Resposta não encontrada.');
        }

        $isAnswered = AnsweredQuestion::where('user_id', auth()->user()->id)
            ->where('question_id', $question->id)
            ->where('answer_id', $answer->id)
            ->exists();

        if ($isAnswered) {
            return $this->sendError('Questão já respondida.');
        }

        AnsweredQuestion::create([
            'question_id' => $question->id,
            'answer_id'   => $answer->id,
            'user_id'     => auth()->user()->id,
            'points'      => $answer->correct ? $question->points : 0
        ]);

        return $this->sendResponse('Resposta salva!', [
            'correctAnswer' => AnswerResource::make($question->correctAnswer),
            'story'         => $question->story_id ? StoryResource::make($question->story) : null
        ]);
    }

    public function ranking()
    {
        $ranking = DB::select("
            SELECT u.id, u.name, SUM(COALESCE(a.points, 0)) points
            FROM users u
            LEFT JOIN answered_questions a
            ON a.user_id = u.id
            GROUP BY u.id
            ORDER BY SUM(COALESCE(a.points, 0)) DESC, u.name ASC
        ");

        return $this->sendResponse('Ranking retornado com sucesso!', [ 'ranking' => $ranking ]);
    }
}
