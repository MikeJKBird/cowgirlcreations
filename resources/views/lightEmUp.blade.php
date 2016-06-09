@extends('layouts.app')


@section('content')

    <div class="container text-center">
        <br>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/rEWDtp_fcF0" frameborder="0" allowfullscreen></iframe>
        <img id="flyer" style="display:none;" onclick="hideFlyer()" src="img/lightemup.jpg">
        <h3 onclick="showFlyer()" id=""more-info>More Info</h3>
        <h3><a href="/forms">Forms</a></h3>
        <h3>Entry Information Coming Soon</h3>


    </div>
@stop

@section('scripts')

<script>
    function showFlyer() {
        document.getElementById("flyer").removeAttribute("style");

        $(document.body).attr("min-height", "700px");

            $( "#more-info" ).slideUp( "slow", function() {
            });
    }

    function hideFlyer() {
        $( "#flyer" ).click(function() {
            $( "#flyer" ).slideUp( "slow", function() {
            });
        });
    }
</script>


@stop