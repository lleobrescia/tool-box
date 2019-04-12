<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <h1 class="post__title">
        <?php the_title(); ?>
      </h1>

      <div class="post__content">
        <?php the_content(); ?>
      </div>
    </div> <!-- col-lg-8 -->
  </div> <!-- row -->
</article><!-- #post-<?php the_ID(); ?> -->
