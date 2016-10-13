<h2><?php _e( 'Control Center', 'tokopress' ); ?></h2>

<div class="shortcut-vendor">
	<a href="<?php echo esc_url( $shop_page ); ?>" class="button alt"><?php _e( 'My shop', 'tokopress' ); ?></a>
	<a href="<?php echo esc_url( $settings_page ); ?>" class="button alt"><?php _e( 'My settings', 'tokopress' ); ?></a>

	<?php if ( $can_submit ) { ?>
	    <?php $frontend = of_get_option( 'tokopress_wcvendors_frontend_submit' ); ?>
	    <?php $link = $frontend && function_exists( 'xt_wc_frontend_submission_shortcode' ) ? get_permalink( $frontend ) : admin_url( 'post-new.php?post_type=product' ); ?>
		<a target="_TOP" href="<?php echo esc_url( $link ); ?>" class="button alt"><?php _e( 'Submit a product', 'tokopress' ); ?></a>
	<?php } ?>

</div>
