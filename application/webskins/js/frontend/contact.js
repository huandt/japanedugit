$(document).ready(function(){
    $('ul.pagination li a').livequery('click',function(){
        page = parseInt($(this).attr('rel'));               
        if($(this).hasClass('active')){
            return false;
        }
        $.ajax({
            beforeSend:function(){
                $('.content-cb').html('<center><img src="./webskins/skins/global/images/ajax-loader.gif" align="center" /></center>');
            },
            url: 'ajax/contact/pagbing_cb',
            type: 'get',
            dataType: 'json',
            data: {'page':page},
            success: function(data){
                if(data.code == 1){
                    $('.content-cb').html(data.html);                     
                }else{
                    return false;
                }
            }
        });
    });      
});