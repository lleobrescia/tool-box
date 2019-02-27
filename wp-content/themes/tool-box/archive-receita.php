<?php
/**
 * The template for displaying categories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

get_header();
$category = get_the_category();
$banner   = get_field("banner", "category_" . $category[0]->term_id);
?>

<div id="primary" class="content-area receitas">
  <header class="receitas__banner">
    <h1 class="receitas__title"><?= $category[0]->name ?></h1>
    <figure>
      <img src="<?= $banner['url'] ?>" alt="<?= $category[0]->name ?>">
    </figure>
  </header>
  <main id="main" class="site-main">
    <div class="container">
      <div class="row">
        <?php
          $args = array(
            'taxonomy'  => 'categoria',
            'orderby'   => 'name',
            'order'     => 'ASC'
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
