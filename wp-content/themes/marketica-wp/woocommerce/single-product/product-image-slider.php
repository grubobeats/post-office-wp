<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$attachment_ids = $product->get_gallery_attachment_ids();
$attachment_count = count( $attachment_ids );

if ( $attachment_count > 0 ) {
	echo '<div class="thumbnails owl-carousel">';
}
else {
	echo '<div class="thumbnails">';
}

if ( has_post_thumbnail() ) {

	$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
	$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
	$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
		'title' => $image_title
		) );

	if ( $attachment_count > 0 ) {
		$gallery = '[product-gallery]';
	} 
	else {
		$gallery = '';
	}

	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

}
else {

	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="#"><img src="%s" alt="Placeholder" /></a>', wc_placeholder_img_src() ), $post->ID );

}

if ( $attachment_ids ) {

		$loop = 0;

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

}
echo '</div>';
