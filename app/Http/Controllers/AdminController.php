<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\DB;

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
        $eventID = $event->id;
        $enrollments = DB::table('enrollments')->where('event_id', $eventID)->get();
        $users = [];

        foreach($enrollments as $enrollment) {
            $userID = $enrollment->user_id;
            $user = DB::table('users')->where('id', $userID)->first();
            array_push($users, $user);
        }

        return view('admin/eventDetails', compact('event', 'enrollments', 'users'));
    }

    public function sponsors()
    {
        $sponsors = Sponsor::orderby('value', 'desc')->get();

        return view('admin.editSponsors', compact('sponsors'));
    }


}
