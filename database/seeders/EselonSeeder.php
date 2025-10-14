<?php

namespace Database\Seeders;

use App\Models\Eselon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EselonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eselon::insert([
            ['name' => 'I'],
            ['name' => 'II'],
            ['name' => 'III'],
            ['name' => 'IV'],
            ['name' => 'V'],
        ]);
    }
}
