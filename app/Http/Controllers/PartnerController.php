<?php

namespace App\Http\Controllers;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function allPartnerView()
    {
        $partners=Partner::all();
        return view('pages.partner.all',compact('partners'));
    }
}
