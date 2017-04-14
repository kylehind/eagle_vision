<?php
/**
 * The template for displaying sidebar.
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>

<div id="secondary" class="sidebar-content-area">
  <div id="#content" class="sidebar-content">
    <div id="container" class="donate">
      <h2 class="text_align_center"><a href="#">Get Involved</a></h2>
      <div class="text_align_center">
        <p class="no_margin margin_right_5 display_inline_block"><em>Learn more about how to help</em></p>
        <h3 class="no_margin display_inline_block green_get_involved_link">Here</h3>
      </div>
      <div class="text_align_center">
        <p class="no_margin"><em>..or swing in to action and..</em></p>
        <h3 class="no_margin">Quick Donate Below</h3>
      </div>
      <div class="dontation_options">
        <p class="text_align_center"><em> Support a Child by donating </em></p>
        <div class="button_container">
          <p>1 Years Tuition</p> <button value="100.00" class="donate_select donate_100" type="button">£100</button>
          <div class="clear"></div>
        </div>
        <div class="button_container">
          <p>1 Terms Tuition</p> <button value="30.00" class="donate_select donate_30" type="button">£30</button>
          <div class="clear"></div>
        </div>
        <div class="button_container">
          <p>1 Years Textbooks</p> <button value="19.00" class="donate_select donate_19" type="button">£19</button>
          <div class="clear"></div>
        </div>
      </div>

      <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="blank">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="G3PELQG4DAJRW ">
        <input type="hidden" name="item_name" value="Eagle Vision Donation">
        <input type="hidden" name="currency_code" value="GBP">
        <input type="hidden" id="donation_amount" name="amount" value="19.00">
        <button class="donate_button" type="submit" border="0" name="submit"><h2>Donate</h2></button>
        <img class="paypal" src="img/paypal.png">
      </form>
    </div>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area") ) : ?>

    <?php endif;?>
  </div><!-- #content .sidebar-content -->
</div><!-- #secondary .sidebar-content-area -->