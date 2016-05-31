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


    /**
     * Save a sponsor
     *
     * @param  Request $request [description]
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


//        $this->validate($request, [
//            'logo' => 'mimes:jpg,jpeg,png,bmp,gif'
//        ]);

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $name = $file->getClientOriginalName();

            $file->move('img', $name);

            $url = $request->website;


            if (substr($url, 0, 4) != "http") {
                $url = "http://" . $url;
            }

            $sponsor = new Sponsor;

            $sponsor->create([
                'name' => $request->name,
                'website' => $url,
                'value' => $request->value,
                'logo' => $name
            ]);

            return redirect()->back();
        }
        else {
            return redirect()->back();
        }
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
