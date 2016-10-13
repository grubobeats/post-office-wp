<?php
/**
 * Blog Content Gallery
 */
?>

<article id="post-<?php echo get_the_id(); ?>" <?php post_class( 'blog-list' ); ?>>
    <div class="container">

        <div class="entry-content">

            <?php if( is_singular( get_post_type() ) ) : ?>
	            <?php if( has_post_thumbnail() ) : ?>
	                <a href="<?php echo get_permalink(); ?>">
	                    <?php the_post_thumbnail( 'blog-thumbnail', array( 'class' => 'thumbnail-blog' ) ); ?>
	                </a>
	            <?php endif; ?>

	            <div class="content-post">
	                <?php the_content(); ?>
	            </div>

	        <?php else : ?>
            	<h3 class="blog-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

            	<?php $attachment_ids = tokopress_gallery_grabber(); ?>

				<?php if( !empty( $attachment_ids ) ) : ?>
					<div class="framebox">
						<ul class="owl-carousel">
							<?php foreach ( $attachment_ids as $attachment_id ) { ?>
								<li>
					                <a href="<?php echo get_permalink(); ?>">
										<?php echo wp_get_attachment_image( $attachment_id, 'blog-thumbnail', false, false ); ?>
					                </a>
								</li>
							<?php } ?>
						</ul>
					</div>
				<?php endif; ?>
	        <?php endif; ?>

        </div>

        <?php get_template_part( 'block-entry-meta' ); ?>

    </div>
</article>
