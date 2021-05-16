<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::create([
            'username'          => 'super admin',
            'full_name'         => 'Super Admin',
            'email'             => 'super_admin@app.com',
            'address'           => 'Eldakhlia-Mit Ghamr',
            'phone'             => '011564553679',
            'job'               => 'Super Admin',
            'image'             => 'admin.jpg',
            'password'          => 123,
            'personal_id'       => $faker->unique()->numberBetween(00000000000000, 99999999999999),
            'code'              => $faker->unique()->ean8,
            'age'               => $faker->numberBetween(20, 80),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->attachRoles(['super_admin', 'teacher']);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'username'          => $faker->unique()->name(),
                'full_name'         => $faker->firstName() . ' ' . $faker->lastName(),
                'email'             => $faker->unique()->safeEmail,
                'address'           => $faker->address,
                'phone'             => $faker->unique()->phoneNumber,
                'job'               => $faker->jobTitle,
                'image'             => $faker->image(public_path('uploads/images/users'), 150, 150, 'users', false),
                'password'          => 123,
                'personal_id'       => $faker->unique()->numberBetween(00000000000000, 99999999999999),
                'code'              => $faker->unique()->ean8,
                'age'               => $faker->numberBetween(20, 80),
                'email_verified_at' => now(),
                'remember_token'    => Str::random(10),
            ])->attachRole(Role::inRandomOrder()->first()->name);
        }
    }
}
