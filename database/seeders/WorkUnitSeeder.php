<?php

namespace Database\Seeders;

use App\Models\WorkUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkUnit::insert([
            ['name' => 'Kantor Pusat Kementerian'],
            ['name' => 'Kantor Wilayah Provinsi'],
            ['name' => 'Kantor Kabupaten/Kota'],
            ['name' => 'Unit Pelaksana Teknis'],
            ['name' => 'Lembaga Pendidikan Negeri'],
        ]);
    }
}
