@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/horses_02.jpg); background-size: cover;">
        <div class="container">
            <h1>Photo Gallery!</h1>
            <p>Look at this stuff!</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($photos as $photo)
                <a href="/img/{{$photo->name}}" data-lightbox="gallery" data-title="{{$photo->caption}}"><img src="/img/{{$photo->name}}" class="col-xs-6 col-sm-4 col-md-3" /></a>
            @endforeach
        </div>
    </div>
@stop