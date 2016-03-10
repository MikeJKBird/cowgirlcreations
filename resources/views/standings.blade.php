@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/horses_04.jpg); background-size: cover;">
        <div class="container">
            <h1>Standings!</h1>
        </div>
    </div>
    <div class="container">
        <ol>
            @foreach($racers as $racer)
                <li>{{ $racer->name }}: {{$racer->points}} points</li>
            @endforeach
        </ol>
    </div>
@stop