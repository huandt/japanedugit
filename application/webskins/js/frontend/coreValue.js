$(document).ready(function(){
   // call inlineEdit
    $('.show-text').hover(function() {
        txt = $(this).attr('alt');
        //$(this).addClass('selected');
        $('#text-core-value').text(txt);
    });
});