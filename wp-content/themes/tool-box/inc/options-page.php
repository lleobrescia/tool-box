<?php

/**
 * Custom options page for admin menu
 *
 * Use Advanced Custom Fields Plugin
 *
 * @link https://www.advancedcustomfields.com/resources/options-page/
 *
 * @package Tool_Box
 */

function tool_box_acf_init()
{
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
      'page_title'  => __('Theme Information', 'tool-box'),
      'menu_title'  => __('Theme Information', 'tool-box'),
      'menu_slug'   => 'information',
      'capability'  => 'edit_posts'
    ));
  }
}


add_action('acf/init', 'tool_box_acf_init');
