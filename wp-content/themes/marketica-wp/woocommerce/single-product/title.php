<?php
/**
 * Single Product Title
 * @version     2.0.0
 */
?>
<?php if ( of_get_option( 'tokopress_wc_hide_product_header' ) ) : ?>
	<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<?php else : ?>
	<meta itemprop="name" content="<?php the_title(); ?>" />
<?php endif; ?>
