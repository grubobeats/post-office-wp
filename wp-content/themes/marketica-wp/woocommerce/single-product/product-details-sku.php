<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;
?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() ) ) : ?>
	<ul class="list-item-details">
		<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'SKU:', 'tokopress' ), $product->get_sku() ); ?>
	</ul>
<?php endif; ?>
