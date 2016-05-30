<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\Text;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Photo;
use App\Http\Requests;
use Carbon\Carbon;

/**
 * PagesController
 *
 * Mike Bird <mike.bird@outlook.com>
 **/
class PagesController extends Controller
{

    /**
     * Loads the home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $now = Carbon::now('America/Vancouver');
        $upcoming = Carbon::now()->addDays(30);
        $events = Event::where('date', '<', $upcoming)->where('date','>', $now)->get();
        $text = Text::first();
        $sponsors = Sponsor::orderby('value', 'desc')->get();

        return view('home', compact('events', 'sponsors', 'text'));
    }


    /**
     * Loads the standings of the members
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function standings()
    {
        $racers = User::orderBy('points', 'DESC')->get();
        return view('standings', compact('racers'));
    }

    /**
     * Loads the photo gallery
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photos()
    {
        $photos = Photo::all();

        return view('photos', compact('photos'));
    }


    public function lightemup()
    {
        return view('lightEmUp');
    }

    public function news()
    {
        return view('news');
    }


}
