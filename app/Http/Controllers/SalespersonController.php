<?php

namespace App\Http\Controllers;

use App\Models\User;

class SalespersonController extends Controller
{
    public function index()
    {
        $salespersons = User::where('role', 'salesperson')->get();
        return view('pages.salesperson.index', compact('salespersons'));
    }
}
