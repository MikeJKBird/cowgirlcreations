@extends('layouts.app')


@section('content')

    <div class="container">
        <br>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/rEWDtp_fcF0" frameborder="0" allowfullscreen class="text-center"></iframe>
        <img id="flyer" style="display:none;" onclick="hideFlyer()" src="img/lightemup.jpg">
        {{--<h3 onclick="showFlyer()" id=""more-info>More Info</h3>--}}
        <h3 class="text-center">LIGHT EM UP SLOT & 4D RACES</h3>
        <h4>Saturday, September 10 4D Races</h4>
        <p>
            Office Opens at 7am<br />
            Time Only at 7 am $5 for one time around pattern<br />
            Pee Wee Race Start at 12 noon EF $10 Must wear Helmet (4D with 2 second split)<br />
            Open 4D Entry Fee $50 with $1000 Added START TIME 9am<br />
            Youth 4D 15 years of age Entry Fee $25 Can carry time over from Open<br />
            Senior 4D 50 years of age and older Entry Fee $25 Can carry time over from Open<br />
            Novice 4D Horse or Rider not have won $500 LTE Barrel racing as of entry date Entry Fee $25<br />
            Pole Bending 4D (With 1 second splits) Entry Fee $25 No time for knocked poles<br />
            Pee Wee Race Start EF $10 Must wear Helmet (4D with 2 second split) Must pre enter<br />
            Saturday evening Glow in the Dark Race Entry Fee $20 Proceeds to charity<br />
            Sponsor Social to follow<br />
            Arena Fee $15 per Rider per Day Late Fee $20 per Rider per day<br />
            Pre entry cut off is Aug 31<br />
            STALL Fee charged by Heritage Park is $47 for the first night and $27 for the second night. Stalls are only available on Friday and Saturday nights. MUST be cleaned to the mat. MUST provide a separate $50 deposit clean up cheque.<br />
            CAMPING Fee $10 for the weekend WITHOUT electric hook-up self penning free. $30 per night WITH electric hookup NO self penning at hook ups.<br />
            Co-sanctioned BRN4D Members may pay $3 per run, per horse, for points.<br />
            Co-Sanctioned Barrels Out West (BOW), Cascade West Productions (CWP), Kamloops Outlaw Barrel Racing (KOBRa)<br />
            All pre entries are responsible for entry fees. Refund will only be issued with a vet out by a licenced Veterinarian or a medical note from a licenced Physician prior to race or visible agreed upon by Producers at the race minus $15.<br />
            ALL FEES IN CANADIAN FUNDS :) CASH ONLY for Entries (except stall deposit) Cash Payout<br />
            All Fees in CANADIAN Funds. Cash Only<br />
            PLEASE PUT THE NUMBER OF STALLS FOR THE NUMBER OF NIGHTS IN THE NOTES:)<br />
            PLEASE PUT THE TYPE OF CAMPING AND THE NUMBER OF NIGHTS IN THE NOTES:)<br />
            Please enter stalls and camping on Sept 10 entry page and enter Light Em Up Slot Race on Sept 11 entry page.
        </p>
        <h4>SUNDAY, SEPTEMBER 11  LIGHT EM UP SLOT RACE </h4>
        <p>
            BC's First Big Money Slot Race! It’s Like No Other with 100% Pay Out - No Hold Back!!<br />
            Light Em Up & Keep Em Up!       Entry Fee $250      Only 250 Slots Available<br />
            Slot Race Format is 4D with Equal Pay out in Each D<br />
            250 Entries = $62,500 Pay Out<br />
            Office Opens at 7 am<br />
            Time Only at 7 am Only 40 Time onlies sold for Sunday $5 for one time around the pattern<br />
            Light Em Up Slot Race 9 am<br />
            Awards and Payout directly following race<br />
            Option 1 Knocked Barrel = No Time<br />
            Prime Cowgirl Creations<br />
            Arena Fee $15 per Rider<br />
            Entry deadline Aug 31   Late Fee $20<br />
            <strong>SLOT # MUST BE IN THE NOTES WHEN ENTERING</strong><br />
            If entering more than one horse, please specify which slot # goes with which horse/Rider combination.<br />
            An electronic random draw will be done and posted on event page September 7<br />
            There are no vet outs or medical outs for slot race. You may have anyone you wish race in your slot.<br />
            All Fees in CANADIAN Funds. Cash Only<br />
            <strong> STALL Fee</strong> charged by Heritage Park is $47 for the first night and $27 for the second night. Stalls are only available on Friday and Saturday nights. MUST be cleaned to the mat. MUST provide a separate $50 deposit clean up cheque. If entering Sat races, please put stalls and camping on Sat entry:)<br />
            <strong>CAMPING Fee</strong> $10 for the weekend WITHOUT electric hook-up self penning free. $30 per night WITH electric hookup NO self penning at hook ups.

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