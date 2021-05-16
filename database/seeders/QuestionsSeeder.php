<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exams  = Exam::select('id')->get();
        $faker  = Factory::create();
        foreach ($exams as $exam) {
            for ($i = 1; $i <= rand(1, 5); $i++) {
                Question::create([
                    'exam_id'  => $exam->id,
                    'question' => $faker->sentence(),
                    'answers'  => 'a, b, c',
                    'correct'  => 'b',
                    'attach'   => $faker->image(public_path('uploads/images/questions'), 150, 150, 'questions', false),

                ]);
            }
        }
    }
}
