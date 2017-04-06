<?php
/**
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>
<a href="<?php the_permalink(); ?>">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class='entry-thumbnail'>
      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>
    <div class="clear"></div>
    <div class='entry-summary'>
      <h2><?php the_title(); ?></h2>
      <p><?php echo get_post_meta( get_the_ID(), 'hamer_post_subtitle', true ); ?></p>
    </div>
  </article><!-- #post-<?php the_ID(); ?> -->
</a>