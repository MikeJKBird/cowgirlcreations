<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Event;
use App\Horse;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Load the user's profile page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showprofile()
    {
        $user = Auth::user();

        $enrollments = Enrollment::join('events', 'enrollments.event_id', '=', 'events.id')
            ->join('entries', 'enrollments.entry_id', '=', 'entries.id')
            ->join('horses', 'enrollments.horse_id', '=', 'horses.id')
            ->where('enrollments.user_id', $user->id)->get();

        return view('user.profile', compact('user', 'enrollments'));

    }

    /**
     * Loads the page for the user to update their profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editprofile()
    {
        $user = Auth::user();

        return view ('user.editprofile', compact('user'));
    }

    /**
     * User updates their profile information
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateprofile(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect("/profile");
    }


    //***** Admin

    /**
     * Load the view to list all members
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    /**
     * Load the view to edit a member
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $horses = $user->horses()->get();

        return view('admin.editUser', compact('user', 'horses'));
    }


    /**
     * Updates a member's information
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        $userID = $user->id;

        return redirect("/admin/editmember/$userID");
    }

}
