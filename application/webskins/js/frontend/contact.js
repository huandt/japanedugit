$(document).ready(function(){

	$('#send').click(function() {
        var str = $( "#form-request" ).serialize();
        $.ajax({
            beforeSend: function(){
            },
            url: 'ajax/contact/request',
            global: false,
            type: "post",
            data: str,
            dataType: "json",
            success: function(data){	            	
            	if(data.code == 2){	            	
            		$('.name-err').text(data.msg);
            	}else{
            		$('.name-err').text('');
            	} 
            	if(data.code == 3){
            	    $('.email-err').text(data.msg);
            	}else{
            		$('.email-err').text('');
            	} 
            	if(data.code == 4){
            	    $('.birthday-err').text(data.msg);
            	}else{
            		$('.birthday-err').text('');
            	}
            	if(data.code == 5){
            	    $('.phone-err').text(data.msg);
            	}else{
            		$('.phone-err').text('');
            	}
            	if(data.code == 6){
            	    $('.work-err').text(data.msg);
            	}else{
            		$('.work-err').text('');
            	}
            	if(data.code == 1){
            	    $('.notice').text(data.msg);
            	}          	
            }
        });
    });


});