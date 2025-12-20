<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnerController extends Controller
{
    public function allPartnerView()
    {
        $partners = Partner::all();
        return view('pages.partner.all', compact('partners'));
    }

    public function getInvoiceByPartner($id)
    {
        $partner = Partner::with('invoices')->find($id);

        if (!$partner) {
            dd('Nincs ilyen partner');
        }
        $invoices=$partner->invoices;
        return view("pages.transaction.single-partner",compact("invoices","partner"));
    }
}
