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
                @foreach ($sponsors as $sponsor)
                    <li class="list-group-item"><a href="http://{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="row col-md-5">
            <p class="lead text-center">This is Cowgirl Creations. stuff stuff stuff</p>
            <h3>Email: 123@fake.com</h3>
            <h3><a href="https://www.facebook.com/groups/cowgirlcreations/">Facebook</a></h3>
        </div>
        <div class="row col-md-3  col-md-offset-1">
            <h3 class="">Our Upcoming events</h3>
            <ul class="list-group">
                @foreach ($events as $event)
                    <li class="list-group-item"><a href="calendar/{{$event->id}}">{{$event->date->toFormattedDateString()}} - {{ $event->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
