@extends('layouts.app')


@section('content')

    <div class="container">
        <br>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VQ4xS71mRyE" frameborder="0" allowfullscreen class="text-center"></iframe>
        <img id="flyer" style="display:none;" onclick="hideFlyer()" src="img/lightemup.jpg">
        {{--<h3 onclick="showFlyer()" id=""more-info>More Info</h3>--}}
        <h3 class="text-center">THE GLOW SLOT AND 4D BARREL RACES</h3>
        <h4>Saturday, September 9 4D Races</h4>
        <p>
            Office Opens at 7am<br />
            Time Only at 7 am $5 for one time around pattern<br />
            Open 4D START TIME 9am<br />
            Youth 4D 15 years of age Entry Fee $25 Can carry time over from Open<br />
            Senior 4D 50 years of age and older Entry Fee $25 Can carry time over from Open<br />
            Novice 4D Horse or Rider not have won $500 LTE Barrel racing as of entry date Entry Fee $25<br />
            Pole Bending 4D (With 1 second splits) Entry Fee $25 No time for knocked poles<br />
            Pee Wee Race Start EF $10 Must wear Helmet (4D with 2 second split) Must pre enter<br />
            Saturday evening Glow in the Dark Charity Barrel Race for Cystic Fibrosis<br />
            STALLS Stalls are only available on Friday and Saturday nights. MUST be cleaned to the mat. MUST provide a separate $50 clean up deposit.<br />
            CAMPING Dry Camping with free self penning and Electric Camping NO self penning at hook ups.<br />
            Co-sanctioned BRN4D Members may pay $3 per run, per horse, for points.<br />
            Co-Sanctioned Barrels Out West (BOW), Cascade West Productions (CWP)<br />
            All pre entries are responsible for entry fees. Refund will only be issued with a vet out by a licenced Veterinarian or a medical note from a licenced Physician prior to race or visible agreed upon by Producers at the race minus $25.<br />
            ALL FEES IN CANADIAN FUNDS :) CASH ONLY for Entries Cash Payout

        </p>
        <h4>SUNDAY, SEPTEMBER 10 THE GLOW SLOT RACE</h4>
        <p>
            BC's Second Annual First Big Money Slot Race!  <br />                                                                              It’s Like No Other with 100% Pay Out - No Hold Back!!
            THE GLOW Entry Fee $250 Only 250 Slots Available<br />
            Slot Race Format is 4D with Equal Pay out in Each D<br />
            250 Entries = $62,500 Pay Out<br />
            Office Opens at 7 am<br />
            Time Only at 7 am Only 40 Time onlies sold for Sunday $5 for one time around the pattern<br />
            THE GLOW Slot Race 9 am<br />
            Awards and Payout directly following race<br />
            Option 1 Knocked Barrel = No Time<br />
            Prime Cowgirl Creations<br />
            Arena Fee $25 per Slot<br />
            There are no vet outs or medical outs for slot race. You may have anyone you wish race in your slot.<br />
            All Fees in CANADIAN Funds. Cash Only.<br />


        </p>
        <h3><a href="/forms">Forms</a></h3>


    </div>
@stop

@section('scripts')

<script>
    function showFlyer() {
        document.getElementById("flyer").removeAttribute("style");

        $(document.body).attr("min-height", "700px");

            $( "#more-info" ).slideUp( "slow", function() {
            });
    }

    function hideFlyer() {
        $( "#flyer" ).click(function() {
            $( "#flyer" ).slideUp( "slow", function() {
            });
        });
    }
</script>


@stop