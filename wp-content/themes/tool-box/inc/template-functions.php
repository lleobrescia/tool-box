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
