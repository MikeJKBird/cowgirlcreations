@extends('layouts.admin')


@section('content')
    <div class="container">
        <h2>Add the Results for {{$event->name}}</h2>

        @foreach($event->users as $user)
            <li class="list-group-item"> {{$user->name}} </li>

        @endforeach

    </div>

@stop