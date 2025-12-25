<?php
/**
 * Breadcrumbs for donacion theme.
 *
 * @package     donacion
 * @author      Theme_Pure
 * @copyright   Copyright (c) 2022, Theme_Pure
 * @link        https://www.weblearnbd.net
 * @since       donacion 1.0.0
 */



function donacion_breadcrumb_func() {
    global $post;  
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','donacion'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','donacion'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'donacion' ) );
    } 
    elseif ( is_single() && 'courses' == get_post_type() ) {
      $title = esc_html__( 'Course Details', 'donacion' );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'donacion' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'donacion' );
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }
 


    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    } 
    elseif ( function_exists("is_shop") AND is_shop()  ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $is_breadcrumb = function_exists('tpmeta_field')? tpmeta_field('donacion_check_bredcrumb') : 'on';

    $con1 = $is_breadcrumb && ($is_breadcrumb== 'on') && $breadcrumb_show == 1;

    $con_main = is_404() ? is_404() : $con1;
    
      if (  $con_main ) {
        $bg_img_from_page = function_exists('tpmeta_image_field')? tpmeta_image_field('donacion_breadcrumb_bg') : '';

        $hide_bg_img = function_exists('tpmeta_field')? tpmeta_field('donacion_check_bredcrumb_img') : 'on';
        // get_theme_mod
        $bg_img = get_theme_mod( 'breadcrumb_image' );
        $breadcrumb_padding = get_theme_mod( 'breadcrumb_padding' );
        $breadcrumb_bg_color = get_theme_mod( 'breadcrumb_bg_color', '#16243E' );
        $breadcrumb_shape_switch = get_theme_mod( 'breadcrumb_shape_switch', 'on' );
        if ( $hide_bg_img == 'off' ) {
            $bg_main_img = '';
        }else{  
            $bg_main_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
        }
        
        ?>

<!-- about breadcrumb area start -->

<section class="breadcrumb_area breadcrumb_overlay" data-background="<?php print esc_attr($bg_main_img);?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb_section">
                             <?php if(function_exists('bcn_display')) : ?>
                            <ul class="breadcrumb-list volunteer_breadcrumb">
                                <?php bcn_display(); ?>
                            </ul>
                             <?php endif; ?>
                            <div class="breadcrumb_title">
                                <h2><?php echo donacion_kses( $title ); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<section class="breadcrumb__area pt-165 d-none pb-150 p-relative z-index-1 fix"
    data-bg-color="<?php echo esc_attr( $breadcrumb_bg_color ); ?>">
    <div class="breadcrumb__bg" data-background="<?php print esc_attr($bg_main_img);?>"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumb__content">
                    <h3 class="breadcrumb__title"><?php echo donacion_kses( $title ); ?></h3>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="breadcrumb__content">
                    <?php if(function_exists('bcn_display')) : ?>
                    <div class="breadcrumb__list text-center text-sm-end">
                        <?php bcn_display(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about breadcrumb area end -->

<?php
      }
}

add_action( 'donacion_before_main_content', 'donacion_breadcrumb_func' );

// donacion_search_form
function donacion_search_form() {
    ?>
         <!-- search area start -->
         <div class="search-area d-none">
         <div class="search-inner p-relative">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-8">
                     <div class="search-wrapper">
                        <div class="search-close">
                           <button class="search-close-btn">
                              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </button>
                        </div>
                        <div class="search-content pt-35">
                           <h3 class="heading text-center mb-30"><?php echo esc_html__("Hi! How can we help You?","donacion") ?></h3>
                           <div class="d-flex justify-content-center px-5">
                              <div class="search w-100 p-relative">
                              <form method="get" action="<?php print esc_url( home_url( '/' ) );?>">
                                 <input type="text" name="s" class="search-input" value="<?php print esc_attr( get_search_query() )?>"  placeholder="<?php print esc_attr__( 'Search...', 'donacion' );?>">
                                 <button  class="search-icon">
                                 <i class="fa fa-search"></i>
                                 </button>
                                </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="search-overlay"></div>
      <!-- search area end -->



<?php
}
add_action( 'donacion_before_main_content', 'donacion_search_form' );