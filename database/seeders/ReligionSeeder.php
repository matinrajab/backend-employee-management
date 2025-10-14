<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Religion::insert([
            ['name' => 'Islam'],
            ['name' => 'Kristen Protestan'],
            ['name' => 'Katolik'],
            ['name' => 'Hindu'],
            ['name' => 'Buddha'],
            ['name' => 'Konghucu'],
        ]);
    }
}
