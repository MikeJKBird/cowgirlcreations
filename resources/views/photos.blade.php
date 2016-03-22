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
                <img src="/img/{{$photo->name}}" >
            @endforeach

            <a href="img/cowboy_01.jpg" data-lightbox="gallery"><img src="img/cowboy_01.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/horses_01.jpg" data-lightbox="gallery"><img src="img/horses_01.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/horses_02.jpg" data-lightbox="gallery"><img src="img/horses_02.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/cowboy_02.jpg" data-lightbox="gallery"><img src="img/cowboy_02.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/horses_03.jpg" data-lightbox="gallery"><img src="img/horses_03.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/horses_04.jpg" data-lightbox="gallery"><img src="img/horses_04.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/cowboy_03.jpg" data-lightbox="gallery"><img src="img/cowboy_03.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/horses_05.jpg" data-lightbox="gallery"><img src="img/horses_05.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
            <a href="img/horses_06.jpg" data-lightbox="gallery"><img src="img/horses_06.jpg" class="col-xs-12 col-sm-6 col-md-3" /></a>
        </div>
    </div>
@stop