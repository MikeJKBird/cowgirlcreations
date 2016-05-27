@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="background-image: url(img/banner01.jpg); background-size: cover;">
        <div class="container">
            <h1>Cowgirl Creations!</h1>
            <p>Barrel Racing and more!</p>
        </div>
    </div>
    <div class="container">

        <div class="row col-md-6 col-md-push-3 col-xs-12">
            <p class="lead">British Columbia based, Cowgirl Creations, began with bringing western art and designs to people in love with the country lifestyle.</p>

            <p>Since 2010, the Cowgirl Creations “Event Division” has been producing and hosting successful Barrel Racing events, offering Open, Youth, Senior, Pee Wee, Novice and Pole Bending. Each race is gaining in entries, payouts and prizes, and encourages a safe, fun environment for families & competitors to spend time doing what they enjoy. We are dedicated to giving every age group and ability level the opportunity to be involved in a fun and exciting sport, and boast a payout structure that enables all racers the chance to win more of that money!</p>

            <p>Members earn points participating throughout the season at various events, held at a number of arenas from Langley to Chilliwack. Along with our determination for large payouts, high-point winners at the end of each season, receive fabulous year-end awards with the help of our sponsors and the commitment of Cowgirl Creations.</p>

            <p>Cowgirl Creations is the first to bring the biggest paying slot race to BC. On Sept 11, 2016 racers will run for 100% pay out during the Light Em Up Slot Race with a projected pay out of over $64,000! </p>

             <p>Welcome!</p>
            <h3>Email: 123@fake.com</h3>
            <h3><a href="https://www.facebook.com/groups/cowgirlcreations/" target="_blank">Facebook</a></h3>
        </div>

        <div class="row col-md-3 col-md-pull-6 col-xs-12">
            <h3>Sponsors</h3>
            <ul class="list-group">
                @foreach ($sponsors as $sponsor)
                    <li class="list-group-item"><a href="{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}</a></li>
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
