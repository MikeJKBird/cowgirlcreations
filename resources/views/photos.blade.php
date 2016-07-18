@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/banner03.jpg); background-size: cover;">
        <div class="container">
            <h1>Photo Gallery</h1>
            <p>Look at this stuff!</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($photos as $photo)
                <a href="/img/{{$photo->name}}" data-lightbox="gallery" data-title="{{$photo->caption}}" class="col-xs-6 col-sm-4 col-md-3"><img src="/img/{{$photo->name}}" class="photo-gallery-item" /></a>
            @endforeach
        </div>
    </div>
@stop
