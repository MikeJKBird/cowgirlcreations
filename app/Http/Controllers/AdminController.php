<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;

class AdminController extends Controller
{

    public function main()
    {
        return view('admin.main');
    }


    public function calendar()
    {
        $events = Event::all();


        return view('admin.calendar', compact('events'));
    }

    public function event()
    {
        return view('admin.addEvent');
    }

    public function results(Event $event)
    {
        return view('admin/eventDetails', compact('event'));
    }

    public function sponsors()
    {
        $sponsors = Sponsor::all();

        return view('admin.editSponsors', compact('sponsors'));
    }
}
