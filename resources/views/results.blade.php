@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ $event->name }}</h1>
        </div>
        <iframe src="/results/{{$event->resultspath}}.html"></iframe>
    </div>

@stop