<?php
/**
 * Social widget
 */

function tokopress_widget_social_init() {
	register_widget('TokoPress_Widget_Social');
}
add_action('widgets_init', 'tokopress_widget_social_init');

class TokoPress_Widget_Social extends WP_Widget {

	/**
	 * Widget setup
	 */
	function __construct() {

		$widget_ops = array(
			'classname' => 'social-network',
			'description' => __( 'A custom widget to display the social network icons.', 'tokopress' )
		);

		parent::__construct( 'TokoPress_Widget_Social', __( 'Tokopress - Social Connect', 'tokopress' ), $widget_ops );

	}

	/**
	 * Display widget
	 */
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$rss = $instance['rss'];
		$email_id = $instance['email_id'];
		$twitter_id = strip_tags( $instance['twitter_id'] );
		$fb_id = strip_tags( $instance['fb_id'] );
		$gplus_id = strip_tags( $instance['gplus_id'] );
		$ytube_id = strip_tags( $instance['ytube_id'] );
		$ytube_channel = strip_tags( $instance['ytube_channel'] );
		$flickr_id = strip_tags( $instance['flickr_id'] );
		$linkedin_id = strip_tags( $instance['linkedin_id'] );
		$pinterest_id = strip_tags( $instance['pinterest_id'] );
		$dribbble_id = strip_tags( $instance['dribbble_id'] );
		$github_id = strip_tags( $instance['github_id'] );
		$lastfm_id = strip_tags( $instance['lastfm_id'] );
		$vimeo_id = strip_tags( $instance['vimeo_id'] );
		$tumblr_id = strip_tags( $instance['tumblr_id'] );
		$instagram_id = strip_tags( $instance['instagram_id'] );
		$soundcloud_id = strip_tags( $instance['soundcloud_id'] );
		$behance_id = strip_tags( $instance['behance_id'] );
		$deviantart_id = strip_tags( $instance['deviantart_id'] );

		printf( '%s', $args['before_widget'] );
		if ( $title ) {
			printf( '%s', $args['before_title'] . $title . $args['after_title'] );
		}
		?>

		<ul class="social-buttons no-list-style cl">

			<?php if ( $rss ) { ?>
				<li><a class="rssfeed tip" href="<?php echo esc_url( $rss ); ?>" target="_blank"><i class="fa fa-rss"></i> Rss Feed</a></li>
			<?php } if ( $email_id ) { ?>
				<li><a class="email tip" href="mailto:<?php echo antispambot( $email_id ); ?>" target="_blank"><i class="fa fa-envelope-o"></i> Email</a></li>
			<?php } if ( $twitter_id ) { ?>
				<li><a class="twitter tip" href="http://twitter.com/<?php echo esc_attr( $twitter_id ); ?>" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
			<?php } if ( $fb_id ) { ?>
				<li><a class="fb" href="http://www.facebook.com/<?php echo esc_attr( $fb_id ); ?>" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
			<?php } if ( $gplus_id ) { ?>
				<li><a class="gplus" href="https://plus.google.com/<?php echo esc_attr( $gplus_id ); ?>" target="_blank"><i class="fa fa-google-plus"></i> Google Plus</a></li>
			<?php } if ( $ytube_id ) { ?>
				<li><a class="ytube" href="http://www.youtube.com/user/<?php echo esc_attr( $ytube_id ); ?>" target="_blank"><i class="fa fa-youtube"></i> Youtube</a></li>
			<?php } if ( $ytube_channel ) { ?>
				<li><a class="ytube" href="http://www.youtube.com/channel/<?php echo esc_attr( $ytube_channel ); ?>" target="_blank"><i class="fa fa-youtube"></i> Youtube</a></li>
			<?php } if ( $flickr_id ) { ?>
				<li><a class="flickr" href="http://www.flickr.com/photos/<?php echo esc_attr( $flickr_id ); ?>" target="_blank"><i class="fa fa-flickr"></i> Flickr</a></li>
			<?php } if ( $linkedin_id ) { ?>
				<li><a class="linkedin" href="http://linkedin.com/in/<?php echo esc_attr( $linkedin_id ); ?>" target="_blank"><i class="fa fa-linkedin"></i> Linkedin</a></li>
			<?php } if ( $pinterest_id ) { ?>
				<li><a class="pinterest" href="http://pinterest.com/<?php echo esc_attr( $pinterest_id ); ?>" target="_blank"><i class="fa fa-pinterest"></i> Pinterest</a></li>
			<?php } if ( $dribbble_id ) { ?>
				<li><a class="dribbble" href="http://dribbble.com/<?php echo esc_attr( $dribbble_id ); ?>" target="_blank"><i class="fa fa-dribbble"></i> Dribbble</a></li>
			<?php } if ( $github_id ) { ?>
				<li><a class="github" href="https://github.com/<?php echo esc_attr( $github_id ); ?>" target="_blank"><i class="fa fa-github"></i> Github</a></li>
			<?php } if ( $lastfm_id ) { ?>
				<li><a class="lastfm" href="http://www.last.fm/user/<?php echo esc_attr( $lastfm_id ); ?>" target="_blank"><i class="fa fa-lastfm"></i> Last FM</a></li>
			<?php } if ( $vimeo_id ) { ?>
				<li><a class="vimeo" href="http://vimeo.com/<?php echo esc_attr( $vimeo_id ); ?>" target="_blank"><i class="fa fa-vimeo-square"></i> Vimeo</a></li>
			<?php } if ( $tumblr_id ) { ?>
				<li><a class="tumblr" href="http://<?php echo esc_attr( $tumblr_id ); ?>.tumblr.com" target="_blank"><i class="fa fa-tumblr"></i> Tumblr</a></li>
			<?php } if ( $instagram_id ) { ?>
				<li><a class="instagram" href="http://instagram.com/<?php echo esc_attr( $instagram_id ); ?>" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
			<?php } if ( $soundcloud_id ) { ?>
				<li><a class="soundcloud" href="https://soundcloud.com/<?php echo esc_attr( $soundcloud_id ); ?>" target="_blank"><i class="fa fa-soundcloud"></i> Soundcloud</a></li>
			<?php } if ( $behance_id ) { ?>
				<li><a class="behance" href="http://www.behance.net/<?php echo esc_attr( $behance_id ); ?>" target="_blank"><i class="fa fa-behance"></i> Behance</a></li>
			<?php } if ( $deviantart_id ) { ?>
				<li><a class="deviantart" href="http://<?php echo esc_attr( $deviantart_id ); ?>.deviantart.com/" target="_blank"><i class="fa fa-deviantart"></i> Deviantart</a></li>
			<?php } ?>

