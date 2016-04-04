@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1>{{$event->name}}</h1>
        <h3>People who have signed up!</h3>
        @foreach($tables as $table)
            {{--<h6>User: {{$enrollment->users->name}}</h6>--}}
            <h6>Horse: {{$table->horse_id}}</h6>
            <h6>Event: {{$table->event_id}}</h6>
            <h6>User: {{$table->name}}</h6>
        @endforeach
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
                <th>Total</th>
            </tr>


            {{--@foreach($users as $user)--}}
                {{--<tr>--}}
                    {{--<td>{{$user->name}} </td>--}}
                    {{--<td>{{$user->memberNumber}}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        </table>
    </div>
@stop