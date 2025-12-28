<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package donacion
 */
?>

 <div id="post-<?php the_ID();?>" <?php post_class( 'blog_blockquote_wrapper bg_cover mb-40' );?>  data-background="assets/img/news/blog_quote.jpg">
    <div class="blog_blockquote_content">
        <i class="fas fa-quote-left"></i>
        <h4 class="blog_title"><?php the_content();?></h4>
    </div>
</div>

