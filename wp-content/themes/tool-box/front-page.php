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

$banner       = get_field('banner');
$categories   = get_field('categorias');
$category = $categories[0];

var_dump($categories);
?>
<div id="content" class="site-content">

  <div class="post-list container">
    <?php
      query_posts(array(
        'category_name' => $category->slug,
        'posts_per_page' => 3
      ));
    ?>
    <div class="row">
      <div class="col-12">
        <h2><?= $category->name; ?></h2>
      </div>
    </div>

    <div class="row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-4">
        <?php post_preview(get_the_title(), get_the_permalink(), get_the_post_thumbnail( get_the_ID(), 'full')); ?>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <?php wp_reset_query(); ?>

  </div>
</div><!-- #content -->
<?php
get_footer();
