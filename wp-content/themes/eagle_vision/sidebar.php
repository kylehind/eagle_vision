<?php
/**
 * The template for displaying sidebar.
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>

<div id="secondary" class="sidebar-content-area">
  <div id="sidebar-content" class="donate">
    <h2>Get Involved</h2>

    <div class="hbreak"></div>

    <p>
      <em>Learn more about how to help</em>
      <a href="#">Here</a>
    </p>
    <br>
    <p><em>..or swing in to action and..</em></p>
    <br>
    <h3>Quick Donate Below</h3>

    <div class="hbreak"></div>
    <div class="hbreak"></div>

    <div id="donate_buttons">
      <h4><em> Support a Child by donating </em></h4>
      <span>1 Years Tuition</span>
      <button value="100.00" class="donate_select" type="button">£100</button>
      <div class="smallhbreak"></div>
      <span>1 Terms Tuition</span>
      <button value="30.00" class="donate_select" type="button">£30</button>
      <div class="smallhbreak"></div>
      <span>1 Years Textbooks</span>
      <button value="19.00" class="donate_select" type="button">£19</button>

      <div class="hbreak"></div>

      <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="blank">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="G3PELQG4DAJRW ">
        <input type="hidden" name="item_name" value="Eagle Vision Donation">
        <input type="hidden" name="currency_code" value="GBP">
        <input type="hidden" id="donation_amount" name="amount" value="19.00">
        <button class="donate_button" type="submit" border="0" name="submit"><h2>Donate</h2></button>
      </form>
    </div>
  </div> <!-- #sidebar-content -->
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area") ) : ?>

  <?php endif;?>
</div><!-- #secondary .sidebar-content-area -->