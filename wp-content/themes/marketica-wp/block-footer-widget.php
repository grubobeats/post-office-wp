<?php
/**
 * Footer Widget Block
 */
?>

<footer id="footer">
    <div class="container-wrap footer-widgets-container">
        <div class="footer-widgets-row">

            <div class="footer-widgets">

                <?php if( is_active_sidebar( 'footer_widget_1' ) ) : ?>

                    <?php dynamic_sidebar( 'footer_widget_1' ); ?>

                <?php else : ?>

                    <section id="footer-widget-1" class="widget footer-widget">
                        <?php $name = sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#1' ); ?>
                        <h3 class="widget-title"><?php echo $name; ?></h3>
                        <p><?php printf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?></p>
                    </section>

                <?php endif; ?>

            </div>
            <div class="footer-widgets">

                <?php if( is_active_sidebar( 'footer_widget_2' ) ) : ?>

                    <?php dynamic_sidebar( 'footer_widget_2' ); ?>

                <?php else : ?>

                    <section id="footer-widget-2" class="widget footer-widget">
                        <?php $name = sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#2' ); ?>
                        <h3 class="widget-title"><?php echo $name; ?></h3>
                        <p><?php printf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?></p>
                    </section>

                <?php endif; ?>

            </div>
            <div class="footer-widgets">

                <?php if( is_active_sidebar( 'footer_widget_3' ) ) : ?>

                    <?php dynamic_sidebar( 'footer_widget_3' ); ?>

                <?php else : ?>

                    <section id="footer-widget-3" class="widget footer-widget">
                        <?php $name = sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#3' ); ?>
                        <h3 class="widget-title"><?php echo $name; ?></h3>
                        <p><?php printf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?></p>
                    </section>

                <?php endif; ?>

            </div>
            <div class="footer-widgets">

                <?php if( is_active_sidebar( 'footer_widget_4' ) ) : ?>

                    <?php dynamic_sidebar( 'footer_widget_4' ); ?>

                <?php else: ?>

                    <section id="footer-widget-4" class="widget footer-widget">
                        <?php $name = sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#4' ); ?>
                        <h3 class="widget-title"><?php echo $name; ?></h3>
                        <p><?php printf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?></p>
                    </section>

                <?php endif; ?>

            </div>

        </div>
    </div>
</footer>
