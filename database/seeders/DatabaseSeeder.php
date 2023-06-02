<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Story;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Story::factory(5)->create()->each(function (Story $story) {
            $question = Question::factory()->create([
                'story_id' => $story->id
            ]);

            Answer::factory(4)->create([
                'question_id' => $question->id
            ]);

            Answer::factory()->create([
                'question_id' => $question->id,
                'correct'     => 1
            ]);
        });
    }
}
