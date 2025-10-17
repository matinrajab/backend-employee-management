<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    private function employeeWithAttr()
    {
        return Employee::with(['birthDate', 'birthPlace', 'address', 'workPlace', 'eselon', 'gender', 'golongan', 'position', 'religion', 'workUnit']);
    }

    public function generatePDF()
    {
        $employees = $this->employeeWithAttr()->get();

        $pdf = Pdf::loadView('pdf.employees', compact('employees'))->setPaper('a3', 'landscape');
        return $pdf->download('daftar_pegawai.pdf');
        // return response()->json(['message' => 'Employee berhasil diupdate']);
    }
}
