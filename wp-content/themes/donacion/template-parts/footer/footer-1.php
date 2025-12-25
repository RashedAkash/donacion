<?php 

/**
 * Template part for displaying footer layout three
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package donacion
*/


    $donacion_footer_logo = get_theme_mod( 'donacion_footer_logo' );
    $donacion_footer_top_space = function_exists('tpmeta_field') ? tpmeta_field('donacion_footer_top_space') : '0';
    $donacion_copyright_center = $donacion_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    
    $footer_copyright_switch = get_theme_mod( 'footer_copyright_switch', true );
    $footer_bottom_copyright_area_switch = get_theme_mod( 'footer_bottom_copyright_area_switch', true );

    // theme
    $footer_bg_img = get_theme_mod( 'footer_bg_image' );
    $footer_bg_color = get_theme_mod( 'footer_bg_color', '#16243e' );
    $theme_bg = $footer_bg_img ? "background-image:url({$footer_bg_img});" : "background-color:{$footer_bg_color};";

    // page
    $donacion_footer_bg_image = function_exists('tpmeta_image_field')? tpmeta_image_field('donacion_footer_bg_image') : '';
    $donacion_footer_bg_color = function_exists('tpmeta_field')? tpmeta_field('donacion_footer_bg_color') : '';
    $validate_color = $donacion_footer_bg_color != '' ? $donacion_footer_bg_color : $footer_bg_color;
    $page_bg = $donacion_footer_bg_image ? "background-image:url({$donacion_footer_bg_image['url']});" : "background-color:{$validate_color};";
    $main_bg = $page_bg != '' ? $page_bg : $theme_bg;

    // Email id 
   $header_top_email = get_theme_mod( 'header_email', __( 'donacion@support.com', 'donacion' ) );

    // Phone Number
   $header_top_phone = get_theme_mod( 'header_phone', __( '+88 01310-069824', 'donacion' ) );
   $footer_bottom_menu = get_theme_mod( 'footer_bottom_menu', __( '#', 'donacion' ) );


    // footer area links  switch
    $footer_area_links_switch = get_theme_mod( 'footer_area_links_switch', false );
    // footer area links 
    $footer_area_links = get_theme_mod( 'footer_area_links', __( '#', 'donacion' ) );

    $footer_social_switch = get_theme_mod( 'footer_social_switch', false );

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    for ( $num = 1; $num <= $footer_widgets + 1; $num++ ) {
        if ( is_active_sidebar( 'footer-' . $num ) ) {
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-xl-3 col-lg-4 col-md-6 col-sm-6';
        $footer_class[2] = 'col-xl-3 col-lg-2 col-md-6 col-sm-6';
        $footer_class[3] = 'col-xl-3 col-lg-3 col-md-6 col-sm-6';
        $footer_class[4] = 'col-xl-3 col-lg-3 col-md-6 col-sm-6';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
    }

?>
<!-- footer area start -->
<footer class="tp-footer-area-2 p-relative z-index-1" style="<?php echo esc_attr($main_bg); ?>">
<?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
    <div class="tp-footer-bg-shape-2">
        <img class="shape-1" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/footer/home-2/shape-1.png"
            alt="">
        <img class="shape-2" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/footer/home-2/shape-2.png"
            alt="">
    </div>
    <div class="tp-footer-main-area tp-footer-border pt-110">
        <div class="container">
            <div class="row">
                <?php
                    if ( $footer_columns < 5 ) {
                    print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-1' );
                    print '</div>';

                    print '<div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-2' );
                    print '</div>';

                    print '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-3' );
                    print '</div>';

                    print '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">';
                    dynamic_sidebar( 'footer-4' );
                    print '</div>';
                    } else {
                        for ( $num = 1; $num <= $footer_columns; $num++ ) {
                            if ( !is_active_sidebar( 'footer-' . $num ) ) {
                                continue;
                            }
                            print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                            dynamic_sidebar( 'footer-' . $num );
                            print '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="tp-footer-copyright-area p-relative ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="tp-footer-copyright-inner">
                        <p><?php print donacion_copyright_text(); ?></p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="tp-footer-copyright-inner text-lg-end">
                        <?php echo donacion_kses( $footer_bottom_menu ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
 