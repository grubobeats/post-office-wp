<?php
/**
 * Author/User page
 */

$user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

get_header(); ?>

<?php get_template_part( 'block-site-title' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

<aside class="widget-area sidebar" id="secondary" role="complementary">
	<div class="section-user-detail">
		<div class="user-detail">
	        <?php echo get_avatar( get_the_author_meta( 'user_email', $user->ID ), 90 ); ?>
	        <h2><?php echo esc_attr( $user->display_name ); ?></h2>
		</div>
	    <?php if ( $user->facebook_url || $user->twitter_url || $user->gplus_url ) : ?>
	        <p class="user-social">
	            <?php if( $user->facebook_url ) : ?>
	                <span class="user-facebook"><a rel="nofollow" href="<?php echo esc_url( $user->facebook_url ); ?>"><i class="fa fa-facebook-square"></i></a></span>
	            <?php endif; ?>
	            <?php if( $user->gplus_url ) : ?>
	                <span class="user-googleplus"><a rel="nofollow" href="<?php echo esc_url( $user->gplus_url ); ?>"><i class="fa fa-google-plus-square"></i></a></span>
	            <?php endif; ?>
	            <?php if( $user->twitter_url ) : ?>
	                <span class="user-twitter"><a rel="nofollow" href="<?php echo esc_url( $user->twitter_url ); ?>"><i class="fa fa-twitter-square"></i></a></span>
	            <?php endif; ?>
	            <?php if( $user->instagram_url ) : ?>
	                <span class="user-instagram"><a rel="nofollow" href="<?php echo esc_url( $user->instagram_url ); ?>"><i class="fa fa-instagram"></i></a></span>
	            <?php endif; ?>
	            <?php if( $user->linkedin_url ) : ?>
	                <span class="user-linkedin"><a rel="nofollow" href="<?php echo esc_url( $user->linkedin_url ); ?>"><i class="fa fa-linkedin-square"></i></a></span>
	            <?php endif; ?>
	            <?php if( $user->youtube_url ) : ?>
	                <span class="user-youtube"><a rel="nofollow" href="<?php echo esc_url( $user->youtube_url ); ?>"><i class="fa fa-youtube-square"></i></a></span>
	            <?php endif; ?>
	            <?php if( $user->flickr_url ) : ?>
	                <span class="user-flickr"><a rel="nofollow" href="<?php echo esc_url( $user->flickr_url ); ?>"><i class="fa fa-flickr"></i></a></span>
	            <?php endif; ?>
	        </p>
	    <?php endif; ?>

        <?php if( $user->phone_number && ( of_get_option( 'tokopress_wcvendors_phone' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_phone' ) == 'loggedin' ) ) ) : ?>
		    <?php echo '<p class="user-social user-contact"><span class="user-phone"><i class="fa fa-phone"></i> '.$user->phone_number.'</span></p>'; ?>
	    <?php endif; ?>

        <?php if( $user->user_email && ( of_get_option( 'tokopress_wcvendors_email' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_email' ) == 'loggedin' ) ) ) : ?>
		    <?php echo '<p class="user-social user-contact"><span class="user-email"><i class="fa fa-envelope"></i> '.antispambot($user->user_email).'</span></p>'; ?>
	    <?php endif; ?>

        <?php if( $user->user_url && ( of_get_option( 'tokopress_wcvendors_url' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_url' ) == 'loggedin' ) ) ) : ?>
		    <?php echo '<p class="user-social user-contact"><span class="user-url"><i class="fa fa-globe"></i> <a rel="nofollow" href="'.$user->user_url.'">'.$user->user_url.'</a></span></p>'; ?>
	    <?php endif; ?>

	    <?php do_action( 'tokopress_section_user_detail' ); ?>
	</div>
</aside>

<section class="content-area" id="primary">
	<div class="section-user-biography">
		<div class="user-biography">
		    <?php if ( $user->user_description ) : ?>
			    <?php echo wpautop( $user->user_description ); ?>
		    <?php else : ?>
		    	<?php printf( __( '%s does not have personal biography.', 'tokopress' ), $user->display_name ); ?>
		    <?php endif; ?>
		</div>
	    <?php do_action( 'tokopress_section_user_biography' ); ?>
	</div>
</section>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
