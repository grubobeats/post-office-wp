<?php

function tokopress_wcvendors_settings( $options ) {
	$options[] = array(
		'name' 	=> __( 'WC Vendors', 'tokopress' ),
		'type' 	=> 'heading'
	);

		if ( class_exists('WCVendors_Pro') ) {
			$options[] = array(
				'name' => __( 'Show Vendor Address', 'tokopress' ),
				'desc' => '',
				'id' => 'tokopress_wcvendors_address',
				'std' => '',
				'type' => 'select',
				'options' => array(
						'yes' => __( 'Yes', 'tokopress' ),
						'no' => __( 'No', 'tokopress' ),
						'loggedin' => __( 'Logged In Only', 'tokopress' ),
					)
			);
		}

		$options[] = array(
			'name' => __( 'Show Vendor Phone Number', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_phone',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
					'loggedin' => __( 'Logged In Only', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( 'Show Vendor Email', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_email',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
					'loggedin' => __( 'Logged In Only', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( 'Show Vendor URL', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_url',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
					'loggedin' => __( 'Logged In Only', 'tokopress' ),
				)
		);

	$options[] = array(
		'name' => __( 'WC Vendors - Shop Page', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Vendor Description on Top of Shop Page', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_shop_description',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'yes' => __( 'Yes', 'tokopress' ),
					'no' => __( 'No', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( 'Show Vendor Avatar in Vendor Description', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_shop_avatar',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'yes' => __( 'Yes', 'tokopress' ),
					'no' => __( 'No', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( 'Show Social and Contact Info in Vendor Description', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_shop_profile',
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
			'id' => 'tokopress_wcvendors_shop_soldby',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'yes' => __( 'Yes', 'tokopress' ),
					'no' => __( 'No', 'tokopress' ),
				)
		);

	$options[] = array(
		'name' => __( 'WC Vendors - Single Product Page', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( 'Vendor Description on Top of Single Product Page', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_product_description',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( 'Show Vendor Avatar in Vendor Description', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_product_avatar',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( 'Show Social and Contact Info in Vendor Description', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_product_profile',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
				)
		);

		$options[] = array(
			'name' => __( '"Seller Info" at Product Tab', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_product_tab',
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
			'id' => 'tokopress_wcvendors_product_moreproducts',
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
			'id' => 'tokopress_wcvendors_product_soldby',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'yes' => __( 'Yes', 'tokopress' ),
					'no' => __( 'No', 'tokopress' ),
				)
		);

	$options[] = array(
		'name' => __( 'WC Vendors - Cart Page', 'tokopress' ),
		'type' => 'info'
	);

		$options[] = array(
			'name' => __( '"Sold by" at Cart page', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_wcvendors_cart_soldby',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'yes' => __( 'Yes', 'tokopress' ),
					'no' => __( 'No', 'tokopress' ),
				)
		);

	if ( function_exists( 'xt_wc_frontend_submission_shortcode' ) && !class_exists('WCVendors_Pro') ) {
		$options[] = array(
			'name' => __( 'WC Vendors - Frontend Submission', 'tokopress' ),
			'type' => 'info'
		);
			$options[] = array(
				'name' => __( 'Frontend Submission Page', 'tokopress' ),
				'desc' => '',
				'id' => 'tokopress_wcvendors_frontend_submit',
				'std' => '',
				'type' => 'select',
				'options' => tokopress_wcvendors_get_pages( array( 'post_type' => 'page', 'numberposts' => '-1' ) ),
			);
	}

	return $options;
}
add_filter( 'of_options', 'tokopress_wcvendors_settings', 20 );

function tokopress_wcvendors_get_pages( $query_args ) {
    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => 10,
    ) );
    $posts = get_posts( $args );
    $post_options = array();
    if ( $posts ) {
      	$post_options[] = __( '-- None --', 'tokopress' );
        foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
        }
    }
    return $post_options;
}

add_action( 'tokopress_before_inner_content', 'tokopress_wcvendors_store_header', 5 );
function tokopress_wcvendors_store_header() {
	get_template_part( 'wc-vendors/store-header' );
}

add_action( 'tokopress_quicknav_account', 'tokopress_wcvendors_quicknav_account' );
function tokopress_wcvendors_quicknav_account() {
	if ( ! is_user_logged_in() )
		return;

	if ( ! WCV_Vendors::is_vendor( get_current_user_id() ) )
		return;

	if ( class_exists('WCVendors_Pro') ) {
		get_template_part( 'wc-vendors/block-nav-pro' );
	}
	else {
		get_template_part( 'wc-vendors/block-nav' );
	}
}

remove_action( 'woocommerce_before_main_content', array( 'WCV_Vendor_Shop', 'shop_description' ), 30 );
remove_action( 'woocommerce_before_main_content', array('WCV_Vendor_Shop', 'vendor_main_header'), 20 );
remove_action( 'woocommerce_before_single_product', array('WCV_Vendor_Shop', 'vendor_mini_header'));

tokopress_remove_filter('woocommerce_before_main_content', 'store_main_content_header', 30);
tokopress_remove_filter('woocommerce_before_single_product', 'store_single_header', 10);

remove_action( 'woocommerce_after_shop_loop_item', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 9 );
if( of_get_option( 'tokopress_wcvendors_shop_soldby' ) != 'no' ) {
	add_action( 'woocommerce_after_shop_loop_item_title', 'tokopress_wcvendors_product_seller_name', 2 );
}
function tokopress_wcvendors_product_seller_name() {
	$product_id = get_the_ID();
	$vendor_id     = WCV_Vendors::get_vendor_from_product( $product_id );
	$sold_by_label = WC_Vendors::$pv_options->get_option( 'sold_by_label' ); 
	$sold_by = WCV_Vendors::is_vendor( $vendor_id )
		? sprintf( '<a href="%s">%s</a>', WCV_Vendors::get_vendor_shop_page( $vendor_id ), WCV_Vendors::get_vendor_sold_by( $vendor_id ) )
		: get_bloginfo( 'name' );
	echo '<p class="product-seller-name">' . apply_filters('wcvendors_sold_by_in_loop', $sold_by_label ). ' '. $sold_by . ' </p>';
}

remove_filter( 'woocommerce_product_tabs', array( 'WCV_Vendor_Shop', 'seller_info_tab' ) );
if( of_get_option( 'tokopress_wcvendors_product_tab' ) != 'no' ) {
	add_filter( 'woocommerce_product_tabs', 'tokopress_wcvendors_seller_info_tab' );
}
function tokopress_wcvendors_seller_info_tab( $tabs ) {
	global $post;

	if ( WCV_Vendors::is_vendor( $post->post_author ) ) {

		$seller_info = get_user_meta( $post->post_author, 'pv_seller_info', true );

		if ( !empty( $seller_info ) ) {

			$tabs[ 'seller_info' ] = array(
				'title'    => apply_filters( 'wcvendors_seller_info_label', __( 'Seller info', 'tokopress' ) ),
				'priority' => 50,
				'callback' => 'tokopress_wcvendors_seller_info_tab_panel',
			);
		}

	}

	return $tabs;
}

function tokopress_wcvendors_seller_info_tab_panel() {
	$product_id = get_the_ID();
	$author     = WCV_Vendors::get_vendor_from_product( $product_id );
	$shop_name 	= WCV_Vendors::get_vendor_shop_name( $author );
	echo '<h2>'.$shop_name.'</h2>';

	global $post;

	$seller_info = get_user_meta( $post->post_author, 'pv_seller_info', true );
	$has_html    = get_user_meta( $post->post_author, 'pv_shop_html_enabled', true );
	$global_html = WC_Vendors::$pv_options->get_option( 'shop_html_enabled' );

	$seller_info = do_shortcode( $seller_info );

	echo '<div class="pv_seller_info">';

	echo ( $global_html || $has_html ) ? wpautop( wptexturize( wp_kses_post( $seller_info ) ) ) : sanitize_text_field( $seller_info );

	echo '<p>';
	echo '<a href="'.WCV_Vendors::get_vendor_shop_page( $author).'" class="button alt">'.sprintf( __( 'Visit &quot;%s&quot; Shop', 'tokopress' ), $shop_name ).'</a>';
	echo '<a href="'.get_author_posts_url( $author ).'#contact-form" class="button alt">'.__( 'Contact this seller', 'tokopress' ).'</a>';
	echo '</p>';

	echo '</div>';
}

if( of_get_option( 'tokopress_wcvendors_product_moreproducts' ) != 'no' ) {
	add_action( 'tokopress_wc_after_single_product', 'tokopress_wcvendors_more_products', 5 );
}
function tokopress_wcvendors_more_products() {
	get_template_part( 'wc-vendors/block-more-products' );
}

remove_action( 'woocommerce_product_meta_start', array( 'WCV_Vendor_Cart', 'sold_by_meta' ), 10, 2 );
if( of_get_option( 'tokopress_wcvendors_product_soldby' ) != 'no' ) {
	add_action( 'tokopress_wc_main_content_right', 'tokopress_wcvendors_sold_by_meta', 25, 2 );
}
function tokopress_wcvendors_sold_by_meta() {
	$vendor_id = get_the_author_meta( 'ID' );
	$sold_by_label = WC_Vendors::$pv_options->get_option( 'sold_by_label' ); 
	$sold_by = WCV_Vendors::is_vendor( $vendor_id )
		? sprintf( '<a href="%s" class="wcvendors_cart_sold_by_meta">%s</a>', WCV_Vendors::get_vendor_shop_page( $vendor_id ), WCV_Vendors::get_vendor_sold_by( $vendor_id ) )
		: get_bloginfo( 'name' );

	echo '<ul class="list-item-details"><li><span class="data-type">'.apply_filters('wcvendors_cart_sold_by_meta', $sold_by_label ).'</span><span class="value">'.$sold_by.'</span></li></ul>';
}

if( of_get_option( 'tokopress_wcvendors_cart_soldby' ) == 'no' ) {
	remove_filter( 'woocommerce_get_item_data', array('WCV_Vendor_Cart', 'sold_by'), 10, 2 );
}

add_action( 'tokopress_section_user_biography', 'tokopress_wcvendors_user_contactform' );
function tokopress_wcvendors_user_contactform() {
	$user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	if ( WCV_Vendors::is_vendor( $user->ID ) ) {
	    $args = array();
	    if ( $user->user_email ) {
	    	$args['email'] = $user->user_email;
	    	$args['title'] = __( 'Contact this seller', 'tokopress' );

		    echo tokopress_get_contact_form( $args );
	    }
	}
}

add_action( 'tokopress_section_user_detail', 'tokopress_wcvendors_user_vendorshop' );
function tokopress_wcvendors_user_vendorshop() {
	$user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	if ( WCV_Vendors::is_vendor( $user->ID ) ) {
		$shop_name = WCV_Vendors::get_vendor_shop_name( $user->ID );
		$shop_page = WCV_Vendors::get_vendor_shop_page( $user->user_login );
		if ( $shop_name && $shop_page ) {
			echo '<div class="user-vendorshop">';
			echo '<p>'.sprintf( __( '%s is a seller on &quot;%s&quot; shop.', 'tokopress' ), '<strong>'.$user->display_name.'</strong>', $shop_name ).'</p>';
			echo '<a href="'.$shop_page.'" class="button alt">'.sprintf( __( 'Visit &quot;%s&quot;', 'tokopress' ), $shop_name ).'</a>';
			echo '</div>';
		}
	}
}

add_action( 'wcvendors_settings_after_shop_name', 'tokopress_wcvendors_settings_store_banner' );
function tokopress_wcvendors_settings_store_banner() {

	if ( class_exists('WCVendors_Pro') )
		return;

	if ( ! is_admin() ) {
		$user_id = get_current_user_id();
		?>
		<div class="pv_store_banner_container">
			<p><b><?php _e( 'Store Banner', 'tokopress' ); ?></b><br/>
			<?php $img_id = get_user_meta( $user_id, '_wcv_store_banner_id', true ); ?>
			<?php if ( $img_id ) echo wp_get_attachment_image( $img_id, 'medium' ).'<br/>'; ?>
			<input type="file" class="regular-text" name="_wcv_store_banner_id" id="_wcv_store_banner_id" value=""/>
			</p>
		</div>
		<?php 
	}
}

add_action( 'wcvendors_shop_settings_saved', 'tokopress_wcvendors_settings_store_banner_save', 10, 2 );
function tokopress_wcvendors_settings_store_banner_save( $user_id ) {

	if ( class_exists('WCVendors_Pro') )
		return;
	
	// Make sure the right files were submitted
	if (
		empty( $_FILES )
		|| ! isset( $_FILES['_wcv_store_banner_id'] )
		|| isset( $_FILES['_wcv_store_banner_id']['error'] ) && 0 !== $_FILES['_wcv_store_banner_id']['error']
	) {
		return;
	}

	// Filter out empty array values
	$files = array_filter( $_FILES['_wcv_store_banner_id'] );

	// Make sure files were submitted at all
	if ( empty( $files ) ) {
		return;
	}

	// Make sure to include the WordPress media uploader API if it's not (front-end)
	if ( ! function_exists( 'media_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
	}

	// Upload the file and send back the attachment post ID
	$img_id = media_handle_upload( '_wcv_store_banner_id', 0 );

	// If our photo upload was successful, save it
	if ( $img_id && ! is_wp_error( $img_id ) ) {
		update_user_meta( $user_id, '_wcv_store_banner_id', $img_id );
	}

}


add_action( 'wcvendors_settings_after_shop_name', 'tokopress_wcvendors_settings_store_icon' );
function tokopress_wcvendors_settings_store_icon() {

	if ( class_exists('WCVendors_Pro') )
		return;
	
	if ( ! is_admin() ) {
		$user_id = get_current_user_id();
		?>
		<div class="pv_store_icon_container">
			<p><b><?php _e( 'Store Icon', 'tokopress' ); ?></b><br/>
			<?php $img_id = get_user_meta( $user_id, '_wcv_store_icon_id', true ); ?>
			<?php if ( $img_id ) echo wp_get_attachment_image( $img_id, 'medium' ).'<br/>'; ?>
			<input type="file" class="regular-text" name="_wcv_store_icon_id" id="_wcv_store_icon_id" value=""/>
			</p>
		</div>
		<?php 
	}
}

add_action( 'wcvendors_shop_settings_saved', 'tokopress_wcvendors_settings_store_icon_save', 10, 2 );
function tokopress_wcvendors_settings_store_icon_save( $user_id ) {

	if ( class_exists('WCVendors_Pro') )
		return;

	// Make sure the right files were submitted
	if (
		empty( $_FILES )
		|| ! isset( $_FILES['_wcv_store_icon_id'] )
		|| isset( $_FILES['_wcv_store_icon_id']['error'] ) && 0 !== $_FILES['_wcv_store_icon_id']['error']
	) {
		return;
	}

	// Filter out empty array values
	$files = array_filter( $_FILES['_wcv_store_icon_id'] );

	// Make sure files were submitted at all
	if ( empty( $files ) ) {
		return;
	}

	// Make sure to include the WordPress media uploader API if it's not (front-end)
	if ( ! function_exists( 'media_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
	}

	// Upload the file and send back the attachment post ID
	$img_id = media_handle_upload( '_wcv_store_icon_id', 0 );

	// If our photo upload was successful, save it
	if ( $img_id && ! is_wp_error( $img_id ) ) {
		update_user_meta( $user_id, '_wcv_store_icon_id', $img_id );
	}

}

