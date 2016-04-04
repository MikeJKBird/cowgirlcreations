<?php

namespace App\Http\Controllers;

use App\Horse;
use Illuminate\Http\Request;

use App\Http\Requests;

class HorsesController extends Controller
{
    public function store(Request $request)
    {
        $horse = new Horse;

        $horse->create([
            'horse_name' => $request->horse_name,
            'user_id' => $request->user_id
        ]);

        return redirect()->back();
    }
}
