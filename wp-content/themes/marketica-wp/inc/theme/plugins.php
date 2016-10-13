<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
tokopress_require_file( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'tokopress_register_required_plugins' );
function tokopress_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */

	$plugins = array(

		/* Required Plugin */
		array(
			'name'		=> 'WooCommerce',
			'slug'		=> 'woocommerce',
			'required'	=> true,
		),

		array(
			'name'     	=> 'TokoPress - Marketica VC & Shortcodes',
			'slug'     	=> 'tokopress-multipurpose-shortcode',
			'source'   	=> get_template_directory() . '/inc/plugins/tokopress-multipurpose-shortcode-v3.0.2.zip',
			'version' 	=> '3.0.2',
			'required' 	=> true,
		),

		array(
			'name'     	=> 'Visual Composer',
			'slug'     	=> 'js_composer',
			'source'   	=> get_template_directory() . '/inc/plugins/js_composer-v4.11.1.zip',
			'version' 	=> '4.11.1',
			'required' 	=> true,
		),

		array(
			'name'		=> 'MailChimp for WordPress',
			'slug'		=> 'mailchimp-for-wp',
			'required'	=> true,
		),

		/* Recommended Plugin */

		array(
			'name'     => 'Revolution Slider',
			'slug'     => 'revslider',
			'source'   => get_template_directory() .'/inc/plugins/revslider-v5.0.9.zip',
			'version' 	=> '5.0.9',
			'required' => false
		),

		array(
			'name'		=> 'WordPress Importer',
			'slug'		=> 'wordpress-importer',
			'source'   	=> get_template_directory() . '/inc/plugins/wordpress-importer-v2.0.zip',
			'version' 	=> '2.0',
			'required' 	=> false,
		),

		array(
			'name'		=> 'Widget Importer Exporter',
			'slug'		=> 'widget-importer-exporter',
			'required'	=> false,
		),

		array(
			'name'		=> 'Regenerate Thumbnails',
			'slug'		=> 'regenerate-thumbnails',
			'required'	=> false,
		),

		// array(
		// 	'name'		=> 'YITH WooCommerce Wishlist',
		// 	'slug'		=> 'yith-woocommerce-wishlist',
		// 	'required'	=> false,
		// ),

	);

	// if ( class_exists('WooCommerce_Product_Vendors') ) {
	// 	$show_wcvendors = false;
	// }
	// elseif ( class_exists('FPMultiVendor') ) {
	// 	$show_wcvendors = false;
	// }
	// elseif ( class_exists('WeDevs_Dokan') ) {
	// 	$show_wcvendors = false;
	// }
	// else {
	// 	$show_wcvendors = true;
	// }
	// if ( $show_wcvendors ) {
	// 	$plugins[] = array(
	// 			'name'		=> 'WC Vendors',
	// 			'slug'		=> 'wc-vendors',
	// 			'required'	=> false,
	// 		);

	// }

	if ( class_exists('woocommerce') ) {
		$plugins[] = array(
			'name'     	=> 'WooCommerce - Simple Frontend Submission',
			'slug'     	=> 'wcxt-frontend-submission',
			'source'   	=> get_template_directory() . '/inc/plugins/wcxt-frontend-submission-v1.1.zip',
			'version' 	=> '1.1',
			'required' 	=> false,
		);
		$plugins[] = array(
			'name'		=> 'CMB2 - Metabox Library',
			'slug'		=> 'cmb2',
			'required'	=> ( function_exists( 'xt_wc_frontend_submission_shortcode' ) ? true : false ),
		);
	}

	$config = array(
		'id'           => 'toko-tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'toko-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}

/* Set Visual Composer as Theme part and disable Visual Composer Updater */
add_action( 'vc_before_init', 'toko_vc_set_as_theme', 9 );
function toko_vc_set_as_theme() {
	if ( function_exists( 'vc_set_as_theme' ) ) {
		vc_set_as_theme(true);
		vc_manager()->disableUpdater(true);
	}
}

/* Set Revolution Slider as Theme part and disable Revolution Slider Updater */
if ( function_exists( 'set_revslider_as_theme' ) ) {
	set_revslider_as_theme();
}

add_action( 'admin_head', 'toko_fix_notice_position' );
function toko_fix_notice_position() {
	echo '<style>#update-nag, .update-nag { display: block; float: none; }</style>';
}

