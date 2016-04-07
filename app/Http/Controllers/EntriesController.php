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
        $entries = Entry::all();

        return view('admin.addEntries', compact('event', 'entries'));
    }

    public function store(Event $event, Request $request)
    {
        $entry = new Entry();

        $entry->create([
            'name' => $request->name,
            'price' => $request->price,
            'event_id' => $request->event_id,
        ]);

        return back();
    }

    public function destroy($id)
    {
        Entry::findOrFail($id)->delete();

        return back();
    }
}
