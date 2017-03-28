<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', 'page' ); ?>


    <?php endwhile; // end of the loop. ?>

    <div class="clear"></div>
    <!-- show all posts below -->
    <?php query_posts('posts_per_page=1000'); ?>
    <div class="grid">
      <?php while ( have_posts() ) : the_post(); ?>
         <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; ?>
    </div>
    <div class="clear"></div>
  </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>