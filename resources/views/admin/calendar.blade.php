@extends('layouts.app')


@section('content')
    <div class="container">


        <h3>Events</h3>
        @foreach ($events as $event)
            <a href="calendar/{{$event->id}}">{{ $event->name }}</a>
            <hr>
        @endforeach
    </div>

@stop