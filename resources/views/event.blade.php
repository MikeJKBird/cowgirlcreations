@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="text-center">
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $event->name }}</h1>
                <hr>
            </div>
            @if(Auth::check() && $signedup)
            <div class="col-md-6 col-md-offset-3">
                <h3><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Signed up!</h3>
            </div>
            @endif
            @if(Auth::check() && $signedup && $event->deadline > $now)
                <div class="pull-right">
                        <a href="/profile" type="submit" class="btn btn-danger">Drop Race</a>
                </div>
            @endif
        </div>
    </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <table class="table">
                    <tr>
                        <td>
                            Located at:
                        </td>
                        <td>
                            {{$event->location}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Co-sanctioned:
                        </td>
                        <td>
                            {{$cosanction->cosanction_name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Occuring:
                        </td>
                        <td>
                            {{$event->date->toDayDateTimeString()}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pre-Entry Deadline:
                        </td>
                        <td>
                            {{$event->deadline}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Producer:
                        </td>
                        <td>
                            {{$event->producer}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dress Code:
                        </td>
                        <td>
                            {{$event->dresscode}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Option:
                        </td>
                        <td>
                            {{$event->option}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table">
                    <tr>
                        <td>
                            Time Only:
                        </td>
                        <td>
                            ${{$event->timeonly}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Late Fee:
                        </td>
                        <td>
                            ${{$event->latefee}}
                        </td>
                    </tr>
                    <tr>
                        <td id="arenafee" data-arena-fee="{{$event->arenafee}}">
                            Arena Fee:
                        </td>
                        <td>
                            ${{$event->arenafee}}
                        </td>
                    </tr>
                    @if( $event->campingfee != null)
                        <tr>
                            <td>
                                Camping Fee:
                            </td>
                            <td>
                                ${{$event->campingfee}}
                            </td>
                        </tr>
                    @endif
                    @if( $event->stallfee != null)
                        <tr>
                            <td>
                                Stall Fee:
                            </td>
                            <td>
                                ${{$event->stallfee}}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td>
                            BBQ:
                        </td>
                        <td>
                            ${{$event->bbq}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <p>Notes: {{$event->notes}}</p>
            </div>
        </div>
        <div class="text-center">
            @if($event->deadline > $now)
                <hr>
                @if(Auth::check())
                    @if( count($user->horses) != 0)
                        <div class="row">
                            <div class="col-md-5 text-left">
                                <form action="/eventsignup" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="userID" value="{{$user->id}}">
                                    <input type="hidden" name="eventID" value="{{$event->id}}">
                                    <input type="hidden" name="usercost" value="">


                                    <select name="horse">
                                        @foreach($user->horses as $horse)
                                            <option value="{{$horse->id}}">{{$horse->horse_name}}</option>
                                        @endforeach
                                    </select>
                                    <br />
                                    <table class='table'>
                                    @foreach($entries as $entry)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="entry[]" class="entries" data-price={{$entry->price}} value="{{$entry->entry_name}}"> {{$entry->entry_name}} : ${{$entry->price}}
                                            </td>
                                            <td>
                                                @if($entry->entry_name != "Open" || $entry->entry_name != "Open1")
                                                    <input type="checkbox" name="carryover[]" value="{{$entry->entry_name}}">Carryover
                                                @endif
                                            </td>
                                            <td>
                                                @if($cosanction->cosanction_price>0)
                                                    <input type="checkbox" name="cosanction[]" data-price={{$cosanction->cosanction_price}} value="{{$entry->entry_name}}">{{$cosanction->cosanction_name}} : ${{$cosanction->cosanction_price}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </table>
                                    <label for="timeonlys">Time Only Runs</label>
                                    <input type="number" name="timeonlys" id="timeonlys" data-timeonlys-price={{$event->timeonly}} value="" min="0">

                            </div>
                            <div class="col-md-3 text-left">
                                <br />
                                @if( $event->campingfee != null)
                                    <label for="camping">Add Camping</label>
                                    <input type="checkbox" name="camping" id="camping" data-camping-price="{{$event->campingfee}}" value=1>
                                    <br />
                                @endif
                                @if( $event->stallfee != null)
                                    <label for="stall">Add Stall</label>
                                    <input type="checkbox" name="stall" id="stall" data-stall-price="{{$event->stallfee}}" value=1>
                                    <br />
                                @endif
                                @if( $event->bbq != null)
                                    <label for="bbqtickets">BBQ Tickets</label>
                                    <input type="number" name="bbqtickets" id="bbqtickets" data-bbq-price={{$event->bbq}} value="" min="0">
                                @endif


                            </div>
                            <div class="col-md-4">
                                    <p id="currentprice">Current Total: $<span id="totalprice" class="odometer"></span></p>
                                    <input type="submit" class="btn btn-success" value="Sign Up For Race" id="signup">
                                </form>
                            </div>

                        </div>



                    @else
                        <p>
                            <a href="/profile">Please add a horse to your profile to sign up</a>
                        </p>

                    @endif
                @endif

                @if(!Auth::check())
                    <h4><a href="/login">Log in</a> or <a href="/register">register</a> to sign up for the race</h4>
                @endif
            @endif
            @if($event->uploadedresults)
                <a href="/results/{{$event->id}}"><h3>View Results!</h3></a>
                <br />
            @endif
        </div>

    </div>

@stop

@section('scripts')
    <script src="/js/odometer.min.js"></script>
    <script src="/js/eventpage.js"></script>
@stop
