<?php
/**
 * Template part for displaying receita posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tool_Box
 */

$pdf_link = get_field('arquivo_pdf');
$nivel    = get_field('nivel');
$tempo    = get_field('tempo');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <h1 class="post__title">
        <?php the_title(); ?>
      </h1>

      <div class="single-receita__details">
        <?php if($nivel === 'Iniciante'): ?>
        <img src="<?= get_stylesheet_directory_uri(); ?>/images/ic-iniciante.png" alt="">
        <?php elseif($nivel === 'Experiente'): ?>
        <img src="<?= get_stylesheet_directory_uri(); ?>/images/ic-experiente.png" alt="">
        <?php elseif($nivel === 'Chef'): ?>
        <img src="<?= get_stylesheet_directory_uri(); ?>/images/ic-chef.png" alt="">
        <?php endif; ?>
        <span><img src="<?= get_stylesheet_directory_uri(); ?>/images/ic-time.png" alt=""> <?= $tempo; ?></span>
      </div>

      <div class="post__content">
        <?php the_content(); ?>
      </div>

      <div class="text-center">
        <a class="single-receita__button" href="<?= $pdf_link; ?>" target="_blank" rel="noopener noreferrer">
          <img src="<?= get_stylesheet_directory_uri(); ?>/images/ic-print.png" alt="">
          <span>
            Imprima ou baixe o <br>
            pdf com essa receita
          </span>
        </a>
      </div>
    </div> <!-- col-lg-8 -->
  </div> <!-- row -->
</article><!-- #post-<?php the_ID(); ?> -->
