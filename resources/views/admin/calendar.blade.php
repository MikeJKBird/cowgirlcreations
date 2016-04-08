@extends('layouts.admin')


@section('content')
    <div class="container">

        <h1 class="text-center">Events</h1>
        <hr>
        @foreach ($events as $event)
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <a href="calendar/{{$event->id}}">{{ $event->name }}</a> : {{$event->date->toFormattedDateString()}}
                </div>
                <div class="col-md-5">
                    @if($event->uploadedresults)
                         Results uploaded <i class="fa fa-2x fa-check"></i>
                    @endif
                </div>
                <div class="col-md-2">
                    <form method="POST" action="/events/{{$event->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

@stop