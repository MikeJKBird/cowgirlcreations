<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function showprofile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }
}
