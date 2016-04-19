@extends('layouts.admin')


@section('content')
    <div class="container">

        <h1>{{$user->name}}</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Current Points: {{$user->points}}</h3>
                <h3>Member Number: {{$user->memberNumber}}</h3>

                <form action="/admin/updatemember/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">

                    <label for="points">Current Points:</label>
                    <input type="text" name="points" value="{{ old('points') }}">
                    <br>

                    <label for="memberNumber">Member Number:</label>
                    <input type="text" name="memberNumber" value="{{ old('memberNumber') }}">
                    <br>

                    <input type="submit" value="Update Information">
                </form>
            </div>
            <div class="col-md-3">
                <h3>Horses</h3>
                @if(count($user->horses) == 0) <h4> No horses listed </h4> @endif
                @foreach($user->horses as $horse)
                    <li>{{$horse->horse_name}}</li>
                @endforeach
            </div>
            <div class="col-md-3">
                <h3>Birthday</h3>
                <p>
                    {{$user->name}}'s birthday is {{$user->birthday}}
                </p>
            </div>
        </div>



    </div>

@stop
