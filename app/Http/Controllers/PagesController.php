<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Http\Requests;

class PagesController extends Controller
{

    public function home()
    {
        $events = Event::all();

        return view('home', compact('events'));
    }
    public function calendar()
    {
        return view('calendar');
    }

    public function standings()
    {
        $racers = User::orderBy('points', 'DESC')->get();
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
