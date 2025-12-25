<?php

/**
 * donacion_scripts description
 * @return [type] [description]
 */
function donacion_scripts() {

    /**
     * all css files
    */ 

    wp_enqueue_style( 'donacion-fonts', donacion_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', Donacion_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', Donacion_THEME_CSS_DIR.'bootstrap.min.css', array() );
    }
    wp_enqueue_style( 'animate', Donacion_THEME_CSS_DIR . 'animate.min.css', [] );
    wp_enqueue_style( 'swiper-bundle', Donacion_THEME_CSS_DIR . 'swiper-bundle.css', [] );
    wp_enqueue_style( 'slick', Donacion_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'owl-carousel', Donacion_THEME_CSS_DIR . 'owl-carousel.min.css', [] );
    wp_enqueue_style( 'owl-default', Donacion_THEME_CSS_DIR . 'owl-default.min.css', [] );
    wp_enqueue_style( 'magnific-popup', Donacion_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'nice-select', Donacion_THEME_CSS_DIR . 'nice-select.css', [] );
    wp_enqueue_style( 'font-awesome-pro', Donacion_THEME_CSS_DIR . 'fontawesome-all.min.css', [] );
    wp_enqueue_style( 'flaticon', Donacion_THEME_CSS_DIR . 'flaticon.css', [] );
    wp_enqueue_style( 'meanmenu', Donacion_THEME_CSS_DIR . 'meanmenu.css', [] );
    wp_enqueue_style( 'icofont', Donacion_THEME_CSS_DIR . 'icofont-min.css', [] );
    wp_enqueue_style( 'datepicker', Donacion_THEME_CSS_DIR . 'datepicker-min.css', [] );
    wp_enqueue_style( 'donacion-core', Donacion_THEME_CSS_DIR . 'donacion-core.css', [] );
    wp_enqueue_style( 'donacion-unit', Donacion_THEME_CSS_DIR . 'donacion-unit.css', [] );
    wp_enqueue_style( 'donacion-custom', Donacion_THEME_CSS_DIR . 'donacion-custom.css', [] );
    wp_enqueue_style( 'donacion-style', get_stylesheet_uri() );


    // all js
    wp_enqueue_script( 'datepicker', Donacion_THEME_JS_DIR . 'datepicker.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'bootstrap-bundle', Donacion_THEME_JS_DIR . 'bootstrap-bundle.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'swiper-bundle', Donacion_THEME_JS_DIR . 'swiper-bundle.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'slick', Donacion_THEME_JS_DIR . 'slick.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-knob', Donacion_THEME_JS_DIR . 'jquery-knob.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'magnific-popup', Donacion_THEME_JS_DIR . 'jquery.magnific-popup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-nice-select', Donacion_THEME_JS_DIR . 'jquery.nice-select.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-scrollUp', Donacion_THEME_JS_DIR . 'jquery.scrollUp.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-meanmenu', Donacion_THEME_JS_DIR . 'jquery.meanmenu.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'parallex', Donacion_THEME_JS_DIR . 'parallex.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'owl-carousel', Donacion_THEME_JS_DIR . 'owl-carousel.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'countdown', Donacion_THEME_JS_DIR . 'jquery.countdown.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'wow', Donacion_THEME_JS_DIR . 'wow.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'isotope-pkgd', Donacion_THEME_JS_DIR . 'isotope-pkgd.min.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'donacion-main', Donacion_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'donacion_scripts' );


/*
Register Fonts
 */
function donacion_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'donacion' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Jost:wght@400;500;600;700;800;900&family=Kumbh+Sans:wght@400;500;600;700;800&display=swap');
    }
    return $font_url;
}