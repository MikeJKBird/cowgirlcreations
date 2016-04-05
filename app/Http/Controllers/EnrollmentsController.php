<?php

namespace App\Http\Controllers;

use App\Enrollment;
use Illuminate\Http\Request;

use App\Http\Requests;

class EnrollmentsController extends Controller
{

    public function create(Request $request)
    {
        $enrollment = new Enrollment();
        $enrollment->create([
            'user_id' => $request->userID,
            'event_id' => $request->eventID,
            'horse_id' => $request->horse,
            'camping' => $request->camping,
            'stall' => $request->stall,
            'bbqtickets' => $request->bbqtickets
        ]);

        return back();
    }
    /**
     * Delete the given enrollment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Enrollment::findOrFail($id)->delete();

        return back();
    }
}