/**
 * Enqueue & Dequeue Plugin Scripts
 */
add_action( 'wp_enqueue_scripts', 'tokopress_plugin_scripts', 999 );
add_action( 'wp_footer', 'tokopress_plugin_scripts' );
function tokopress_plugin_scripts() {
	wp_dequeue_style( 'fontawesome' );
	wp_dequeue_style( 'font-awesome' );
	wp_dequeue_style( 'mailchimp-for-wp-checkbox' );
	wp_dequeue_style( 'mailchimp-for-wp-form' );
	wp_dequeue_style( 'yith-wcwl-main' );
	wp_dequeue_style( 'yith-wcwl-font-awesome' );
	wp_dequeue_style( 'yith-wcwl-font-awesome-ie7' );
}

add_filter('vc_load_default_templates','tokopress_load_vc_templates');
function tokopress_load_vc_templates( $args ) {
	$args2 = array (
		array(
			'name'=> '1. '.__('Marketica - Home','tokopress'),
			'content'=>'[vc_row css=".vc_custom_1455167236612{margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][vc_column css=".vc_custom_1455167253705{margin-bottom: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][rev_slider_vc alias="homePage"][/vc_column][/vc_row][vc_row css=".vc_custom_1455167099190{margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][vc_column css=".vc_custom_1455167126129{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_product_search][/vc_column][/vc_row][vc_row css=".vc_custom_1455165303729{margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][vc_column offset="vc_col-md-6" css=".vc_custom_1455166752666{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_featured_product tpvc_wc_featured_orderby="title" tpvc_wc_featured_columns="1" tpvc_wc_featured_title_icon="fa fa-bullhorn"][/vc_column][vc_column offset="vc_col-md-6" css=".vc_custom_1455166768061{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_product tpvc_wc_product_title="Latest Products" tpvc_wc_product_title_icon="fa fa-thumbs-o-up"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168043192{margin-right: 0px !important;margin-left: 0px !important;padding-top: 50px !important;}"][vc_column css=".vc_custom_1455168055486{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_divider tpvc_divider_heading="h2"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168691909{margin-right: 0px !important;margin-left: 0px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 0px !important;padding-left: 30px !important;}"][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Single Click Easy Shop" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#a5d383" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-shopping-cart"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="24-hour Active Support" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#718aac" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-phone"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Hight Quality Items" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="3" tpvc_features_icon_color="#41bcc3" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-thumbs-o-up"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168004800{margin-top: 30px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][vc_column css=".vc_custom_1455168025408{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_divider tpvc_divider_heading="h2"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168466531{margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][vc_column css=".vc_custom_1455168482481{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_mini_product tpvc_wc_product_title="New Items" tpvc_wc_product_title_icon="fa fa-fire"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168669052{margin-right: 0px !important;margin-left: 0px !important;padding-top: 50px !important;padding-right: 30px !important;padding-bottom: 50px !important;padding-left: 30px !important;}"][vc_column width="1/2" css=".vc_custom_1423091235132{padding-bottom: 30px !important;}"][tokopress_testimonial name="John Doe" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" image="2429"][/vc_column][vc_column width="1/2" css=".vc_custom_1423091246591{padding-bottom: 30px !important;}"][tokopress_testimonial name="Rachel Davis" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" role="Women Fashion" image="2430"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168317690{margin-right: 0px !important;margin-left: 0px !important;}"][vc_column width="1/2" css=".vc_custom_1455169406032{background: #222222 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Start Shopping Now" paragraf_title_color="#ffffff" paragraf_text="We Offer You a Very Good Deals that you will newer regret." paragraf_text_color="#ffffff" button_text="Shop Now" button_color="button-white" button_align="text-right"][/vc_column][vc_column width="1/2" css=".vc_custom_1455169500314{background: #333333 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Partner With Us" paragraf_title_color="#ffffff" paragraf_text="Sign and Start Selling With Us. We Share The Highest Rate." paragraf_text_color="#ffffff" button_text="Start Selling" button_color="button-white" button_align="text-right"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168554341{margin-right: 0px !important;margin-left: 0px !important;padding-top: 20px !important;padding-bottom: 20px !important;}"][vc_column css=".vc_custom_1455168569417{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_heading text="Some Companies Used Our Service" heading="h2" heading_icon="fa fa-users"][/vc_column][/vc_row][vc_row css=".vc_custom_1455168598802{margin-right: 0px !important;margin-left: 0px !important;padding-bottom: 50px !important;}"][vc_column css=".vc_custom_1455168610544{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_image_carousel image_show="6" image_size="full" carousel_id="home-carousel" images=""][/vc_column][/vc_row]',
		),
		array(
			'name'=> '2. '.__('Marketica - Plan &amp; Pricing','tokopress'),
			'content'=>'[vc_row css=".vc_custom_1455170848987{margin-right: 0px !important;margin-left: 0px !important;}"][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170236702{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_items="1 User;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN"][/vc_column][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170256160{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_title="REGULAR" tpvc_plantable_value="20" tpvc_plantable_items="10 Users;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN" tpvc_plantable_btn_url="#"][/vc_column][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170266594{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_featured="featured" tpvc_plantable_title="PRO" tpvc_plantable_value="40" tpvc_plantable_items="100 User;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN" tpvc_plantable_btn_url="#"][/vc_column][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170276768{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_title="PLATINUM" tpvc_plantable_value="75" tpvc_plantable_items="Unlimited Users;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN" tpvc_plantable_btn_url="#"][/vc_column][/vc_row]',
		),
		array(
			'name'=> '3. '.__('Marketica - Team Members','tokopress'),
			'content'=>'[vc_row css=".vc_custom_1423034465179{padding-top: 50px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 50px !important;}" el_class="tpvc_row_full"][vc_column width="1/1"][vc_column_text el_class="text-center text-large"]Meet The Team That Built Marketica[/vc_column_text][vc_column_text el_class="text-center"]Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit.[/vc_column_text][/vc_column][/vc_row][vc_row el_class="tpvc_row_full"][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="JHON WILLIAM DOE" image_size="full" skill="CEO/Co-Founder" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1941"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="JANE ROE" image_size="full" skill="CTO/Co-Founder" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1937"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="WILLIAM SMITH" image_size="full" skill="Developer" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1938"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="CINDY DAVIS" image_size="full" skill="Designer" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1939"][/vc_column][/vc_row]',
		),
	);
	return array_merge( $args, $args2 );
}

