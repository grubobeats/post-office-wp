<?php
/**
 * Theme Setup
 */

tokopress_include_file( get_template_directory() . '/inc/customizer/customizer-framework.php' );
tokopress_include_file( get_template_directory() . '/inc/customizer/customizer-fonts.php' );
tokopress_include_file( get_template_directory() . '/inc/functions/text-limiter.php' );
tokopress_include_file( get_template_directory() . '/inc/functions/hybrid-media-grabber.php' );
tokopress_include_file( get_template_directory() . '/inc/functions/contact-form.php' );
tokopress_include_file( get_template_directory() . '/inc/functions/breadcrumb.php' );

tokopress_include_file( get_template_directory() . '/inc/theme/frontend.php' );
tokopress_include_file( get_template_directory() . '/inc/theme/options.php' );
tokopress_include_file( get_template_directory() . '/inc/theme/designs.php' );
tokopress_include_file( get_template_directory() . '/inc/theme/plugins.php' );
tokopress_include_file( get_template_directory() . '/inc/theme/update.php' );

tokopress_include_file( get_template_directory() . '/inc/widget/widget_subscribe.php' );
tokopress_include_file( get_template_directory() . '/inc/widget/widget_statistic.php' );
tokopress_include_file( get_template_directory() . '/inc/widget/widget_social.php' );

if( class_exists( 'woocommerce' ) ) {
	tokopress_include_file( get_template_directory() . '/inc/woocommerce/frontend.php' );
	tokopress_include_file( get_template_directory() . '/inc/woocommerce/options.php' );
	tokopress_include_file( get_template_directory() . '/inc/woocommerce/metabox.php' );
	tokopress_include_file( get_template_directory() . '/inc/woocommerce/functions.php' );
	tokopress_include_file( get_template_directory() . '/inc/woocommerce/designs.php' );
	if ( class_exists('WC_Vendors') ) {
		tokopress_include_file( get_template_directory() . '/inc/woocommerce/plugin-wcvendors.php' );
	}
	if ( class_exists('WeDevs_Dokan') ) {
		tokopress_include_file( get_template_directory() . '/inc/woocommerce/plugin-dokan.php' );
	}
	if ( class_exists('FPMultiVendor') ) {
		tokopress_include_file( get_template_directory() . '/inc/woocommerce/plugin-sociovendors.php' );
	}
}

add_action( 'woocommerce_init', 'tokopress_woovendors_check' );
function tokopress_woovendors_check() {
	if ( class_exists('WooCommerce_Product_Vendors') ) {
		tokopress_include_file( get_template_directory() . '/inc/woocommerce/plugin-woovendors.php' );
	}
}
