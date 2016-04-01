<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sponsor;
use App\Http\Requests;

class SponsorsController extends Controller
{
    public function store(Request $request)
    {
        $sponsor = new Sponsor;

        $sponsor->create([
            'name' => $request->name,
            'website' => $request->website,
            'value' => $request->value
        ]);
        return redirect()->back();
    }


    public function destroy($id)
    {
        Sponsor::findOrFail($id)->delete();

        return back();
    }
}

