<?php

namespace App\Http\Controllers;

use App\Cosanction;
use Illuminate\Http\Request;

use App\Http\Requests;

class CosanctionsController extends Controller
{
    public function create()
    {
        $cosanctions = Cosanction::get();

        return view('admin/addCosanction', compact('cosanctions'));
    }

    public function store(Request $request)
    {
        $cosanction = new Cosanction;

        $cosanction->create([
            'cosanction_name' => $request->cosanction_name,
            'cosanction_price' => $request->cosanction_price
        ]);

        return back();
    }

    public function destroy($id)
    {
        Cosanction::findOrFail($id)->delete();

        return back();
    }
}
