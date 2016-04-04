@extends('layouts.admin')


@section('content')
    <div class="container">

        <h3>Events</h3>
        @foreach ($events as $event)
            <a href="calendar/{{$event->id}}">{{ $event->name }}</a> : {{$event->date->toFormattedDateString()}}
            <hr>
        @endforeach
    </div>

@stop