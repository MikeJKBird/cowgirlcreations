@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="background-image: url(img/horses_05.jpg); background-size: cover;">
        <div class="container">
            <h1>Cowgirl Creations!</h1>
            <p>Barrel Racing and more!</p>
        </div>
    </div>
    <div class="container">

        <div class="row col-md-3">
            <h3>Our Sponsors</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">First</a></li>
                <li class="list-group-item"><a href="#">Second</a></li>
                <li class="list-group-item"><a href="#">Third</a></li>
                <li class="list-group-item"><a href="#">Fourth</a></li>
            </ul>
        </div>
        <div class="row col-md-5">
            <p class="lead text-center">This is Corgirl Creations. stuff stuff stuff</p>
        </div>
        <div class="row col-md-3  col-md-offset-1">
            <h3 class="">Our Upcoming events</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">First event</a></li>
                <li class="list-group-item"><a href="#">Second event</a></li>
                <li class="list-group-item"><a href="#">Third event</a></li>
                <li class="list-group-item"><a href="#">Fourth event</a></li>
            </ul>
        </div>
    </div>
@endsection
