@extends('layouts.admin')


@section('content')
    <div class="container">

        <h3>Upload File</h3>

        <form action="/addFile" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            Select results to upload:

            <div class="form-group">
                <label for='filename'>Name:</label>
                <input type="text" name='filename' id='filename' class='form-control thumb' value='' required>
            </div>

            <div class="form-group">
                <label for='description'>Description:</label>
                <input type="text" name='description' id='description' class='form-control thumb' value='' required>
            </div>

            <input type="file" name="file" id="">
            <br>

            <input type="submit" value="Add File" class="btn btn-success" name="submit">
        </form>
        <hr />
        <table class="table">
            <th>
                File name
            </th>
            <th>
                File description
            </th>
            <th>
                Delete File
            </th>

        @foreach($uploadedFiles as $file)
            <tr>
                <td>
                    {{$file->filename}}
                </td>
                <td>
                    {{$file->description}}
                </td>
                <td>
                    <form method="POST" action="/uploadedFile/{{$file->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </table>


    </div>

@stop
