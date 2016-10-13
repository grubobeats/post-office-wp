<?php
/**
 * Site Title / Page Title Block
 */
?>

<div class="page-header page-header-outer">

    <?php if ( is_front_page() ) { ?>

		<h1 class="page-title"><?php _e( 'Home', 'tokopress' ); ?></h1>

	<?php } elseif( is_home() ) { ?>

		<h1 class="page-title"><?php _e( 'Blog', 'tokopress' ); ?></h1>

	<?php } elseif ( is_category() ) { ?>

		<h1 class="page-title"><?php printf( __( 'Categories: %s', 'tokopress' ), single_cat_title( '', false ) ); ?></h1>

	<?php } elseif ( is_tag() ) { ?>

		<h1 class="page-title"><?php printf( __( 'Tags: %s', 'tokopress' ), single_tag_title( '', false ) ); ?></h1>

	<?php } elseif ( is_tax() ) { ?>

		<h1 class="page-title"><?php single_term_title(); ?></h1>

	<?php } elseif ( is_author() ) { ?>

		<h1 class="page-title"><?php the_author_meta( 'display_name', get_query_var( 'author' ) ); ?></h1>

	<?php } elseif ( is_search() ) { ?>

		<h1 class="page-title"><?php echo esc_attr( get_search_query() ); ?></h1>

	<?php } elseif ( is_day() ) { ?>

		<h1 class="page-title" ><?php echo get_the_time( __( 'F d, Y', 'tokopress' ) ); ?></h1>

	<?php } elseif ( is_month() ) { ?>

		<h1 class="page-title" ><?php echo get_the_time( __( 'F Y', 'tokopress' ) ); ?></h1>

	<?php } elseif ( is_year() ) { ?>

		<h1 class="page-title" ><?php echo get_the_time( __( 'Y', 'tokopress' ) ); ?></h1>

	<?php } elseif ( is_archive() ) { ?>

			<?php if( is_post_type_archive( 'project' ) ) { ?>

				<h1 class="page-title"><?php _e( 'Projects', 'tokopress' ); ?></h1>

			<?php } elseif ( class_exists( 'woocommerce' ) && is_post_type_archive( 'product' ) ) { ?>

				<h1 class="page-title"><?php _e( 'Shop', 'tokopress' ); ?></h1>

			<?php } else { ?>

				<h1 class="page-title"><?php _e( 'Archives', 'tokopress' ); ?></h1>

			<?php } ?>

	<?php } elseif ( is_single() ) { ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

	<?php } elseif ( is_page() ) { ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

	<?php } elseif( is_404() ) { ?>

		<h1 class="page-title"><?php _e( 'No Result Found', 'tokopress' ); ?></h1>

	<?php } ?>

	<?php tokopress_breadcrumb(); ?>

</div>
