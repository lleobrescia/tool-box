<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

get_header();

$bannerObj    = get_field('banner');
$categories   = get_field('categorias');

$banner = wp_get_attachment_image($bannerObj['id'], 'full');
?>
<div id="content" class="site-content home">
  <section class="home__banner">
    <?= $banner; ?>
  </section>
  <?php
    foreach ($categories as $category) {
      query_posts(array(
        'category_name' => $category->slug,
        'posts_per_page' => 3
      ));

      include(locate_template('template-parts/post-list.php', false, false));

      wp_reset_query();
    }

    get_template_part( 'template-parts/content', 'instagram' );
    ?>

</div><!-- #content -->
<script>
jQuery(document).ready(function() {
  var width = jQuery(window).width();
  jQuery(window).resize(function() {
    var width = jQuery(window).width();
    slider(width);
  });
  slider(width);
});

function slider(width) {
  if (width <= 768) {
    if (window.sldr) {
      window.sldr.destroySlider();
    }
    window.sldr = jQuery('.bxslider').bxSlider({
      preloadImages: 'all',
      controls: false,
      minSlides: 1,
      maxSlides: 1,
      shrinkItems: true,
      mode: 'fade'
    });
  } else {
    window.sldr.destroySlider();
  }
}
</script>
<?php
get_footer();
