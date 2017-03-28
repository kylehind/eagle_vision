<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->