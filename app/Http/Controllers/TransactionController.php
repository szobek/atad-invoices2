<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function connectPartnerToTransactionView(){
        $partners=Partner::all();
        $transactions=Transactions::all();
        return view('pages.transaction.connect-to-partner',compact('partners','transactions'));
    }
    public function connectPartnerToTransaction($partner_id, $transaction_id){
        dd($partner_id,$transaction_id);
    }
}
