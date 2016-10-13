<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = get_userdata( get_query_var( 'author' ) );
$store_info   = dokan_get_store_info( $store_user->ID );

get_header( 'shop' );
?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

    <?php if ( of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ) dokan_get_template_part( 'store-header' ); ?>

    <?php do_action( 'woocommerce_before_main_content' ); ?>

    <div id="dokan-primary" class="dokan-single-store">
        <div id="dokan-content" class="store-page-wrap woocommerce" role="main">

            <?php do_action( 'dokan_store_profile_frame_after', $store_user, $store_info ); ?>

            <?php if ( have_posts() ) { ?>

                <div class="seller-items">

                    <?php woocommerce_product_loop_start(); ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php if( "alt" == of_get_option( 'tokopress_wc_products_style' ) ) : ?>
                                <?php wc_get_template_part( 'content-product', 'alt' ); ?>
                            <?php else : ?>
                                <?php wc_get_template_part( 'content-product' ); ?>
                            <?php endif; ?>

                        <?php endwhile; // end of the loop. ?>

                    <?php woocommerce_product_loop_end(); ?>

                </div>

                <?php woocommerce_pagination(); ?>
                <?php // dokan_content_nav( 'nav-below' ); ?>

            <?php } else { ?>

                <p class="dokan-info"><?php _e( 'No products were found of this seller!', 'tokopress' ); ?></p>

            <?php } ?>
        </div>

    </div><!-- .dokan-single-store -->

    <?php do_action( 'woocommerce_after_main_content' ); ?>

    <?php if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) : ?>
        <?php get_sidebar( 'dokan' ); ?>
    <?php else : ?>
        <?php if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) : ?>
            <?php get_sidebar( 'shop' ); ?>
        <?php endif; ?>
    <?php endif; ?>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer( 'shop' ); ?>
