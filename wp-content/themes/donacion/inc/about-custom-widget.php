<?php
/* =====================================================
   ABOUT ME SIDEBAR WIDGET (JS INLINE)
===================================================== */

class About_Me_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'about_me_widget',
            __('About Me Widget', 'textdomain'),
            array( 'description' => __('Sidebar About Me Widget with Image Upload', 'textdomain') )
        );
    }

    /* ================= FRONTEND ================= */
    public function widget( $args, $instance ) {

        echo $args['before_widget']; ?>

        <div class="sidebar_title">
            <h4 class="sidebar_title_text has_border">
                <span class="theme-1">//</span>
                <?php echo esc_html( $instance['title'] ); ?>
            </h4>
        </div>

        <div class="about_widget_content text-center">

            <?php if ( ! empty( $instance['image'] ) ) : ?>
                <div class="widget_about_img">
                    <a href="<?php echo esc_url( $instance['profile_link'] ); ?>">
                        <img src="<?php echo esc_url( $instance['image'] ); ?>" alt="img">
                    </a>
                </div>
            <?php endif; ?>

            <h6 class="about_person_title">
                <a href="<?php echo esc_url( $instance['profile_link'] ); ?>">
                    <?php echo esc_html( $instance['name'] ); ?>
                </a>
            </h6>

            <p><?php echo esc_html( $instance['desc'] ); ?></p>

            <div class="widget_social">
                <?php
                $socials = [
                    'facebook' => 'facebook-f',
                    'twitter'  => 'twitter',
                    'behance'  => 'behance',
                    'linkedin' => 'linkedin-in',
                    'youtube'  => 'youtube'
                ];

                foreach ( $socials as $key => $icon ) :
                    if ( ! empty( $instance[$key] ) ) : ?>
                        <a href="<?php echo esc_url( $instance[$key] ); ?>" class="<?php echo esc_attr($key); ?>">
                            <i class="fab fa-<?php echo esc_attr($icon); ?>"></i>
                        </a>
                <?php endif; endforeach; ?>
            </div>

        </div>

        <?php echo $args['after_widget'];
    }

    /* ================= BACKEND ================= */
    public function form( $instance ) {

        $defaults = array(
            'title' => 'About Me',
            'name' => '',
            'desc' => '',
            'image' => '',
            'profile_link' => '',
            'facebook' => '',
            'twitter' => '',
            'behance' => '',
            'linkedin' => '',
            'youtube' => '',
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>

        <p>
            <label>Title</label>
            <input class="widefat"
                name="<?php echo $this->get_field_name('title'); ?>"
                value="<?php echo esc_attr($instance['title']); ?>">
        </p>

        <p>
            <label>Name</label>
            <input class="widefat"
                name="<?php echo $this->get_field_name('name'); ?>"
                value="<?php echo esc_attr($instance['name']); ?>">
        </p>

        <p>
            <label>Description</label>
            <textarea class="widefat"
                name="<?php echo $this->get_field_name('desc'); ?>"><?php
                echo esc_textarea($instance['desc']); ?></textarea>
        </p>

        <p>
            <label>Profile Link</label>
            <input class="widefat"
                name="<?php echo $this->get_field_name('profile_link'); ?>"
                value="<?php echo esc_attr($instance['profile_link']); ?>">
        </p>

        <!-- IMAGE UPLOAD -->
        <p>
            <label>Profile Image</label>
            <input type="text"
                class="widefat image-url"
                name="<?php echo $this->get_field_name('image'); ?>"
                value="<?php echo esc_attr($instance['image']); ?>">

            <button type="button" class="button select-media">
                Upload / Select Image
            </button>
        </p>

        <?php foreach ( ['facebook','twitter','behance','linkedin','youtube'] as $s ) : ?>
            <p>
                <label><?php echo ucfirst($s); ?> URL</label>
                <input class="widefat"
                    name="<?php echo $this->get_field_name($s); ?>"
                    value="<?php echo esc_attr($instance[$s]); ?>">
            </p>
        <?php endforeach;
    }

    public function update( $new, $old ) {
        return $new;
    }
}

/* REGISTER WIDGET */
add_action( 'widgets_init', function () {
    register_widget( 'About_Me_Widget' );
});

/* =====================================================
   MEDIA UPLOADER + INLINE JS (NO EXTRA FILE)
===================================================== */
add_action( 'admin_enqueue_scripts', function () {

    wp_enqueue_media();

    wp_add_inline_script(
        'jquery',
        "
        jQuery(document).ready(function ($) {

            $(document).on('click', '.select-media', function (e) {
                e.preventDefault();

                var input = $(this).prev('.image-url');

                var frame = wp.media({
                    title: 'Select Image',
                    button: { text: 'Use this image' },
                    multiple: false
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    input.val(attachment.url).trigger('change');
                });

                frame.open();
            });

        });
        "
    );
});
