<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name'     => 'Lindy',
        //     'email'    => 'lindy24si@mahasiswa.pcr.ac.id',
        //     'password' => Hash::make('lindyimut'),
        // ]);
        $faker = Faker::create();

        // Generate 1000 user
        for ($i = 1; $i <= 1000; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
