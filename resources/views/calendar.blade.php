@extends('layouts.app')


@section('content')
    <div class="jumbotron" style="background-image: url(img/banner02.jpg); background-size: cover;">
        <div class="container">
            <h1>Calendar!</h1>
            <p>Sign up now!</p>
        </div>
    </div>



    <div class="container">
        <div id='calendar'></div>

    </div>


@stop

@section('scripts')
<script src='/fullcalendar/fullcalendar.js'></script>

<script>


    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            contentHeight: 500,
            fixedWeekCount: false,
            eventColor: '#f1b83a',
            eventTextColor: 'black',
            {!!$eventData!!}
        });
    });
</script>
@stop
