<?php
/**
 * Additional Top Content
 *
 * @package WooCommerce
 * @author TokoPress
 *
 */

global $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() ) {
	return;
}
?>

<div class="shop-content-top">
    <div class="container">
    	<?php if( !of_get_option( 'tokopress_wc_hide_catalog_ordering' ) ) : ?>
	    	<div class="catalog-order-wrap">
		        <h3 class="section-title"><?php _e( 'Sort by', 'tokopress' ); ?></h3>
		        <?php woocommerce_catalog_ordering(); ?>
	        </div>
	    <?php endif; ?>

		<?php woocommerce_pagination(); ?>
    </div>
</div>
