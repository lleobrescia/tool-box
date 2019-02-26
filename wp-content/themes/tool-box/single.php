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
  <div class="container">
    <div class="post-path">
      <hr>
      <?php tool_box_breadcrumb() ?>
    </div><!-- breadcrumb -->

    <main id="main" class="site-main">
      <?php
            while (have_posts()): the_post();

              get_template_part('template-parts/content');

            endwhile; // End of the loop.
            ?>
    </main><!-- #main -->

    <section class="post__aside">

      <div class="row">
        <div class="col-12">
          <hr>
          <h3>Curtiu? Você vai curtir essas também!</h3>
        </div> <!-- col-12 -->
      </div> <!-- row -->

      <?php tool_box_related_posts(); ?>

    </section>
  </div> <!-- container -->
</div><!-- #primary -->

<?php
get_footer();
