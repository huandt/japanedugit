$(document).ready(function(){
    $.ajaxSetup({
        url: 'ajax/news/update_img',
        type: 'GET',
        async: false,
        timeout: 500
    });
   // call inlineEdit
    $('.editable').inlineEdit({
        //value: $.ajax({ data: { 'action': 'get' } }).responseText,
        save: function(event, data) {
            var check = 0;
            var html = $.ajax({
               data: {'action': 'save', 'value': data.value,'id':$(this).attr('lang')}               
            }).responseText;
            if(html != 'OK')
                alert(html);
            location.reload();                
            //return html === 'OK' ? true : false;
        }        
    });
});