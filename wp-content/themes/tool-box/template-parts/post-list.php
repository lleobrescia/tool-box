<?php
/**
 * Template part for displaying post preview list
 *
 *
 * @package Tool_Box
 */

?>
<div class="post-list">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <h2 class="post-list__title"><?= $category->name; ?></h2>
      </div>
    </div>

    <div class="row bxslider">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-md-4 ">
        <?php post_preview(get_the_title(), get_the_permalink(), get_the_post_thumbnail( get_the_ID(), 'full')); ?>
      </div> <!-- col-md-4 -->
      <?php endwhile; endif; ?>
    </div> <!-- bxslider -->

    <div class="row">
      <div class="col-12">
        <div class="see-more text-right">
          <hr class="see-more__hr">
          <?php $category_link = get_category_link($category->term_id); ?>
          <a href="<?= $category_link; ?>" class="see-more__link">ver mais <?= strtolower($category->name); ?> &#62;</a>
        </div> <!-- see-more -->
      </div> <!-- col-12 -->
    </div> <!-- row -->
  </div> <!-- container -->
</div> <!-- post-list -->
