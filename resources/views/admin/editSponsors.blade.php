@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row col-sm-6 col-sm-offset-3">
            <h2>Sponsors</h2>
            <h3>New Sponsor</h3>
            <form method="POST" action="/sponsors">
                <div class="form-group">
                    <label for='name'>Sponsor Name:</label>
                    <input type="text" name='name' id='name' class='form-control' value='' required>
                </div>
                <div class="form-group">
                    <label for='website'>Website:</label>
                    <input type="text" name='website' id='website' class='form-control' value='' required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Sponsor</button>
                </div>
            </form>

            <h3>Current Sponsors</h3>
            <ul class="list-group">
                @foreach ($sponsors as $sponsor)
                    <li class="list-group-item"><a href="http://{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop