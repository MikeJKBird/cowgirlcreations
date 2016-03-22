<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Photo;
use App\Http\Requests;

/**
 * PagesController
 *
 * Mike Bird <mike.bird@outlook.com>
 **/
class PagesController extends Controller
{

    public function home()
    {
        $events = Event::all();
        $sponsors = Sponsor::all();

        return view('home', compact('events', 'sponsors'));
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
        $photos = Photo::all();

        return view('photos', compact('photos'));
    }

    public function contact()
    {
        return view('contact');
    }
}