		</ul>

		<?php
		printf( '%s', $args['after_widget'] );

	}

	/**
	 * Update widget
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['rss'] = esc_url_raw( $new_instance['rss'] );
		$instance['email_id'] = is_email( $new_instance['email_id'] );
		$instance['twitter_id'] = strip_tags( $new_instance['twitter_id'] );
		$instance['fb_id'] = strip_tags( $new_instance['fb_id'] );
		$instance['gplus_id'] = strip_tags( $new_instance['gplus_id'] );
		$instance['ytube_id'] = strip_tags( $new_instance['ytube_id'] );
		$instance['ytube_channel'] = strip_tags( $new_instance['ytube_channel'] );
		$instance['flickr_id'] = strip_tags( $new_instance['flickr_id'] );
		$instance['linkedin_id'] = strip_tags( $new_instance['linkedin_id'] );
		$instance['pinterest_id'] = strip_tags( $new_instance['pinterest_id'] );
		$instance['dribbble_id'] = strip_tags( $new_instance['dribbble_id'] );
		$instance['github_id'] = strip_tags( $new_instance['github_id'] );
		$instance['lastfm_id'] = strip_tags( $new_instance['lastfm_id'] );
		$instance['vimeo_id'] = strip_tags( $new_instance['vimeo_id'] );
		$instance['tumblr_id'] = strip_tags( $new_instance['tumblr_id'] );
		$instance['instagram_id'] = strip_tags( $new_instance['instagram_id'] );
		$instance['soundcloud_id'] = strip_tags( $new_instance['soundcloud_id'] );
		$instance['behance_id'] = strip_tags( $new_instance['behance_id'] );
		$instance['deviantart_id'] = strip_tags( $new_instance['deviantart_id'] );

		return $instance;
	}

	/**
	 * Widget setting
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
        $defaults = array(
            'title' => '',
            'rss' => '',
            'email_id' => '',
            'twitter_id' => '',
            'fb_id' => '',
            'gplus_id' => '',
            'ytube_id' => '',
            'ytube_channel' => '',
            'flickr_id' => '',
            'linkedin_id' => '',
            'pinterest_id' => '',
            'dribbble_id' => '',
            'github_id' => '',
            'lastfm_id' => '',
            'vimeo_id' => '',
            'tumblr_id' => '',
            'instagram_id' => '',
            'soundcloud_id' => '',
            'behance_id' => '',
            'deviantart_id' => ''
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
		$title = strip_tags( $instance['title'] );
		$rss = esc_url_raw( $instance['rss'] );
		$email_id = is_email( $instance['email_id'] );
		$twitter_id = strip_tags( $instance['twitter_id'] );
		$fb_id = strip_tags( $instance['fb_id'] );
		$gplus_id = strip_tags( $instance['gplus_id'] );
		$ytube_id = strip_tags( $instance['ytube_id'] );
		$ytube_channel = strip_tags( $instance['ytube_channel'] );
		$flickr_id = strip_tags( $instance['flickr_id'] );
		$linkedin_id = strip_tags( $instance['linkedin_id'] );
		$pinterest_id = strip_tags( $instance['pinterest_id'] );
		$dribbble_id = strip_tags( $instance['dribbble_id'] );
		$github_id = strip_tags( $instance['github_id'] );
		$lastfm_id = strip_tags( $instance['lastfm_id'] );
		$vimeo_id = strip_tags( $instance['vimeo_id'] );
		$tumblr_id = strip_tags( $instance['tumblr_id'] );
		$instagram_id = strip_tags( $instance['instagram_id'] );
		$soundcloud_id = strip_tags( $instance['soundcloud_id'] );
		$behance_id = strip_tags( $instance['behance_id'] );
		$deviantart_id = strip_tags( $instance['deviantart_id'] );

	?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>"><?php _e( 'Rss URL:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email_id' ) ); ?>"><?php _e( 'Email:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email_id' ) ); ?>" type="text" value="<?php echo esc_attr( $email_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_id' ) ); ?>"><?php _e( 'Twitter Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_id' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fb_id' ) ); ?>"><?php _e( 'Facebook Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fb_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fb_id' ) ); ?>" type="text" value="<?php echo esc_attr( $fb_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'gplus_id' ) ); ?>"><?php _e( 'Google Plus Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gplus_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gplus_id' ) ); ?>" type="text" value="<?php echo esc_attr( $gplus_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ytube_id' ) ); ?>"><?php _e( 'Youtube Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ytube_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ytube_id' ) ); ?>" type="text" value="<?php echo esc_attr( $ytube_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ytube_channel' ) ); ?>"><?php _e( 'Youtube Channel:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ytube_channel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ytube_channel' ) ); ?>" type="text" value="<?php echo esc_attr( $ytube_channel ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'flickr_id' ) ); ?>"><?php _e( 'Flickr Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr_id' ) ); ?>" type="text" value="<?php echo esc_attr( $flickr_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin_id' ) ); ?>"><?php _e( 'Linkedin Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_id' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_id' ) ); ?>"><?php _e( 'Pinterest Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_id' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest_id ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble_id' ) ); ?>"><?php _e( 'Dribbble Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble_id' ) ); ?>" type="text" value="<?php echo esc_attr( $dribbble_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'github_id' ) ); ?>"><?php _e( 'Github Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github_id' ) ); ?>" type="text" value="<?php echo esc_attr( $github_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'lastfm_id' ) ); ?>"><?php _e( 'Last FM Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lastfm_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lastfm_id' ) ); ?>" type="text" value="<?php echo esc_attr( $lastfm_id ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo_id' ) ); ?>"><?php _e( 'Vimeo Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo_id' ) ); ?>" type="text" value="<?php echo esc_attr( $vimeo_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr_id' ) ); ?>"><?php _e( 'Tumblr Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr_id' ) ); ?>" type="text" value="<?php echo esc_attr( $tumblr_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_id' ) ); ?>"><?php _e( 'Instagram Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_id' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'soundcloud_id' ) ); ?>"><?php _e( 'Soundcloud Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'soundcloud_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'soundcloud_id' ) ); ?>" type="text" value="<?php echo esc_attr( $soundcloud_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'behance_id' ) ); ?>"><?php _e( 'Behance Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance_id' ) ); ?>" type="text" value="<?php echo esc_attr( $behance_id ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'deviantart_id' ) ); ?>"><?php _e( 'Deviantart Username:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'deviantart_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'deviantart_id' ) ); ?>" type="text" value="<?php echo esc_attr( $deviantart_id ); ?>" />
		</p>

	<?php
	}

}
