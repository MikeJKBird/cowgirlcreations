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

//        $enrollments = DB::table('enrollments')->where('event_id', $event->id)->get();
//
//        $users = User::whereExists(function ($query) {
//            $query->select(DB::raw(1))
//                ->from('enrollments')
//                ->whereRaw('enrollments.user_id = users.id');
//        })->get();
        $tables = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')->where('event_id', $event->id)->get();


        return view('admin/eventDetails', compact('event', 'enrollments', 'users', 'tables'));
    }

    public function sponsors()
    {
        $sponsors = Sponsor::orderby('value', 'desc')->get();

        return view('admin.editSponsors', compact('sponsors'));
    }


}
