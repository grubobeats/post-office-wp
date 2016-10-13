<?php
/**
 * WooCommerce Functions
 */

/**
 * Redirect Option After customer Login
 */
function tokopress_wc_login_redirect( $redirect_to ) {
    $redirect_to = esc_url( of_get_option( 'tokopress_wc_red_cus_login' ) );
    return $redirect_to;
}
if( of_get_option( 'tokopress_wc_red_cus_login' ) ) {
	add_filter( 'woocommerce_login_redirect', 'tokopress_wc_login_redirect' );
}

add_action( 'admin_head', 'tokopress_wc_plugin_check_notice_head', 999 );
function tokopress_wc_plugin_check_notice_head() {
	if ( isset( $_GET['page'] ) && 'wc-settings' == $_GET['page'] ) {
		add_action( 'woocommerce_settings_saved', 'tokopress_wc_plugin_check_notice' );
	}
	else {
		add_action( 'admin_notices', 'tokopress_wc_plugin_check_notice' );
	}
}

function tokopress_wc_plugin_check_notice() {
	if ( !current_user_can( 'manage_options' ) )
		return;

	$woo_pages = array(
		'shop' => array(
				'name'    	=> 'Shop Base',
				'option'    => 'woocommerce_shop_page_id',
				'shortcode' => '',
				'setting'   => admin_url( 'admin.php?page=wc-settings&tab=products&section=display' ),
			),
		'cart' => array(
				'name'    	=> 'Cart',
				'option'    => 'woocommerce_cart_page_id',
				'shortcode' => '[' . apply_filters( 'woocommerce_cart_shortcode_tag', 'woocommerce_cart' ) . ']',
				'setting'   => admin_url( 'admin.php?page=wc-settings&tab=checkout' ),
			),
		'checkout' => array(
				'name'    	=> 'Checkout',
				'option'    => 'woocommerce_checkout_page_id',
				'shortcode' => '[' . apply_filters( 'woocommerce_checkout_shortcode_tag', 'woocommerce_checkout' ) . ']',
				'setting'   => admin_url( 'admin.php?page=wc-settings&tab=checkout' ),
			),
		'myaccount' => array(
				'name'    	=> 'My Account',
				'option'    => 'woocommerce_myaccount_page_id',
				'shortcode' => '[' . apply_filters( 'woocommerce_my_account_shortcode_tag', 'woocommerce_my_account' ) . ']',
				'setting'   => admin_url( 'admin.php?page=wc-settings&tab=account' ),
			)
	);
	foreach ( $woo_pages as $woo_page ) {
		$page_id = get_option( $woo_page['option'] );
		if ( ! $page_id ) {
			echo '<div class="notice-error error"><p>';
			printf( __( '"%s" page not set', 'tokopress' ), $woo_page['name'] );
			echo '</p></div>';
		} 
		else {
			if ( $woo_page['shortcode'] ) {
				$page = get_post( $page_id );
				if ( empty( $page ) ) {
					echo '<div class="notice-error error"><p>';
					printf( __( '"%s" page does not exist', 'tokopress' ), $woo_page['name'] );
					echo '</p></div>';
				} 
				else if ( ! strstr( $page->post_content, $woo_page['shortcode'] ) ) {
					echo '<div class="notice-error error"><p>';
					printf( __( '"%s" page does not contain the shortcode: <code>%s</code>', 'tokopress' ), $woo_page['name'], $woo_page['shortcode'] );
					echo '</p></div>';
				}
			}
		}
	}

	$vendors = array();
	if ( class_exists('WC_Vendors') ) {
		$vendors[] = '<strong>WC Vendors</strong>';
	}
	if ( class_exists('WooCommerce_Product_Vendors') ) {
		$vendors[] = '<strong>WooCommerce Product Vendors</strong>';
	}
	if ( class_exists('FPMultiVendor') ) {
		$vendors[] = '<strong>Socio Multi Vendors</strong>';
	}
	if ( class_exists('WeDevs_Dokan') ) {
		$vendors[] = '<strong>Dokan</strong>';
	}
	if ( count( $vendors ) > 1 ) {
		echo '<div class="notice-error error"><p>';
		printf( __( '%s vendor plugins (%s) are active. Please use only one of them!', 'tokopress' ), count( $vendors), implode(', ', $vendors ) );
		echo '</p></div>';
	}
	if ( class_exists('Product_Vendor') ) {
		echo '<div class="notice-error error"><p>';
		printf( __( '%s plugin is no longer in active development. Please deactivate and replace it with %s plugin!', 'tokopress' ), '<strong>Mgates Product Vendor</strong>', '<strong>WC Vendors</strong>' );
		echo '</p></div>';
	}

	if ( class_exists('WC_Vendors') ) {
		$wcvendors_pages = array(
			'shop' => array(
					'name'    	=> 'WC Vendors - Vendor Dashboard',
					'option'    => 'vendor_dashboard_page',
					'shortcode' => '[wcv_vendor_dashboard]',
					'setting'   => admin_url( 'admin.php?page=wc_prd_vendor&tab=pages' ),
				),
			'cart' => array(
					'name'    	=> 'WC Vendors - Shop Settings',
					'option'    => 'shop_settings_page',
					'shortcode' => '[wcv_shop_settings]',
					'setting'   => admin_url( 'admin.php?page=wc_prd_vendor&tab=pages' ),
				),
			'checkout' => array(
					'name'    	=> 'WC Vendors - Orders',
					'option'    => 'orders_page',
					'shortcode' => '[wcv_orders]',
					'setting'   => admin_url( 'admin.php?page=wc_prd_vendor&tab=pages' ),
				),
		);
		foreach ( $wcvendors_pages as $wcvendors_page ) {
			$page_id = WC_Vendors::$pv_options->get_option( $wcvendors_page['option'] );
			if ( ! $page_id ) {
				echo '<div class="notice-error error"><p>';
				printf( __( '"%s" page not set', 'tokopress' ), $wcvendors_page['name'] );
				echo '</p></div>';
			} 
			else {
				if ( $wcvendors_page['shortcode'] ) {
					$page = get_post( $page_id );
					if ( empty( $page ) ) {
						echo '<div class="notice-error error"><p>';
						printf( __( '"%s" page does not exist', 'tokopress' ), $wcvendors_page['name'] );
						echo '</p></div>';
					} 
					else if ( ! strstr( $page->post_content, $wcvendors_page['shortcode'] ) ) {
						echo '<div class="notice-error error"><p>';
						printf( __( '"%s" page does not contain the shortcode: <code>%s</code>', 'tokopress' ), $wcvendors_page['name'], $wcvendors_page['shortcode'] );
						echo '</p></div>';
					}
				}
			}
		}
	}

}
