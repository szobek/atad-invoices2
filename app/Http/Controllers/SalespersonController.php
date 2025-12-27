<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;

class SalespersonController extends Controller
{
    public function index()
    {
        $salespersons = User::where('role', 'salesperson')->get();
        return view('pages.salesperson.index', compact('salespersons'));
    }
    public function show($id)
    {
        $salesperson = User::whereId($id)->with('partners')->firstOrFail();
        return view('pages.salesperson.single', compact('salesperson'));
    }

    public function connectPartnerToSalespersonView()
    {
        $salesperson =  User::where('role', 'salesperson')->get();
        $partners = Partner::where('user_id', null)->get();

        return view('pages.salesperson.partner-connect', compact('partners', 'salesperson'));
    }
    public function connectPartnerToSalesperson()
    {
        $salespersonId = request('user_id');
        $partnerId = request('partner_id');
        $salesperson = User::findOrFail($salespersonId);
        $partner = Partner::findOrFail($partnerId);

        // Kapcsolat létrehozása
        $partner->user()->associate($salesperson);
        $partner->save();

        return redirect()->back()->with('success', 'Partner sikeresen hozzárendelve a kereskedőhöz.');
    }
}
