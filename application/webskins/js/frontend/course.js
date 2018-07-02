$(document).ready(function(){

	$('.show-detail').click(function() {
		var postId = $(this).attr('rel');
		var hClass = $('div.course-dt').hasClass('active-one');
		if(hClass){
			$('div.course-dt').removeClass('active-one');
			$(this).parent().addClass('active-one');
			$.ajax({
	            beforeSend: function(){
	            	$('#tab1').text('');
            		$('#tab2').text('');
            		$('#tab3').text('');
            		$('#tab4').text('');
	            },
	            url: 'ajax/course/detail',
	            global: false,
	            type: "GET",
	            data: {'id' : postId},
	            dataType: "json",
	            success: function(data){
	            	if(data.code == 1){
	            		$('#tab1').text(data.tab1);
	            		$('#tab2').text(data.tab2);
	            		$('#tab3').text(data.tab3);
	            		$('#tab4').text(data.tab4);
	            	}
	            }
	        });
		}
	});

});