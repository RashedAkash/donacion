<?php 

	/**
	 * Template part for displaying header layout one
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package donacion
	*/

	// info
    $header_topbar_switch = get_theme_mod( 'header_topbar_switch', false );

   // Email id 
   $header_top_email = get_theme_mod( 'header_email', __( 'donacion@support.com', 'donacion' ) );
   $header_top_email = get_theme_mod( 'header_mail_link', __( 'donacion@support.com', 'donacion' ) );

   // Phone Number
   $header_top_phone = get_theme_mod( 'header_phone', __( '+8801310-069824', 'donacion' ) );

   // Header Address Text
   $header_top_address_text = get_theme_mod( 'header_address', __( '734 H, Bryan Burlington, NC 27215', 'donacion' ) );

   // Header charity Text
   $header_top_charity_text = get_theme_mod( 'header_top_charity_text', __( 'Connect with our charity', 'donacion' ) );

   // Header Address Link
   $header_top_address_link = get_theme_mod( 'header_address_link', __( '#', 'donacion' ) );

   // Button Text
   $header_top_button_switch = get_theme_mod( 'header_top_button_switch', false);
   $header_top_button_text = get_theme_mod( 'header_button_text', __( 'Donate Now', 'donacion' ) );

   // Button Text
   $header_top_button_link = get_theme_mod( 'header_button_link', __( '#', 'donacion' ) );

   $header_language_switch = get_theme_mod( 'header_language_switch', __( 'false', 'donacion' ) );
   $phone_number_url = preg_replace("/[^0-9]/", "", $header_top_phone); 

   // header right
   $donacion_header_right = get_theme_mod( 'header_right_switch', false );
   $donacion_menu_col = $donacion_header_right ? 'col-xxl-7 col-xl-7 col-lg-9 d-none d-lg-block' : 'col-xl-10 col-lg-8 d-none d-lg-block';
   $donacion_menu_end = $donacion_header_right ? 'text-center' : 'text-end';

//    col-xl-7 d-none d-xl-block

   // header search btn 
   $header_search_switch = get_theme_mod( 'header_search_switch', true );

   // header auth btn 
   $header_auth_switch = get_theme_mod( 'header_auth_switch', true );
   $header_auth_link = get_theme_mod( 'header_auth_link',"#" );

?>

<!-- header area start -->

<header class="header-area">

<?php  if ( !empty( $header_topbar_switch ) ): ?>
    <div class="header_top_area d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-9 col-xl-9 col-lg-8">
                    <div class="top_mailing">

                    <?php  if ( !empty( $header_top_email ) ): ?>
                        <a href="mailto:<?php echo donacion_kses($header_top_email_link); ?>" class="theme-1"><i class="fal fa-envelope"></i><?php echo esc_html( $header_top_email  ); ?></a>
                    <?php endif; ?>

                         <?php  if ( !empty( $header_top_phone ) ): ?>
                        <a href="tel:<?php echo donacion_kses($phone_number_url); ?>" class="theme-2"><i class="fal fa-phone"></i><?php echo esc_html( $header_top_phone ); ?></a>
                        <?php endif; ?>

                    <?php  if ( !empty( $header_top_address_text ) ): ?>
                        <a href="<?php echo donacion_kses($header_top_address_link); ?>" class="theme-3"><i class="fal fa-map-marker-alt"></i><?php echo esc_html($header_top_address_text); ?></a>
                    <?php endif; ?>
                        
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 text-start text-md-end">
                    <div class="top_social">
                      <?php  donacion_header_social_profiles(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php endif; ?>

    <div id="sticky-header" class="header_menu_area header_menu_area_2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                   
                    <div class="logo">
                        <?php donacion_header_logo(); ?>
                    </div>
                </div>
                <div class="<?php echo esc_attr($donacion_menu_col); ?>">
                    <div class="main-menu menu_2 <?php echo esc_attr($donacion_menu_end); ?>">
                        <nav id="mobile-menu">
                            <?php donacion_header_menu(); ?>
                        </nav>
                    </div>
                </div>

                 <?php  if ( !empty( $donacion_header_right ) ): ?>
                <div class="col-xxl-3 col-xl-3 col-lg-1 col-md-6 col-6">
                    <div class="header-right d-flex align-items-center justify-content-end">

                      <?php  if ( !empty( $header_top_button_switch ) and !empty( $header_top_button_text ) ): ?>
                                    <div class="header-sing d-inline-block d-none d-xl-block">
                                        <a class="g_btn hbtn_1 to_right1 rad-30"
                                            href="<?php echo esc_url( $header_top_button_link ); ?>"><?php echo esc_html( $header_top_button_text ); ?><span></span></a>
                                    </div>
                                    <?php endif; ?>
                        
                        <div class="hamburger-menu menu-bar info-bar d-inline-block ml-20">
                            <button class="hamburger-btn open-mobile-menu"><i class="fal fa-bars"></i></button>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
                
            </div>
        </div>
    </div>
</header>


<header id="header-sticky" class="tp-header-area-2 d-none p-relative tp-header-height">
    <div class="tp-header-space-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-3 col-6">
                    <div class="tp-header-logo-2 p-relative">
                        <?php donacion_header_logo(); ?>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-xl-block">
                    <div class="tp-main-menu home-2 d-none d-xl-block">
                        <nav class="tp-main-menu-content">
                            <?php donacion_header_menu(); ?>
                        </nav>
                    </div>
                </div>
                <?php  if ( !empty( $donacion_header_right ) ): ?>
                <div class="col-xl-3 col-6">
                    <div class="tp-header-main-right-2 d-flex align-items-center justify-content-xl-end">
                        <div class="tp-header-contact-2 d-flex align-items-center">
                            <?php  if ( !empty( $header_search_switch ) ): ?>
                            <div class="tp-header-contact-search search-open-btn d-none d-xxl-block">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                            <?php endif; ?>
                            <?php  if ( !empty( $header_top_phone ) ): ?>
                            <div class="tp-header-contact-inner d-none d-xl-flex align-items-center">
                                 <div class="tp-header-contact-icon">
                                    <span><i class="fa-solid fa-phone"></i></span>
                                </div>
                                <div class="tp-header-contact-content">
                                    <p><?php echo esc_html__("Requesting A Call:","donacion") ?></p>
                                    <span><a href="tel:<?php echo donacion_kses($phone_number_url); ?>"><?php echo esc_html( $header_top_phone ); ?></a></span>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="tp-header-main-right-hamburger-btn d-xl-none offcanvas-open-btn text-end">
                            <button class="hamburger-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
                <?php  if ( empty( $donacion_header_right ) ): ?>
                <div class="col-xl-3 col-6">
                    <div class="tp-header-main-right-2 d-flex align-items-center justify-content-xl-end">
                        <div class="tp-header-main-right-hamburger-btn d-xl-none offcanvas-open-btn text-end">
                            <button class="hamburger-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
<?php get_template_part( 'template-parts/header/header-side-info' ); ?>