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

    public function deletePartner($id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return redirect()->back()->with('error', 'Nincs ilyen partner');
        }

        // Törlés előtt ellenőrizheted, hogy vannak-e kapcsolódó számlák
        $invoicesCount = Invoice::where('partner_id', $id)->count();
        if ($invoicesCount > 0) {
            return redirect()->back()->with('error', 'A partner nem törölhető, mert kapcsolódó számlák vannak.');
        }

        $partner->delete();

        return redirect()->route('pages.all-partners')->with('success', 'Partner sikeresen törölve.');
    }
}
