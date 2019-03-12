<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tool_Box
 */

?>

<footer id="colophon" class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="site-footer__info">
          <img class="site-footer__logo" src="<?= get_stylesheet_directory_uri(); ?>/images/tool-box.png"
            alt="<?php bloginfo('name'); ?>">

          <div>
            <div class="site-footer__social">
              <a href="<?= get_social_link('instagram'); ?>" target="_blank" rel="noopener noreferrer">
                instagram
              </a> /
              <a href="<?= get_social_link('facebook'); ?>" target="_blank" rel="noopener noreferrer">
                facebook
              </a> /
              <a href="<?= get_social_link('youtube'); ?>" target="_blank" rel="noopener noreferrer">
                youtube
              </a> /
              <a href="<?= get_social_link('pinterest'); ?>" target="_blank" rel="noopener noreferrer">
                pinterest
              </a>
            </div> <!-- site-footer__social -->

            <div class="site-footer__link">
              <a href="<?= get_quem_somos_page(); ?>" target="_blank" rel="noopener noreferrer">QUEM SOMOS</a> |
              <a href="<?= get_contato_page(); ?>" target="_blank" rel="noopener noreferrer">CONTATO</a> |
              <a href="<?= get_loja_link(); ?>" target="_blank" rel="noopener noreferrer">LOJA VIRTUAL</a>
            </div> <!-- site-footer__link -->

            <p class="site-footer__copy">
              TODOS OS DIREITOS RESERVADOS &copy;
            </p>
          </div>

        </div> <!-- site-footer__info -->
      </div> <!-- col-12 -->
    </div> <!-- row -->

    <a href="http://joaquimrodrigues.com.br/" target="_blank" rel="noopener noreferrer" title="Joaquim Rodriguês" class="float-right">
      <img src="<?= get_stylesheet_directory_uri(); ?>/images/joaquim_rodrigues.png"
        alt="Joaquim Rodriguês" style="margin: 10px 0;max-width: 34px;">
    </a>
  </div> <!-- container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<div style="display:none">
  Theme Tool Box by <a target="_blank" rel="noopener noreferrer" href="https://leobrescia.com.br/"
    title="Leo Brescia">Leo Brescia</a>
</div>
<?php wp_footer(); ?>

</body>

</html>
