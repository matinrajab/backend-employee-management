<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::insert([
            ['name' => 'Kepala Sekretariat Utama'],
            ['name' => 'Penyusun laporan keuangan'],
            ['name' => 'Surveyor Pemetaan Pertama'],
            ['name' => 'Analis Data Survei dan Pemetaan'],
            ['name' => 'Perancang Per-UUan Utama IV/e'],
            ['name' => 'Kepala Biro Perencanaan, Kepegawaian dan Hukum'],
            ['name' => 'Widyaiswara Utama IV/e'],
            ['name' => 'Analis Kepegawaian Madya IV/b'],
            ['name' => 'Kepala Sub Bidang Kerjasama dan Pelayanan Riset, DKP'],
            ['name' => 'Analis Hukum'],
            ['name' => 'Peneliti Pertama III/b'],
            ['name' => 'Surveyor Pemetaan Muda'],
            ['name' => 'Analis Jabatan'],
            ['name' => 'Kepala Subbag Kepegawaian'],
        ]);
    }
}
