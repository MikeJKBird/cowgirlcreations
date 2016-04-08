@extends('layouts.admin')


@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3>Add Entries for {{$event->name}}</h3>

                <form action="/entries" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <div class="form-group">
                        <label for='name'>Entry Name:</label>
                        <input type="text" name='name' id='name' class='form-control' value='' required>
                    </div>
                    <div class="form-group">
                        <label for='price'>Price:</label>
                        <input type="number" name='price' id='price' class='form-control' value='' required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Entry</button>
                    </div>
                </form>

                <h3>Current Entries</h3>
                <ul class="list-group">
                    @foreach ($entries as $entry)
                        <div class="row">
                            <div class="col-sm-10">
                                <li class="list-group-item">{{ $entry->name }}: ${{ $entry->price }}
                            </div>
                            <div class="col-sm-2">
                                <form method="POST" action="/entry/{{$entry->id}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                </li>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        @if(count($entries) > 0)
            <a href="/admin/calendar">Finished!</a>
        @else
            <p>You must add at least one entry to continue</p>
        @endif
    </div>

@stop