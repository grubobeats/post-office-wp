<?php


// Register the Metabox
if ( ! of_get_option( 'tokopress_wc_hide_product_details' ) && trim( of_get_option( 'tokopress_wc_items_setup' ) ) ) {
	function tokopress_metabox_property_details_add() {
		add_meta_box( 'property-details-meta-box', __( 'Product Item Details', 'tokopress' ), 'tokopress_metabox_property_details_output', 'product', 'normal', 'core' );
	}
	add_action( 'add_meta_boxes', 'tokopress_metabox_property_details_add' );
}

// Output the Metabox
function tokopress_metabox_property_details_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'tokopress_meta_box_property_details_nonce', 'tokopress_meta_box_nonce' );
	$items 	= explode( "\n", of_get_option( 'tokopress_wc_items_setup' ) );
	$values = get_post_meta( get_the_ID(), '_tokopress_item_property_details', true );
	if ( !empty ( $items ) ) {
		echo '<table class="form-table">';
		foreach ( $items as $item ) {
			$item = trim( $item );
			echo '<tr>';
			echo '<th style="padding-top:10px;padding-bottom:10px;">'.$item.'</th>';
			echo '<td style="padding-top:10px;padding-bottom:10px;"><input type="text" name="tokopress_property_details['.$item.']" class="regular-text" value="'.( isset($values[$item]) ? $values[$item] : '' ).'"></td>';
			echo '</tr>';
		}
		echo '</table>';
	}
}

// Save the Metabox values
function tokopress_metabox_property_details_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['tokopress_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['tokopress_meta_box_nonce'], 'tokopress_meta_box_property_details_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

    // Save the textarea
	if( isset( $_POST['tokopress_property_details'] ) )
		update_post_meta( $post_id, '_tokopress_item_property_details', $_POST['tokopress_property_details'] );
}
add_action( 'save_post', 'tokopress_metabox_property_details_save' );
