<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tool_Box
 */

get_header();
?>

<section id="primary" class="content-area">
  <main id="main" class="site-main">

    <div class="container">
      <div class="post-path">
        <hr>
      </div><!-- breadcrumb -->
      <?php if (have_posts()) : ?>

      <header class="page-header">
        <h1 class="search__title">
          <?php
          /* translators: %s: search query. */
          printf(esc_html__('Resultados da busca para: %s', 'tool-box'), '<span>' . get_search_query() . '</span>');
            ?>
        </h1>
      </header><!-- .page-header -->
      <div class="row">
        <?= do_shortcode('[ajax_load_more scroll="false" button_label="mais postagens" button_loading_label="Carregando..." post_type="post, receita" posts_per_page="9" search="'.get_search_query().'"]'); ?>
      </div> <!-- row -->
      <?php endif; ?>
    </div> <!-- container -->

  </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
