<?php

namespace App\Http\Controllers;

use App\Cosanction;
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

        $count = count($events);
        $i = 1;
        $eventData = 'events:[';

        foreach($events as $event){
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $event->date)->toDateTimeString();
            $newName = str_replace('\'',"\\'", $event->name);

            $eventData .= '{title: \'' . $newName .'\', start: \'' . $date . '\', url: \'/calendar/' .$event->id . '\'}';
            if ($i < $count) {
                $eventData .= ',';
            }
            $i++;
        }
        $eventData .= ']';

        return view('calendar', compact('events', 'eventData'));
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cosanctions = Cosanction::get();

        return view('admin.addEvent', compact('cosanctions'));
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
        $deadline = Carbon::createFromFormat('m/d/Y H:i A', $request->deadline)->toDateTimeString();

        $event = Event::create([
            'name' => $request->name,
            'location' => $request->location,
            'deadline' => $deadline,
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

        $event->cosanction()->sync($request->input('cosanction'));

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
        $cosanction = $event->cosanction()->first();
        $now = Carbon::now('America/Vancouver');


        return view('event',compact('event', 'user', 'signedup', 'entries', 'cosanction','now'));
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

        $cosanctions = Cosanction::get();

        return view('admin/editEvent', compact('event', 'cosanctions'));
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

        return redirect("/admin/entries/$eventID");
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

    public function addpoints(Request $request)
    {
        $test =[];
        $info = $request->all();
        $multiplier = $info['multiplier'];
        foreach($info as $key =>$input) {
            if(strpos($key, 'participate')) {
                if ($input){
                    $exploded_key = explode("-", $key);
                    $id = array_shift($exploded_key);
                    $user = User::findOrFail($id);
                    $user->points += (1 * $multiplier);
                    $user->save();
                    array_push($test, $user);
                }

            }
            if(strpos($key, 'position')) {
                if ($input){
                    $exploded_key = explode("-", $key);
                    $id = array_shift($exploded_key);
                    $user = User::findOrFail($id);
                    $user->points += ((6-$input) * $multiplier);
                    $user->save();
                    array_push($test, $user);
                }

            }
        }

        return back();
    }


}
