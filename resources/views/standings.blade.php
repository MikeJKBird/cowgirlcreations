@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/horses_04.jpg); background-size: cover;">
        <div class="container">
            <h1>Standings!</h1>
        </div>
    </div>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <ol class="list-group">
                @foreach($racers as $racer)
                    <li class="list-group-item">{{ $racer->name }}: {{$racer->points}} points</li>
                @endforeach
            </ol>
        </div>
    </div>
@stop