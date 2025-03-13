$(document).ready(function(){
	$(".readd").click(function(){
		$(this).prev().toggle();
		$(this).siblings('.dotss').toggle();
		if($(this).text()=='Read More...'){
			$(this).text('Read Less');
		}
		else{
			$(this).text('Read More...');
		}
	});
});
