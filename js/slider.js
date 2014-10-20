$(document).ready(function(){

	$(".slider #1").fadeIn(500);
	var sc = $(".slider img").size();
	var count = 1;
	
	setInterval(function() {
	
		$(".slider #" + count).fadeOut(500);
		if (count == sc) {
			count = 1;
		}else{
			count++;
		}
		$(".slider #" + count).delay(500).fadeIn(500);
	}, 5000);
});