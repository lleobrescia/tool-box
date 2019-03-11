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
        <?= do_shortcode('[ajax_load_more post_type="receita" posts_per_page="9" scroll="false" button_label="mais postagens" button_loading_label="Carregando..." taxonomy="categoria" taxonomy_terms="'.$category[0]->slug.'" taxonomy_operator="IN"] '); ?>
      </div> <!-- row -->
    </div> <!-- container -->
  </main><!-- #main -->

  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
</div><!-- #primary -->

<?php

get_footer();
