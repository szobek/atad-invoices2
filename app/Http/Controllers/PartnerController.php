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

    public function editPartnerView($id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return redirect()->back()->with('error', 'Nincs ilyen partner');
        }

        return view('pages.partner.edit', compact('partner'));
    }

    public function editPartner($id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return redirect()->back()->with('error', 'Nincs ilyen partner');
        }

        $data = request()->validate([
            'name' => 'required|string|max:255',
            'tax' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:20',
            'state' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
        ]);

        $partner->update($data);

        return redirect()->route('pages.single-partner', $partner->id)->with('success', 'Partner sikeresen frissítve.');
    }
}
