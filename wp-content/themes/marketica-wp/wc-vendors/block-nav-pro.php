<?php

$dashboard_pages = array();

$products_disabled      = WCVendors_Pro::get_option( 'product_management_cap' );
$orders_disabled        = WCVendors_Pro::get_option( 'order_management_cap' );
$coupons_disabled       = WCVendors_Pro::get_option( 'shop_coupon_management_cap' );
$ratings_disabled       = WCVendors_Pro::get_option( 'ratings_management_cap' );
$viewstore_disabled     = WCVendors_Pro::get_option( 'view_store_cap' );

$dashboard_id = WCVendors_Pro::get_option( 'dashboard_page_id' );
$dashboard_url = $dashboard_id ? get_permalink( $dashboard_id ) : false; 

if ( $dashboard_url ) {
	$dashboard_pages[ 'dashboard' ] = array( 
		'url'			=> $dashboard_url, 
		'label'			=> __('Dashboard', 'tokopress' ), 
		'icon'			=> 'sli sli-speedometer', 
	);
}

if ( $dashboard_url && !$products_disabled ) {
	$dashboard_pages[ 'product' ] = array( 
		'url'			=> $dashboard_url . 'product', 
		'label'			=> __('Products', 'tokopress' ), 
		'icon'			=> 'sli sli-grid', 
	);
}

if ( $dashboard_url && !$orders_disabled ) {
	$dashboard_pages[ 'order' ] = array( 
		'url'			=> $dashboard_url . 'order', 
		'label'			=> __('Orders', 'tokopress' ), 
		'icon'			=> 'sli sli-graph', 
	);
}

$dashboard_pages[ 'settings' ] = array( 
	'url'			=> $dashboard_url . 'settings', 
	'label'			=> __('Settings', 'tokopress' ), 
	'icon'			=> 'sli sli-settings', 
);

if ( $dashboard_url && !$ratings_disabled ) {
	$dashboard_pages[ 'rating' ] = array( 
		'url'			=> $dashboard_url . 'rating', 
		'label'			=> __('Ratings', 'tokopress' ), 
		'icon'			=> 'sli sli-star', 
	);
}

if ( $dashboard_url && !$coupons_disabled && 'yes' == get_option( 'woocommerce_enable_coupons' ) ) { 
	$dashboard_pages[ 'shop_coupon' ] = array( 
		'url'			=> $dashboard_url . 'shop_coupon', 
		'label'			=> __('Coupons', 'tokopress' ), 
		'icon'			=> 'sli sli-present', 
	);
}

if ( !$viewstore_disabled && $store_url = WCVendors_Pro_Vendor_Controller::get_vendor_store_url( get_current_user_id() ) ) { 
	$dashboard_pages[ 'visit_store' ] = array( 
		'url'			=> $store_url, 
		'label'			=> __('View Store', 'tokopress' ), 
		'icon'			=> 'sli sli-bag', 
	);
} 

if ( !empty( $dashboard_pages ) ) {
	foreach ( $dashboard_pages as $key => $item ) {
        printf( '<li><a href="%s">%s <i class="%s"></i></a></li>', $item['url'], $item['label'], $item['icon'] );
	}
}
