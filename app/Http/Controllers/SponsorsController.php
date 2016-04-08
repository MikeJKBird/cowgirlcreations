<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sponsor;
use App\Http\Requests;

class SponsorsController extends Controller
{

    /**
     * Loads the admin page to add and edit sponsors
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $sponsors = Sponsor::orderby('value', 'desc')->get();

        return view('admin.editSponsors', compact('sponsors'));
    }


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


    /**
     * Deletes a given sponsor
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Sponsor::findOrFail($id)->delete();

        return back();
    }
}

