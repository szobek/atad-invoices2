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
        $validateData = $request->validate([
            "partner_id" => 'required',
            "transaction_id" => 'required'
        ]);

        try {
            TransactionPartner::create([
                'partner_id' => $validateData["partner_id"],
                'transaction_id' => $validateData["transaction_id"]
            ]);
            return redirect()->back()->with('saved', 'A kapcsolat mentve!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hiba történt a mentés során!');
        }
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
            'comment' => 'nullable|string|max:255',
        ]);
        // dd($validatedData);
        try {
            Transaction::create([
                'num' => $validatedData['num'],
                'date' => $validatedData['date'],
                'pay_mode' => $validatedData['pay_mode'],
                'amount' => $validatedData['amount'],
                'comment' => $validatedData['comment'] ?? null,
            ]);
            return redirect()->back()->with('saved', 'A számla mentve!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hiba történt a mentés során!');
        }
    }

    public function getInvoiceByNumber($szamlaszam)
    {
        $invoice = Transaction::where('id', $szamlaszam)->with('partner')->first();
        dd($invoice);
        $partner = $invoice->partner->first();
        // dd($szamlaszam,$invoice,$partner);
        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
        return view('pages.transaction.single-invoice', compact('invoice', 'partner'));
    }

    public function allInvoices()
    {
        $invoices = Transaction::all();
        return view('pages.transaction.all-invoices', compact('invoices'));
    }
}
