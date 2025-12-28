<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function donacion_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_layout_2_switch', true );
    $footer_style_3_switch = get_theme_mod( 'footer_layout_2_switch', true );

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'donacion' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="blog_sidebar_wrapper pl-15 mb-40 %2$s"><div class="sidebar_widget has_border about_widget mb-40">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="sidebar_title"><h3 class="sidebar_title_text has_border">',
        'after_title'   => '</h3></div>',
    ] );

    /**
     * blog sidebar
     */
    if(class_exists("TP_Core")) :
    register_sidebar( [
        'name'          => esc_html__( 'Services Sidebar', 'donacion' ),
        'id'            => 'tp-services-sidebar',
        'before_widget' => '<div id="%1$s" class="tp-service-widget-item tp-service-widget-tab mb-40 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="tp-service-widget-title">',
        'after_title'   => '</h3>',
    ] );
    endif;


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'donacion' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'donacion' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer_widget footer_news mb-50 tp-footer-col-'.$num.' mb-50 %2$s"> ',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="footer_widget_title mb-25"><h3 class="footer_title footer_title_2">',
            'after_title'   => '</h3> </div>',
        ] );
    }

    // footer 2
    if ( $footer_style_2_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'donacion' ), $num ),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'donacion' ), $num ),
                'before_widget' => '<div id="%1$s" class="footer_widget footer_news mb-50 tp-footer-col-'.$num.' mb-50 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="footer_widget_title mb-25"><h3 class="footer_title footer_title_2">',
                'after_title'   => '</h3> </div>',
            ] );
        }
    }    
  
    // footer 3
    if ( $footer_style_3_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'donacion' ), $num ),
                'id'            => 'footer-3-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'donacion' ), $num ),
                'before_widget' => '<div id="%1$s" class="tp-footer-widget tp-footer-3-col-'.$num.' mb-50 %2$s"> <div class="tp-footer-widget-content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="tp-footer-widget-title">',
                'after_title'   => '</h3>',
            ] );
        }
    }    
}
add_action( 'widgets_init', 'donacion_widgets_init' );