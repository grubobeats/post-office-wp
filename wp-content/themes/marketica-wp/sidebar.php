<?php
/**
 * Sidebar
 */
?>

<aside class="widget-area sidebar" id="secondary" role="complementary">
    <?php if ( is_active_sidebar( 'main_widget' ) ) : ?>
        <?php dynamic_sidebar( 'main_widget' ); ?>
    <?php else : ?>
        <?php
        $tag_cloud_args = array(
                        'before_widget' => '<section class="sidebar-widget widget widget_archive"><div class="widget-wrap widget-inside">',
                        'after_widget'  => '</div></section>',
                        'before_title'  => '<h3 class="widget-title">',
                        'after_title'   => '</h3>'
                    );
        ?>
        <?php the_widget( 'WP_Widget_Archives', array(), $tag_cloud_args ); ?>

        <?php
        $categories_args = array(
                        'before_widget' => '<section class="sidebar-widget widget widget_categories"><div class="widget-wrap widget-inside">',
                        'after_widget'  => '</div></section>',
                        'before_title'  => '<h3 class="widget-title">',
                        'after_title'   => '</h3>'
                    );
        ?>
        <?php the_widget( 'WP_Widget_Categories', array(), $categories_args ); ?>
    <?php endif; ?>
</aside>
