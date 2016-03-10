@extends('layouts.admin')


@section('content')
    <div class="container">
        <h2>Add an event</h2>

        <form method="POST" action="/events">
            <div class="form-group">
                <label for='name'>Event Name:</label>
                <input type="text" name='name' id='name' class='form-control' value=''>
            </div>
            <div class="form-group">
                <label for='maxNumberParticipants'>Maximum number of participants:</label>
                <input type="number" name='maxNumberParticipants' id='maxNumberParticipants' class='form-control' value=''>
            </div>
            <div class="form-group">
                <label for='location'>Location</label>
                <input type="text" name='location' id='location' class='form-control' value=''>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Event</button>
            </div>
        </form>
    </div>

@stop