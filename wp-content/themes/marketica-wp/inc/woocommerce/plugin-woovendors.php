<?php

function tokopress_woovendors_settings( $options ) {
    $options[] = array(
        'name'  => __( 'WooVendors', 'tokopress' ),
        'type'  => 'heading'
    );

    $options[] = array(
        'name' => __( 'WooVendors - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'Vendor Description on Top of Shop Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_description',
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
            'id' => 'tokopress_woovendors_shop_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'WooVendors - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"More From This Seller" Products', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_moreproducts',
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
            'id' => 'tokopress_woovendors_product_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    $options[] = array(
        'name' => __( 'WooVendors - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_woovendors_settings', 20 );

add_action( 'tokopress_quicknav_account', 'tokopress_woovendors_quicknav_account' );
function tokopress_woovendors_quicknav_account() {
    // printf( '<li><a href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
}

add_action( 'tokopress_before_inner_content', 'tokopress_woovendors_store_header', 5 );
function tokopress_woovendors_store_header() {
    get_template_part( 'woovendors/store-header' );
}

if( of_get_option( 'tokopress_woovendors_shop_soldby' ) != 'no' ) {
    add_action( 'woocommerce_after_shop_loop_item_title', 'tokopress_woovendors_product_seller_name', 2 );
}
function tokopress_woovendors_product_seller_name() {
    echo tokopress_get_the_term_list( get_the_ID(), 'shop_vendor', '<p class="product-seller-name">'.__( 'sold by', 'tokopress' ).' ', ', ', '</p>' );
}

if( of_get_option( 'tokopress_woovendors_product_moreproducts' ) != 'no' ) {
    add_action( 'tokopress_wc_after_single_product', 'tokopress_woovendors_more_products', 5 );
}
function tokopress_woovendors_more_products() {
    get_template_part( 'woovendors/block-more-products' );
}

if( of_get_option( 'tokopress_woovendors_product_soldby' ) != 'no' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_sold_by_meta', 25, 2 );
}
function tokopress_woovendors_sold_by_meta() {
    echo tokopress_get_the_term_list( get_the_ID(), 'shop_vendor', '<ul class="list-item-details"><li><span class="data-type">'.__( 'sold by', 'tokopress' ).'</span><span class="value">', ', ', '</span></li></ul>' );
}

if( of_get_option( 'tokopress_woovendors_cart_soldby' ) != 'no' ) {
    add_filter( 'woocommerce_get_item_data', 'woovendors_product_seller_info', 10, 2 );
}
function woovendors_product_seller_info( $item_data, $cart_item ) {
    $sold_by = tokopress_get_the_term_list( $cart_item['data']->post->ID, 'shop_vendor', '', ', ', '' );
    if ( $sold_by ) {
        $item_data[] = array(
            'name'  => __( 'sold by', 'tokopress' ),
            'value' => tokopress_get_the_term_list( $cart_item['data']->post->ID, 'shop_vendor', '', ', ', '' )
        );
    }
    return $item_data;
}
