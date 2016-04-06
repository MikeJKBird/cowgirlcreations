@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1>{{$event->name}}</h1>

        <iframe src="/results/{{$event->resultspath}}.html"></iframe>
        <a href="/admin/calendar/{{$event->id}}">Back to event details</a>
    </div>
@stop