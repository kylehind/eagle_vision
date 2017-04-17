<?php
/**
 * The template for displaying sidebar.
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>

<div id="secondary" class="sidebar-content-area">
  <div id="sidebar-content">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area") ) : ?>
    <?php endif;?>
  </div> <!-- #sidebar-content -->
</div><!-- #secondary .sidebar-content-area -->