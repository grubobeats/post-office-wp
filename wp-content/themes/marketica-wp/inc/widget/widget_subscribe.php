<?php
/**
 * Custom Subscribe
 */

function tokopress_widget_subscribe_init() {
	if( !( defined( 'MC4WP_VERSION' ) || class_exists( "MC4WP_Lite" ) ) )
		return;
	unregister_widget( 'MC4WP_Lite_Widget' );
	register_widget('TokoPress_Widget_Subscribe');
}
add_action('widgets_init', 'tokopress_widget_subscribe_init');

class TokoPress_Widget_Subscribe extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'TokoPress_Widget_Subscribe', // Base ID
			__( 'Tokopress - Subscribe Form', 'tokopress' ), // Name
			array( 'description' => __( 'Displays your custom MailChimp for WordPress sign-up form', 'tokopress' ) ) // Args
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		printf( '%s', $args['before_widget'] );
		if ( $title ) {
			printf( '%s', $args['before_title'] . $title . $args['after_title'] );
		}

		if( "" != $instance['description'] )
			echo '<p class="form-desc">' . $instance['description'] . '</p>';

		$form_id = $instance['form_id'];
		if ( $form_id > 0 ) {
			echo do_shortcode( '[mc4wp_form id="'.$form_id.'"]' );
		}
		else {
			echo do_shortcode( '[mc4wp_form]' );
		}

		printf( '%s', $args['after_widget'] );
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : __( 'Newsletter', 'tokopress' );
		$description = isset( $instance['description'] ) ? $instance['description'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php _e( 'Form Description', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'form_id' ); ?>"><?php _e( 'Select Form:', 'tokopress' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'form_id' ); ?>" name="<?php echo $this->get_field_name( 'form_id' ); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;', 'tokopress' ); ?></option>
				<?php if ( function_exists('mc4wp_get_forms') ) : ?>
					<?php $forms = mc4wp_get_forms(); ?>
					<?php foreach( $forms as $form ) : ?>
						<option value="<?php echo esc_attr( $form->ID ); ?>" <?php selected( $instance['form_id'], $form->ID ); ?>>
							<?php echo esc_html( $form->name ); ?>
						</option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
		</p>
		<p class="help">
			<?php printf( __( 'You can edit your sign-up form in the %sMailChimp for WordPress form settings%s.', 'tokopress' ), '<a href="' . admin_url('admin.php?page=mc4wp-lite-form-settings') . '">', '</a>' ); ?>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		if ( ! empty( $new_instance['form_id'] ) ) {
			$instance['form_id'] = (int) $new_instance['form_id'];
		}
		return $instance;
	}
}
