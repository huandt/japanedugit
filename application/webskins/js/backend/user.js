/** SIÊU DEEDS**/
$(document).ready(function(){
    $(".tablesorter").tablesorter();
    $('.lock').click(function(e){
    	e.preventDefault();
		var elem    = $(this);
        bootbox.confirm("Are you want to look this user?", function(confirmed) {
        	if(confirmed == false)
        	{
        		return false;
        	}
        	else
        	{           	 	
				var status  = elem.attr('u-stat');
				var user_id = elem.attr('u-id');
				if(elem.hasClass('disabled'))
        	 	{
        	 		return false;
        	 	}
        	 	else
        	 	{
					$.ajax({
						beforeSend: function(){
							elem.addClass('disabled');
			            },
			            url: 'ajax/user_ajax/block_user',
			            type: 'get',
			            data: {'status':status, 'user_id':user_id},
			            dataType: 'json',
			            success:function(data){
			            	elem.removeClass('disabled');
			            	if(data.err == 0)
			            	{
			            		if(data.mode == 'block')
			            		{
			            			elem.attr('u-stat', data.stat);
				            		elem.removeClass('btn-success');
				            		elem.addClass('btn-danger');
				            	}
				            	else
				            	{
				            		elem.attr('u-stat', data.stat);
				            		elem.removeClass('btn-danger');
				            		elem.addClass('btn-success');
				            	}
			            	}
			            	else
			            	{
			            		alert('Error system, please try again')
			            	}
			            }
			       });
				}
        	}
        });
        return false;
    });

	$('.update-modal').click(function(e) {
		e.preventDefault();
		var user_id = $(this).attr('u-id');
		var url = 'ajax/user_ajax/load_info';
		var data = {'user_id':user_id};
		if (url.indexOf('#') == 0) {
			$(url).modal('open');
		} else {
			$.get(url, data, function(data) {
				$('<div class="modal remove" style="width:700px;margin-left:-350px;">' + data + '</div>').modal();
			}).success(function() { $('input:text:visible:first').focus(); });
		}
	});
         
    $('.add-privilege').click(function(e) {
		e.preventDefault();
		var user_id = $(this).attr('u-id');
		var url = 'ajax/user_ajax/privilege';
		var data = {'user_id':user_id};
		if (url.indexOf('#') == 0) {
			$(url).modal('open');
		} else {
			$.get(url, data, function(data) {
				$('<div class="modal remove" style="left: 45%;width: 700px;">' + data + '</div>').modal();
			}).success(function() {
			 
			});
		}
	});
    
    $('.action-privilege').livequery('change', function(){
        var id_privilege = $(this).val();
        var user_id      = $('#u_id').val();
        
        if($(this).attr('checked'))
            var action = 'add';
        else
            var action = 'del';
                
        $.ajax({
			url: 'ajax/user_ajax/insert_privilege',
            type: 'get',
            data: {
               id       : id_privilege,
               action   : action,
               user_id  : user_id
            },
            dataType: 'json',
            success:function(data){
            	if(data.code == 1) // Add
            	{
            		$('.input_'+id_privilege).removeAttr("disabled");
            	}
            	else if(data.code == 2) // Del
            	{
            		$('.input_'+id_privilege).removeAttr("checked");
                    $('.input_'+id_privilege).attr('disabled','disabled');
            	}
                else
            	{
            		return false;
            	}
            }
        });         
	});    
    
    $('.update-privilege').livequery('click', function(e){
		var dataInput = $('#privilege-user-form').serialize();
        $.ajax({
			url: 'ajax/user_ajax/update_privilege',
            type: 'post',
            data: dataInput,
            dataType: 'json',
            success:function(data){
            	if(data)
                {
                    $('.result-update').hide().html(data.html).fadeIn(200);
                }
                else
                    return false;
            }
        });
        return false;
	});  
	$('.modal, .basic-user-info').livequery(function(){
        var elem = $('#birthday');
        elem.datepicker().on('changeDate', function(ev){
			elem.datepicker('hide');
		});
    });
    $('#birthday-add').datepicker().on('changeDate', function(ev){
		$(this).datepicker('hide');
	});
    
    $('.update-click, .update-user').livequery('click', function(){
    	$.validator.addMethod("valueNotEquals", function(value, element, arg){
	      	return arg != value;}, "Value must not equal arg.");   	
    	$('#info-user-form').validate({
	        rules: {
	            first_name : { required: true},
                last_name : {required: true},
	            mobiphone     : { required: true,number: true,minlength: 6 },	            
	            address   : { required: true,minlength: 3 },
	            password   : { required: true,minlength: 6 }
	        },
	        messages: {
	        }
	    });
		
		var res = $("#info-user-form").valid();
		if(res == false)
		{
			return false;
		}
		else
		{
	    	var elem = $(this);
	    	var data = $('#info-user-form').serialize();
	    	$.ajax({
				beforeSend: function(){
					elem.addClass('disabled');
					elem.attr('disabled', 'disabled');
	            },
	            url: 'ajax/user_ajax/update_info',
	            type: 'post',
	            data: data,
	            dataType: 'json',
	            success:function(data){
	            	elem.removeClass('disabled');
					elem.removeAttr('disabled');
	            	if(data.err == 0)
	            	{
	            		$('.result-update').hide().html(data.msg).fadeIn(200);
	            	}
	            	else
	            	{
	            		$('.result-update').hide().html(data.msg).fadeIn(200);
	            	}
                    location.reload();
	            }
	        });
	    }
    	return false;
    });

    $('.add-click').click(function(){        
    	var time_out;
    	$.validator.addMethod("valueNotEquals", function(value, element, arg){
	      	return arg != value;}, "Value must not equal arg.");   	
    	$('#add-user-form').validate({
	        rules: {
	            user_name      	: { required: true,minlength: 3},
	            mobiphone     : { required: true,number: true,minlength: 6},	            
	            email     : { required: true,email:true},
	            address   : { required: true,minlength: 3},
	            password   : { required: true,minlength: 3}
	        },
	        messages: {
	            user_name: {
					required : "User name is not null",
					minlength: "Min 3 character."
	            },
	            mobiphone: {
					required : "Phone is not null",
	                number   : "Not is number",
					minlength: "Min 6 character"
	            },
	            address   : {
					required : "Address is not null",
					minlength: "Min 3 character"
	            },
	            password   : {
					required : "Password is not null",
					minlength: "Min 5 character"
	            },
	            email     : { required: "Email is not null.", email: "Email is not valid." }
	        }
	    });
		
		var res = $("#add-user-form").valid();

		if(res == false)
		{
			return false;
		}
		else
		{
			var elem = $(this);
			var data = $('#add-user-form').serialize();
			$.ajax({
	            beforeSend: function(){
	            	elem.addClass('disabled');
	            	elem.attr('disabled', 'disabled');
	            },
	            url: 'ajax/user_ajax/add',
	            global: false,
	            type: "post",
	            data: data,
	            dataType: "json",
	            success: function(data){
	            	elem.removeClass('disabled');
	            	elem.removeAttr('disabled');
	            	if(data.err == 0)
	            	{
	            		$('.result-update').hide().html(data.msg).fadeIn(200);
	            		window.clearTimeout(time_out);
	            		time_out = setTimeout(function(){
						      location.reload();
						},800);
	            	}
	            	else if(data.err == 2)
	            	{
	            		$('.result-update').hide().html(data.msg).fadeIn(200);
	            	}
	            	else
	            	{
	            		$('.result-update').hide().html(data.msg).fadeIn(200);
	            	}
	            }
	        });
		}
		return false;
    });
    
	$("a[rel=popover]").popover().click(function(e) {
        e.preventDefault();
    });
    
    $('#tab-view a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		$('#tab-view a:first').tab('show');
	});    
    
	$('#tab-caring, .payment-table').tooltip({
      	selector: "a[rel=tooltip]"
    });   
    
    $('.voting-click').click(function(){
		var elem    = $(this);
		var content = $('.feedback-content').val();
		var u_id    = elem.attr('u-id');
		var pos     = $('.feedback-table tbody tr').size();
    	if(content == '')
    	{
    		return false;
    	}
		$.ajax({
            beforeSend: function(){
            	elem.addClass('disabled');
            },
            url: 'ajax/backend/user_ajax/add_feedback',
            global: false,
            type: "get",
            data: {'content': content, 'u_id': u_id, 'pos': pos},
            dataType: "json",
            success: function(data){
            	elem.removeClass('disabled');
            	if(data.err == 0)
            	{
            		$('.feedback-content').val('');
            		$('.feedback-table tbody').append(data.html);
            	}
            	else
            	{
            		alert("Có lỗi xử lý hệ thống, bạn vui lòng thử lại sau ít giây");
            	}
            }
        });
        return false;
    });
    
    
    /*$('.btn-group').livequery(function(){
    	$('.set-level').tooltip();
    });*/
    
    
	$('.set-level').livequery('click', function(){
		var elem = $(this);
		var privilege = elem.attr('privilege');
		$('#privilege').val(privilege);
	});
    
    
	$('.set-newsletter').livequery('click', function(){
		var elem = $(this);
		if(elem.hasClass('active'))
		{
			$('#newsletter').val(0);
		}
		else
		{
			$('#newsletter').val(1);
		}
	});
    
    
	$('.set-level-add').livequery('click', function(){
		var elem = $(this);
		var privilege = elem.attr('privilege');
		$('#privilege-add').val(privilege);
	});
    
    
	$('.set-newsletter-add').livequery('click', function(){
		var elem = $(this);
		if(elem.hasClass('active'))
		{
			$('#newsletter-add').val(0);
		}
		else
		{
			$('#newsletter-add').val(1);
		}
	});
    
    // Hiện tooltip
    $('[rel^="tooltip"]').tooltip();    
});