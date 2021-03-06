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
<style>
.categoria__banner {
  background-image: url('<?= get_receita_banner(true) ?>');
  height: 191px;
}

@media (min-width: 481px) {
  .categoria__banner {
    background-image: url('<?= get_receita_banner() ?>');
    height: 227px;
  }
}
</style>
<div id="primary" class="content-area receitas">
  <header class="categoria__banner">
  <h1 class="categoria__title">Receitas</h1>
  </header>
  <main id="main" class="site-main">
    <div class="container">
      <div class="row">
        <?php
          $args = array(
            'taxonomy'  => 'categoria'
          );

          $cats = get_categories($args);
          foreach($cats as $cat):
          $link = get_category_link( $cat->term_id);
          $img   = get_field("imagem", "categoria_" . $cat->term_id);
        ?>
        <div class="col-sm-6 col-md-4">
          <div class="receitas-single">
            <a href="<?= $link; ?>" title="<?= $cat->name ?>"></a>
            <h3 class="receitas-single__title">
              <span>
                <?= $cat->name; ?>
              </span>
            </h3>
            <figure>
              <img src="<?= $img['url'] ?>" alt="<?= $cat->name ?>">
            </figure>

          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main><!-- #main -->

  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
</div><!-- #primary -->

<?php

get_footer();
