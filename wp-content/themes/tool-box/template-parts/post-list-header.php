<?php
/**
 * Template part for displaying post header
 *
 *
 * @package Tool_Box
 */

$category = null;

if(get_post_type( get_the_ID() )=== 'receita'){
  $category = null;
}else{
  $category = get_the_category();
}
$banner   = get_field("banner", "category_" . $category[0]->term_id);
$banner_mobile   = get_field("banner_mobile", "category_" . $category[0]->term_id);
if($category):
?>
<style>
.categoria__banner {
  background-image: url('<?= $banner_mobile['url'] ?>');
  height: 191px;
}

@media (min-width: 481px) {
  .categoria__banner {
    background-image: url('<?= $banner['url'] ?>');
    height: 227px;
  }
}
</style>
<header class="categoria__banner">

  <h1 class="categoria__title"><?=  $category[0]->name; ?></h1>

</header>
<?php endif; ?>