if ( shortcode_exists( 'wcxt-frontend-submission' ) ) {
	add_action( 'vc_before_init', 'tokopress_wc_frontend_submission_vcmap' );
	function tokopress_wc_frontend_submission_vcmap() {

		if ( ! class_exists('woocommerce') )
			return;

		vc_map( array(
		   'name'				=> __( 'WooCommerce - Simple Frontend Submission', 'tokopress' ),
		   'base'				=> 'wcxt-frontend-submission',
		   'class'				=> '',
		   'icon'				=> 'tokopress_icon',
		   'category'			=> 'Tokopress - Marketica',
		   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
		   'params'				=> array(
		   							array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Visibility', 'tokopress' ),
										'description'	=> __( 'Vendor: only vendor can see frontend submission form', 'tokopress' ).'<br/>'.__( 'User: all logged-in users can see frontend submission form', 'tokopress' ).'<br/>'.__( 'All: everyone can see frontend submission form', 'tokopress' ),
										'param_name'	=> 'show_on',
										'value'			=> array(
															''			=> '',
															'Vendor'	=> 'vendor',
															'User'		=> 'user',
															'All'		=> 'all',
														),
										'std'			=> ''
									),

		   							array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Product Type', 'tokopress' ),
										'param_name'	=> 'product_type',
										'value'			=> array(
															''							=> '',
															'Physical'					=> 'physical',
															'Virtual (Service)'			=> 'virtual',
															'Digital (Downloadable)'	=> 'digital',
															'External/Affiliate'		=> 'external',
														),
										'std'			=> ''
									),

									array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Product SKU', 'tokopress' ),
										'param_name'	=> 'product_sku',
										'value'			=> array(
															'No'		=> 'no',
															'Yes'		=> 'yes',
														),
										'std'			=> 'no'
									),

									array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Product Status', 'tokopress' ),
										'param_name'	=> 'product_sku',
										'value'			=> array(
															'Pending Review'	=> 'pending',
															'Published'			=> 'publish',
															'Draft'				=> 'draft',
														),
										'std'			=> 'pending'
									),

								)
		   )
		);
	}
}