<?php

namespace App\Console\Commands;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Console\Command;

class StoreQuestionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questions:store {questions}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere as questões no banco';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $questionsArgument = $this->argument('questions');
        // dd($questionsArgument);
        $questions = json_decode($questionsArgument, true);

        foreach ($questions as $key1 => $question) {
            $questionExists = Question::where('description', $question['pergunta'])->exists();

            if ($questionExists) {
                continue;
            }

            $newQuestion = Question::create([
                'description' => $question['pergunta'],
                'points'      => 3
            ]);

            foreach ($question['respostas'] as $key2 => $resposta) {
                Answer::create([
                    'description' => $resposta,
                    'correct'     => $key2 == 0,
                    'question_id' => $newQuestion->id
                ]);
            }
        }

        return Command::SUCCESS;
    }
}
