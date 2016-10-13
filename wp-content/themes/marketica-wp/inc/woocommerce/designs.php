<?php
/**
 * Woocommerce Customizer
 */

/**
 * Panel WooCommerce
 */
add_filter( 'tokopress_customizer_panels', 'tokopress_customize_woo_panel' );
function tokopress_customize_woo_panel( $tk_panels ) {
	$tk_panels[] = array(
			'ID'			=> 'tokopress_woo_panel',
			'priority'		=> 160,
			'title'			=> __( 'WooCommerce', 'tokopress' ),
			'description'	=> __( 'Customize your woocommerce sections', 'tokopress' )
		);

	return $tk_panels;
}

/**
 * Buttons
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_wc_button_section' );
function tokopress_wc_button_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_wc_button_section',
			'label'		=> __( 'WC - Buttons', 'tokopress' ),
			'priority'	=> 1,
			'panel_id'	=> 'tokopress_woo_panel'
		);

	return $tk_sections;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_button_color' );
function tokopress_wc_button_color( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_button_color',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Button (Default)', 'tokopress' ),
		'section'	=> 'tokopress_wc_button_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_button_alt_color',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Button Alt (Primary)', 'tokopress' ),
		'section'	=> 'tokopress_wc_button_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_button_single_addtocart',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'AddToCart Button On Single Product', 'tokopress' ),
		'section'	=> 'tokopress_wc_button_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce div.product .button.alt.single_add_to_cart_button, .woocommerce #content div.product .button.alt.single_add_to_cart_button, .woocommerce-page div.product .button.alt.single_add_to_cart_button, .woocommerce-page #content div.product .button.alt.single_add_to_cart_button',
		'property'	=> 'background-color',
		'propertyadd'	=> '!important'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_button_cart_checkout',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Checkout Button On Cart Page', 'tokopress' ),
		'section'	=> 'tokopress_wc_button_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button',
		'property'	=> 'background-color',
		'propertyadd'	=> '!important'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_button_checkout_payment',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Payment Button On Checkout Page', 'tokopress' ),
		'section'	=> 'tokopress_wc_button_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce #payment #place_order, .woocommerce-page #payment #place_order',
		'property'	=> 'background-color',
		'propertyadd'	=> '!important'
	);

	return $tk_colors;
}
add_action( 'tokopress_custom_styles', 'tokopress_customizer_css_wc', 10 );
function tokopress_customizer_css_wc() { 
	$color = get_theme_mod( 'tokopress_wc_button_color' );
	if ( $color ) {
		echo '.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button { box-shadow: '.$color.' 0 0px 0px 2px inset; }';
		echo '.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover { box-shadow: '.$color.' 0 0px 0px 40px inset; }';
		echo '.woocommerce div.product div.woocommerce-tabs ul.tabs li a, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li a, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li a, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li a { color: '.$color.'; } .woocommerce div.product div.woocommerce-tabs ul.tabs li, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li { color: '.$color.'; box-shadow: '.$color.' 0 0px 0px 2px inset; } .woocommerce div.product div.woocommerce-tabs ul.tabs li:hover, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li:hover, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li:hover, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li:hover { box-shadow: '.$color.' 0 0px 0px 40px inset; }';
	}
	$color = get_theme_mod( 'tokopress_wc_button_alt_color' );
	if ( $color ) {
		echo '.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt { box-shadow: '.$color.' 0 0px 0px 2px inset; }';
		echo '.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover { box-shadow: '.$color.' 0 0px 0px 40px inset; }';
		echo '.woocommerce ul.products li.product .add-to-cart-loop-wrap .detail_button_loop, .woocommerce ul.products li.product .add-to-cart-loop-wrap .button[class*=\'product_type_\'], .woocommerce ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .detail_button_loop, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .button[class*=\'product_type_\'], .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward, .woocommerce ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward, .woocommerce-page ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward, .woocommerce ul.products li.product .detail-action .added_to_cart.wc-forward, .woocommerce-page ul.products li.product .detail-action .added_to_cart.wc-forward, .tpvc-featured-product.woocommerce ul.products li.product .featured-action .button, .woocommerce ul.products li.product-hover-caption .product-action .button, .woocommerce-page ul.products li.product-hover-caption .product-action .button, .widget_mc4wp_widget_custom form input[type="submit"], .widget_tokopress_widget_subscribe form input[type="submit"], .post_tag-cloud a, .widget_tag_cloud a, .widget_product_tag_cloud a { color: '.$color.'; box-shadow: '.$color.' 0 0px 0px 2px inset; }';
		echo '.woocommerce ul.products li.product .add-to-cart-loop-wrap .detail_button_loop:hover, .woocommerce ul.products li.product .add-to-cart-loop-wrap .button[class*=\'product_type_\']:hover, .woocommerce ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward:hover, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .detail_button_loop:hover, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .button[class*=\'product_type_\']:hover, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap .added_to_cart.wc-forward:hover, .woocommerce ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward:hover, .woocommerce-page ul.products li.product .add-to-cart-style-2-loop-wrap .button-style-2-wrapper .added_to_cart.wc-forward:hover, .woocommerce ul.products li.product .detail-action .added_to_cart.wc-forward:hover, .woocommerce-page ul.products li.product .detail-action .added_to_cart.wc-forward:hover, .tpvc-featured-product.woocommerce ul.products li.product .featured-action .button:hover, .woocommerce ul.products li.product-hover-caption .product-action .button:hover, .woocommerce-page ul.products li.product-hover-caption .product-action .button:hover, .widget_mc4wp_widget_custom form input[type="submit"]:hover, .widget_tokopress_widget_subscribe form input[type="submit"]:hover, .post_tag-cloud a:hover, .widget_tag_cloud a:hover, .widget_product_tag_cloud a:hover { box-shadow: '.$color.' 0 0px 0px 40px inset; }';
		echo '.woocommerce div.product div.woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li.active a { color: '.$color.'; } .woocommerce div.product div.woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li.active { box-shadow: '.$color.' 0 0px 0px 2px inset; } .woocommerce div.product div.woocommerce-tabs ul.tabs li.active:hover, .woocommerce #content div.product div.woocommerce-tabs ul.tabs li.active:hover, .woocommerce-page div.product div.woocommerce-tabs ul.tabs li.active:hover, .woocommerce-page #content div.product div.woocommerce-tabs ul.tabs li.active:hover { box-shadow: '.$color.' 0 0px 0px 40px inset; }';
	}
}

/**
 * Shop Page
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_wc_product_section' );
function tokopress_wc_product_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_wc_product_section',
			'label'		=> __( 'WC - Shop', 'tokopress' ),
			'priority'	=> 1,
			'panel_id'	=> 'tokopress_woo_panel'
		);

	return $tk_sections;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_catalog_order_color' );
function tokopress_wc_catalog_order_color( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_catalog_order_bg',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Catalog Ordering Background', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.shop-content-top .container',
		'property'	=> 'background-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_catalog_order_color',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Catalog Ordering Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.catalog-order-wrap .section-title',
		'property'	=> 'color'
	);

	return $tk_colors;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_product_sale_flash' );
function tokopress_wc_product_sale_flash( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_sale_flash_bg',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Sale Flash Background', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product span.onsale, .woocommerce-page ul.products li.product span.onsale, .woocommerce #content div.product span.onsale, .woocommerce div.product span.onsale, .woocommerce-page #content div.product span.onsale, .woocommerce-page div.product span.onsale',
		'property'	=> 'background-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_sale_flash_color',
		'default'	=> '',
		'priority'	=> 2,
		'label'		=> __( 'Sale Flash Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product span.onsale, .woocommerce-page ul.products li.product span.onsale, .woocommerce #content div.product span.onsale, .woocommerce div.product span.onsale, .woocommerce-page #content div.product span.onsale, .woocommerce-page div.product span.onsale',
		'property'	=> 'color'
	);

	return $tk_colors;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_product_general' );
function tokopress_wc_product_general( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_bg_color',
		'default'	=> '',
		'priority'	=> 3,
		'label'		=> __( 'Product Background', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
		'property'	=> 'background-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_sep',
		'default'	=> '',
		'priority'	=> 4,
		'label'		=> __( 'Product Separator', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product .title-rating-loop-wrap, .woocommerce-page ul.products li.product .title-rating-loop-wrap',
		'property'	=> 'border-left-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_color',
		'default'	=> '',
		'priority'	=> 5,
		'label'		=> __( 'Product Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.product p, .woocommerce-page ul.products li.product p',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_title_color',
		'default'	=> '',
		'priority'	=> 6,
		'label'		=> __( 'Product Title Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product h3, .woocommerce ul.products li.product h3 a, .woocommerce-page ul.products li.product h3, .woocommerce-page ul.products li.product h3 a, .woocommerce ul.products li.product-hover-caption .product-title, .woocommerce-page ul.products li.product-hover-caption .product-title',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_price_color',
		'default'	=> '',
		'priority'	=> 7,
		'label'		=> __( 'Product Price Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product .price-loop-wrap .price, .woocommerce-page ul.products li.product .price-loop-wrap .price, .woocommerce ul.products li.product-hover-caption span.price, .woocommerce-page ul.products li.product-hover-caption span.price, .tpvc-featured-product.woocommerce ul.products li.product .featured-price .price',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_old_price_color',
		'default'	=> '',
		'priority'	=> 8,
		'label'		=> __( 'Product Old Price Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del, .woocommerce ul.products li.product-hover-caption span.price del, .woocommerce-page ul.products li.product-hover-caption span.price del, .tpvc-featured-product.woocommerce ul.products li.product .featured-price .price del',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_border_price_color',
		'default'	=> '',
		'priority'	=> 9,
		'label'		=> __( 'Product Price Border Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce ul.products li.product .price-loop-wrap .price, .woocommerce-page ul.products li.product .price-loop-wrap .price, .tpvc-featured-product.woocommerce ul.products li.product .featured-price .price, .woocommerce ul.products li.product-hover-caption span.price, .woocommerce-page ul.products li.product-hover-caption span.price',
		'property'	=> 'border-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_caption',
		'default'	=> '',
		'priority'	=> 10,
		'label'		=> __( 'Product Caption Background', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce ul.products li.product .add-to-cart-loop-wrap, .woocommerce-page ul.products li.product .add-to-cart-loop-wrap, .woocommerce ul.products li.product-hover-caption figure figcaption, .woocommerce-page ul.products li.product-hover-caption figure figcaption',
		'property'	=> 'background-color'
	);

	// $tk_colors[] = array(
	// 	'slug'		=> 'tokopress_wc_product_rating',
	// 	'default'	=> '',
	// 	'priority'	=> 11,
	// 	'label'		=> __( 'Product Rating Color', 'tokopress' ),
	// 	'section'	=> 'tokopress_wc_product_section',
	// 	'type' 		=> 'color',
	// 	'selector'	=> '.woocommerce .star-rating:before',
	// 	'property'	=> 'color'
	// );

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_product_rating_active',
		'default'	=> '',
		'priority'	=> 12,
		'label'		=> __( 'Product Rating Color (Filled)', 'tokopress' ),
		'section'	=> 'tokopress_wc_product_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce .star-rating span',
		'property'	=> 'color'
	);

	return $tk_colors;
}

/**
 * Single Product
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_wc_single_prod_section' );
function tokopress_wc_single_prod_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_wc_single_prod_section',
			'label'		=> __( 'WC - Single Product Page', 'tokopress' ),
			'priority'	=> 5,
			'panel_id'	=> 'tokopress_woo_panel'
		);

	return $tk_sections;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_single_prod_color' );
function tokopress_wc_single_prod_color( $tk_colors ) {
	// $tk_colors[] = array(
	// 	'slug'		=> 'tokopress_wc_single_prod_star',
	// 	'default'	=> '',
	// 	'priority'	=> 1,
	// 	'label'		=> __( 'Product Rating Color', 'tokopress' ),
	// 	'section'	=> 'tokopress_wc_single_prod_section',
	// 	'type' 		=> 'color',
	// 	'selector'	=> '.woocommerce .star-rating:before, .woocommerce-page .star-rating:before',
	// 	'property'	=> 'color',
	// 	'propertyadd'	=> '!important'
	// );

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_single_prod_star_active',
		'default'	=> '',
		'priority'	=> 2,
		'label'		=> __( 'Product Rating Color (Filled)', 'tokopress' ),
		'section'	=> 'tokopress_wc_single_prod_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce .star-rating span, .woocommerce-page .star-rating span',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_single_prod_price',
		'default'	=> '',
		'priority'	=> 3,
		'label'		=> __( 'Product Price Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_single_prod_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_single_prod_old_price',
		'default'	=> '',
		'priority'	=> 4,
		'label'		=> __( 'Product Regular Price Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_single_prod_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce div.product span.price del, .woocommerce div.product p.price del, .woocommerce #content div.product span.price del, .woocommerce #content div.product p.price del, .woocommerce-page div.product span.price del, .woocommerce-page div.product p.price del, .woocommerce-page #content div.product span.price del, .woocommerce-page #content div.product p.price del',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_single_prod_arrow_slider_bg',
		'default'	=> '',
		'priority'	=> 5,
		'label'		=> __( 'Product Gallery Arrow Background Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_single_prod_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-next',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_single_prod_arrow_slider_color',
		'default'	=> '',
		'priority'	=> 6,
		'label'		=> __( 'Product Gallery Arrow Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_single_prod_section',
		'type' 		=> 'color',
		'selector'	=> '.woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce #content div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page div.product .product-thumbnail.product-images .owl-controls .owl-next, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-prev, .woocommerce-page #content div.product .product-thumbnail.product-images .owl-controls .owl-next',
		'property'	=> 'color'
	);

	return $tk_colors;
}

/**
 * Related Products
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_wc_related_section' );
function tokopress_wc_related_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_wc_related_section',
			'label'		=> __( 'WC - Related Products', 'tokopress' ),
			'priority'	=> 10,
			'panel_id'	=> 'tokopress_woo_panel'
		);

	return $tk_sections;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_related_color' );
function tokopress_wc_related_color( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_related_bg',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Title Background Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_related_section',
		'type' 		=> 'color',
		'selector'	=> '.related.products h2',
		'property'	=> 'background-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_related_color',
		'default'	=> '',
		'priority'	=> 2,
		'label'		=> __( 'Title Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_related_section',
		'type' 		=> 'color',
		'selector'	=> '.related.products h2',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_related_border_color',
		'default'	=> '',
		'priority'	=> 3,
		'label'		=> __( 'Title Border Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_related_section',
		'type' 		=> 'color',
		'selector'	=> '.related.products h2',
		'property'	=> 'border-color'
	);

	return $tk_colors;
}

/**
 * Upsells Product
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_wc_upsells_section' );
function tokopress_wc_upsells_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_wc_upsells_section',
			'label'		=> __( 'WC - Up-Sells Products', 'tokopress' ),
			'priority'	=> 15,
			'panel_id'	=> 'tokopress_woo_panel'
		);

	return $tk_sections;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_upsells_color' );
function tokopress_wc_upsells_color( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_upsells_bg',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Title Background Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_upsells_section',
		'type' 		=> 'color',
		'selector'	=> '.upsells.products h2',
		'property'	=> 'background-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_upsells_color',
		'default'	=> '',
		'priority'	=> 2,
		'label'		=> __( 'Title Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_upsells_section',
		'type' 		=> 'color',
		'selector'	=> '.upsells.products h2',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_upsells_border_color',
		'default'	=> '',
		'priority'	=> 3,
		'label'		=> __( 'Title Border Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_upsells_section',
		'type' 		=> 'color',
		'selector'	=> '.upsells.products h2',
		'property'	=> 'border-color'
	);

	return $tk_colors;
}

/**
 * Cross Sells Product
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_wc_crosssells_section' );
function tokopress_wc_crosssells_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_wc_crosssells_section',
			'label'		=> __( 'WC - Cross-Sells Products', 'tokopress' ),
			'priority'	=> 20,
			'panel_id'	=> 'tokopress_woo_panel'
		);

	return $tk_sections;
}
add_filter( 'tokopress_customizer_data', 'tokopress_wc_crosssells_color' );
function tokopress_wc_crosssells_color( $tk_colors ) {
	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_crosssells_bg',
		'default'	=> '',
		'priority'	=> 1,
		'label'		=> __( 'Title Background Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_crosssells_section',
		'type' 		=> 'color',
		'selector'	=> '.cross-sells h2',
		'property'	=> 'background-color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_crosssells_color',
		'default'	=> '',
		'priority'	=> 2,
		'label'		=> __( 'Title Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_crosssells_section',
		'type' 		=> 'color',
		'selector'	=> '.cross-sells h2',
		'property'	=> 'color'
	);

	$tk_colors[] = array(
		'slug'		=> 'tokopress_wc_crosssells_border_color',
		'default'	=> '',
		'priority'	=> 3,
		'label'		=> __( 'Title Border Color', 'tokopress' ),
		'section'	=> 'tokopress_wc_crosssells_section',
		'type' 		=> 'color',
		'selector'	=> '.cross-sells h2',
		'property'	=> 'border-color'
	);

	return $tk_colors;
}
