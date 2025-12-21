<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Invoice;

class PartnerController extends Controller
{
    public function allPartnerView()
    {
        $partners = Partner::all();
        return view('pages.partner.all', compact('partners'));
    }

    public function showPartner($id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            dd('Nincs ilyen partner');
        }
        $invoices=Invoice::where('partner_id',$id)->get();
        return view("pages.partner.single-partner",compact("invoices","partner"));
    }
}
