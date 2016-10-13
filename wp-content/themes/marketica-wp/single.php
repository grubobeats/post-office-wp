<?php
/**
 * Single Post
 */

get_header(); ?>

<?php if ( of_get_option( 'tokopress_page_header_style' ) != 'inner' ) get_template_part( 'block-page-header-outer' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<section class="content-area" id="primary">

		<?php if ( of_get_option( 'tokopress_page_header_style' ) == 'inner' ) get_template_part( 'block-page-header-inner' ); ?>

	    <div class="blogs">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

					<?php comments_template(); ?>

				<?php endwhile; ?>
			<?php else : ?>

				<?php get_template_part( 'content', '404' ); ?>

			<?php endif; ?>

	    </div>

	    <?php tokopress_paging_nav(); ?>

	</section>

	<?php get_sidebar(); ?>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
