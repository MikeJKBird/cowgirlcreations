var $total = $('#arenafee').data('arena-fee');
var $bbqcost = 0;
var $entrytotal = 0;
var $camping = $('#camping').data('camping-price');
var $stall = $('#stall').data('stall-price');
var $bbq = $('#bbqtickets').data('bbq-price');
var $cbs = $('input[name="entry\[\]"]');

$(document).ready(function() {
    $(':checkbox:checked').prop('checked',false);
    $('#bbqtickets').val(0);
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    var $submit = $("#signup").hide(),
        $checkbox = $('input[name="entry\[\]"]').click(function() {
            $submit.toggle( $checkbox.is(":checked") );
        });
});


var calculateCamping = function() {
    if($('#camping').is(':checked')) {
        $total += $camping;
        $('#totalprice').text($total + $bbqcost + $entrytotal);
    }
    else if($('#camping').not(':checked')) {
        $total -= $camping;
        $('#totalprice').text($total + $bbqcost + $entrytotal);
    }
}

var calculateStall = function() {
    if($('#stall').is(':checked')) {
        $total += $stall;
        $('#totalprice').text($total + $bbqcost + $entrytotal);
    }
    else if($('#stall').not(':checked')) {
        $total -= $stall;
        $('#totalprice').text($total + $bbqcost + $entrytotal);
    }
}

var calculateBbq = function() {
    $qty = $('#bbqtickets').val();
    $bbqcost = $qty * $bbq;
    $('#totalprice').text($total + $bbqcost + $entrytotal);
}

function displayVals() {
    calcUsage();
}

function calcUsage() {
    $entrytotal = 0;
    $cbs.each(function() {
        if (this.checked)
            $entrytotal = parseInt($entrytotal) + parseInt($(this).attr('data-price'));
    });
    $("#totalprice").text($total + $bbqcost + $entrytotal);
}
$("#totalprice").text($total + $bbqcost + $entrytotal);
$cbs.click(calcUsage);
$( "#camping" ).on( "click", calculateCamping );
$("#stall").on( "click", calculateStall);
$("#bbqtickets").on("change", calculateBbq);