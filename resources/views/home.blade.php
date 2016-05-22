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
            <p class="lead">This is Cowgirl Creations. stuff stuff stuff</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu pulvinar orci. Pellentesque sed ligula gravida, auctor nulla in, elementum ex. Vivamus ornare enim vitae porta dignissim. Aenean et dolor turpis. Fusce gravida quis neque quis pretium. Quisque tempus, magna vel eleifend commodo, massa arcu elementum tortor, rhoncus dictum metus purus ac dui. Praesent laoreet sed ex ac tristique. Integer facilisis, orci ut viverra tincidunt, massa mauris vestibulum ex, sit amet mollis ex massa sit amet ex. Cras augue augue, vestibulum quis diam eget, hendrerit congue orci. Aliquam consectetur sit amet turpis at luctus. </p>
           <h3>Email: 123@fake.com</h3>
            <h3><a href="https://www.facebook.com/groups/cowgirlcreations/" target="_blank">Facebook</a></h3>
        </div>

        <div class="row col-md-3 col-md-pull-6 col-xs-12">
            <h3>Sponsors</h3>
            <ul class="list-group">
                @foreach ($sponsors as $sponsor)
                    <li class="list-group-item"><a href="http://{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}</a></li>
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
