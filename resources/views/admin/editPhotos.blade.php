@extends('layouts.admin')

{{-- ONCE AUTH IS IN PLACE, ADD old('caption')TO VALUE --}}

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
            <h2>Photos</h2>

            <form action="photos" method="POST" class="dropzone" id="addPhotosForm">
                {{csrf_field()}}
            </form>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Current Photos</h3>
            <hr>
            @foreach($photos as $photo)
                <div class="col-md-3">
                    <img src="/img/{{$photo->name}}" class="thumb">
                    <form method="POST" action="/photo/{{$photo->id}}">
                        {{method_field('PATCH')}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for='caption'>Photo caption:</label>
                            <input type="text" name='caption' id='caption' class='form-control thumb' value='' required>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Photo</button>
                        </div>
                    </form>
                </div>

            @endforeach
        </div>





            {{--<h3>Current Sponsors</h3>--}}
            {{--<ul class="list-group">--}}
                {{--@foreach ($sponsors as $sponsor)--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<li class="list-group-item"><a href="http://{{$sponsor->website}}" target="_blank">{{ $sponsor->name }}</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-2">--}}
                            {{--<form method="POST" action="/sponsors/{{$sponsor->id}}">--}}
                                {{--<input type="hidden" name="_method" value="DELETE"><button type="submit" class="btn btn-danger">Delete</button>--}}
                            {{--</form>--}}
                            {{--</li>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        </div>
    </div>
@stop

@section('javascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp, .gif'

        }
    </script>
@stop