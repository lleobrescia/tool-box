<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Tool_Box
 */


/**
 * Adds post preview layout
 *
 * @param string $title
 * @param string $link
 * @param object $img
 * @return string
 */
function tool_box_post_preview($title, $link, $img)
{
  echo '<section class="post-preview">
  <a href="' . $link . '" class="post-preview__link" rel="next" title="' . $title . '"></a>
  <figure class="post-preview__figure">
    ' . $img . '
  </figure>
  <h3 class="post-preview__title">' . $title . '</h3>
</section>';
}


function get_social_link($rede) {
  $redes_sociais = get_field('links_das_redes_sociais', 'option');

  switch($rede){
    case 'facebook':
    return $redes_sociais['facebook'];
    break;

    case 'instagram':
    return $redes_sociais['instagram'];
    break;

    case 'youtube':
    return $redes_sociais['youtube'];
    break;

    case 'pinterest':
    return $redes_sociais['pinterest'];
    break;

    default:
    break;
  }
}

function get_contato_page() {
  $page = get_field('links_das_paginas', 'option');

  if($page['tipo_de_link_do_contato'] === 'Externo'){
    return $page['link_contato'];
  }

  return get_permalink($page['pagina_contato']);
}

function get_quem_somos_page() {
  $page = get_field('links_das_paginas', 'option');

  if($page['tipo_de_link_do_quem_somos'] === 'Externo'){
    return $page['link_quem_somos'];
  }

  return get_permalink($page['pagina_quem_somos']);
}


function get_loja_link() {
  $page = get_field('links_das_paginas', 'option');

  return $page['link_loja_virtual'];
}

function get_receita_banner($isMobile = false) {
  $page = get_field('receitas', 'option');

  if($isMobile){
    return $page['banner_receitas_mobile']['url'];
  }

  return $page['banner_receitas']['url'];
}
