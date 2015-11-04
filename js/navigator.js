$(document).ready(function(){
	$(".blog_link").click(function(){
		$(".underlined_white").removeClass("underlined_white");
		$(this).addClass("underlined_white")
		$("#get_involved_container").animate({'left':'-200%'});
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'0'});
	});

	$(".about_link").click(function(){
		$(".underlined_white").removeClass("underlined_white");
		$(this).addClass("underlined_white")
		$("#get_involved_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'-200%'});
		$("#main_container").animate({'left':'0'});
	});

	$(".get_involved_link").click(function(){
		$(".underlined_white").removeClass("underlined_white");
		$(this).addClass("underlined_white")
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'-200%'});
		$("#get_involved_container").animate({'left':'0'});
	});

	$(".green_get_involved_link").click(function(){
		$(".underlined_white").removeClass("underlined_white");
		$(".get_involved_link").addClass("underlined_white")
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'-200%'});
		$("#get_involved_container").animate({'left':'0'});
	});
});