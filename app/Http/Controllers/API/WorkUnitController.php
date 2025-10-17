<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class WorkUnitController extends Controller
{
    public function index()
    {
        $workUnits = WorkUnit::all();

        return response()->json([
            'work_units' => $workUnits,
        ]);
    }
}
