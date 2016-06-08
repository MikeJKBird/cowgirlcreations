<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Sponsor;
use App\Text;
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
        $text = Text::first();

        return view('admin.main', compact('text'));
    }

    /**
     * Updates Homepage text
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateHomepageText(Request $request)
    {
        $text = Text::first();

        $text->update($request->all());

        return back();
    }

    /**
     * Updates Standings
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStandings(Request $request)
    {
        $text = Text::first();

        $text->update($request->all());

        return back();
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
     * Loads the specified event page
     *
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventdetails(Event $event)
    {

        $tables = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('horses', 'enrollments.horse_id', '=', 'horses.id')
            ->where('enrollments.event_id', $event->id)->get();

        return view('admin/eventDetails', compact('event', 'enrollments', 'users', 'tables'));
    }



}
