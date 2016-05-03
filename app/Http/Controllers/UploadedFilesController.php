<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UploadedFile;

class UploadedFilesController extends Controller
{
    /**
     * Loads the admin page to add a filename
     *
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin/addFile');
    }

    /**
     * Creates a new uploaded file
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $uploadedFile = new UploadedFile;
            $file = $request->file('file');
            $name = $request->name;
            $file->move('files');
            $path = $file->getClientOriginalName();

            $uploadedFile = UploadedFile::create([
                'filename' => $request->name,
                'description' => $request->description,
                'path' => $path
            ]);
            return back();
        }
        return back();
    }

    /**
     * Show a view of all uploaded files
     * 
     * @return [type] [description]
     */
    public function index()
    {
        $files = UploadedFile::get();

        return view('forms', compact('files'));
    }
}
