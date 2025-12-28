<?php
/**
 * The main template file
 *
 * @package donacion
 */

get_header();

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;
?>

<div class="blog_details_area pt-120 pb-80">
    <div class="container">
        <div class="row">

            <!-- BLOG CONTENT -->
            <div class="col-xxl-<?php echo esc_attr( $blog_column ); ?>
                        col-xl-<?php echo esc_attr( $blog_column ); ?>
                        col-lg-<?php echo esc_attr( $blog_column ); ?>">

                <div class="blog_area mb-40">

                    <?php if ( have_posts() ) : ?>

                        <?php if ( is_home() && ! is_front_page() ) : ?>
                            <header>
                                <h1 class="page-title postbox__title screen-reader-text">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                        <?php endif; ?>

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             */
                            get_template_part(
                                'template-parts/content',
                                get_post_format()
                            );

                        endwhile;
                        ?>

                        <!-- PAGINATION -->
                        <div class="page_pagination text-center mt-10">
                            <?php
                            donacion_pagination(
                                '<i class="fal fa-chevron-double-left"></i>',
                                '<i class="fal fa-chevron-double-right"></i>',
                                '',
                                [ 'class' => '' ]
                            );
                            ?>
                        </div>

                    <?php else : ?>

                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>

                </div>
            </div>

            <!-- SIDEBAR -->
            <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                <div class="col-xxl-4 col-xl-4 col-lg-5">
                    <div class="blog_sidebar_wrapper pl-15 mb-40">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
