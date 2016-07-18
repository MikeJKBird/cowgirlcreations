@extends('layouts.app')


@section('content')

    <div class="jumbotron" style="background-image: url(img/banner01.jpg); background-size: cover;">
        <div class="container">
            <h1>Forms</h1>
            <p>All the stuff you'll need to know</p>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            @foreach($files as $file)
                <tr>
                    <td>
                        <a href="/files/{{$file->path}}" download="{{$file->filename}}">{{$file->filename}}</a>
                    </td>
                    <td>
                        {{$file->description}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
