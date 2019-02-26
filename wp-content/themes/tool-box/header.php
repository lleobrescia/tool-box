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
  <div id="page" class="site">

    <header id="masthead" class="site-header">
      <div class="container">
        <div class="row top top--desktop">

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
              tool_box_custom_menu('menu-1');
              get_search_form();
            ?>
          </div> <!-- menu -->

        </div> <!-- top--desktop -->
      </div> <!-- container -->
    </header><!-- #masthead -->
