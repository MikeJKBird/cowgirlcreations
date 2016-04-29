@extends('layouts.app')


@section('content')
<div class="container">

    <div class="col-md-6 col-md-offset-3">
        <h1>Your Races</h1>
        @if(count($enrollments) > 0)
        <h3>The races you've signed up for:</h3>

            @foreach($enrollments as $enrollment)
            <div class="row">
                <p class="col-md-9"><a href="/calendar/{{$enrollment->event_id}}">{{$enrollment->name}}</a> riding {{$enrollment->horse_name}}</p>
                @if($enrollment->deadline > $now)
                <form method="POST" action="/removeevent/{{$enrollment->event_id}}" class="col-md-2">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-xs btn-danger">Drop Race</button>
                </form>
                @endif
            </div>
            @endforeach
        @else
            <h3>You aren't signed up for any races right now!</h3>
            <h4><a href="/calendar">Click here to view the calendar</a></h4>
        @endif
        <hr />
        <p><a href="/profile" class="btn btn-primary">Back to profile</a></p>

    </div>
</div>
@stop
