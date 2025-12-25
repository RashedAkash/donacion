<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package donacion
   */

    $header_side_logo = get_theme_mod( 'header_side_logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );


    $offcanvas_gallery = get_theme_mod('offcanvas_gallery');

    // Contacts Text 
    $header_side_contacts_text = get_theme_mod( 'header_side_contacts_text', __( 'CONTACT US', 'donacion' ) );

    // Contacts Text 
    $header_side_contacts_text = get_theme_mod( 'header_side_contacts_text', __( 'CONTACT US', 'donacion' ) );
   // Email id 
   $header_top_email = get_theme_mod( 'header_email', __( 'donacion@support.com', 'donacion' ) );

   // Phone Number
   $header_top_phone = get_theme_mod( 'header_phone', __( '+8801310-069824', 'donacion' ) );

   // Header Address Text
   $header_top_address_text = get_theme_mod( 'header_address', __( '734 H, Bryan Burlington, NC 27215', 'donacion' ) );

   // Header Address Link
   $header_top_address_link = get_theme_mod( 'header_address_link', __( 'https://www.google.com/maps/@36.0758266,-79.4558848,17z', 'donacion' ) );


   //Offcanvas About Us
   $offcanvas_about_us = get_theme_mod( 'header_top_offcanvas_textarea', __( 'Web designing in a powerful way of just not an only professions. We have tendency to believe the idea that smart looking .', 'donacion' ) );

    // footer area links  switch
    $header_side_info_switch = get_theme_mod( 'header_side_info_switch', false );

?>
<!-- offcanvas area start -->
 <!-- slide-bar start -->

        <!-- Sidebar for Mobile -->
        <div class="fix d-lg-none">
            <div class="side-info">

                <div class="offset-widget offset-logo mb-30 pb-20">
                    <div class="row align-items-center">
                        <div class="col-8">
                             <a class="mobile_logo" href="<?php print esc_url( home_url( '/' ) );?>">
                        <img src="<?php echo esc_url( $header_side_logo ); ?>" alt="<?php print esc_attr__( 'logo', 'donacion' );?>">
                    </a>
                            
                        </div>
                        <div class="col-4 text-end"><button class="side-info-close"><i class="fal fa-times"></i></button></div>
                    </div>
                    
                </div>

                <div class="offset-widget offset_searchbar mb-30">
                <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="offset_search_content">
                        <input 
                            type="search"
                            name="s"
                            value="<?php echo get_search_query(); ?>"
                            placeholder="What are you searching for?"
                        >
                        <button type="submit" class="offset_search_button">
                            <i class="fal fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>


                <div class="mobile-menu"></div>

                <div class="contact-infos mt-30 mb-30">
                    <div class="contact-list mobile_contact mb-30">
                        <h4><?php echo esc_html( $header_side_contacts_text ); ?></h4>
                        
                        <?php  if ( !empty( $header_top_address_text ) ): ?>
                         <a class='theme-1'
                            href="<?php echo esc_url( $header_top_address_link ); ?>">
                            <i class="fal fa-map-marker-alt"></i>
                            <span>
                             <?php echo esc_html( $header_top_address_text ); ?>
                             </span>
                        </a>
                        <?php endif?>

                     <?php  if ( !empty(  $header_top_phone ) ): ?>
                        <a href="tel:<?php echo esc_attr( $header_top_phone ); ?>" class="theme-2"><i class="fal fa-phone"></i><span><?php echo esc_html( $header_top_phone ); ?></span></a>
                        <?php endif; ?>
       

                  <?php  if ( !empty( $header_top_email ) ): ?>
                        <a href="mailto:<?php echo esc_attr( $header_top_email ); ?>" class="theme-3"><i class="far fa-envelope"></i><span><?php echo esc_html( $header_top_email ); ?></span></a> 
                        <?php endif; ?> 

                    </div>

                    <div class="top_social offset_social mt-20 mb-30">
                     <?php donacion_header_social_profiles(); ?>
                    </div>
                </div>

            </div>
        </div>


        <!-- Sidebar for Laptop -->
        <div class="fix d-none d-lg-block">
            
            <div class="offset-sidebar side-info">

                <div class="offset-widget offset-logo mb-30 pb-20">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <a  href="<?php print esc_url( home_url( '/' ) );?>">
                        <img src="<?php echo esc_url( $header_side_logo ); ?>" alt="<?php print esc_attr__( 'logo', 'donacion' );?>">
                    </a>
                </div>
                        <div class="col-4 text-end"><button class="side-info-close"><i class="fal fa-times"></i></button></div>
                    </div>
                    
                </div>

                <div class="offset-widget offset_searchbar mb-30">
                    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="offset_search_content">
                            <input 
                                type="search"
                                name="s"
                                value="<?php echo get_search_query(); ?>"
                                placeholder="What are you searching for?"
                            >
                            <button type="submit" class="offset_search_button">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="offset-widget mb-40">
                    <div class="info-widget">
                        <h4 class="offset-title mb-20 d-none"><?php echo esc_html__("About Us","donacion"); ?></h4>
                        <p class="mb-30"><?php echo esc_html( $offcanvas_about_us ); ?></p>
                        
                    </div>
                </div>


                <?php if(!empty($offcanvas_gallery)): ?>
                    <div class="row side-row">
                    <?php foreach($offcanvas_gallery as $item): ?>
                        <div class="col-4 mb-15">   
                    <a class="popup-image" href="<?php echo esc_url($item['offcanvas_image']); ?>"><img src="<?php echo esc_url($item['offcanvas_image']); ?>" alt="<?php echo bloginfo(); ?>"></a>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <?php endif; ?>


               

                <div class="side-map mt-20 mb-30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
                </div>


                
                <div class="contact-infos mt-30 mb-30">
                    <div class="contact-list mb-30">
                        <h4><?php echo esc_html( $header_side_contacts_text ); ?></h4>

                        <?php  if ( !empty( $header_top_address_text ) ): ?>
                         <a class='theme-1'
                            href="<?php echo esc_url( $header_top_address_link ); ?>">
                            <i class="fal fa-map-marker-alt"></i>
                            <span>
                             <?php echo esc_html( $header_top_address_text ); ?>
                             </span>
                        </a>
                        <?php endif?>

                     <?php  if ( !empty(  $header_top_phone ) ): ?>
                        <a href="tel:<?php echo esc_attr( $header_top_phone ); ?>" class="theme-2"><i class="fal fa-phone"></i><span><?php echo esc_html( $header_top_phone ); ?></span></a>
                        <?php endif; ?>
       

                  <?php  if ( !empty( $header_top_email ) ): ?>
                        <a href="mailto:<?php echo esc_attr( $header_top_email ); ?>" class="theme-3"><i class="far fa-envelope"></i><span><?php echo esc_html( $header_top_email ); ?></span></a> 
                        <?php endif; ?> 

                    </div>

                    <div class="top_social offset_social mt-20 mb-30">
                        <?php donacion_header_social_profiles(); ?>
                    </div>


                </div>

                
            </div>

        </div>



        <div class="offcanvas-overlay"></div>
        <!-- slide-bar end -->

<!-- offcanvas area end -->
