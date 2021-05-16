<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('id')->whereRoleIs('teacher')->get();
        foreach ($users as $user) {
            Exam::create([
                'user_id'       => $user->id,
                'subject_id'    => Subject::select('id')->inRandomOrder()->first()->id,
                'time'          => rand(60, 180),
                'degree'        => rand(60, 180),
                'name'          => 'Exam_' . $user->id,
            ]);
        }
    }
}
