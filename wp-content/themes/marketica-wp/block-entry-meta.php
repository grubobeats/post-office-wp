<div class="entry-meta">
    <time class="published" datetime="<?php echo get_the_time( 'c' ); ?>" title="<?php echo get_the_time( 'l, F jS, Y, g:i a' ); ?>"><?php echo get_the_date(); ?></time>
    <div class="entry-detail">
        <div class="ava">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 40 ); ?>
        </div>
        <div class="author-detail">
            <span class="tags"><?php _e( 'writen by', 'tokopress' ) ?> </span>
            <span class="author vcard">
                <a class="url fn n" rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo get_the_author(); ?></a>
            </span>
        </div>

    </div>
    <span class="category">
        <span class="before"><?php _e( 'Filed Under', 'tokopress' ); ?> </span>
        <?php $post_categories = get_the_category( get_the_id() ); ?>
        <?php
            $catgeoryArray = array();
            foreach ($post_categories as $post_cat) {
                $catgeoryArray[] = '<a href="' . get_category_link( $post_cat->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'tokopress' ), esc_attr( $post_cat->name ) ). '">' . $post_cat->name . '</a>';
            }
            echo join( ", ", $catgeoryArray );
        ?>
        <span class="after"> </span>
    </span>
</div>
