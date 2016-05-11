@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="background-image: url(img/banner01.jpg); background-size: cover;">
        <div class="container">
            <h1>Cowgirl Creations!</h1>
            <p>Barrel Racing and more!</p>
        </div>
    </div>
    <div class="container">

        <div class="row col-md-6 col-md-push-3 col-xs-12 text-center">
            <p class="lead">This is Cowgirl Creations. stuff stuff stuff</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu pulvinar orci. Pellentesque sed ligula gravida, auctor nulla in, elementum ex. Vivamus ornare enim vitae porta dignissim. Aenean et dolor turpis. Fusce gravida quis neque quis pretium. Quisque tempus, magna vel eleifend commodo, massa arcu elementum tortor, rhoncus dictum metus purus ac dui. Praesent laoreet sed ex ac tristique. Integer facilisis, orci ut viverra tincidunt, massa mauris vestibulum ex, sit amet mollis ex massa sit amet ex. Cras augue augue, vestibulum quis diam eget, hendrerit congue orci. Aliquam consectetur sit amet turpis at luctus. </p>
            <p>Sed ut ipsum gravida, volutpat mi at, eleifend lacus. Proin quis tellus non urna malesuada consequat. Ut faucibus metus id facilisis fermentum. Vivamus felis mi, scelerisque a lacus sit amet, convallis viverra purus. Maecenas non pretium lacus. Nunc aliquam nibh erat. Mauris laoreet ante ac eros lacinia, vel varius eros tincidunt. Duis nec convallis augue, id volutpat mi. Cras sollicitudin, velit at pellentesque imperdiet, lorem mauris bibendum purus, vulputate ultricies dolor leo eu tellus. Aliquam nisi justo, ultrices ac neque eu, rutrum finibus arcu. Sed bibendum est id rutrum elementum. In consectetur odio a nibh sodales luctus. Nunc ultricies dolor sit amet elit ultrices, et faucibus mauris pretium. Maecenas a molestie sapien. Mauris pharetra eget lacus id sollicitudin. Ut eleifend metus id risus commodo tristique. </p>
            <p>Vivamus in urna quis nunc egestas dictum. Nam porta elit eget augue suscipit, cursus sodales neque molestie. Nullam et accumsan nisl. Mauris suscipit arcu ornare quam cursus, facilisis porta mi placerat. Pellentesque in sapien vel dui dapibus volutpat ac nec tortor. Nulla facilisi. Praesent eget tristique metus. </p>
            <h3>Email: 123@fake.com</h3>
            <h3><a href="https://www.facebook.com/groups/cowgirlcreations/" target="_blank">Facebook</a></h3>
        </div>

        <div class="row col-md-3 col-md-pull-6 col-xs-12">
            <h3>Our Sponsors</h3>
            <ul class="list-group">
                @foreach ($sponsors as $sponsor)
                    <li class="list-group-item"><a href="http://{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="row col-md-3 col-xs-12 pull-right-md">
            <h3>Our Upcoming events</h3>
            <ul class="list-group">
                @foreach ($events as $event)
                    <li class="list-group-item"><a href="calendar/{{$event->id}}">{{$event->date->toFormattedDateString()}} - {{ $event->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
