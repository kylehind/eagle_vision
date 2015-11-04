$(document).ready(function(){
	$("#get_involved_container").hide();
	$("#blog_container").hide();
	$("#main_container").show();

	$(".blog_link").click(function(){
		$("#blog_container").show();
		$(".underlined_white").removeClass("underlined_white");
		$(this).addClass("underlined_white")
		$("#get_involved_container").animate({'left':'-200%'});
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'0'}, function(){
			$("#get_involved_container").hide();
			$("#main_container").hide();
		});		
	});

	$(".about_link").click(function(){
		$("#main_container").show();
		$(".underlined_white").removeClass("underlined_white");
		$(this).addClass("underlined_white")
		$("#get_involved_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'-200%'});
		$("#main_container").animate({'left':'0'}, function(){
			$("#get_involved_container").hide();
			$("#blog_container").hide();
		});
	});

	$(".get_involved_link").click(function(){
		$("#get_involved_container").show();
		$(".underlined_white").removeClass("underlined_white");
		$(this).addClass("underlined_white")
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'-200%'});
		$("#get_involved_container").animate({'left':'0'}, function(){
			$("#blog_container").hide();
			$("#main_container").hide();
		});		
	});

	$(".green_get_involved_link").click(function(){
		$("#get_involved_container").show();
		$(".underlined_white").removeClass("underlined_white");
		$(".get_involved_link").addClass("underlined_white")
		$("#main_container").animate({'left':'-200%'});
		$("#blog_container").animate({'left':'-200%'});
		$("#get_involved_container").animate({'left':'0'}, function(){
			$("#blog_container").hide();
			$("#main_container").hide();
		});	
	});
});