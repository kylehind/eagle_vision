<?php
/**
 * The Template for displaying all single posts.
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */
?>
<?php get_header(); ?>

<div id="content" class="site-content blog-content-container" role="main">
  <!-- Show this post -->
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'single' ); ?>
  <?php endwhile; // end of the loop. ?>

  <div class="clear"></div>
  <!-- show all posts below -->
  <?php query_posts('posts_per_page=1000'); ?>
  <div class="grid">
    <?php query_posts('category_name=portfolio'); ?>
    <?php while ( have_posts() ) : the_post(); ?>
       <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; ?>
  </div>
  <div class="clear"></div>
</div><!-- #content .site-content -->


<?php get_footer(); ?>


