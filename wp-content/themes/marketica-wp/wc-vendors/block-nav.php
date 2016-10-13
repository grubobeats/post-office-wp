<?php if ( $dashboard_id = WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' ) ) : ?>
    <li>
        <a rel="nofollow" href="<?php echo get_permalink( $dashboard_id ); ?>">
            <?php _e( 'My Dashboard', 'tokopress' ); ?>
            <i class="sli sli-speedometer"></i>
        </a>
    </li>
<?php endif; ?>
<li>
    <a rel="nofollow" href="<?php echo WCV_Vendors::get_vendor_shop_page( wp_get_current_user()->user_login ); ?>">
        <?php _e( 'My Shop', 'tokopress' ); ?>
        <i class="sli sli-bag"></i>
    </a>
</li>
<?php if ( $settings_id = WC_Vendors::$pv_options->get_option( 'shop_settings_page' ) ) : ?>
    <li>
        <a rel="nofollow" href="<?php echo get_permalink( $settings_id ); ?>">
            <?php _e( 'My Settings', 'tokopress' ); ?>
            <i class="fa fa-cogs"></i>
        </a>
    </li>
<?php endif; ?>
<?php $can_submit = WC_Vendors::$pv_options->get_option( 'can_submit_products' ); ?>
<?php if ( $can_submit ) : ?>
    <?php $frontend = of_get_option( 'tokopress_wcvendors_frontend_submit' ); ?>
    <?php $link = $frontend && function_exists( 'xt_wc_frontend_submission_shortcode' ) ? get_permalink( $frontend ) : admin_url( 'post-new.php?post_type=product' ); ?>
    <li>
        <a rel="nofollow" href="<?php echo esc_url( $link ); ?>">
            <?php _e( 'Submit a Product', 'tokopress' ); ?>
            <i class="fa fa-shopping-cart"></i>
        </a>
    </li>
<?php endif; ?>
