var $total = $('#arenafee').data('arena-fee');
var $bbqcost = 0;
var $timeonlycost = 0;
var $entrytotal = 0;
var $cosanctiontotal = 0;
var $camping = $('#camping').data('camping-price');
var $stall = $('#stall').data('stall-price');
var $bbq = $('#bbqtickets').data('bbq-price');
var $timeonlys = $('#timeonlys').data('timeonlys-price');
var $cbs = $('input[name="entry\[\]"]');
var $cosanction = $('input[name="cosanction\[\]"]');
var $usercost = $('input[name="usercost"]');

$(document).ready(function() {
    $(':checkbox:checked').prop('checked',false);
    $('#bbqtickets').val(0);
    $('#timeonlys').val(0);
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
    }
    else if($('#camping').not(':checked')) {
        $total -= $camping;
    }
}

var calculateStall = function() {
    if($('#stall').is(':checked')) {
        $total += $stall;
    }
    else if($('#stall').not(':checked')) {
        $total -= $stall;
    }
}

var calculateBbq = function() {
    $qty = $('#bbqtickets').val();
    $bbqcost = $qty * $bbq;
}

var calculateTimeOnlys = function() {
    $qty = $('#timeonlys').val();
    $timeonlycost = $qty * $timeonlys;
}


function calcEntriesCost() {
    $entrytotal = 0;
    $cbs.each(function() {
        if (this.checked)
            $entrytotal = parseInt($entrytotal) + parseInt($(this).attr('data-price'));
    });
}

function calcCosanctionCost() {
    $cosanctiontotal = 0;
    $cosanction.each(function() {
        if (this.checked)
            $cosanctiontotal = parseInt($cosanctiontotal) + parseInt($(this).attr('data-price'));
    });
}

function updateCost() {
    $("#totalprice").text($total + $bbqcost + $entrytotal + $cosanctiontotal + $timeonlycost);
    $usercost.val($total + $bbqcost + $entrytotal + $cosanctiontotal + $timeonlycost);
}

$(document).click(function() {
    updateCost();
});

$cbs.click(calcEntriesCost);
$cosanction.click(calcCosanctionCost);
$( "#camping" ).on( "click", calculateCamping );
$("#stall").on( "click", calculateStall);
$("#bbqtickets").on("change", calculateBbq);
$("#timeonlys").on("change", calculateTimeOnlys);
