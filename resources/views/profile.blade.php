@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <h1>Welcome {{$user->name}}!</h1>

        <p>Your email is: {{$user->email}}</p>
        <p>Your points are: {{$user->points}}</p>

        <h3>Horses:</h3>
            @foreach($user->horses as $horse)
                {{$horse->name}}
                <br>
            @endforeach

        <h4>Add a new Horse</h4>
        <div class="row">
            <form method="POST" action="/newhorse" class="col-md-4 col-md-offset-4">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="form-group">
                    <label for='name'>Horse Name:</label>
                    <input type="text" name='name' id='name' class='form-control' value='' required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Horse</button>
                </div>
            </form>
            <hr>
        </div>

        <h3>The races you've signed up for:</h3>
        <ul>
        @foreach($user->events as $event)
            <li><a href="/calendar/{{$event->id}}">{{$event->name}}</a></li>
        @endforeach
        </ul>
    </div>
@stop