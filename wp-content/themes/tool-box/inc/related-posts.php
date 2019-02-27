<?php
/**
 * Rekated posts by category
 *
 *
 * @package Tool_Box
 */

function tool_box_related_posts($is_eceita)
{
  $orig_post = $post;
  global $post;
  $categories = get_the_category($post->ID);

  if ($is_eceita)
  $categories = get_the_terms($post->ID, 'categoria');



  if ($categories) {
    $category_ids = array();
    foreach ($categories as $individual_category)
    $category_ids[] = $individual_category->term_id;

    $args = array(
      'category__in' => $category_ids,
      'post__not_in' => array(
        $post->ID
      ),
      'posts_per_page' => 3, // Number of related posts that will be shown.
      'caller_get_posts' => 1
    );

    if ($is_eceita)
    $args = array(
      'post__not_in' => array(
        $post->ID
      ),
      'post_type' => 'receita',
      'posts_per_page' => 3, // Number of related posts that will be shown.
      'caller_get_posts' => 1
    );

    $my_query = new wp_query($args);
    if ($my_query->have_posts()) {
      echo '<div class="related-posts row">';
      while ($my_query->have_posts()) {
        $my_query->the_post();
        ?>

<div class="related-posts__single col-4">
  <?php tool_box_post_preview(get_the_title(), get_the_permalink(), get_the_post_thumbnail()); ?>
</div><!-- related-posts__single -->
<?php

}
echo '</div>';
}
}
$post = $orig_post;
wp_reset_query();
}
