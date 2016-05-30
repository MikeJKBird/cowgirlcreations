@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>This is your admin section!</h2>


        <form method="POST" action="/admin/updateHomepageText">
            {{csrf_field()}}
            {{method_field('PATCH')}}



            <div class="form-group">
                <label for='homepage'>Homepage Text</label>
                <textarea name='homepage' id='homepage' class='form-control' value=''>{{$text->homepage}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Text</button>
            </div>

        </form>



    </div>
@stop