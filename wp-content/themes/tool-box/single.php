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
<div id="fb-root"></div>
<script async defer
  src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2&appId=261860337652460&autoLogAppEvents=1">
</script>

<section id="primary" class="content-area">
  <div class="container">
    <div class="post-path">
      <hr>
      <?php tool_box_breadcrumb() ?>
    </div><!-- breadcrumb -->

    <main id="main" class="site-main">
      <?php
        while (have_posts()): the_post();

        if(get_post_type( get_the_ID() )=== 'receita'){
          get_template_part('template-parts/content', 'receita');
        }else{
          get_template_part('template-parts/content');
        }

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

      <?php
        if(get_post_type( get_the_ID() )=== 'receita')
          tool_box_related_posts(true);
        else
          tool_box_related_posts(false);
      ?>

      <section class="row">
        <div class="comentarios">
          <div class="fb-comments" data-width="100%" data-href="<?= esc_url(get_the_permalink()); ?>" data-numposts="5">
          </div>
        </div> <!-- comentarios -->
      </section> <!-- row -->

    </section>
  </div> <!-- container -->
  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
  </div><!-- #primary -->

  <?php
get_footer();
