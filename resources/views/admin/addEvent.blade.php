@extends('layouts.admin')


@section('content')

    <div class="container">
        <div class="row col-sm-6 col-sm-offset-3">
            <h2>Add an event</h2>

            <form method="POST" action="/events">
                <div class="form-group">
                    <label for='name'>Event Name:</label>
                    <input type="text" name='name' id='name' class='form-control' value='' required>
                </div>
                <div class="form-group">
                    <label for='location'>Location</label>
                    <input type="text" name='location' id='location' class='form-control' value='' required>
                </div>
                <div class="form-group">
                    <label for='cosanction'>Co-Sanctioned</label>
                    <input type="text" name='cosanction' id='cosanction' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='deadline'>Deadline</label>
                    <input type="text" name='deadline' id='deadline' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='producer'>Producer</label>
                    <input type="text" name='producer' id='producer' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='notes'>Notes</label>
                    <textarea name='notes' id='notes' class='form-control' value=''></textarea>
                </div>
                <div class="form-group">
                    <label for='dresscode'>Dress Code</label>
                    <input type="text" name='dresscode' id='dresscode' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='option'>Option</label>
                    <input type="text" name='option' id='option' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='timeonly'>Time Only</label>
                    <input type="text" name='timeonly' id='timeonly' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='latefee'>Late Fee</label>
                    <input type="text" name='latefee' id='latefee' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='arenafee'>Arena Fee</label>
                    <input type="text" name='arenafee' id='arenafee' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='campingfee'>Camping Fee</label>
                    <input type="text" name='campingfee' id='campingfee' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='stallfee'>Stall Fee</label>
                    <input type="text" name='stallfee' id='stallfee' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='divisions'>Divisions</label>
                    <input type="text" name='divisions' id='divisions' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='bbq'>BBQ</label>
                    <input type="text" name='bbq' id='bbq' class='form-control' value=''>
                </div>
                <div class="form-group">
                    <label for='date'>Date</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="text" name='date' id='date' class='form-control' value='' required>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Event</button>
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