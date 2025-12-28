<?php
/**
 * Theme Feed Widget - Custom Widget
 */

class Theme_Feed_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'theme_feed_widget',
            __('Theme Feed Widget (3 Posts)', 'textdomain'),
            array( 'description' => __( 'Show latest 3 posts with image & date', 'textdomain' ) )
        );
    }

    // FRONTEND DISPLAY
    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        // Order option from widget admin
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $posts_count = !empty($instance['posts_count']) ? intval($instance['posts_count']) : 3;

        $query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => $posts_count,
            'orderby'        => 'date',
            'order'          => $order,
        ));

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
        ?>
            <div class="single_feed_widget has_border">
                <div class="feed_widget_img">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        <?php endif; ?>
                    </a>
                </div>

                <div class="feed_widget_text">
                    <h5 class="feed_widget_title theme-1">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h5>

                    <a href="<?php the_permalink(); ?>" class="feed_widget_date theme-1">
                        <i class="fal fa-calendar-alt"></i>
                        <?php echo get_the_date(); ?>
                    </a>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;

        echo $args['after_widget'];
    }

    // WIDGET ADMIN OPTIONS
    public function form( $instance ) {
        $order = !empty($instance['order']) ? $instance['order'] : 'DESC';
        $posts_count = !empty($instance['posts_count']) ? intval($instance['posts_count']) : 3;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('posts_count'); ?>">Number of posts:</label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('posts_count'); ?>" name="<?php echo $this->get_field_name('posts_count'); ?>" type="number" step="1" min="1" value="<?php echo $posts_count; ?>" size="3">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>">Order:</label>
            <select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
                <option value="DESC" <?php selected( $order, 'DESC' ); ?>>Latest First (DESC)</option>
                <option value="ASC" <?php selected( $order, 'ASC' ); ?>>Oldest First (ASC)</option>
            </select>
        </p>
        <?php
    }

    // SAVE OPTIONS
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['order'] = (!empty($new_instance['order'])) ? strip_tags($new_instance['order']) : 'DESC';
        $instance['posts_count'] = (!empty($new_instance['posts_count'])) ? intval($new_instance['posts_count']) : 3;
        return $instance;
    }

}

// REGISTER WIDGET
function register_theme_feed_widget() {
    register_widget( 'Theme_Feed_Widget' );
}
add_action( 'widgets_init', 'register_theme_feed_widget' );
