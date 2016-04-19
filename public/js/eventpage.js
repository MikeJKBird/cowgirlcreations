var $total = $('#arenafee').data('arena-fee');
var $bbqcost = 0;
var $entrytotal = 0;
var $cosanctiontotal = 0;
var $camping = $('#camping').data('camping-price');
var $stall = $('#stall').data('stall-price');
var $bbq = $('#bbqtickets').data('bbq-price');
var $cbs = $('input[name="entry\[\]"]');
var $cosanction = $('input[name="cosanction\[\]"]');
var $usercost = $('input[name="usercost"]');

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
        $('#totalprice').text($total + $bbqcost + $entrytotal + $cosanctiontotal);
    }
    else if($('#camping').not(':checked')) {
        $total -= $camping;
        $('#totalprice').text($total + $bbqcost + $entrytotal + $cosanctiontotal);
    }
}

var calculateStall = function() {
    if($('#stall').is(':checked')) {
        $total += $stall;
        $('#totalprice').text($total + $bbqcost + $entrytotal + $cosanctiontotal);
    }
    else if($('#stall').not(':checked')) {
        $total -= $stall;
        $('#totalprice').text($total + $bbqcost + $entrytotal + $cosanctiontotal);
    }
}

var calculateBbq = function() {
    $qty = $('#bbqtickets').val();
    $bbqcost = $qty * $bbq;
    $('#totalprice').text($total + $bbqcost + $entrytotal + $cosanctiontotal);
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
    $("#totalprice").text($total + $bbqcost + $entrytotal + $cosanctiontotal);
}

function calcUsage1() {
    $cosanctiontotal = 0;
    $cosanction.each(function() {
        if (this.checked)
            $cosanctiontotal = parseInt($cosanctiontotal) + parseInt($(this).attr('data-price'));
    });
    $("#totalprice").text($total + $bbqcost + $entrytotal + $cosanctiontotal);
}

function updateCost() {
    // $usercost.val(parseInt($totalprice));
    $usercost.val($total + $bbqcost + $entrytotal + $cosanctiontotal);
}

$("#totalprice").text($total + $bbqcost + $entrytotal);
$cbs.click(calcUsage);
$cosanction.click(calcUsage1);
$( "#camping" ).on( "click", calculateCamping );
$("#stall").on( "click", calculateStall);
$("#bbqtickets").on("change", calculateBbq);
$cbs.click(updateCost);
