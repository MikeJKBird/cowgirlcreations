<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EntriesController extends Controller
{
    public function create(Event $event)
    {
        $entries = Entry::where('event_id', $event->id)->get();

        return view('admin.addEntries', compact('event', 'entries'));
    }

    public function store(Request $request)
    {
        $entry = new Entry();

        $entry->create([
            'entry_name' => $request->entry_name,
            'price' => $request->price,
            'event_id' => $request->event_id,
        ]);

        return back();
    }

    public function update()
    {
        //
    }

    public function destroy($id)
    {
        Entry::findOrFail($id)->delete();

        return back();
    }

}
