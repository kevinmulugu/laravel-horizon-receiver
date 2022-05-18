<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessComputation;
use App\Jobs\ProcessData;
use Illuminate\Http\Request;

class HorizonTestController extends Controller
{
    public function compute(Request $request)
    {
        ProcessComputation::dispatch($request->all())->onQueue('computations');

        return response()->json(['message' => 'received']);
    }

    public function data(Request $request)
    {
        ProcessData::dispatch($request->all())->onQueue('data-processing');

        return response()->json(['message' => 'received']);
    }
}
