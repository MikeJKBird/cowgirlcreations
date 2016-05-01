<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UploadedFilesController extends Controller
{
    /**
     * Loads the admin page to add a filename
     *
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin/addFile');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('raceresult')) {
            $uploadedFile = new UploadedFile;
            $file = $request->file('file');

            $uploadedFile = UploadedFile::create([
                'filename' = $request->name,
                'description' = $request->description,
            ])
        }
        return back();
    }
}
