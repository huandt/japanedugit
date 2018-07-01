$(document).ready(function(){
   // call inlineEdit
    $('.show-text-val2').hover(function() {
        txt = $(this).attr('alt');
        $(this).addClass('selected');
        $('#text-core-value').text(txt);
        $('.show-text-val1').removeClass('selected');
        $('.show-text-val3').removeClass('selected');
        $('.show-text-val4').removeClass('selected');
        $('.show-text-val5').removeClass('selected');
    });
    $('.show-text-val1').hover(function() {
        txt = $(this).attr('alt');
        $(this).addClass('selected');
        $('#text-core-value').text(txt);
        $('.show-text-val2').removeClass('selected');
        $('.show-text-val3').removeClass('selected');
        $('.show-text-val4').removeClass('selected');
        $('.show-text-val5').removeClass('selected');
    });
    $('.show-text-val3').hover(function() {
        txt = $(this).attr('alt');
        $(this).addClass('selected');
        $('#text-core-value').text(txt);
        $('.show-text-val1').removeClass('selected');
        $('.show-text-val2').removeClass('selected');
        $('.show-text-val4').removeClass('selected');
        $('.show-text-val5').removeClass('selected');
    });
    $('.show-text-val4').hover(function() {
        txt = $(this).attr('alt');
        $(this).addClass('selected');
        $('#text-core-value').text(txt);
        $('.show-text-val1').removeClass('selected');
        $('.show-text-val3').removeClass('selected');
        $('.show-text-val2').removeClass('selected');
        $('.show-text-val5').removeClass('selected');
    });
    $('.show-text-val5').hover(function() {
        txt = $(this).attr('alt');
        $(this).addClass('selected');
        $('#text-core-value').text(txt);
        $('.show-text-val1').removeClass('selected');
        $('.show-text-val3').removeClass('selected');
        $('.show-text-val2').removeClass('selected');
        $('.show-text-val4').removeClass('selected');
    });
});