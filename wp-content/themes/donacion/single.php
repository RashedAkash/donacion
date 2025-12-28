<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package donacion
 */

get_header();

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;

?>



<div class="blog_details_area pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-<?php print esc_attr( $blog_column );?> col-xl-<?php print esc_attr( $blog_column );?> col-lg-<?php print esc_attr( $blog_column );?>">
                        <div class="blog_details_wrapper has_border mb-40">
                             <?php if ( have_posts() ) : while( have_posts()  ) : the_post(); ?>
								<?php echo get_template_part('template-parts/content',get_post_format()); ?>								
							<?php endwhile; ?>
							<?php else : ?>
                        <p>Post not found</p>
                    <?php endif; ?>
                            <div class="row  pb-20">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="details_tag">
                                        <h5 class="details_title mb-25">Releted Tags</h5>
                                        <div class="tagcloud tagcloud-sm">
                                            <a href="#">Popular</a>
                                            <a href="#">Desgin</a>
                                            <a href="#">UX</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="details_social text-end">
                                        <h5 class="details_title mb-25">Social Share</h5>
                                        <div class="social_share">
                                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                            <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                            <a href="#" class="viber"><i class="fab fa-viber"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0 mb-45">	
							<?php if ( get_previous_post_link() AND get_next_post_link() ): ?>
                            <div class="details_postnav mb-50 ">
                                <div class="post-dot-shape">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/news/dot9.png" alt="img">
                                </div>
                                <div class="row">
									<?php if ( get_previous_post_link() ): ?>
								<div class="col-lg-6 col-md-6">
									<div class="theme-navigation b-next-post text-left mb-30">
										<span><?php print esc_html__( 'Prev Post', 'donacion' );?></span>
										<h4><?php print get_previous_post_link( '%link ', '%title' );?></h4>
									</div>
								</div>
								<?php endif;?>

								<?php	if ( get_next_post_link() ): ?>
								<div class="col-lg-6 col-md-6">
									<div class="theme-navigation b-next-post text-left text-md-right text-end mb-30">
										<span><?php print esc_html__( 'Next Post', 'donacion' );?></span>
										<h4><?php print get_next_post_link( '%link ', '%title' );?></h4>
									</div>
								</div>
								<?php endif;?>
                                </div>
                            </div>
							<?php endif; ?>
                            <hr class="mt-0 mb-45">
                            <div class="related_post mb-20 d-none ">
                                <h6 class="related_post_title mb-35">Releted Post</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="related_post_single mb-30">
                                            <div class="details_thumb">
                                                <a href="blog-details.html"><img src="assets/img/news/details_rp1.jpg" class="img-fluid" alt="img"> </a> 
                                            </div>
                                            <div class="details_content">
                                                <div class="blog_meta mb-10">
                                                    <a href="#" class="calendar"><i class="fal fa-calendar-alt"></i>24 March 2022</a>
                                                </div>
                                                <h6 class="related_title theme-1"><a href="blog-details.html">A series of iOS 7 inspire
                                                    vector icons sense.</a></h6>
                                                <p>Lorem ipsum dolor sit amet, conse ctet ur adipisicing elit, sed doing.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="related_post_single mb-30">
                                            <div class="details_thumb">
                                                <a href="blog-details.html"><img src="assets/img/news/details_rp2.jpg" class="img-fluid" alt="img">  </a>
                                            </div>
                                            <div class="details_content">
                                                <div class="blog_meta mb-10">
                                                    <a href="#" class="calendar"><i class="fal fa-calendar-alt"></i>24 March 2022</a>
                                                </div>
                                                <h6 class="related_title theme-1"><a href="blog-details.html">iPhone inspires a man to buy its configaration.</a></h6>
                                                <p>Lorem ipsum dolor sit amet, conse ctet ur adipisicing elit, sed doing.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /. related post -->
                             

                                <?php echo get_template_part('template-parts/biography'); ?>

                                <?php if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                endif; ?>
                             

                            
                          
                        </div>
                        
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-5">
                        <div class="blog_sidebar_wrapper pl-15">
						<?php get_sidebar();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
get_footer();