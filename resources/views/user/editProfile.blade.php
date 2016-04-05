@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Edit Profile</h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <hr>
                <form action="/profile/{{$user->id}}" method="POST">
                    {{method_field('PATCH')}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for='name'>Name</label>
                        <input type="text" name='name' id='name' class='form-control' value='{{$user->name}}'>
                    </div>
                    <div class="form-group">
                        <label for='email'>Email Address</label>
                        <input type="text" name='email' id='email' class='form-control' value='{{$user->email}}'>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop