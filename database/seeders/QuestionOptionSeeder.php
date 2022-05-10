<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;
use App\Models\Question;


class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => '3 X 3 =',
                'assessment_id' => 2 ,
                'options' => [
                    [
                        'option' => 20,
                        'value' => 0,
                    ],
                    [
                        'option' => 6,
                        'value' => 1,
                    ],
                    [
                        'option' => 'It cant be',
                        'value' => 0,
                    ]
            ]
            ],
            [
                'question' => 'Where is South Africa"s capital?',
                'assessment_id' => 2,
                'options' => [
                    [
                        'option' => 'New Delhi',
                        'value' => 1,
                    ],
                    [
                        'option' => 'Cape Town',
                        'value' => 0,
                    ],
                    [
                        'option' => 'Mpumalanga',
                        'value' => 0,
                    ]
            ]
            ],
        ];

        foreach ($questions as $question) {
            $newQuestion = Question::where('question', '=', $question['question'])->first();

            if ($newQuestion === null) {
                $newQuestion = Question::create([
                    'question' => $question['question'],
                    'assessment_id' => $question['assessment_id'],
                ]);

                foreach ($question['options'] as $option) {
                    $this->command->info('Creating sample users...');
                    $newOption = Option::create([
                        'option' => $option['option'],
                        'value' => $option['value'],
                        'question_id' => $newQuestion->id,
                    ]);
                }
            }
        }
    }
}


