<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sponsor;
use App\Http\Requests;

class SponsorController extends Controller
{
    public function store(Request $request)
    {
        $sponsor = new Sponsor;

        $sponsor->create([
            'name' => $request->name,
            'website' => $request->website
        ]);
        return redirect()->back();
    }


    public function destroy($id)
    {
        Sponsor::findOrFail($id)->delete();

        return back();
    }
}
