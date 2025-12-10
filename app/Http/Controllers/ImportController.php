<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartnerImport;
use App\Models\Partner;

class ImportController extends Controller
{
    public function showPartnerImportForm()
    {
        return view('pages.import.import-partners');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        Partner::truncate(); // Régi adatok törlése az import előtt
        Excel::import(new PartnerImport, $request->file('file'));

        return redirect()->back()->with('success', 'Import sikeres!');
    }
}
