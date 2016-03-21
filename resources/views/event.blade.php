@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <p>Located at: {{$event->location}}</p>
        <p>Co-sanctioned: {{$event->cosanction}}</p>
        <p>Occuring: {{$event->date->toDayDateTimeString()}}</p>
        <p>Pre-Entry Deadline: {{$event->deadline}} </p>
        <p>Producer: {{$event->producer}}</p>
        <p>Dress Code: {{$event->dresscode}}</p>
        <p>Option: {{$event->option}}</p>
        <p>Time Only: {{$event->timeonly}}</p>
        <p>Late Fee: {{$event->latefee}}</p>
        <p>Arena Fee: {{$event->arenafee}}</p>
        @if( $event->campingfee != null)
        <p>Camping Fee: {{$event->campingfee}}</p>
        @endif
        @if( $event->stallfee != null)
        <p>Stall Fee: {{$event->stallfee}}</p>
        @endif
        <p>Divisions: {{$event->divisions}}</p>
        <p>BBQ: {{$event->bbq}}</p>
        <p>Notes: {{$event->notes}}</p>

        <button>Sign up now!</button>
    </div>

@stop