$(document).ready(function(){
	$(".donate_select").click(function(){
		$(".selected").removeClass("selected");
		$(this).addClass("selected");
		console.log($(this).attr("value"));
		$("#donation_amount").val($(this).attr("value"));
	});
});