<?php

namespace Database\Seeders;

use App\Models\BirthDate;
use App\Models\Employee;
use App\Models\Eselon;
use App\Models\Gender;
use App\Models\Golongan;
use App\Models\Place;
use App\Models\Position;
use App\Models\Religion;
use App\Models\WorkUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $birthDateLength = BirthDate::count();
        $birthPlaceLength = Place::count();
        $addressLength = Place::count();
        $workPlaceLength = Place::count();
        $eselonLength = Eselon::count();
        $genderLength = Gender::count();
        $golonganLength = Golongan::count();
        $positionLength = Position::count();
        $religionLength = Religion::count();
        $workUnitLength = WorkUnit::count();

        $data = [];

        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'nip' => $faker->unique()->numerify('19################'),
                'name' => $faker->name(),
                'phone_number' => $faker->unique()->phoneNumber(),
                'npwp' => $faker->unique()->numerify('################'),
                'photo' => null,
                'birth_date_id' => $i % $birthDateLength + 1,
                'birth_place_id' => $i % $birthPlaceLength + 1,
                'address_id' => $i % $addressLength + 1,
                'work_place_id' => $i % $workPlaceLength + 1,
                'eselon_id' => $i % $eselonLength + 1,
                'gender_id' => $i % $genderLength + 1,
                'golongan_id' => $i % $golonganLength + 1,
                'position_id' => $i % $positionLength + 1,
                'religion_id' => $i % $religionLength + 1,
                'work_unit_id' => $i % $workUnitLength + 1,
            ];
        }

        Employee::insert($data);
    }
}
