<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tool_Box
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="container">
      <div class="post-path">
        <hr>
        <?php tool_box_breadcrumb() ?>
      </div><!-- breadcrumb -->

      <?php
      while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content' );

      endwhile; // End of the loop.
    ?>
    </div> <!-- container -->

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
