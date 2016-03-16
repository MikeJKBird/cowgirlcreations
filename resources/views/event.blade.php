@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>{{ $event->name }}: {{$event->date->diffForHumans()}}</h1>
        <p>Located at: {{$event->location}}</p>
        <p>Occuring: {{$event->date->toDayDateTimeString()}}</p>
        <p>There is room for {{$event->maxNumberParticipants}} racers</p>
        <button>Sign up now!</button>
    </div>

@stop
