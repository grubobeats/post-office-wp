<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( $product && ( $product->has_attributes() || ( $product->enable_dimensions_display() && ( $product->has_dimensions() || $product->has_weight() ) ) ) ) {
	$hide = false;
}
else {
	$hide = true;
}

if ( $hide )
	return;

$attributes = $product->get_attributes();
?>
<ul class="list-item-details">

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'Weight', 'tokopress' ), $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ) ); ?>
		<?php endif; ?>

		<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
			<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'Dimensions', 'tokopress' ),  $product->get_dimensions() ); ?>
		<?php endif; ?>

	<?php endif; ?>

	<?php foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		}
		?>
		<li>
			<span class="data-type">
				<?php echo wc_attribute_label( $attribute['name'] ); ?>
			</span>
			<span class="value">
				<?php
				if ( $attribute['is_taxonomy'] ) {
					$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
					echo apply_filters( 'woocommerce_attribute', implode( ', ', $values ), $attribute, $values );
				}
				else {
					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', implode( ', ', $values ), $attribute, $values );
				}
				?>
			</span>
		</li>
	<?php endforeach; ?>

</ul>
