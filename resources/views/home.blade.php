@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="background-image: url(img/horses_05.jpg); background-size: cover;">
        <div class="container">
            <h1>Cowgirl Creations!</h1>
            <p>Barrel Racing and more!</p>
        </div>
    </div>
    <div class="container">

        <div class="row col-md-3">
            <h3>Our Sponsors</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">First</a></li>
                <li class="list-group-item"><a href="#">Second</a></li>
                <li class="list-group-item"><a href="#">Third</a></li>
                <li class="list-group-item"><a href="#">Fourth</a></li>
            </ul>
        </div>
        <div class="row col-md-5">
            <p class="lead text-center">This is Cowgirl Creations. stuff stuff stuff</p>
        </div>
        <div class="row col-md-3  col-md-offset-1">
            <h3 class="">Our Upcoming events</h3>
            <ul class="list-group">
                @foreach ($events as $event)
                    <li class="list-group-item"><a href="calendar/{{$event->id}}">{{$event->date->toFormattedDateString()}} - {{ $event->name }}</a></li>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
