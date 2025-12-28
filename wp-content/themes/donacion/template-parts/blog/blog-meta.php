<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package donacion
 */

$categories = get_the_terms( $post->ID, 'category' );
$donacion_blog_date = get_theme_mod( 'donacion_blog_date', true );
$donacion_blog_comments = get_theme_mod( 'donacion_blog_comments', true );
$donacion_blog_author = get_theme_mod( 'donacion_blog_author', true );
$donacion_blog_cat = get_theme_mod( 'donacion_blog_cat', false );

?>

<div class="blog_meta has_border_top">
                <a href="#" class="eye sep"><i class="fal fa-eye"></i> <?php echo get_post_meta( get_the_ID(), 'tp_post_views', true ) ?: 0; ?> Views</a>

                <?php if ( !empty($donacion_blog_comments) ): ?>
                <a href="<?php comments_link();?>" class="comments sep"><i class="fal fa-comments"></i><?php comments_number();?></a>
                <?php endif; ?>

                <?php if ( !empty($donacion_blog_date) ): ?>
                <a href="#" class="calendar"><i class="fal fa-calendar-alt"></i><?php the_time( get_option('date_format') ); ?></a>
                 <?php endif; ?>
            </div>
