/* Åbne-Lukke af modals */
$("#indsendStory").click(function() {
    $( "#indsendBoks" ).fadeIn("slow");
});

$("#indsend_luk").click(function() {
    $( "#indsendBoks" ).fadeOut("slow");
});

$("#indsendBoks").click(function(e) {
    if (e.target === this) {
        $( "#indsendBoks" ).fadeOut("slow");
    }
});

$("#omOs").click(function() {
    $( "#omOsBoks" ).fadeIn("slow");
});

$("#omOs_luk").click(function() {
    $( "#omOsBoks" ).fadeOut("slow");
});

$("#omOsBoks").click(function(e) {
    if (e.target === this) {
        $( "#omOsBoks" ).fadeOut("slow");
    }
});

$("#voresApp").click(function() {
    $( "#voresAppBoks" ).fadeIn("slow");
});

$("#voresApp_luk").click(function() {
    $( "#voresAppBoks" ).fadeOut("slow");
});

$("#voresAppBoks").click(function(e) {
    if (e.target === this) {
        $( "#voresAppBoks" ).fadeOut("slow");
    }
});

$("#kontaktOs").click(function() {
    $( "#kontaktOsBoks" ).fadeIn("slow");
});

$("#kontaktOs_luk").click(function() {
    $( "#kontaktOsBoks" ).fadeOut("slow");
});

$("#kontaktOsBoks").click(function(e) {
    if (e.target === this) {
        $( "#kontaktOsBoks" ).fadeOut("slow");
    }
});

$(".appDisable").hover(function() {
   $('.appDisable').addClass('animated shake'); 
}, function() {
    $('.appDisable').removeClass('animated shake');
});