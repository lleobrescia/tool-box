<?php
/**
 * Sample implementation of a menu list
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Tool_Box
 */

/**
 * Set up the theme menu list.
 *
 * @uses tool_box_custom_menu()
 */

function tool_box_custom_menu($theme_location, $menu_class)
{
  if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
    $menu_list  = '<nav class="'.$menu_class.'">' . "\n";
    $menu_list  .= '<ul class="'.$menu_class.'-nav">' . "\n";

    $menu       = get_term($locations[$theme_location], 'nav_menu');
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    foreach ($menu_items as $menu_item) {
      if ($menu_item->menu_item_parent == 0) {

        $parent     = $menu_item->ID;
        $menu_array = array();

        foreach ($menu_items as $submenu) {
          if ($submenu->menu_item_parent == $parent) {
            $bool = true;
            $menu_array[] = '<li class="'.$menu_class.'-nav__item"><a class="'.$menu_class.'-nav__link" title="' . $submenu->title . '" href="' . $submenu->url . '">' . $submenu->title . '</a></li>' . "\n";
          }
        }
        if ($bool == true && count($menu_array) > 0) {

          $menu_list .= '<li class="'.$menu_class.'-nav__item--dropdown '.$menu_class.'-nav__item">' . "\n";
          $menu_list .= '<a href="' . $menu_item->url . '" class=" '.$menu_class.'-nav__link" >' . $menu_item->title . '</a>' . "\n";

          $menu_list .= '<ul class="dropdown-menu">' . "\n";
          $menu_list .= implode("\n", $menu_array);
          $menu_list .= '</ul>' . "\n";
        } else {

          $menu_list .= '<li class="'.$menu_class.'-nav__item">' . "\n";
          $menu_list .= '<a class="'.$menu_class.'-nav__link"  title="' . $menu_item->title . '" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' . "\n";
        }
      }

      $menu_list .= '</li>' . "\n";
    }

    $menu_list .= '</ul>';
    $menu_list .= '</nav>' . "\n";
  } else {
    $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
  }

  echo $menu_list;
}
