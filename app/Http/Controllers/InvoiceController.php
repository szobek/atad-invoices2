<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\TransactionPartner;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        dd('invoices');
    }
    public function connectPartnerToTransactionView()
    {
        $partners = Partner::all();
        $transactions = Invoice::where('partner_id', null)->get();
        return view('pages.invoice.connect-to-partner', compact('partners', 'transactions'));
    }
    public function connectPartnerToTransaction(Request $request)
    {
        $validateData = $request->validate([
            "partner_id" => 'required',
            "transaction_id" => 'required'
        ]);

        try {
            $invoice = Invoice::find($validateData["transaction_id"]);
            $invoice->partner_id = $validateData["partner_id"];
            $invoice->save();
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

    public function invoiceCreateView()
    {
        return view('pages.invoice.create-invoice');
    }

    public function createInvoice(Request $request)
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
            Invoice::create([
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

    public function getInvoiceByNumber($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
        $partner = $invoice->partner;
        return view('pages.invoice.single-invoice', compact('invoice', 'partner'));
    }

    public function deleteInvoice($id)
    {
        try {
            $invoice = Invoice::where('id', $id)->first();
            if ($invoice) {
                $invoice->delete();
            }
            // dd($invoice);
            return redirect("invoices");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hiba történt a törlés során!');
        }
    }

    public function allInvoices()
    {
        $invoices = Invoice::all();
        return view('pages.invoice.all-invoices', compact('invoices'));
    }
}
