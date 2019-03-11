<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tool_Box
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <section class="error-404 not-found">
      <div class="container">
      <div class="post-path">
        <hr>
      </div><!-- breadcrumb -->
        <div class="row">
          <header class="page-header col-12">
            <h1 class="not-found__title"><?php esc_html_e( 'Página não encontrada.', 'tool-box' ); ?></h1>
          </header><!-- .page-header -->
        </div>
      </div>
    </section><!-- .error-404 -->

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
