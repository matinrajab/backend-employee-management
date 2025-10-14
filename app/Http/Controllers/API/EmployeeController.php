<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['birthDate', 'birthPlace', 'address', 'workPlace', 'eselon', 'gender', 'golongan', 'position', 'religion', 'workUnit']);

        return ResponseFormatter::success(
            $employees->paginate(10),
            'Data list employee berhasil diambil'
        );
    }

    public function store(Request $request)
    {
        //
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
}
