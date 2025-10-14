<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::insert([
            ['name' => 'I/a'],
            ['name' => 'I/b'],
            ['name' => 'I/c'],
            ['name' => 'I/d'],
            ['name' => 'II/a'],
            ['name' => 'II/b'],
            ['name' => 'II/c'],
            ['name' => 'II/d'],
            ['name' => 'III/a'],
            ['name' => 'III/b'],
            ['name' => 'III/c'],
            ['name' => 'III/d'],
            ['name' => 'IV/a'],
            ['name' => 'IV/b'],
            ['name' => 'IV/c'],
            ['name' => 'IV/d'],
            ['name' => 'IV/e'],
        ]);
    }
}
