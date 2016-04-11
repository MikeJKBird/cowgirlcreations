<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Sponsor;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    /**
     * Loads the main admin page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        return view('admin.main');
    }

    /**
     * Loads the page with all of the events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Loads the specified event page
     *
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventdetails(Event $event)
    {

        $tables = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('horses', 'enrollments.horse_id', '=', 'horses.id')
            ->join('entries', 'enrollments.entry_id', '=', 'entries.id')
            ->where('enrollments.event_id', $event->id)->get();

        return view('admin/eventDetails', compact('event', 'enrollments', 'users', 'tables'));
    }



}
