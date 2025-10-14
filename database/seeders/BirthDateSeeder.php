<?php

namespace Database\Seeders;

use App\Models\BirthDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BirthDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];

        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'date' => $faker->date('Y-m-d', '1999-12-31'),
            ];
        }

        BirthDate::insert($data);
    }
}
