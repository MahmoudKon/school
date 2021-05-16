<?php

namespace Database\Seeders;

use App\Models\Row;
use Illuminate\Database\Seeder;

class RowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = ['First', 'Second', 'Third', 'Forth'];

        foreach ($classes as $class) {
            Row::create([
                'name' => $class,
            ]);
        }
    }
}
