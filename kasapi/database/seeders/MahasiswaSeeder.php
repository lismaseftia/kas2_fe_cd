<?php

namespace Database\Seeders;

use App\Models\mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            mahasiswa::create([
                'nama' => $faker->name,
                'nim' => $faker->randomNumber,
                'kelas' => $faker->sentence,
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->sentence
            ]);
        }
    }
}
