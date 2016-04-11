<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Entry;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EnrollmentsController extends Controller
{

    public function create(Request $request)
    {
        $entryIDs = $request->entry;
        foreach($entryIDs as $entryID) {

            $enrollment = Enrollment::create([
                'user_id' => $request->userID,
                'event_id' => $request->eventID,
                'horse_id' => $request->horse,
                'entry_id' => $entryID,
                'camping' => $request->camping,
                'stall' => $request->stall,
                'bbqtickets' => $request->bbqtickets
            ]);
            $this->calculateTotalPrice($enrollment);
        }



        return back();
    }
    /**
     * Delete the given enrollment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, Request $request)
    {
        $userID = $request->user_id;
        $eventID = $id;
        $match = ['user_id' => $userID, 'event_id' => $eventID];

        $enrollment = Enrollment::where($match)->first();
        $enrollmentID = $enrollment->id;
        Enrollment::findOrFail($enrollmentID)->delete();

        return back();
    }

    public function calculateTotalPrice(Enrollment $enrollment)
    {
        $total = 0;
        $event = Event::where('id', $enrollment->event_id)->first();
        $entry = Entry::where('id', $enrollment->entry_id)->first();


        $total += $entry->price;
        $total += $event->arenafee;

        if ($enrollment->camping){
            $total += $event->campingfee;
        }
        if($enrollment->stall){
            $total += $event->stallfee;
        }
        if($enrollment->bbqtickets != null){

            $numbbqtickets = $enrollment->bbqtickets;
            $bbqticketprice = $event->bbq;
            $bbq = $numbbqtickets * $bbqticketprice;
            $total += $bbq;
        }

        $enrollment->update(['totalprice' => $total]);
    }
}
