<?php
/**
 * The template for displaying categories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

get_header();
$category = null;

if(get_post_type( get_the_ID() )=== 'receita'){
  $category = get_the_terms($post->ID, 'categoria');
}else{
  $category = get_the_category();
}

$banner   = get_field("banner", "category_" . $category[0]->term_id);
?>

<div id="primary" class="content-area categoria">
  <header class="categoria__banner">
    <h1 class="categoria__title"><?= $category[0]->name ?></h1>
    <figure>
      <img src="<?= $banner['url'] ?>" alt="<?= $category[0]->name ?>">
    </figure>
  </header>
  <main id="main" class="site-main">
    <div class="container">
      <div class="row">
        <?php if ( have_posts() ) : ?>
        <?php
          while ( have_posts() ) :
            the_post();
        ?>
        <div class="col-sm-6 col-md-4">
          <?php  tool_box_post_preview(get_the_title(), get_the_permalink(), get_the_post_thumbnail()); ?>
        </div>
        <?php
          endwhile;
          endif;
          ?>
      </div>
    </div>
  </main><!-- #main -->

  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
</div><!-- #primary -->

<?php

get_footer();
