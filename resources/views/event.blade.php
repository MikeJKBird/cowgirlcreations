@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <hr>
        @if(Auth::check() && $user->events->contains($event->id))
            <h3>Signed up!</h3>
            <hr>
        @endif
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

        @if(Auth::check() && !$user->events->contains($event->id))
        <form action="/signup" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="userID" value="{{$user->id}}">
            <input type="hidden" name="eventID" value="{{$event->id}}">
            <input type="submit" value="Sign Up For Race">
        </form>
        @endif
        @if(!Auth::check())
            <hr>
            <h4><a href="/login">Log in</a> or <a href="/register">register</a> to sign up for the race</h4>
        @endif


    </div>

@stop