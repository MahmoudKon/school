<?php

namespace Database\Seeders;

use App\Models\Absence;
use Illuminate\Database\Seeder;
use App\Models\Salary;
use App\Models\User;
use Faker\Factory;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $absences = Absence::select('id')->get();
        $faker = Factory::create();
        foreach($absences as $absence) {
            Salary::create([
                'absence_id' => $absence->id,
                'salary'     => $faker->randomFloat(2, 000.00),
                'deduction'  => $faker->randomFloat(2, 000.00),
                'incentives' => $faker->randomFloat(2, 000.00),
                'rate'       => $faker->randomFloat(2, 000.00),
                'note'       => $faker->paragraph(),
            ]);
        }
    }
}
