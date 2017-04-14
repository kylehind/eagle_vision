jQuery(document).ready(function(){
  jQuery(".donate_select").click(function(){
    jQuery(".selected").removeClass("selected");
    jQuery(this).addClass("selected");
    jQuery("#donation_amount").val(jQuery(this).attr("value"));
  });
  jQuery(".donate_select").last().click();
});