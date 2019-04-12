<?php
/**
 * The template for displaying categories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

get_header();

$termid = get_queried_object()->term_id;
$term = get_term( $termid, 'categoria' );
?>

<div id="primary" class="content-area categoria">

  <?php
    include(locate_template('template-parts/post-list-header.php', false, false));
  ?>
  <main id="main" class="site-main">
    <div class="container">
      <div class="row">
        <div class="col">
        <div class="post-path">
          <hr>
          <ul>
            <li>
              <a href="http://localhost/tool-box">Tool Box</a>
            </li>
            <li class="post-path__separador"> / </li>
            <li>
              <a href="<?= get_site_url(null, '/receita/'); ?>">Receitas</a>
            </li>

            <li class="post-path__separador"> / </li>
            <li><?= $term->name ?></li>
          </ul>
        </div><!-- breadcrumb -->
        </div>
      </div>
      <div class="row">
        <?= do_shortcode('[ajax_load_more post_type="receita" posts_per_page="9" scroll="false" button_label="mais postagens" button_loading_label="Carregando..." taxonomy="categoria" taxonomy_terms="'.$category[0]->slug.'" taxonomy_operator="IN"] '); ?>
      </div> <!-- row -->
    </div> <!-- container -->
  </main><!-- #main -->

  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
</div><!-- #primary -->

<?php

get_footer();
