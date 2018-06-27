$(function() {
	$('.close-coupon-popup').click(function(){
		$('.coupon-popup').addClass('hidden');
		return false;
	});

	$('.bgBottom').click(function(){
		$('.coupon-popup').removeClass('hidden');
		return false;
	});

	$('.coupon-popup input[type="text"]').focusin(function(){
		var value_default = $(this).data('val');
		if($(this).val() == value_default)
			$(this).val('');
	}).focusout(function(){
		var value_default = $(this).data('val');
		if($(this).val() == '')
			$(this).val(value_default);
		else
			return false;
	});

	$('.register-coupon').click(function(){
		return false;
	});

	$('.onetop-share').click(function(){
	    // calling the API ...
	    var obj = {
	      	method: 'feed',
	      	link: 'http://www.1top.vn',
	      	picture: 'http://www.1top.vn/webskins/skins/frontend/images/fb-logo.png',
	      	name: '1Top',
	      	caption: 'Khuyến mại mỗi ngày với hàng ngàn sản phẩm chất lượng',
	      	description: 'Sàn khuyến mại, giảm giá nhiều hàng số 1 Việt Nam với hàng ngàn sản phẩm giảm giá mỗi ngày từ những người bán uy tín.'
	    };

	    function callback(response) {
	      	document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
	    }

	    FB.ui(obj, callback);
	});
	$('.register-coupon').click(function(){
		var tm;
		var elem = $(this);
		if(elem.hasClass('disabled'))
			return false;

		var data = $('#coupon_form').serialize();

		$.ajax({
			beforeSend: function() {
				elem.addClass('disabled');
			},
			url: 'ajax/frontend/coupon_ajax/register',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function(data) {
				elem.removeClass('disabled');
				if(data.err == 1)
				{
					$('.coupon-notice').html(data.msg);
				}
				else
				{
					window.clearTimeout(tm);
					$('.coupon-notice').html(data.msg);
					//$.cookie('coupon_cookie', '1', { expires: 365, path: '/' });
					tm = setTimeout(function(){
						$('.coupon-popup').addClass('hidden');
					}, 2000);
				}
			}
		});		
	});
});