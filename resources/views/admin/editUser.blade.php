@extends('layouts.admin')


@section('content')
    <div class="container">

        <h1>{{$user->name}}</h1>

        <form action="/admin/updatemember/{{$user->id}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">

            <label for="points">Current Points: {{$user->points}}</label>
            <input type="text" name="points" value="{{ old('points') }}">

            <input type="submit" value="Update Points">
        </form>
        <h3>Horses</h3>
        @if(count($user->horses) == 0) <h4> No horses listed </h4> @endif
        @foreach($user->horses as $horse)
            <li>{{$horse->name}}</li>
        @endforeach
        {{--<form action="/admin/updatemember/{{$user->id}}" method="POST">--}}
            {{--{{csrf_field()}}--}}
            {{--<input type="hidden" name="_method" value="PATCH">--}}

            {{--<label for="horse">Add a Horse</label>--}}
            {{--<input type="text" name="horse" value="">--}}

            {{--<input type="submit" value="Update Points">--}}
        {{--</form>--}}

    </div>

@stop