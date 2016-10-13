<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<?php if ( of_get_option( 'tokopress_page_header_style' ) != 'inner' ) : ?>
	<div class="page-header page-header-outer">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php woocommerce_breadcrumb(); ?>
	</div>
<?php endif; ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<?php do_action( 'tokopress_wc_before_single_product' ); ?>

	<div <?php post_class(); ?>>

		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20 : removed
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

		<?php if ( of_get_option( 'tokopress_page_header_style' ) == 'inner' && ! of_get_option( 'tokopress_wc_hide_product_header' ) ) : ?>
			<div class="page-header page-header-inner">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php woocommerce_breadcrumb(); ?>
			</div>
		<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<aside class="widget-area sidebar wc-main-content-right" id="secondary" role="complementary">

			<div class="product-calltoaction">

				<?php do_action( 'tokopress_wc_product_calltoaction' ); ?>

			</div>

			<?php do_action( 'tokopress_wc_main_content_right' ); ?>

		</aside>

	</div>

	<?php do_action( 'tokopress_wc_after_single_product' ); ?>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer( 'shop' ); ?>
