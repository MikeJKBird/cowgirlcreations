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
                    @if($table->bbq > 0)
                        <td>{{$table->bbq}}</td>
                    @else
                        <td>No</td>
                    @endif
                </tr>
            @endforeach
            {{--@foreach($users as $user)--}}
                {{--<tr>--}}
                    {{--<td>{{$user->name}} </td>--}}
                    {{--<td>{{$user->memberNumber}}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        </table>
    </div>
@stop