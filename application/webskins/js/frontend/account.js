$(function() {
	/*$('.scroll-link a').click(function () {
        $('body').scrollTo($(this).attr('href'), 500);
        return false;
    });*/
    $('.wrap-change-pass input').val('');
	$('.btn-choose-img').click(function(){
		$('#avatar').click();
	});
	$('.datepicker').datepicker().on('changeDate', function(ev){
			$(this).datepicker('hide');
		});
	$("#avatar").change(function(e){
	    ajaxUpload(this.form,'ajax/frontend/account_ajax/upload_avatar','upload-notice','<div>loading...</div>','<div class="notify warning">- Ảnh phải có định dạng jpg, gif, png.<br>- Kích thước không được lớn hơn 1200px x 1000px.<br>- Dung lượng tối đa là 2MB </div>');
        
        return false;
    });
	$('.change-pass').click(function(){
		var elem = $(this);
		elem.toggleClass('click-active');
		if(!elem.hasClass('click-active'))
		{
			elem.html('Thay đổi');
		}
		else
		{
			elem.html('Hủy');
		}
		$('.wrap-change-pass').slideToggle(200);
		$('.wrap-change-pass input').val('');
	});

	$('form#update_form').submit(function(){
		var data = $(this).serialize();
		$.ajax({
			beforeSend: function(){
				$('.update-click').attr('disabled', 'disabled');
            },
            url: 'ajax/frontend/account_ajax/update',
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(data){
            	$('.update-click').removeAttr('disabled');
            	if(data.err == 1)
            	{
            		$('#upload-notice').hide().html(data.msg).fadeIn(200);
            	}
            	else if(data.err == 0)
            	{
            		$('#upload-notice').hide().html(data.msg).fadeIn(200);
            	}
            }
       	});
		return false;
	});
    $('.connect-nganluong').click(function(){
        var data    = $('#nl_form').serialize();
        $.ajax({
            beforeSend: function(){
				$('.update-click').attr('disabled', 'disabled');
            },
            url: 'ajax/frontend/account_ajax/login_nganluong',
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(data){
                $('.update-click').removeAttr('disabled');
                if(data.code == 1){
                    $('.result-login-nl').removeClass('alert-warning');
                    $('.result-login-nl').addClass('alert-success').show();
                    setTimeout("location.reload();",2000);
                }
                $('.result-login-nl').html(data.notice).show();
            }
        });
    });
    $(".change-accountnl").click(function(){
        $(".div-change-account").hide();
        $('.show-change-account').show();
    });
});