<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absence;
use App\Models\User;
use Faker\Factory;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('id', 'code')->get();
        $faker = Factory::create();
        foreach ($users as $user) {
            Absence::create([
                'user_id'   => $user->id,
                'code_id'   => $user->code,
                'day'       => $faker->dayOfMonth(),
                'month'     => $faker->month(),
                'Tpresence' => $faker->date(),
                'Tback'     => $faker->date(),
                'status'    => $faker->boolean(),
                'note'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
            ]);
        }
    }
}
