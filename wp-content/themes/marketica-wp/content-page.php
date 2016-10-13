<?php
/**
 * Content Page
 */
?>

<article id="page-<?php echo get_the_id(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

        <?php the_content(); ?>

        <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tokopress' ),
				'after'  => '</div>',
			) );
		?>

	</div>

</article>
