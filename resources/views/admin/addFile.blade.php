@extends('layouts.admin')


@section('content')
    <div class="container">

        <h3>Upload File</h3>

        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            Select results to upload:
            <input type="file" name="" id="">
            <input type="submit" value="Add File" name="submit">
        </form>


    </div>

@stop
