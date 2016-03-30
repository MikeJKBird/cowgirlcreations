@extends('layouts.admin')


@section('content')
    <div class="container">

        <h3>Members</h3>
        <h4>There are a total of {{count($users)}} people signed up</h4>

        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Points</th>
            </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->points }}</td>
            </tr>
        @endforeach
        </table>
    </div>

@stop