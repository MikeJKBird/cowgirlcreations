<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UploadedFile;
use Illuminate\Support\Facades\File;

class UploadedFilesController extends Controller
{
    /**
     * Loads the admin page to add a filename
     *
     * @return [type] [description]
     */
    public function create()
    {
        $uploadedFiles = UploadedFile::get();

        return view('admin/addFile', compact('uploadedFiles'));
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
            $name = $file->getClientOriginalName();
            $file->move('files', $name);
            $path = $file->getClientOriginalName();

            $uploadedFile = UploadedFile::create([
                'filename' => $request->filename,
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

    public function destroy($id)
    {
        $file = UploadedFile::findOrFail($id);
        $filename = $file->path;
        File::delete('files/' . $filename);
        $file->delete();

        return back();
    }
}
