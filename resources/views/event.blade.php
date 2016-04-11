@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ $event->name }}</h1>
            <hr>
            @if(Auth::check() && $signedup)
                <h3>Signed up!</h3>
                <hr>
            @endif

        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <p>Located at: {{$event->location}}</p>
                <p>Co-sanctioned: {{$event->cosanction}}</p>
                <p>Occuring: {{$event->date->toDayDateTimeString()}}</p>
                <p>Pre-Entry Deadline: {{$event->deadline}} </p>
                <p>Producer: {{$event->producer}}</p>
                <p>Dress Code: {{$event->dresscode}}</p>
                <p>Option: {{$event->option}}</p>
                <p>Time Only: ${{$event->timeonly}}</p>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <p>Late Fee: ${{$event->latefee}}</p>
                <p id="arenafee" data-arena-fee="{{$event->arenafee}}">Arena Fee: ${{$event->arenafee}}</p>
                @if( $event->campingfee != null)
                <p>Camping Fee: ${{$event->campingfee}}</p>
                @endif
                @if( $event->stallfee != null)
                <p>Stall Fee: ${{$event->stallfee}}</p>
                @endif
                <p>BBQ: ${{$event->bbq}}</p>
                <p>Notes: {{$event->notes}}</p>

            </div>
        </div>
        <div class="text-center">
            <hr>
            @if(!$event->uploadedresults)
                @if(Auth::check())
                    @if( count($user->horses) != 0)

                        <div>
                            <p id="price">$<span id="totalprice" class="odometer"></span></p>
                        </div>

                <form action="/eventsignup" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="userID" value="{{$user->id}}">
                    <input type="hidden" name="eventID" value="{{$event->id}}">


                    <select name="horse">
                        @foreach($user->horses as $horse)
                            <option value="{{$horse->id}}">{{$horse->horse_name}}</option>
                        @endforeach
                    </select>


                    @if( $event->campingfee != null)
                        <label for="camping">Add Camping</label>
                        <input type="checkbox" name="camping" id="camping" data-camping-price="{{$event->campingfee}}" value=1>
                    @endif
                    @if( $event->stallfee != null)
                        <label for="stall">Add Stall</label>
                        <input type="checkbox" name="stall" id="stall" data-stall-price="{{$event->stallfee}}" value=1>
                    @endif
                    @if( $event->bbq != null)
                        <label for="bbqtickets">BBQ Tickets</label>
                        <input type="number" name="bbqtickets" id="bbqtickets" data-bbq-price={{$event->bbq}} value="" min="0">
                    @endif
                    <br>
                    @foreach($entries as $entry)
                        <input type="checkbox" name="entry[]" class="entries" data-price={{$entry->price}} value="{{$entry->id}}"> {{$entry->entry_name}} : ${{$entry->price}}
                    @endforeach
                    <br>
                    <input type="submit" class="btn btn-success" value="Sign Up For Race" id="signup">
                </form>
                    @else
                        <a href="/profile">Please add a horse to your profile to sign up</a>
                    @endif
                @endif
                @if(Auth::check() && $signedup)
                    <div class="pull-right">

                            <a href="/profile" type="submit" class="btn btn-danger">Drop Race</a>

                    </div>

                @endif
                @if(!Auth::check())
                    <h4><a href="/login">Log in</a> or <a href="/register">register</a> to sign up for the race</h4>
                @endif
            @else
                <a href="/results/{{$event->id}}"><h3>View Results!</h3></a>
            @endif
        </div>

    </div>

@stop

@section('scripts')
    <script src="/js/odometer.min.js"></script>
    {{-- Resets all add-on values --}}
    {{-- UI for showing/hiding sign up button --}}
    <script>
        var $total = $('#arenafee').data('arena-fee');
        var $bbqcost = 0;
        var $entrytotal = 0;
        var $camping = $('#camping').data('camping-price');
        var $stall = $('#stall').data('stall-price');
        var $bbq = $('#bbqtickets').data('bbq-price');
        var $cbs = $('input[name="entry\[\]"]');

        $(document).ready(function() {
            $(':checkbox:checked').prop('checked',false);
            $('#bbqtickets').val(0);
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });

            var $submit = $("#signup").hide(),
                $checkbox = $('input[name="entry\[\]"]').click(function() {
                    $submit.toggle( $checkbox.is(":checked") );
                });
        });


            var calculateCamping = function() {
                if($('#camping').is(':checked')) {
                    $total += $camping;
                    $('#totalprice').text($total + $bbqcost + $entrytotal);
                }
                else if($('#camping').not(':checked')) {
                    $total -= $camping;
                    $('#totalprice').text($total + $bbqcost + $entrytotal);
                }
            }

            var calculateStall = function() {
                if($('#stall').is(':checked')) {
                    $total += $stall;
                    $('#totalprice').text($total + $bbqcost + $entrytotal);
                }
                else if($('#stall').not(':checked')) {
                    $total -= $stall;
                    $('#totalprice').text($total + $bbqcost + $entrytotal);
                }
            }

            var calculateBbq = function() {
                $qty = $('#bbqtickets').val();
                $bbqcost = $qty * $bbq;
                $('#totalprice').text($total + $bbqcost + $entrytotal);
            }

            function displayVals() {
                calcUsage();
            }

            function calcUsage() {
                $entrytotal = 0;
                $cbs.each(function() {
                    if (this.checked)
                        $entrytotal = parseInt($entrytotal) + parseInt($(this).attr('data-price'));
                });
                $("#totalprice").text($total + $bbqcost + $entrytotal);
            }
            $("#totalprice").text($total + $bbqcost + $entrytotal);
            $cbs.click(calcUsage);
            $( "#camping" ).on( "click", calculateCamping );
            $("#stall").on( "click", calculateStall);
            $("#bbqtickets").on("change", calculateBbq);
    </script>
@stop
