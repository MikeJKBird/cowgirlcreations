@extends('layouts.app')


@section('content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <div class="jumbotron" style="background-image: url(img/news_banner.jpeg); background-size: cover;">
        <div class="container">
            <h1>News!</h1>
            <p>Keep up to date</p>
        </div>
    </div>
    <div class="container text-center">


        <div class="fb-page" data-href="https://www.facebook.com/Cowgirlcreations" data-tabs="timeline" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Cowgirlcreations"><a href="https://www.facebook.com/Cowgirlcreations">Cowgirl Creations</a></blockquote></div></div>
        <br>
    </div>
@stop
