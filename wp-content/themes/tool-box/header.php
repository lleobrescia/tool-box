<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tool_Box
 */

?>
<!doctype html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?> >
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?> >
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
  <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body <?php body_class(); ?>>
  <script>
  jQuery(document).ready(function() {
    //Menu mobile
    jQuery("#button-menu-mobile").on("click", function() {
      jQuery("body").addClass("sidebar-active");
    });
    jQuery("#close-sidebar-nav").on("click", function() {
      jQuery("body").removeClass("sidebar-active");
    });

    // Fixed header
    window.addEventListener("scroll", function(event) {
      var top = this.scrollY;

      if(top >=286){
        jQuery(".top--desktop").addClass('top--fixed');
      }else if(top < 286){
        jQuery(".top--desktop").removeClass('top--fixed');
      }

    }, false);
  });
  </script>
  <div id="close-sidebar-nav" class="close-sidebar-nav"></div>
  <?php tool_box_custom_menu('menu-1', 'sidebar'); ?>

  <div id="page" class="site">

    <header id="masthead" class="site-header">
      <div class="container">
        <section class="row top top--desktop">

          <div class="top-icons">
            <ul class="top-icons__social">
              <li>
                <a href="http://" target="_blank" rel="noopener noreferrer">
                  <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-face.svg"
                    onmouseover="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-face-hover.svg'"
                    onmouseout="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-face.svg'"
                    alt="<?php bloginfo('name'); ?> - Facebook">
                </a>
              </li>
              <li>
                <a href="http://" target="_blank" rel="noopener noreferrer">
                  <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-instagram.svg"
                    onmouseover="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-instagram-hover.svg'"
                    onmouseout="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-instagram.svg'"
                    alt="<?php bloginfo('name'); ?> - Instagram">
                </a>
              </li>
              <li>
                <a href="http://" target="_blank" rel="noopener noreferrer">
                  <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-youtube.svg"
                    onmouseover="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-youtube-hover.svg'"
                    onmouseout="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-youtube.svg'"
                    alt="<?php bloginfo('name'); ?> - Youtube">
                </a>
              </li>
              <li>
                <a href="http://" target="_blank" rel="noopener noreferrer">
                  <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-pinterest.svg"
                    onmouseover="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-pinterest-hover.svg'"
                    onmouseout="this.src='<?= get_stylesheet_directory_uri(); ?>/images/ic-pinterest.svg'"
                    alt="<?php bloginfo('name'); ?> - Pinterest">
                </a>
              </li>
            </ul>

            <div class="top-icons__links">
              <a href="">Quem somos</a>
              <span>/</span>
              <a href="">Contato</a>
            </div> <!-- top-icons__links -->

          </div> <!-- top-icons -->

          <div class="col-12 logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php bloginfo('name'); ?>">
              <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/tool-box.png"
                alt="<?php bloginfo('name'); ?>">
            </a>
          </div> <!-- logo -->

          <div class="col-12 menu">
            <?php
                        tool_box_custom_menu('menu-1', 'navbar');
                        get_search_form();
                        ?>
          </div> <!-- menu -->

        </section> <!-- top--desktop -->

        <section class="row top top--mobile">
          <div class="col-12">
            <div class="mobile-header">
              <div id="button-menu-mobile" class="menu-icon">
                <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-menu.svg" alt="Menu">
              </div>
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php bloginfo('name'); ?>">
                  <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/tool-box.png"
                    alt="<?php bloginfo('name'); ?>">
                </a>
              </div>
              <div class="icons-mobile">
                <ul class="top-icons__social">
                  <li>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                      <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-face-white.svg"
                        alt="<?php bloginfo('name'); ?> - Facebook">
                    </a>
                  </li>
                  <li>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                      <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-instagram-white.svg"
                        alt="<?php bloginfo('name'); ?> - Instagram">
                    </a>
                  </li>
                  <li>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                      <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-youtube-white.svg"
                        alt="<?php bloginfo('name'); ?> - Youtube">
                    </a>
                  </li>
                  <li>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                      <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/ic-pinterest-white.svg"
                        alt="<?php bloginfo('name'); ?> - Pinterest">
                    </a>
                  </li>
                </ul>

                <div class="mobile-header__links">
                  <a href="">Quem somos</a>
                  <a href="">Contato</a>
                </div> <!-- mobile-header__links -->

              </div> <!-- icons-mobile -->
            </div> <!-- mobile-header -->
          </div> <!-- col-12 -->
        </section> <!-- top--mobile -->
      </div> <!-- container -->
    </header><!-- #masthead -->
