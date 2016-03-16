@extends('layouts.admin')


@section('content')

    <div class="container">
        <h3>People who have already signed up!</h3>
        <ul class="list-group">
            @foreach($event->users as $user)
                <li class="list-group-item"> {{$user->name}} </li>
            @endforeach
        </ul>
    </div>

    <div class="container">
        <h3>Add the Results for {{$event->name}}</h3>

            @foreach($event->users as $user)
                <li class="list-group-item"> {{$user->name}} </li>

            @endforeach

    </div>

@stop