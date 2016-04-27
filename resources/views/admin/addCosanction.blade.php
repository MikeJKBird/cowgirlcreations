@extends('layouts.admin')


@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3>Add Co-Sanctions</h3>

                <form action="/cosanctions" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for='cosanction_name'>Co-Sanction Name:</label>
                        <input type="text" name='cosanction_name' id='cosanction_name' class='form-control' value='' required>
                    </div>
                    <div class="form-group">
                        <label for='cosanction_price'>Price ($):</label>
                        <input type="number" name='cosanction_price' id='cosanction_price' class='form-control' value='' min="0" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Co-Sanction</button>
                    </div>
                </form>

                <h3>Current Co-Sanctions</h3>
                <ul class="list-group">
                    @foreach ($cosanctions as $cosanction)
                        <div class="row">
                            <div class="col-sm-10">
                                <li class="list-group-item">{{ $cosanction->cosanction_name }}: ${{ $cosanction->cosanction_price }}
                            </div>
                            <div class="col-sm-2">
                                <form method="POST" action="/cosanctions/{{$cosanction->id}}">
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
    </div>

@stop
