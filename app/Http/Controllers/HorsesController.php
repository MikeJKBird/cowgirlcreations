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
            'name' => $request->name,
            'user_id' => $request->user_id
        ]);

        return redirect()->back();
    }
}
