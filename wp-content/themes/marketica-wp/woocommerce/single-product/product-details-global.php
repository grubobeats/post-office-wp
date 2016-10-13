<?php $properties = get_post_meta( get_the_ID(), '_tokopress_item_property_details', true ); ?>
<?php if ( ! of_get_option( 'tokopress_wc_hide_product_details' ) && ! empty( $properties ) ) : ?>
	<ul class="list-item-details">
		<?php
			foreach ( $properties as $label => $item ) {
				if ( trim($label) && trim($item) ) {
					printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', $label, $item );
				}
			}
		?>
	</ul>

<?php endif; ?>
