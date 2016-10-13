<?php

function tokopress_dokan_settings( $options ) {
    $options[] = array(
        'name'  => __( 'Dokan', 'tokopress' ),
        'type'  => 'heading'
    );

    $options[] = array(
        'name' => __( 'Dokan - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'Vendor Description on Top of Shop Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_shop_description',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( '"Sold by" at Product List', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_shop_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'Dokan - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"Seller Info" at Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_tab',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( '"More From This Seller" Products', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_moreproducts',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( '"Sold by" at Product Meta', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'Dokan - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_dokan_settings', 20 );

add_filter( 'tokopress_layout_class', 'tokopress_dokan_layout_class' );
function tokopress_dokan_layout_class( $layout ) {
    if ( dokan_is_store_page () ) {
    	if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) {
			$layout = 'layout-2c-l';
    	}
    	else {
        	if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) {
				$layout = 'layout-2c-l';
        	}
        	else {
				$layout = 'layout-1c-full';
        	}
    	}
    }
	return $layout;
}

add_action( 'tokopress_quicknav_account', 'tokopress_dokan_quicknav_account' );
function tokopress_dokan_quicknav_account() {
	if ( ! is_user_logged_in() )
		return;

    global $current_user;

    $user_id = $current_user->ID;
    if ( ! dokan_is_user_seller( $user_id ) )
		return;

    $nav_urls = dokan_get_dashboard_nav();

    foreach ($nav_urls as $key => $item) {
        printf( '<li><a href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
    }
}

if( of_get_option( 'tokopress_dokan_shop_soldby' ) != 'no' ) {
    add_action( 'woocommerce_after_shop_loop_item_title', 'tokopress_dokan_product_seller_name', 2 );
}
function tokopress_dokan_product_seller_name() {
    global $product;
    $author = get_user_by( 'id', $product->post->post_author );
    printf( '<p class="product-seller-name">%s <a href="%s">%s</a></p>', __( 'sold by', 'tokopress' ), dokan_get_store_url( $author->ID ), $author->display_name );
}

if( of_get_option( 'tokopress_dokan_product_tab' ) == 'no' ) {
    remove_filter( 'woocommerce_product_tabs', 'dokan_seller_product_tab' );
}

if( of_get_option( 'tokopress_dokan_product_moreproducts' ) != 'no' ) {
	add_action( 'tokopress_wc_after_single_product', 'tokopress_dokan_more_products', 5 );
}
function tokopress_dokan_more_products() {
	get_template_part( 'dokan/block-more-products' );
}

if( of_get_option( 'tokopress_dokan_product_soldby' ) != 'no' ) {
	add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_sold_by_meta', 25, 2 );
}
function tokopress_dokan_sold_by_meta() {
    global $product;
    $author = get_user_by( 'id', $product->post->post_author );
    $sold_by = sprintf( '<a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $author->display_name );
	echo '<ul class="list-item-details"><li><span class="data-type">'.__( 'sold by', 'tokopress' ).'</span><span class="value">'.$sold_by.'</span></li></ul>';
}

if( of_get_option( 'tokopress_dokan_cart_soldby' ) == 'no' ) {
    remove_filter( 'woocommerce_get_item_data', 'dokan_product_seller_info', 10, 2 );
}

add_filter( 'body_class', 'toko_dokan_body_class_product_columns' );
function toko_dokan_body_class_product_columns( $classes ) {
    $columns = 0;
    if ( function_exists('dokan_is_store_page') && dokan_is_store_page() ) {
        $columns = apply_filters( 'loop_shop_columns', 3 );
        if ( $columns < 1 ) $columns = 3;
        if ( $columns > 5 ) $columns = 5;
    }
    if ( $columns ) {
        $classes[] = 'woocommerce';
        $classes[] = 'columns-' . $columns;
    }
    return $classes;
}
