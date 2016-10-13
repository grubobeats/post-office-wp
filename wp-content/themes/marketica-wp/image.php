<?php
/**
 * Media Attachment
 */

get_header(); ?>

<?php get_template_part( 'block-site-title' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

<section class="content-area" id="primary">
    <div class="blogs">
        <div class="container">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

                    <div class="entry-attachment">
						<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
                    		<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo esc_url( $att_image[0] );?>" width="<?php echo esc_attr( $att_image[1] );?>" height="<?php echo esc_attr( $att_image[2] );?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a></p>
						<?php else : ?>
                    		<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID) ); ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
						<?php endif; ?>
                    </div>

				<?php endwhile; ?>
			<?php else : ?>

				<?php get_template_part( 'content', '404' ); ?>

			<?php endif; ?>

        </div>
    </div>
</section>

<?php get_sidebar(); ?>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
