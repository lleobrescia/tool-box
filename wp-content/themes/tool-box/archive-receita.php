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

<div id="primary" class="content-area receitas">
  <header class="categoria__banner" style="background-image: url('<?= $banner['url'] ?>')">
    <div class="title-wrapper">
      <div class="title-wrapper__hr">
        <hr class="float-right">
      </div>

      <h1 class="categoria__title">
        Receitas
      </h1>

      <div class="title-wrapper__hr">
        <hr>
      </div>
    </div> <!-- title-wrapper -->
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
