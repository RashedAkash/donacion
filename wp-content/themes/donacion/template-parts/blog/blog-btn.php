<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package donacion
 */

$donacion_blog_btn = get_theme_mod( 'donacion_blog_btn', 'Read More' );
$donacion_blog_btn_switch = get_theme_mod( 'donacion_blog_btn_switch', true );

?>
<?php if ( !empty( $donacion_blog_btn_switch ) ): ?>
<div class="tp-postbox-read-more">
    <a href="<?php the_permalink();?>" class="tp-postbox-btn"><i class="fa-solid fa-arrow-right"></i> <?php print esc_html( $donacion_blog_btn );?></a>
</div>
<?php endif;?>