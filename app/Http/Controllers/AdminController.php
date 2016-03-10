<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;

class AdminController extends Controller
{
    public function calendar()
    {
        $events = Event::all();


        return view('admin.calendar', compact('events'));
    }

    public function event()
    {
        return view('admin.addEvent');
    }

    public function results(Event $event)
    {
        return view('admin/addResults', compact('event'));
    }
}
