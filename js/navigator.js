$(document).ready(function(){
	$(".blog_link").click(function(){
		console.log("click");
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'0'});
	});

	$(".about_link").click(function(){
		console.log("click");
		$("#blog_container").animate({'left':'-200%'});
		$("#main_container").animate({'left':'0'});
	});
});