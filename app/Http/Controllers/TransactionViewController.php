<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionViewController extends Controller
{
    public function index()
    {
        $transactions=Transaction::all();
        return view('pages.transaction.index',compact('transactions'));
    }

    public function index2()
    {
        return view('transaction.guest');
    }
}
