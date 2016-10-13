<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

if ( $tag_count < 1 && $cat_count < 1 )
	return;
?>
<ul class="list-item-details">
	<?php echo $product->get_categories( ', ', '<li><span class="data-type">' . _n( 'Category', 'Categories', $cat_count, 'tokopress' ) . '</span><span class="value">', '</span></li>' ); ?>

	<?php echo $product->get_tags( ', ', '<li><span class="data-type">' . _n( 'Tag', 'Tags', $tag_count, 'tokopress' ) . '</span><span class="value">', '</span></li>' ); ?>
</ul>
