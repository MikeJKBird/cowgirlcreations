<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Loads page to add results to an event
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('admin.addResults', compact('event'));
    }

    /**
     * Uploads results file and assigns file path to event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, Request $request)
    {
        if ($request->hasFile('raceresult')) {

            $this->validate($request, [
                'raceresult' => 'required|mimes:html'
            ]);

            $file = $request->file('raceresult');
            $name = $file->getClientOriginalName();
            $file->move('results', $name);

            $name = substr($name, 0, -5);

            $event->update(['resultspath' => $name]);

            if($event->resultspath != null){
                $event->update(['uploadedresults' => true]);
            }

            return redirect('/admin/calendar/' . $event->id);
        }
        return back();
    }

    /**
     * Loads the page for the given event results
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.eventResults', compact('event'));
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
}
