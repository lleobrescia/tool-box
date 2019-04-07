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
if($category):
?>
<header class="categoria__banner" style="background-image: url('<?= $banner['url'] ?>')">
</header>
<?php endif; ?>
