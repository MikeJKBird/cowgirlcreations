@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1>{{$event->name}}</h1>
        <h3>People who have signed up!</h3>
        <table class="table table-striped">
            <tr>
                <th>Racer</th>
                <th>Horse</th>
                @if( $event->campingfee != null)
                    <th>Camping</th>
                @endif
                @if( $event->stallfee != null)
                    <th>Stall</th>
                @endif
                <th>Total</th>
            </tr>
            @foreach($event->users as $user)
                <tr>
                    <td>{{$user->name}} </td>
                    <td>{{$user->horses}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@stop