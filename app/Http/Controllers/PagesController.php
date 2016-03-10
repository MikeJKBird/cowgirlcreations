<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function home()
    {
        return view('home');
    }
    public function calendar()
    {
        return view('calendar');
    }

    public function standings()
    {
        $racers = ['cowboy', 'cowgirl', 'Mike'];
        return view('standings', compact('racers'));
    }

    public function hats()
    {
        return view('hats');
    }

    public function artwork()
    {
        return view('artwork');
    }

    public function photos()
    {
        return view('photos');
    }

    public function contact()
    {
        return view('contact');
    }
}
