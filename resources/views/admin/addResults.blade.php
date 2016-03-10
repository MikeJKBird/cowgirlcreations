@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Admin Page!</h1>
        <h2>Add the Results for {{$event->name}}</h2>

        @foreach($event->users as $user)
            <li class="list-group-item"> {{$user->name}} </li>
        @endforeach

    </div>

@stop