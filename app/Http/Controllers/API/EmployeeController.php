<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\BirthDate;
use App\Models\Employee;
use App\Models\Place;
use App\Models\Position;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    private function employeeWithAttr()
    {
        return Employee::with(['birthDate', 'birthPlace', 'address', 'workPlace', 'eselon', 'gender', 'golongan', 'position', 'religion', 'workUnit']);
    }

    public function index()
    {
        $employees = $this->employeeWithAttr();

        return ResponseFormatter::success(
            $employees->paginate(10),
            'Data list employee berhasil diambil'
        );
    }

    public function store(EmployeeRequest $request)
    {
        if ($request->birth_place) {
            $birthPlace = Place::where('name', $request->birth_place)->first();
            if (!$birthPlace) {
                $birthPlace = Place::create(['name' => $request->birth_place]);
            }
        }

        if ($request->address) {
            $address = Place::where('name', $request->address)->first();
            if (!$address) {
                $address = Place::create(['name' => $request->address]);
            }
        }

        if ($request->birth_date) {
            $birthDate = BirthDate::where('date', $request->birth_date)->first();
            if (!$birthDate) {
                $birthDate = BirthDate::create(['date' => $request->birth_date]);
            }
        }

        if ($request->position) {
            $position = Position::where('name', $request->position)->first();
            if (!$position) {
                $position = Position::create(['name' => $request->position]);
            }
        }

        if ($request->work_place) {
            $workPlace = Place::where('name', $request->work_place)->first();
            if (!$workPlace) {
                $workPlace = Place::create(['name' => $request->work_place]);
            }
        }

        if ($request->work_unit) {
            $workUnit = WorkUnit::where('name', $request->work_unit)->first();
            if (!$workUnit) {
                $workUnit = WorkUnit::create(['name' => $request->work_unit]);
            }
        }

        $photo = null;
        if ($request->photo) {
            $photo = $this->generateUniqueFileName($request->photo);

            Storage::disk('public')->putFileAs('images', $request->photo, $photo);
        }

        $employee = Employee::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'photo' => $photo,
            'phone_number' => $request->phone_number,
            'npwp' => $request->npwp,
            'birth_place_id' => $request->birth_place ? $birthPlace->id : null,
            'address_id' => $request->address ? $address->id : null,
            'work_place_id' => $request->work_place ? $workPlace->id : null,
            'birth_date_id' => $request->birth_date ? $birthDate->id : null,
            'gender_id' => $request->gender_id,
            'golongan_id' => $request->golongan_id,
            'eselon_id' => $request->eselon_id,
            'position_id' => $request->position ? $position->id : null,
            'religion_id' => $request->religion_id,
            'work_unit_id' => $request->work_unit ? $workUnit->id : null,
        ]);

        return ResponseFormatter::success(
            $employee,
            'Employee berhasil ditambahkan'
        );
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    private function generateUniqueFileName($file)
    {
        $fileName = Str::random(40);
        $extension = $file->extension();

        return $fileName . '.' . $extension;
    }
}
