<?php
/**
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content">
    <h1 class="entry-title">
      <?php the_title(); ?>
      <span class="info-link">info</span>
    </h1>
    <?php the_content(); ?>
    <div class="clear"></div>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->