<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package donacion
 */

 $donacion_video_url = function_exists('tpmeta_field')? tpmeta_field('donacion_post_video') : '';
 $categories = get_the_terms( $post->ID, 'category' );
$donacion_blog_cat = get_theme_mod( 'donacion_blog_cat', false );
$donacion_singleblog_social = get_theme_mod( 'donacion_singleblog_social', false );
$social_shear_col= $donacion_singleblog_social ? "col-lg-7 col-md-7" : "col-xl-12 col-md-12 col-lg-12";

if ( is_single() ): 
?> 

<article id="post-<?php the_ID();?>" <?php post_class( 'postbox__item tp-postbox-item-wrapper mb-80 format-image' );?>>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="tp-postbox-thumb p-relative mb-25">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
        </a>
        <?php if ( !empty($donacion_video_url) ): ?>
        <div class="tp-postbox-thumb-btn">
            <a class="play-btn popup-video" href="<?php echo esc_url($donacion_video_url); ?>"><i
                    class="fa-solid fa-play"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <!-- blog meta -->
    <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>

    <h3 class="tp-postbox-title2"><?php the_title();?></h3>
    <?php the_content();?>
        <?php
            wp_link_pages( [
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'donacion' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ] );
        ?>
    <div class="tp-postbox-share-wrapper">
        <div class="row">
            <div class=" <?php echo esc_attr($social_shear_col); ?>">
                <?php echo donacion_get_tag(); ?>
            </div>
            <?php donacion_blog_social_share() ?>
        </div>
    </div>
</article>

<?php else: ?>

     <div id="post-<?php the_ID();?>" <?php post_class( 'blog_video_wrapper mb-40 format-video' );?> >
        <?php if ( has_post_thumbnail() ): ?>
        <div class="blog_image">
            <a href="<?php the_permalink();?>" class="w_img"> <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?></a>

            <?php if ( !empty($donacion_video_url) ): ?>
            <a href="<?php echo esc_url($donacion_video_url); ?>" class="video_play has_abs"><i class="fal fa-play"></i></a>
            <?php endif; ?>

            <div class="admin_meta has_abs">
                <?php if ( !empty($donacion_blog_cat) ): ?>
                    <?php if ( !empty( $categories[0]->name ) ): ?>
                 <a class="blog_cat" href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"> 
                            <?php echo esc_html($categories[0]->name); ?>
                        </a> 
               
                    <?php endif;?>
                    <?php endif;?>

                    
               <?php if ( !empty($donacion_blog_author) ): ?>
                <div class="blog_admin">
                    <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', '', array(
                            'class' => 'author-img'
                        ) ); ?> </a>
                    <a href="volunteer-details.html" class="admin_by">By <?php print get_the_author();?></a>
                </div>
                 <?php endif;?>
            </div>
        </div>
         <?php endif; ?>

        <div class="blog_content">
            <h4 class="blog_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <p><?php the_excerpt();?></p>

            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
            
        </div>
    </div>


<?php
endif;?>