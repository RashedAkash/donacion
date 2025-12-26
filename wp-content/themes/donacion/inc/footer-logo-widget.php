<?php
class Footer_About_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'footer_about_widget',
            __('Footer About Widget', 'textdomain'),
            array('description' => __('Footer about with logo upload & social icons', 'textdomain'))
        );
    }

    public function widget($args, $instance) {

        $logo   = $instance['logo'] ?? '';
        $text   = $instance['text'] ?? '';

        echo $args['before_widget'];
        ?>
        <div class="footer_widget footer_about mb-50">

            <?php if($logo): ?>
                <div class="footer_logo mb-35">
                    <img src="<?php echo esc_url($logo); ?>" alt="logo">
                </div>
            <?php endif; ?>

            <?php if($text): ?>
                <p class="mb-30"><?php echo esc_html($text); ?></p>
            <?php endif; ?>

            <div class="footer_social_2">
                <?php foreach (['facebook','twitter','behance','youtube'] as $social): ?>
                    <?php if(!empty($instance[$social])): ?>
                        <a href="<?php echo esc_url($instance[$social]); ?>" class="<?php echo esc_attr($social); ?>">
                            <i class="fab fa-<?php echo esc_attr($social === 'facebook' ? 'facebook-f' : $social); ?>"></i>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {

        $logo     = $instance['logo'] ?? '';
        $text     = $instance['text'] ?? '';
        $facebook = $instance['facebook'] ?? '';
        $twitter  = $instance['twitter'] ?? '';
        $behance  = $instance['behance'] ?? '';
        $youtube  = $instance['youtube'] ?? '';
        ?>

        <!-- Logo Upload -->
        <p>
            <label><strong>Logo</strong></label><br>
            <input class="widefat footer-logo-url"
                   name="<?php echo $this->get_field_name('logo'); ?>"
                   type="text"
                   value="<?php echo esc_attr($logo); ?>">

            <button class="button footer-upload-btn" style="margin-top:8px;">
                Upload / Select Logo
            </button>
        </p>

        <!-- Text -->
        <p>
            <label>Text</label>
            <textarea class="widefat" rows="4"
                name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($text); ?></textarea>
        </p>

        <p><label>Facebook URL</label>
            <input class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>

        <p><label>Twitter URL</label>
            <input class="widefat" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>

        <p><label>Behance URL</label>
            <input class="widefat" name="<?php echo $this->get_field_name('behance'); ?>" type="text" value="<?php echo esc_attr($behance); ?>">
        </p>

        <p><label>YouTube URL</label>
            <input class="widefat" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
        </p>

        <!-- JS -->
        <script>
        jQuery(document).ready(function($){
            $('.footer-upload-btn').off('click').on('click', function(e){
                e.preventDefault();

                let button = $(this);
                let input  = button.prev('.footer-logo-url');

                let frame = wp.media({
                    title: 'Select Logo',
                    button: { text: 'Use this logo' },
                    multiple: false
                });

                frame.on('select', function(){
                    let attachment = frame.state().get('selection').first().toJSON();
                    input.val(attachment.url).trigger('change');
                });

                frame.open();
            });
        });
        </script>

        <?php
    }
}

// Register Widget
add_action('widgets_init', function () {
    register_widget('Footer_About_Widget');
});
