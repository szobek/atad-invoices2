<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionViewController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function index2()
    {
        return view('transaction.guest');
    }
}
