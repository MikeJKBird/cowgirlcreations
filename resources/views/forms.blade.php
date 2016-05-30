@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/banner01.jpg); background-size: cover;">
        <div class="container">
            <h1>Forms!</h1>
            <p>All the stuff you'll need to know</p>
        </div>
    </div>
    <div class="container">
        <ul>
            @foreach($files as $file)
                <li>
                    <a href="/files/{{$file->path}}" download="{{$file->filename}}">{{$file->filename}}</a> -  {{$file->description}}
                </li>
            @endforeach
        </ul>
    </div>
@stop
