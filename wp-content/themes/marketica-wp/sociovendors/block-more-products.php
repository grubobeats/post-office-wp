<?php
/**
 * Related Products
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$terms = tokopress_get_the_term( get_the_ID(), 'multi_vendor' );
if ( empty( $terms) )
	return;

global $post;

$meta_query = WC()->query->get_meta_query();
$args = array(
	'post_type'				=> 'product',
	'post_status'			=> 'publish',
	'ignore_sticky_posts'  	=> 1,
	'no_found_rows'        	=> 1,
	'posts_per_page'		=> 4,
	'tax_query' 			=> array(
		array(
			'taxonomy'		=> 'multi_vendor',
			'field'			=> 'term_id',
			'terms'			=> $terms,
		),
	),
    'orderby'           	=> 'rand'
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = 4;

if ( $products->have_posts() ) : ?>

	<div class="related products">

		<h2><?php _e( 'More from this seller&hellip;', 'tokopress' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php if( "alt" == of_get_option( 'tokopress_wc_products_style' ) ) : ?>
					<?php wc_get_template_part( 'content-product', 'alt' ); ?>
				<?php else : ?>
					<?php wc_get_template_part( 'content-product' ); ?>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
