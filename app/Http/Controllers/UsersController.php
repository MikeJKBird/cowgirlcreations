<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Load the user's profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showprofile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
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


    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        $userID = $user->id;

        return redirect("/admin/editmember/$userID");
    }

}
