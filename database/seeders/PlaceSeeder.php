<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Place::insert([
            ['name' => 'Banjarnegara'],
            ['name' => 'Jl. Melon No.16 Dian Asri'],
            ['name' => 'Jl. Golf Komp Bakosurtanal No.39'],
            ['name' => 'Jl.Mendut III, Puri Nirwana I RT.03/16'],
            ['name' => 'Perum Jombor Baru'],
            ['name' => 'Trengalek'],
            ['name' => 'Bella Casa Residence Blok E.1 No.9'],
            ['name' => 'Jl Pelita I/18 Kedung Halang Talang'],
            ['name' => 'Komp.BAKOSURTANAL CIKARET'],
            ['name' => 'Cigadung Selatan II/135'],
            ['name' => 'Jl Raya Tegar Beriman Gg H Jairan No 116'],
            ['name' => 'Jl.Kupu-kupu Blok NJ 16. RT.03/09'],
            ['name' => 'Kp. Sawah RT.01/11 No.27'],
            ['name' => 'Jl. Kebon Pedes Gang Pacilong No. 4'],
            ['name' => 'Jl Setasiun No 294 RT 06 RW 01'],
            ['name' => 'Perum Delivina Blok A.4/6'],
            ['name' => 'Jln.Golf Ling. 2 Citatah Dalam No.21'],
            ['name' => 'Jl. Ciliwung BCE RT.07/11'],
            ['name' => 'Kp. Kandang'],
            ['name' => 'Jl. Garuda Gg. Mangga RT002'],
            ['name' => 'Perum Puri Karadenan Blok C 7'],
            ['name' => 'Jl. Satsiun No.225 RT.02/02'],
            ['name' => 'Jl. Prambanan RT.12/16 Pabuaran'],
            ['name' => 'Duta parahiyanganBlok AB 72'],
            ['name' => 'Jakarta '],
        ]);
    }
}
