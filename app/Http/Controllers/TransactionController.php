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

    public function disconnectPartnerFromTransaction(Request $request)
    {
        TransactionPartner::where('partner_id', $request->partner_id)
            ->where('transaction_id', $request->transaction_id)
            ->delete();
        return redirect()->back();
    }

    public function transactionCreateView()
    {
        return view('pages.transaction.create-invoice');
    }

    public function createTransaction(Request $request)
    {
        $validatedData = $request->validate([
            'num' => 'required|string|max:15',
            'date' => 'required|string|max:10',
            'pay_mode' => 'required|string|max:45',
            'amount' => 'required|numeric|min:0',
        ]);
        // dd($validatedData);
        try {
            Transaction::create([
                'num' => $validatedData['num'],
                'date' => $validatedData['date'],
                'pay_mode' => $validatedData['pay_mode']
            ]);
            return redirect()->back()->with('saved', 'A számla mentve!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hiba történt a mentés során!');
        }
    }
}
