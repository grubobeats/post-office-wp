<?php
/**
 * Aditional WooCommerce Product Style.
 *
 * @package 	WooCommerce/Templates
 * @author 		WooThemes
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Rare case, if loop_shop_columns return invalid number
if ( $woocommerce_loop['columns'] < 1 )
	$woocommerce_loop['columns'] = 3;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';

$classes[] = 'product-hover-caption';
?>
<li <?php post_class( $classes ); ?>>

	<figure>
        <?php woocommerce_template_loop_product_thumbnail(); ?>
        <figcaption>
            <div class="product-caption">
				<?php if( ! of_get_option( 'tokopress_wc_hide_products_price' ) ) : ?>
	                <?php woocommerce_template_loop_price(); ?>
	            <?php endif; ?>
				<?php if( ! of_get_option( 'tokopress_wc_hide_products_title' ) ) : ?>
	                <div class="product-detail">
	                    <span class="product-title"><?php the_title(); ?></span>
	                </div>
	            <?php endif; ?>
                <div class="product-action">
                    <a href="<?php the_permalink(); ?>" rel="nofollow" class="button detail_button_loop"><?php _e( 'detail', 'tokopress' ); ?></a>
                    <?php if( !of_get_option( 'tokopress_wc_hide_products_cart_button' ) ) : ?>
    					<?php woocommerce_template_loop_add_to_cart(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </figcaption>
    </figure>

</li>
