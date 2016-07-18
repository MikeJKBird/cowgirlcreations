@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="background-image: url(img/homepage_banner.jpeg); background-size: cover;">
        <div class="container">
            <h1>Cowgirl Creations</h1>
            <p>Barrel Racing and more!</p>
        </div>
    </div>
    <div class="container">

        <div class="row col-md-6 col-md-push-3 col-xs-12">

            <p>{!! nl2br(e($text->homepage)) !!}</p>

            <h3>Email: cowgirlcreations@yahoo.com</h3>
            <h3><a href="https://www.facebook.com/groups/cowgirlcreations/" target="_blank">Facebook</a></h3>
        </div>

        <div class="row col-md-3 col-md-pull-6 col-xs-12">
            <h3>Sponsors</h3>
            <ul class="list-group" id="sponsorlist">
                @foreach ($sponsors as $sponsor)
                    <li class="list-group-item"><a href="{{$sponsor->website}}" target="_blank"><img class="sponsor-pic" src="/img/{{$sponsor->logo}}">{{ $sponsor->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="row col-md-3 col-xs-12 pull-right-md">
            <h3>Upcoming events</h3>
            <ul class="list-group">
                @foreach ($events as $event)
                    <li class="list-group-item"><a href="calendar/{{$event->id}}">{{$event->date->toFormattedDateString()}} - {{ $event->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
