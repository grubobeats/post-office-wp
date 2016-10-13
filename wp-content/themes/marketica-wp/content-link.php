<?php
/**
 * Blog Content Link
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
            	<div class="content-post">
                    <?php if( has_excerpt() ): ?>
                        <p><?php echo tokopress_text_limiter( get_the_excerpt(), 860 ); ?></p>
                    <?php else: ?>
                        <?php echo tokopress_text_limiter( get_the_content(), 860 ); ?>
                    <?php endif; ?>
                </div>
	        <?php endif; ?>

        </div>

        <?php get_template_part( 'block-entry-meta' ); ?>

    </div>
</article>
