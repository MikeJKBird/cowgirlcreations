<?php

namespace App\Http\Controllers;

use App\Horse;
use Illuminate\Http\Request;

use App\Http\Requests;

class HorsesController extends Controller
{
    /**
     * Save a new horse
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $horse = new Horse;

        $horse->create([
            'horse_name' => $request->horse_name,
            'user_id' => $request->user_id
        ]);

        return redirect()->back();
    }

    /**
     * Delete a given horse
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Horse::findOrFail($id)->delete();

        return back();
    }
}
