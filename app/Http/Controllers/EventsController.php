<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Horse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    /**
     * Loads the calendar page with all of the events
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();


        return view('calendar', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Creates a new event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'cosanction' => 'required',
            'deadline' => 'required',
            'producer' => 'required',
            'notes' => 'required',
            'dresscode' => 'required',
            'option' => 'required',
            'timeonly' => 'required',
            'latefee' => 'required',
            'date' => 'required',
            'multiplier' => 'required|min:1'
        ]);

        $event = new Event;
        $date = Carbon::createFromFormat('m/d/Y H:i A', $request->date)->toDateTimeString();

        $event = Event::create([
            'name' => $request->name,
            'location' => $request->location,
            'cosanction' => $request->cosanction,
            'deadline' => $request->deadline,
            'producer' => $request->producer,
            'notes' => $request->notes,
            'dresscode' => $request->dresscode,
            'option' => $request->option,
            'timeonly' => $request->timeonly,
            'latefee' => $request->latefee,
            'arenafee' => $request->arenafee,
            'campingfee' => $request->campingfee,
            'stallfee' => $request->stallfee,
            'bbq' => $request->bbq,
            'date' => $date,
            'multiplier' => $request->multiplier
        ]);

        $eventID = $event->id;

        return redirect("admin/entries/$eventID");
    }

    /**
     * Loads the page for the event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user = Auth::user();
        $signedup = false;

        if($user != null) {
            $match = ['user_id' => $user->id, 'event_id' => $event->id];

            if(Enrollment::where($match)->exists()){
                $signedup = true;
            }
        }
        $entries = $event->entries()->get();


        return view('event',compact('event', 'user', 'signedup', 'entries'));
    }

    /**
     * Load the page to view the results of a given event
     *
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Event $event)
    {
        return view('results', compact('event'));
    }




    /**
     * Load the page to edit the given event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin/editEvent', compact('event'));
    }

    /**
     * Updates an event's information
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        $eventID = $event->id;

        return redirect("/admin/calendar/$eventID");
    }

    /**
     * Deletes a given event
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return back();
    }


}
