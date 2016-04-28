<?php

namespace App\Http\Controllers;

use App\Cosanction;
use App\Enrollment;
use App\Entry;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EnrollmentsController extends Controller
{

    public function create(Request $request)
    {
        $entries = $request->entry;
        $carryovers = $request->carryover;
        $cosanctions = $request->cosanction;
        $totalentry = "";

        foreach($entries as $entry) {
          $totalentry .= " " . $entry .", ";
          if($carryovers != null){
              foreach($carryovers as $carryover) {
                if($carryover == $entry) {
                  $totalentry .= "carryover, ";
                }
              }
          }
          if($cosanctions != null){
              foreach($cosanctions as $cosanction) {
                if($cosanction == $entry) {
                  $totalentry .= "cosanction, ";
                }
              }
          }
        }
            $enrollment = Enrollment::create([
                'user_id' => $request->userID,
                'event_id' => $request->eventID,
                'horse_id' => $request->horse,
                'entries' => $totalentry,
                'camping' => $request->camping,
                'stall' => $request->stall,
                'bbqtickets' => $request->bbqtickets,
                'timeonlyruns' => $request->timeonlys,
                'totalprice' => $request->usercost
            ]);

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

}
