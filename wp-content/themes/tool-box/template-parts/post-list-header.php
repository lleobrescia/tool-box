<?php
/**
 * Template part for displaying post header
 *
 *
 * @package Tool_Box
 */

$category = null;

if(get_post_type( get_the_ID() )=== 'receita'){
  $category = get_the_terms($post->ID, 'categoria');
}else{
  $category = get_the_category();
}
$banner   = get_field("banner", "category_" . $category[0]->term_id);
if($category):
?>
<header class="categoria__banner" style="background-image: url('<?= $banner['url'] ?>')">
  <div class="title-wrapper">
    <div class="title-wrapper__hr">
      <hr class="float-right">
    </div>

    <h1 class="categoria__title">
      <?= $category[0]->name ?>
    </h1>

    <div class="title-wrapper__hr">
      <hr>
    </div>
  </div> <!-- title-wrapper -->
</header>
<?php endif; ?>
