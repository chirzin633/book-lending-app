<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return response()->json(Loan::with(['book', 'member'])->get());
    }

    public function show($id)
    {
        return response()->json(Loan::with(['book', 'member'])->get($id));
    }
}
