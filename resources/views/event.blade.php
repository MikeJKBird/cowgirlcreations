@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ $event->name }}</h1>
            <hr>
            @if(Auth::check() && $signedup)
                <h3>Signed up!</h3>
                <hr>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <p>Located at: {{$event->location}}</p>
                <p>Co-sanctioned: {{$event->cosanction}}</p>
                <p>Occuring: {{$event->date->toDayDateTimeString()}}</p>
                <p>Pre-Entry Deadline: {{$event->deadline}} </p>
                <p>Producer: {{$event->producer}}</p>
                <p>Dress Code: {{$event->dresscode}}</p>
                <p>Option: {{$event->option}}</p>
                <p>Time Only: {{$event->timeonly}}</p>
            </div>
            <div class="col-md-4 col-md-offset-1">
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
            </div>
        </div>
        <div class="text-center">
            <hr>
            {{--@if(Auth::check() && !$user->events->contains($event->id))--}}
            @if(Auth::check() && !$signedup)
                @if( count($user->horses) != 0)

            <form action="/eventsignup" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="userID" value="{{$user->id}}">
                <input type="hidden" name="eventID" value="{{$event->id}}">


                <select name="horse">
                    @foreach($user->horses as $horse)
                        <option value="{{$horse->id}}">{{$horse->horse_name}}</option>
                    @endforeach
                </select>


                @if( $event->campingfee != null)
                    <label for="camping">Add Camping</label>
                    <input type="checkbox" name="camping" id="camping">
                @endif
                @if( $event->stallfee != null)
                    <label for="stall">Add Stall</label>
                    <input type="checkbox" name="stall" id="stall">
                @endif
                @if( $event->bbq != null)
                    <label for="bbq">BBQ Tickets</label>
                    <input type="number" name="bbq" id="bbq" value="0">
                @endif
                <input type="submit" value="Sign Up For Race">
            </form>
                @else
                    <a href="/profile">Please add a horse to your profile to sign up</a>
                @endif
            @endif
            @if(!Auth::check())
                <h4><a href="/login">Log in</a> or <a href="/register">register</a> to sign up for the race</h4>
            @endif
        </div>

    </div>

@stop