<?php
/**
 * Comment Template
 */

if ( !is_singular() )
	return;

if ( post_password_required() )
	return;

function tokopress_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li itemprop="reviews" itemscope="" itemtype="http://schema.org/Review" class="comment even thread-even depth-1" id="li-comment-105">
        <div id="comment-105" class="comment_container">
            <?php echo get_avatar( $comment, $size='60' ); ?>
            <div class="comment-text">
                <div class="entry-meta">
                    <span class="author vcard"><a class="url fn n" rel="author" href="<?php echo get_comment_author_url(); ?>" title="<?php echo get_comment_author(); ?> <?php _e( 'Says', 'tokopress' ); ?>"><?php echo get_comment_author(); ?></a></span>
                    <time class="published" datetime="<?php echo get_comment_date( 'c' ); ?>" title="<?php echo get_comment_date( 'l, F jS, Y, g:i a' ); ?>"><?php echo get_comment_date(); ?></time> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '. Reply', 'tokopress' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
                <div itemprop="description" class="description">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <div class="alert alert-moderation">
                            <p><em><?php _e( 'Your comment is awaiting moderation.', 'tokopress' ); ?></em></p>
                        </div>
                    <?php endif; ?>
                    <?php comment_text(); ?>
                </div>
            </div>
        </div>
    </li><!-- #comment-## -->
    <?php
}
?>

<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
    <div class="container">
		<ol class="commentlist">

			<?php if( have_comments() ) : ?>

				<div class="head-section">
			        <div class="container">
			            <h3 class="section-title"><?php comments_number( __( 'No Comment', 'tokopress' ), __( 'One Comment', 'tokopress' ), __( '% Comments', 'tokopress' ) ); ?></h3>
			        </div>
			    </div>

			    <?php wp_list_comments( 'callback=tokopress_comments' ); ?>

			    <div class="paginate-com">
					<?php paginate_comments_links(); ?>
				</div>

			<?php endif; ?>

		</ol>
	</div>
<?php endif; ?>

<?php if( comments_open() ) : ?>
    <?php
    $comment_args = array(
        'title_reply'           => __( 'Leave a comment', 'tokopress' ),
        'fields'                => apply_filters(
                                    'comment_form_default_fields',

                                    array(
                                        'block-open'    => '',
                                        'author'        => '<p class="comment-form-author"><input id="input_name" class="input-text" name="author" type="text" placeholder="' . __( 'Name', 'tokopress' ) . '" /></p>',
                                        'email'         => '<p class="comment-form-email"><input id="input_email" class="input-text" name="email" type="email" placeholder="' . __( 'Email', 'tokopress' ) . '" /></p>',
                                        'url'           => '<p class="comment-form-url"><input id="input_url" class="input-text" name="url" type="text" placeholder="' . __( 'Website', 'tokopress' ) . '" /></p>',
                                        'block-close'   => ''
                                    )
                                ),
        'comment_field'         => '<p><textarea id="comment_message" class="input-text" rows="4" name="comment" placeholder="' . __( 'post your comment here!', 'tokopress' ) . '" aria-required="true"></textarea></p>',
        'comment_notes_after'   => '',
        'label_submit'          => __( 'Post comment', 'tokopress' )
    );
    ?>

    <div class="container">
	    <?php comment_form( $comment_args ); ?>
    </div>
<?php endif; ?>
