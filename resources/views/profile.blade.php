@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <h1>Welcome {{$user->name}}!</h1>

        <p>Your email is: {{$user->email}}</p>
        <p>Your points are: {{$user->points}}</p>

        The races you've signed up for:
        <ul>
        @foreach($user->events as $event)
            <li><a href="/calendar/{{$event->id}}">{{$event->name}}</a></li>
        @endforeach
        </ul>
    </div>
@stop