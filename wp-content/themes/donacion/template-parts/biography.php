<?php
    $author_data = get_the_author_meta( 'description', get_query_var( 'author' ) );
    $author_info = get_the_author_meta( 'donacion_write_by');
    $facebook_url = get_the_author_meta( 'donacion_facebook' );
    $twitter_url = get_the_author_meta( 'donacion_twitter' );
    $linkedin_url = get_the_author_meta( 'donacion_linkedin' );
    $instagram_url = get_the_author_meta( 'donacion_instagram' );
    $donacion_url = get_the_author_meta( 'donacion_youtube' );
    $donacion_write_by = get_the_author_meta( 'donacion_write_by' );
    $author_bio_avatar_size = 180;
    if ( $author_data != '' ):
?>

    <div class="details_author_box d-flex">
        <div class="author_thumb">
            <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>"><?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size, '', '', [ 'class' => 'media-object img-circle' ] );?> </a>
        </div>
        <div class="details_content">
            <span>Written by</span>
            <h6 class="author_details_name"><a href="volunteer-details.html">Andreu D. William</a></h6>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation is enougn for today. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
        </div>
    </div>


   

       <div class="blog__author-content">
          <h4><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>">
          </a></h4>

          <?php if (!empty($author_info)) : ?>
          <span><?php print esc_html($author_info); ?></span>
          <?php endif; ?>

          <p><?php the_author_meta( 'description' );?></p>
       </div>
    </div>

<?php endif;?>
