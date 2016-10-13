<?php
/**
 * Template Name:Contact
 */

get_header(); ?>

<?php if ( of_get_option( 'tokopress_page_header_style' ) != 'inner' ) get_template_part( 'block-page-header-outer' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<section class="content-area" id="primary">

		<?php if ( of_get_option( 'tokopress_page_header_style' ) == 'inner' ) get_template_part( 'block-page-header-inner' ); ?>

	    <div class="page-content contact-form">

			<?php if ( have_posts() ) : ?>

				<?php if( !of_get_option( 'tokopress_disable_contact_map' ) ) : ?>
				<div class="map-section map-block">
					<?php
						$latitude = of_get_option( 'tokopress_contact_lat' );
						$longitude = of_get_option( 'tokopress_contact_long' );

						$get_marker_title = of_get_option( 'tokopress_contact_marker_title' );
						$get_marker_content = of_get_option( 'tokopress_contact_marker_desc' );
						$get_zoom = 15;
					 ?>
						<script type="text/javascript">
							var map;
							jQuery(document).ready(function(){
							  map = new GMaps({
								el: '#map',
								lat: <?php $map_latitude = ( ! empty( $latitude ) ) ? $latitude : -6.903932 ; echo esc_attr( $map_latitude ); ?>,
								lng: <?php $map_longitude = ( ! empty( $longitude ) ) ? $longitude : 107.610344 ; echo esc_attr( $map_longitude ); ?>,
								zoom :<?php echo esc_attr( $get_zoom ); ?>,
								scrollwheel: false
							  });

							 <?php 	$marker_title = ( ! empty( $get_marker_title ) ) ? $get_marker_title : 'Marker Title' ;
									$clear_marker_title = str_replace( "\r\n", "<br/>", $marker_title );
											?>

							 <?php 	$marker_content = ( ! empty( $get_marker_content ) ) ? $get_marker_content : 'Marker Content' ;
									$clear_marker_content = str_replace( "\r\n", "<br/>", $marker_content );
									?>

							 var markerTitle = "<?php printf( '<h1>%s</h1>', $clear_marker_title ); ?>";
							 var markerContent = "<?php printf( '<p>%s</p>', $clear_marker_content ); ?>";

							 map.addMarker({
								lat: <?php echo esc_attr( $map_latitude ); ?>,
								lng: <?php echo esc_attr( $map_longitude ); ?>,
								title: 'Marker with InfoWindow',
								infoWindow: {
								  content: markerTitle + markerContent,

								}
							  });

							});
						</script>

					<div id="map" style="height:500px;"></div>

				</div>
				<?php endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php if( "" != get_the_content() ): ?>

						<div id="page-<?php echo get_the_ID(); ?>" class="page-area">

							<?php the_content(); ?>

						</div><!-- Content Block -->

					<?php endif; ?>
				<?php endwhile; ?>

				<?php
				$current_page_id = $wp_query->get_queried_object_id();

				$args = array();

				$email = tokopress_get_post_meta( '_toko_contact_email', $current_page_id );
				if ( $email ) $args['email'] = $email;

				$subject = tokopress_get_post_meta( '_toko_contact_subject', $current_page_id );
				if ( $subject ) $args['subject'] = $subject;

				$sendcopy = tokopress_get_post_meta( '_toko_contact_sendcopy', $current_page_id );
				if ( $sendcopy ) $args['sendcopy'] = $sendcopy;

				$button_text = tokopress_get_post_meta( '_toko_contact_button', $current_page_id );
				if ( $button_text ) $args['button_text'] = $button_text;

				echo tokopress_get_contact_form( $args );
				?>
				<!-- Contact Form -->

			<?php else : ?>

				<?php get_template_part( 'content', '404' ); ?>

			<?php endif; ?>

	    </div>
	</section>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
