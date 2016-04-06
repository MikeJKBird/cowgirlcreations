@extends('layouts.admin')


@section('content')
    <div class="container">

        <h3>Events</h3>
        @foreach ($events as $event)
            <a href="calendar/{{$event->id}}">{{ $event->name }}</a> : {{$event->date->toFormattedDateString()}}

            @if($event->uploadedresults)
                - Results uploaded <i class="fa fa-2x fa-check"></i>
            @endif

            <hr>
        @endforeach
    </div>

@stop