$(document).ready(function() {

	$('a.popup-window').click(function(){
	
		var popupBox = $(this).attr('href');
		$(popupBox).fadeIn(400);
		
		var popMargTop = ($(popupBox).height() + 30) / 2;
		var popMargLeft = ($(popupBox).width() + 30) / 2;
	
		$(popupBox).css({
			"margin-top": -popMargTop,
			"margin-left": -popMargLeft
		});
		
		$('#sign-in-list').append('<div id="mask"></div>');
		
		$('#mask').fadeIn(400);
		return false;
		
	});
	
	$(document).on("click", "button.close, #mask", function(){
	
		$('#mask, .popupInfo').fadeOut(400, function(){
		
			$('#mask').remove();
			
		});
		return false;
	});
	
});

$(document).keyup(function(e){

	if (e.keyCode == 27) {
	
		$('#mask, .popupInfo, #popup-box').fadeOut(400);
		return false;
	}
});