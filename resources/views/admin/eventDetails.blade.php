@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1>{{$event->name}}</h1>
        @if(!$event->uploadedresults)
            <a href="/admin/editevent/{{$event->id}}"><h4>Edit Event</h4></a>
            <h3>People who have signed up!</h3>

            <table class="table table-striped">
                <tr>
                    <th>Racer</th>
                    <th>Member Number</th>
                    <th>Horse</th>
                    <th>Race</th>
                    @if( $event->campingfee != null)
                        <th>Camping</th>
                    @endif
                    @if( $event->stallfee != null)
                        <th>Stall</th>
                    @endif
                    @if( $event->bbq != null)
                        <th>BBQ Tickets</th>
                    @endif
                    <th>Total</th>
                </tr>

                @foreach($tables as $table)
                    <tr>

                        <td><a href="/admin/editmember/{{$table->user_id}}">{{$table->name}}</a></td>
                        <td>{{$table->memberNumber}}</td>
                        <td>{{$table->horse_name}}</td>
                        <td>{{$table->entry_name}}</td>
                        @if( $event->campingfee != null)
                            @if($table->camping)
                                <td>Yes</td>
                            @else
                                <td>No</td>
                            @endif
                        @endif
                        @if( $event->stallfee != null)
                            @if($table->stall)
                                <td>Yes</td>
                            @else
                                <td>No</td>
                            @endif
                        @endif
                        @if( $event->bbq != null)
                            <td>{{$table->bbqtickets}}</td>
                        @endif
                        <td>${{$table->totalprice}}</td>
                    </tr>
                @endforeach
            </table>
            <hr>

            <a href="/admin/addresults/{{$event->id}}"><h3>Add Results</h3></a>
        @else
            <h3>Enter Points</h3>
            <h5>Points Multiplier: {{$event->multiplier}}</h5>

            <form action="" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="multiplier" value="{{$event->multiplier}}">

                @foreach($tables as $table)
                    <label for="{{$table->user_id}}-{{$table->entry_id}}-{{$table->horse_id}}">{{$table->name}} in {{$table->entry_name}} on {{$table->horse_name}}- Points:</label>
                    <input type="text" name="{{$table->user_id}}-{{$table->entry_id}}-{{$table->horse_id}}" value="">

                    <label for="{{$table->user_id}}-{{$table->entry_id}}-{{$table->horse_id}}participate">Participate?</label>
                    <input type="checkbox" name="{{$table->user_id}}-{{$table->entry_id}}-{{$table->horse_id}}participate" checked="checked">
                    <hr>
                @endforeach

                <input type="submit" value="Add Points">
            </form>


            <a href="/admin/showresults/{{$event->id}}"><h3>View Results</h3></a>
            <a href="/admin/addresults/{{$event->id}}"><h3>Change Results</h3></a>
        @endif
    </div>
@stop