<?php
/**
 * WooCommerce Options Settings
 */

function tokopress_wc_settings( $options ) {
	$options[] = array(
		'name' 	=> __( 'WooCommerce', 'tokopress' ),
		'type' 	=> 'heading'
	);

	$options[] = array(
		'name' => __( 'Redirect URL After Customer Login', 'tokopress' ),
		'desc' => '',
		'id' => 'tokopress_wc_red_cus_login',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'WooCommerce - Shop Display Options', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Page Header', 'tokopress' ),
			'desc' => __( 'HIDE page header on the main shop page', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_header',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Shop Sidebar', 'tokopress' ),
			'desc' => __( 'HIDE shop sidebar', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_sidebar',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Catalog Style', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_products_style',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'' => __( 'Default Style', 'tokopress' ),
					'alt' => __( 'Alternate Style', 'tokopress' ),
				)
		);
		$options[] = array(
			'name' => __( 'Catalog Ordering', 'tokopress' ),
			'desc' => __( 'DISABLE catalog ordering dropdown', 'tokopress' ),
			'id' => 'tokopress_wc_hide_catalog_ordering',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Products Per Page', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_products_per_page',
			'std' => '12',
			'type' => 'text'
		);
		$options[] = array(
			'name' => __( 'Products Column Per Row', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_products_column_per_row',
			'std' => '3',
			'type' => 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				)
		);

	// $options[] = array(
	// 	'name' => __( 'WooCommerce - Shop Options For Default Style', 'tokopress' ),
	// 	'type' => 'info'
	// );
		$options[] = array(
			'name' => __( 'Products Sale Flash', 'tokopress' ),
			'desc' => __( 'DISABLE products sale flash', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_sale_flash',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Products Title', 'tokopress' ),
			'desc' => __( 'HIDE products title', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_title',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Products Rating', 'tokopress' ),
			'desc' => __( 'DISABLE products rating', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_rating',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Products Price', 'tokopress' ),
			'desc' => __( 'DISABLE products price', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_price',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Products "Add To Cart" Button', 'tokopress' ),
			'desc' => __( 'DISABLE products "add to cart" button', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_cart_button',
			'std' => '0',
			'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __( 'WooCommerce - Single Product Options', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Page Header', 'tokopress' ),
			'desc' => __( 'HIDE page header', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_header',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Image Style', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_product_image_style',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'' => __( 'Slider Style', 'tokopress' ),
					'default' => __( 'Default Style', 'tokopress' ),
				)
		);
		$options[] = array(
			'name' => __( 'Product Sale Flash', 'tokopress' ),
			'desc' => __( 'DISABLE product sale flash', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_sale_flash',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Rating', 'tokopress' ),
			'desc' => __( 'DISABLE product rating', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_rating',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Price', 'tokopress' ),
			'desc' => __( 'DISABLE product price', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_price',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Short Description', 'tokopress' ),
			'desc' => __( 'DISABLE product short description', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_summary',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product "Add To Cart" Button', 'tokopress' ),
			'desc' => __( 'DISABLE product "add to cart" button', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_cart_button',
			'std' => '0',
			'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __( 'WooCommerce - Single Product Item Details', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Product SKU', 'tokopress' ),
			'desc' => __( 'HIDE product sku', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_sku',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Attributes', 'tokopress' ),
			'desc' => __( 'HIDE product attributes', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_attributes',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Product Meta (Categories/Tags)', 'tokopress' ),
			'desc' => __( 'HIDE product meta (categories/tags)', 'tokopress' ),
			'id' => 'tokopress_wc_hide_product_meta_tags',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( '[DEPRECEATED] Global Product Item Details', 'tokopress' ),
			'desc' => __( 'SHOW global product item details. This is Marketica 1.x feature, provided for backward compatibility.', 'tokopress' ),
			'id' => 'tokopress_wc_product_details',
			'std' => '0',
			'type' => 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( '[DEPRECEATED] Global Product Item Details Setup', 'tokopress' ),
			'desc' 	=> __( 'This is Marketica 1.x feature, provided for backward compatibility. Insert your global product item details, separated by new line. It will be available when you edit a product. If you prefer to define it per product, please use WooCommerce Product Attributes instead. <br><br> For example:', 'tokopress' ). "<br>Create Date<br>Last Update<br>Licence<br>Compatible Browsers<br>Compatible With<br>Layout<br>Documentation<br>Files",
			'id' 	=> 'tokopress_wc_items_setup',
			'type' 	=> 'textarea'
		);

	$options[] = array(
		'name' => __( 'WooCommerce - Related Products', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Related Products', 'tokopress' ),
			'desc' => __( 'DISABLE related products on single product page', 'tokopress' ),
			'id' => 'tokopress_wc_hide_related_products',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Number of Related Products', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_products_related_number',
			'std' => '4',
			'type' => 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12'
				)
		);

	$options[] = array(
		'name' => __( 'WooCommerce - Up-Sells Products', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Up-Sells', 'tokopress' ),
			'desc' => __( 'DISABLE up-sells products on single product page', 'tokopress' ),
			'id' => 'tokopress_wc_hide_upsells_products',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'Number of Up-Sells Products', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_products_upsells_number',
			'std' => '4',
			'type' => 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12'
				)
		);

	$options[] = array(
		'name' => __( 'WooCommerce - Cross-Sells Products', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Cross-Sells', 'tokopress' ),
			'desc' => __( 'DISABLE Cross-sells products on cart page', 'tokopress' ),
			'id' => 'tokopress_wc_hide_crosssells_products',
			'std' => '0',
			'type' => 'checkbox'
		);

	$options[] = array(
		'name' => __( 'License Information', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'License Information', 'tokopress' ),
			'desc' => __( 'SHOW license information on single product page', 'tokopress' ),
			'id' => 'tokopress_wc_license_show',
			'std' => '0',
			'type' => 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'License Information Summary', 'tokopress' ),
			'std'	=> __( 'Use, by you or one client, in a single end product which end users are not charged for. The total price includes the item price and a buyer fee.', 'tokopress' ),
			'id' 	=> 'tokopress_wc_license_info',
			'type' 	=> 'textarea'
		);

		$options[] = array(
			'name' => __( 'License Link Text #1', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_license_text1',
			'std' => __( 'More Details', 'tokopress'),
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'License Link URL #1', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_license_url1',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'License Link Text #2', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_license_text2',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'License Link URL #2', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wc_license_url2',
			'type' => 'text'
		);

	return $options;
}
add_filter( 'of_options', 'tokopress_wc_settings', 20 );
