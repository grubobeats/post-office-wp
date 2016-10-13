<?php
/**
 * Display the vendor store ratings 
 * 
 * Override this template by copying it to yourtheme/wc-vendors/store
 *
 * @package    WCVendors_Pro
 * @version    1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$vendor_shop 		= urldecode( get_query_var( 'vendor_shop' ) );
$vendor_id   		= WCV_Vendors::get_vendor_id( $vendor_shop ); 
$vendor_feedback 	= WCVendors_Pro_Ratings_Controller::get_vendor_feedback( $vendor_id );

remove_action( 'tokopress_before_inner_content', 'tokopress_top_content_product' );

get_header( 'shop' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<?php do_action( 'woocommerce_before_main_content' ); ?>

	<div class="page-header page-header-inner">
		<h1 class="page-title"><?php _e( 'Customer Ratings', 'tokopress' ); ?></h1>
	</div>

	<?php if ( $vendor_feedback ) : ?>

		<?php foreach ( $vendor_feedback as $vf ) : ?>

			<?php
			$customer 		= get_userdata( $vf->customer_id ); 
			$rating 		= $vf->rating; 
			$rating_title 	= $vf->rating_title; 
			$comment 		= $vf->comments;
			$post_date		= date_i18n( get_option( 'date_format' ), strtotime( $vf->postdate ) );  
			$customer_name 	= ucfirst( $customer->display_name ); 
			$product_link	= get_permalink( $vf->product_id );
			$product_title	= get_the_title( $vf->product_id ); 

			// This outputs the star rating 
			$stars = ''; 
			for ($i = 1; $i<=stripslashes( $rating ); $i++) { $stars .= "<i class='fa fa-star'></i>"; } 
			for ($i = stripslashes( $rating ); $i<5; $i++) { $stars .=  "<i class='fa fa-star-o'></i>"; }
			?> 

			<div class="store-rating-entry">
				<h3><?php echo $rating_title; ?> :: <?php echo $stars; ?></h3>
				<p class="store-rating-meta">
					<span><i class="fa fa-clock-o"></i> <?php echo $post_date; ?></span> 
					<span><i class="fa fa-user"></i> <?php echo $customer_name; ?></span>
					<span><i class="fa fa-shopping-basket"></i> <a href="<?php echo $product_link; ?>" target="_blank"><?php echo $product_title; ?></a></span>
				</p>
				<?php echo wpautop( $comment ); ?></p>
			</div>

		<?php endforeach; ?>

	<?php else : ?>		
		<?php echo __( 'No ratings have been submitted for this vendor yet.', 'tokopress' ); ?>	
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_main_content' ); ?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) )
			do_action( 'woocommerce_sidebar' );
	?>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer( 'shop' ); ?>