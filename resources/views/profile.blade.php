@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <h1>Welcome {{$user->name}}!</h1>

        @if($user->memberNumber != null)
            <p>Your member number is: {{$user->memberNumber}}</p>
        @else
            <p>Still waiting to have your member number assigned!</p>
        @endif
        <p>Your email is: {{$user->email}}</p>
        <p>Your points are: {{$user->points}}</p>

        @if(count($user->horses)>0)
        <h3>Horses:</h3>
            @foreach($user->horses as $horse)
                {{$horse->horse_name}}
                <br>
            @endforeach
        @endif

        <h4>Add a new Horse</h4>
        <div class="row">
            <form method="POST" action="/newhorse" class="col-md-4 col-md-offset-4">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="form-group">
                    <label for='horse_name'>Horse Name:</label>
                    <input type="text" name='horse_name' id='horse_name' class='form-control' value='' required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Horse</button>
                </div>
            </form>
            <hr>
        </div>

        <h3>The races you've signed up for:</h3>
        <ul>
            @foreach($events as $event)
                <li>{{$event[0]->name}}</li>
            @endforeach
        {{--@foreach($user->events as $event)--}}
            {{--<li><a href="/calendar/{{$event->id}}">{{$event->name}}</a></li>--}}
        {{--@endforeach--}}
        </ul>
    </div>
@stop