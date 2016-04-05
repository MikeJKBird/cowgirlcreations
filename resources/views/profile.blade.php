@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Welcome {{$user->name}}!</h1>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <h3>Info</h3>
                @if($user->memberNumber != null)
                    <p>Your member number is: {{$user->memberNumber}}</p>
                @else
                    <p>Still waiting to have your member number assigned!</p>
                @endif
                <p>Your email is: {{$user->email}}</p>
                <p>Your points are: {{$user->points}}</p>

            </div>
            <div class="col-md-4 text-center">
                @if(count($user->horses)>0)
                    <h3>Horses:</h3>
                    @foreach($user->horses as $horse)
                        <div class="col-md-10">
                            {{$horse->horse_name}}
                        </div>
                        <div class="col-md-2">
                            <form method="POST" action="/horses/{{$horse->id}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                            </form>
                        </div>
                        <br>
                    @endforeach
                @endif
                <hr>

                <h4>Add a new Horse</h4>
                <form method="POST" action="/newhorse">
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
            <div class="col-md-4">
                <h3>The races you've signed up for:</h3>
                <ul>
                    @foreach($events as $event)
                        <li><a href="/calendar/{{$event[0]->id}}">{{$event[0]->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop