<?php

namespace App\Http\Controllers;

use App\Models\Transactions;

class TransactionViewController extends Controller
{
    public function index()
    {
        $transactions=Transactions::all();
        return view('pages.transaction.index',compact('transactions'));
    }

    public function index2()
    {
        return view('transaction.guest');
    }
}
