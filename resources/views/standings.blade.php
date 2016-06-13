@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/standings_banner.jpeg); background-size: cover;">
        <div class="container">
            <h1>Standings!</h1>
        </div>
    </div>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <p>{!! nl2br(e($text->standings)) !!}</p>
        </div>
    </div>
@stop