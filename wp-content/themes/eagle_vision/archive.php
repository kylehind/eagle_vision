<?php
/**
* The Archive  page
*
* @package eagle_vision
* @since eagle_vision 1.0
*/
?>
<?php get_header(); ?>
<div id="content" class="site-content" role="main">
  <?php if ( have_posts() ) : ?>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'category-blog-content', get_post_format() ); ?>
      <div class="clear"></div>
    <?php endwhile; ?>
  <?php else : ?>
    <?php get_template_part( 'no-results', 'index' ); ?>
  <?php endif; ?>
</div><!-- #content .site-content -->

<?php get_footer(); ?>