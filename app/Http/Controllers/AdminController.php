<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\User;
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

    /**
     * View to add a new event
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function event()
    {
        return view('admin.addEvent');
    }

    public function eventdetails(Event $event)
    {
        return view('admin/eventDetails', compact('event'));
    }

    public function sponsors()
    {
        $sponsors = Sponsor::orderby('value', 'desc')->get();

        return view('admin.editSponsors', compact('sponsors'));
    }


}
