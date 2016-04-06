@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1>{{$event->name}}</h1>
        <h3>People who have signed up!</h3>

        <table class="table table-striped">
            <tr>
                <th>Racer</th>
                <th>Member Number</th>
                <th>Horse</th>
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

                    <td>{{$table->name}}</td>
                    <td>Member number</td>
                    <td>{{$table->horse_name}}</td>
                    @if($table->camping)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    @if($table->stall)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    @if($table->bbqtickets > 0)
                        <td>{{$table->bbqtickets}}</td>
                    @else
                        <td>No</td>
                    @endif
                </tr>
            @endforeach
        </table>
        <hr>
        @if(!$event->uploadedresults)
        <a href="/admin/addresults/{{$event->id}}"><h3>Add Results</h3></a>
        @else
        <a href="/admin/addresults/{{$event->id}}"><h3>Change Results</h3></a>
        <a href="/admin/showresults/{{$event->id}}"><h3>View Results</h3></a>
        @endif
    </div>
@stop