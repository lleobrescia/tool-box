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
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

  <div class="container">
    <header id="masthead" class="site-header">
      <div class="row">
        <div class="col-12 logo">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
            <img class="logo__img" src="<?= get_stylesheet_directory_uri(); ?>/images/tool-box.png" alt="<?php bloginfo( 'name' ); ?>">
          </a>
        </div>
        <div class=" col - 12 ">
        </div>
      </div>
    </header><!-- #masthead -->
  </div>


