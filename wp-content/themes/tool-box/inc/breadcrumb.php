<?php

/**
 * custom breadcrumb
 *
 *
 * @package Tool_Box
 */

function tool_box_breadcrumb() {
  $title = get_the_title();
  global $post;
  echo '<ul>';
  echo '<li><a href="';
  echo get_option('home');
  echo '">';
  echo 'Tool Box';
  echo '</a></li><li class="post-path__separador"> / </li>';
  if (is_category() || is_single()) {
      echo '<li>';
      if(get_post_type( get_the_ID() ) === 'receita'){
        echo '<a href="'.get_site_url(null, '/receita/').'">Receitas</a>';
        echo ' </li><li> ';
      }else{
        the_category(' </li><li class="post-path__separador"> / </li><li> ');
      }

      if (is_single()) {
          echo '</li><li class="post-path__separador"> / </li><li>';
          the_title();
          echo '</li>';
      }
  } elseif (is_page()) {
      if($post->post_parent){
          $anc = get_post_ancestors( $post->ID );
          $title = get_the_title();
          foreach ( $anc as $ancestor ) {
              $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="post-path__separador">/</li>';
          }
          echo $output;
          echo ''.$title.'';
      } else {
          echo '<li> '.get_the_title().'</li>';
      }
  }else{
    echo '<li> '.$title.'</li>';
  }
  echo '</ul>';
}
