@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1>{{$event->name}}</h1>


                <form method="POST" action="/admin/updateevent/{{$event->id}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row col-sm-4 col-sm-offset-1">
                        <div class="form-group">
                            <label for='name'>Event Name:</label>
                            <input type="text" name='name' id='name' class='form-control' value='{{$event->name}}' required>
                        </div>
                        <div class="form-group">
                            <label for='location'>Location</label>
                            <input type="text" name='location' id='location' class='form-control' value='{{$event->location}}' required>
                        </div>
                        <div class="form-group">
                            <label for='cosanction'>Co-sanction</label>
                            <select multiple name='cosanction' id='cosanction' class='form-control' value='' required>
                                @foreach($cosanctions as $cosanction)
                                    <option value="{{$cosanction->id}}">{{$cosanction->cosanction_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for='deadline'>Deadline</label>
                            <input type="text" name='deadline' id='deadline' class='form-control' value='{{$event->deadline}}'>
                        </div>
                        <div class="form-group">
                            <label for='producer'>Producer</label>
                            <input type="text" name='producer' id='producer' class='form-control' value='{{$event->producer}}'>
                        </div>

                        <div class="form-group">
                            <label for='dresscode'>Dress Code</label>
                            <input type="text" name='dresscode' id='dresscode' class='form-control' value='{{$event->dresscode}}'>
                        </div>
                        <div class="form-group">
                            <label for='option'>Option</label>
                            <input type="text" name='option' id='option' class='form-control' value='{{$event->option}}'>
                        </div>
                        <div class="form-group">
                            <label for='timeonly'>Time Only ($)</label>
                            <input type="text" name='timeonly' id='timeonly' class='form-control' value='{{$event->timeonly}}'>
                        </div>
                    </div>
                    <div class="row col-sm-4 col-sm-offset-1">

                        <div class="form-group">
                            <label for='latefee'>Late Fee ($)</label>
                            <input type="text" name='latefee' id='latefee' class='form-control' value='{{$event->latefee}}'>
                        </div>
                        <div class="form-group">
                            <label for='arenafee'>Arena Fee ($)</label>
                            <input type="text" name='arenafee' id='arenafee' class='form-control' value='{{$event->arenafee}}'>
                        </div>
                        <div class="form-group">
                            <label for='campingfee'>Camping Fee ($)</label>
                            <input type="text" name='campingfee' id='campingfee' class='form-control' value='{{$event->campingfee}}'>
                        </div>
                        <div class="form-group">
                            <label for='stallfee'>Stall Fee ($)</label>
                            <input type="text" name='stallfee' id='stallfee' class='form-control' value='{{$event->stallfee}}'>
                        </div>
                        <div class="form-group">
                            <label for='bbq'>BBQ ($)</label>
                            <input type="text" name='bbq' id='bbq' class='form-control' value='{{$event->bbq}}'>
                        </div>
                        <div class="form-group">
                            <label for='notes'>Notes</label>
                            <textarea name='notes' id='notes' class='form-control' value=''>{{$event->notes}}</textarea>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for='date'>Date</label>--}}
                            {{--<div class='input-group date' id='datetimepicker1'>--}}
                                {{--<input type="text" name='date' id='date' class='form-control' value='' required>--}}
                                {{--<span class="input-group-addon">--}}
                                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                {{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for='multiplier'>Points Multiplier</label>
                            <input type="number" name='multiplier' id='multiplier' class='form-control' value='{{$event->multiplier}}'>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Event</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({

            });
        });
    </script>
@stop