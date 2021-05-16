<?php

namespace Database\Seeders;

use App\Models\Row;
use Faker\Factory;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users   = User::select('id')->whereRoleIs('teacher')->get();
        $faker = Factory::create();
        foreach ($users as $user) {
            Subject::create([
                'user_id'       => $user->id,
                'row_id'        => Row::select('id')->inRandomOrder()->first()->id,
                'subject'       => $faker->name,
                'semester'      => $faker->boolean(),
            ]);
        }
    }
}
