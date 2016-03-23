<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhotosController extends Controller
{
    /**
     * Edit the photo gallery
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $photos = Photo::all();
        return view('admin.editPhotos', compact('photos'));
    }

    /**
     * Add a photo to the gallery
     *
     * @param Request $request
     * @return string
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp,gif'
        ]);

        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();

        $file->move('img', $name);

        $photo = Photo::create(['name' => $name]);

        return 'Done';

    }

    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());

        return back();
    }

}
