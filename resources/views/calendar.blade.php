@extends('layouts.app')


@section('content')
    <div class="jumbotron" style="background-image: url(img/horses_06.jpg); background-size: cover;">
        <div class="container">
            <h1>Calendar!</h1>
            <p>Sign up now!</p>
        </div>
    </div>

    <div id='calendar'></div>

    <div class="container">


        <h3>Events</h3>
        @foreach ($events as $event)
            <a href="calendar/{{$event->id}}">{{ $event->name }}</a>: {{$event->date->toFormattedDateString()}}
            <hr>
        @endforeach
    </div>



@stop

@section('scripts')
<script src='/fullcalendar/fullcalendar.js'></script>
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'today prev,next',
                right: ''
            },
            contentHeight: 600,
            fixedWeekCount: false
        });
    });
</script>
@stop
