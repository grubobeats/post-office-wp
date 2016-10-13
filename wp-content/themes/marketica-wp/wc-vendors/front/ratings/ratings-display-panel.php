<?php
/**
 * The Template for displaying the product ratings in the product panel
 *
 * Override this template by copying it to yourtheme/wc-vendors/front/ratings
 *
 * @package    WCVendors_Pro
 * @version    1.0.3
 */

// This outputs the star rating 
$stars = ''; 
for ($i = 1; $i<=stripslashes( $rating ); $i++) { $stars .= "<i class='fa fa-star'></i>"; } 
for ($i = stripslashes( $rating ); $i<5; $i++) { $stars .=  "<i class='fa fa-star-o'></i>"; }
?> 

<div class="store-rating-entry">
	<h4><?php echo $rating_title; ?> :: <?php echo $stars; ?></h4>
	<p class="store-rating-meta">
		<span><i class="fa fa-clock-o"></i> <?php echo $post_date; ?></span> 
		<span><i class="fa fa-user"></i> <?php echo $customer_name; ?></span>
	</p>
	<?php echo wpautop( $comment ); ?></p>
</div>
