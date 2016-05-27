@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row col-sm-6 col-sm-offset-3">
            <h2>Sponsors</h2>
            <h3>New Sponsor</h3>
            <form method="POST" action="/sponsors">
                {{csrf_field()}}
                <div class="form-group">
                    <label for='name'>Sponsor Name:</label>
                    <input type="text" name='name' id='name' class='form-control' value='' required>
                </div>
                <div class="form-group">
                    <label for='website'>Website:</label>
                    <input type="text" name='website' id='website' class='form-control' value='' required>
                </div>
                <div class="form-group">
                    <label for='value'>Value</label>
                    <input type="number" name='value' id='value' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Sponsor</button>
                </div>
            </form>

            <h3>Current Sponsors</h3>
            <ul class="list-group">
                @foreach ($sponsors as $sponsor)
                    <div class="row">
                        <div class="col-sm-10">
                            <li class="list-group-item"><a href="{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}: {{$sponsor->value}}</a>
                        </div>
                        <div class="col-sm-2">
                            <form method="POST" action="/sponsors/{{$sponsor->id}}">
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
@stop