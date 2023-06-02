<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Integration\QuestionResource;
use App\Http\Resources\Integration\StoryResource;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function question()
    {
        return response()->json(['question' => QuestionResource::make(Question::first())]);
    }

    public function story(int $question_id)
    {
        $question = Question::findOrFail($question_id);
        return response()->json(['story' => StoryResource::make($question->story)]);
    }

    public function answerQuestion(Request $request)
    {
        $question = Question::findOrFail($request->question_id);
        $answer   = Answer::where('question_id', $question->id)->where('id', $request->answer_id)->first();
        return response()->json(['correct' => $answer->correct ? 1 : 0 ]);
    }
}
