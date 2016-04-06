@extends('layouts.admin')


@section('content')
    <div class="container">

        <h3>Add Results for {{$event->name}}</h3>

        <form action="/admin/results/{{$event->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            Select results to upload:
            <input type="file" name="raceresult" id="fileToUpload">
            <input type="submit" value="Upload Results" name="submit">
        </form>


    </div>

@stop