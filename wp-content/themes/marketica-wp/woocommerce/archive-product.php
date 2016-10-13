<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<?php if ( ! ( of_get_option( 'tokopress_wc_hide_products_header' ) && is_shop() && !is_search() ) && !get_query_var( 'vendor_shop' ) && !is_tax( 'multi_vendor' ) && !is_tax( 'shop_vendor' ) ) : ?>
	<?php if ( of_get_option( 'tokopress_page_header_style' ) != 'inner' ) : ?>
		<div class="page-header page-header-outer">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
			<?php woocommerce_breadcrumb(); ?>
		</div>
	<?php endif; ?>

	<?php if ( of_get_option( 'tokopress_page_header_style' ) == 'inner' ) : ?>
		<div class="page-header page-header-inner">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
			<?php woocommerce_breadcrumb(); ?>
			<?php do_action( 'woocommerce_archive_description' ); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20 : removed
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20 : removed
				 * @hooked woocommerce_catalog_ordering - 30 : removed
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if( "alt" == of_get_option( 'tokopress_wc_products_style' ) ) : ?>
						<?php wc_get_template_part( 'content-product', 'alt' ); ?>
					<?php else : ?>
						<?php wc_get_template_part( 'content-product' ); ?>
					<?php endif; ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10 : removed
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

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
