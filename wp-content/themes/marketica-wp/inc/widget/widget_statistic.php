<?php
/**
 * Statistic Widget
 */

function tokopress_widget_statistics_init() {
	register_widget('TokoPress_Widget_Statistics');
}
add_action('widgets_init', 'tokopress_widget_statistics_init');

class TokoPress_Widget_Statistics extends WP_Widget {

	function __construct() {
		parent::__construct(
				'TokoPress_Widget_Statistics',
				__( 'Tokopress - Statistic Product and Users', 'tokopress' ),
				array( 'description' => __( 'Display statistic product and users', 'tokopress' ) )
			);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		printf( '%s', $args['before_widget'] );
		if ( $title ) {
			printf( '%s', $args['before_title'] . $title . $args['after_title'] );
		}

		echo '<div class="widget-statistic">';

		if( class_exists( 'woocommerce' ) ) {


			$result = count_users();

			if ( isset( $result['avail_roles']['customer'] ) ) {
				$members = $result['avail_roles']['customer'];
				if ( $members > 0 ) {
					echo '<div class="market-members">';
					echo '<p class="title">' . __( 'Marketplace Members', 'tokopress' ) . '</p>';
					echo '<p class="statistic">' . number_format( $members, 0, '', '.' ) . '</p>';
					echo '</div>';
				}
			}

			$role_seller = '';
			if ( class_exists('WC_Vendors') ) {
				$role_seller = 'vendor';
			}
			elseif ( class_exists('WeDevs_Dokan') ) {
				$role_seller = 'seller';
			}
			
			if ( $role_seller ) {
				if ( isset( $result['avail_roles'][$role_seller] ) ) {
					$sellers = $result['avail_roles'][$role_seller];
					if ( $sellers > 2 ) {
						echo '<div class="market-members">';
						echo '<p class="title">' . __( 'Marketplace Sellers', 'tokopress' ) . '</p>';
						echo '<p class="statistic">' . number_format( $sellers, 0, '', '.' ) . '</p>';
						echo '</div>';
					}
				}
			}

			// $count_posts = count( get_posts( array( 'post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1' ) ) );
			$count_posts = wp_count_posts( 'product' );
			$count_posts = $count_posts->publish;
			$items_title = __( 'Marketplace Items', 'tokopress' );

		}
		else {

			$count_posts = wp_count_posts( 'post' );
			$count_posts = $count_posts->publish;
			$items_title = __( 'Posts', 'tokopress' );

		}

		echo '<div class="market-items">';

		echo '<p class="title">' . $items_title . '</p>';

		echo '<p class="statistic">' . number_format( $count_posts, 0, '', '.' ) . '</p>';

		echo '</div>';

		echo '</div>';

		printf( '%s', $args['after_widget'] );
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : __( 'Statistics', 'tokopress' );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'tokopress' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}
