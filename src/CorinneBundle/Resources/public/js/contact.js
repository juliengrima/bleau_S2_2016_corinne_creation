
// Shorthand for $( document ).ready()
$(function () {
    console.log("Ca roule pour jQuery");
    $("#body-contact").hide().show(1000).css("display", "flex");
    $('#textarea1').trigger('autoresize');
    
});