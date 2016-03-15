@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <p>Located at: {{$event->location}}</p>
        <p>Occuring on:  {{$event->date}}</p>
        <p>There is room for {{$event->maxNumberParticipants}} racers</p>
        <button>Sign up now!</button>
    </div>
    <div class="container">
        <h3>People who have already signed up!</h3>
        <ul class="list-group">
            @foreach($event->users as $user)
              <li class="list-group-item"> {{$user->name}} </li>
            @endforeach
        </ul>
    </div>
@stop
