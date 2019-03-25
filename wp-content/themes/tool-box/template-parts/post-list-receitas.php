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
        <h2 class="post-list__title">
          <a href="<?php echo esc_url(home_url('/receita')); ?>">Receitas</a>
        </h2>
      </div>
    </div>

    <div class="row bxslider">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-md-4" data-link="<?=get_the_permalink();?>">
        <?php tool_box_post_preview(get_the_title(), get_the_permalink(), get_the_post_thumbnail( get_the_ID(), 'full')); ?>
      </div> <!-- col-md-4 -->
      <?php endwhile; endif; ?>
    </div> <!-- bxslider -->

    <div class="row">
      <div class="col-12">
        <div class="see-more text-right">
          <hr class="see-more__hr">
          <a href="<?php echo esc_url(home_url('/receita')); ?>" class="see-more__link">ver mais receitas &#62;</a>
        </div> <!-- see-more -->
      </div> <!-- col-12 -->
    </div> <!-- row -->
  </div> <!-- container -->
</div> <!-- post-list -->
