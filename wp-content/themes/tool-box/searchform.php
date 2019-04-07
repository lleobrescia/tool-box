<?php
/**
 * Template Name: Search Form
 *
 * The template for displaying search form
 *
 * @package Tool_Box
 */
?>

<form class="form-inline search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get" accept-charset="utf-8" id="searchform" role="search">

  <div class="input-group">
    <input class="form-control search-form__input" type="text" name="s" id="s" placeholder="Busca _"
      value="<?php the_search_query(); ?>" />
    <div class="input-group-prepend">
      <button type="submit" class="search-form__btn">
        <img src="<?= get_stylesheet_directory_uri(); ?>/images/ic-search.svg" alt="Buscar">
      </button>
    </div>

  </div>
</form>
