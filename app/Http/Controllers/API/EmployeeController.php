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

    public function update(EmployeeRequest $request, string $id)
    {
        $employee  = Employee::findOrFail($id);

        $birthPlaceOld = $employee->birthPlace;
        $addressOld = $employee->address;
        $birthDateOld = $employee->birthDate;
        $positionOld = $employee->position;
        $workPlaceOld = $employee->workPlace;
        $workUnitOld = $employee->workUnit;

        $birthPlace = Place::where('name', $request->birth_place)->first();
        if (!$birthPlace && $request->birth_place) {
            $birthPlace = Place::create(['name' => $request->birth_place]);
        }

        $address = Place::where('name', $request->address)->first();
        if (!$address && $request->address) {
            $address = Place::create(['name' => $request->address]);
        }

        $birthDate = BirthDate::where('date', $request->birth_date)->first();
        if (!$birthDate) {
            $birthDate = BirthDate::create(['date' => $request->birth_date]);
        }

        $position = Position::where('name', $request->position)->first();
        if (!$position && $request->position) {
            $position = Position::create(['name' => $request->position]);
        }

        $workPlace = Place::where('name', $request->work_place)->first();
        if (!$workPlace && $request->work_place) {
            $workPlace = Place::create(['name' => $request->work_place]);
        }

        $workUnit = WorkUnit::where('name', $request->work_unit)->first();
        if (!$workUnit && $request->work_unit) {
            $workUnit = WorkUnit::create(['name' => $request->work_unit]);
        }

        $photo = $employee->photo;
        if ($request->photo) {
            Storage::disk('public')->delete('images/' . $employee->photo);

            $photo = $this->generateUniqueFileName($request->photo);
            Storage::disk('public')->putFileAs('images', $request->photo, $photo);
        }

        $employee->update([
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

        if ($birthPlaceOld && $birthPlaceOld->birthEmployees->count() == 0) {
            $birthPlaceOld->delete();
        }

        if ($addressOld && $addressOld->addressEmployees->count() == 0) {
            $addressOld->delete();
        }

        if ($birthDateOld->employees->count() == 0) {
            $birthDateOld->delete();
        }

        if ($positionOld && $positionOld->employees->count() == 0) {
            $positionOld->delete();
        }

        if ($workPlaceOld && $workPlaceOld->workEmployees->count() == 0) {
            $workPlaceOld->delete();
        }

        if ($workUnitOld && $workUnitOld->employees->count() == 0) {
            $workUnitOld->delete();
        }

        return ResponseFormatter::success(
            null,
            'Employee berhasil diupdate'
        );
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
