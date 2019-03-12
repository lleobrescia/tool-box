<?php
/**
 * The template for displaying categories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

get_header();
?>

<div id="primary" class="content-area categoria">
  <?php
    include(locate_template('template-parts/post-list-header.php', false, false));
  ?>
  <main id="main" class="site-main">
    <div class="container">
      <div class="row">
        <?= do_shortcode('[ajax_load_more post_type="post" posts_per_page="9" scroll="false" button_label="mais postagens" button_loading_label="Carregando..." category="'.$category[0]->slug.'"]'); ?>
      </div> <!-- row -->
    </div> <!-- container -->
  </main><!-- #main -->

  <?php if($category[0]->slug === 'casamento'): ?>
  <?php $casamento = get_field('categoria_casamento', 'option'); ?>
  <div class="row" style="text-align: center;padding-bottom: 70px;padding-top: 70px;">
    <div class="col-12">
      <a href="<?= $casamento['link_para_a_lista_de_casamento']; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= $casamento['banner_lista_de_casamento']['url']; ?>" alt="">
      </a>
    </div>
  </div>
  <?php endif; ?>

  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
</div><!-- #primary -->

<?php

get_footer();
