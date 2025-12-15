<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\TransactionPartner;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function connectPartnerToTransactionView()
    {
        $partners = Partner::all();
        $transactions = Transaction::whereNotIn('id', function ($query) {
            $query->select('transaction_id')
                ->from('transaction_partners');
        })->get();
        return view('pages.transaction.connect-to-partner', compact('partners', 'transactions'));
    }
    public function connectPartnerToTransaction(Request $request)
    {
        // dd($request->partner_id,$request->transaction_id);
        TransactionPartner::create([
            'partner_id' => $request->partner_id,
            'transaction_id' => $request->transaction_id
        ]);
        return redirect()->back();
    }
}
