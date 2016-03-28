<?php

namespace App\Http\Controllers;

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
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $date = Carbon::createFromFormat('m/d/Y H:i A', $request->date)->toDateTimeString();

        $event->create([
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
            'divisions' => $request->divisions,
            'bbq' => $request->bbq,
            'date' => $date
        ]);

        return redirect('admin/calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $user = Auth::user();
        return view('event',compact('event', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function signup(Request $request)
    {
        $userID = $request->userID;
        $eventID = $request->eventID;
        $horseID = $request->horse;

        $user = User::where('id', $userID)->first();
        $event = Event::where('id', $eventID)->first();
        $horse = Horse::where('id', $horseID)->first();

        $user->events()->save($event);

        return back();
    }
}
