<?php
/**
 * Sidebar
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = get_userdata( get_query_var( 'author' ) );
$store_info   = dokan_get_store_info( $store_user->ID );

$map_location = isset( $store_info['location'] ) ? esc_attr( $store_info['location'] ) : '';
if ( $map_location ) {
    $scheme       = is_ssl() ? 'https' : 'http';
    wp_enqueue_script( 'google-maps', $scheme . '://maps.google.com/maps/api/js?sensor=true' );
}
?>

<aside class="widget-area sidebar" id="secondary" role="complementary">
    <div id="dokan-secondary" class="dokan-store-sidebar">
        <div class="dokan-widget-area">
             <?php do_action( 'dokan_sidebar_store_before', $store_user, $store_info ); ?>
            <?php
            if ( ! dynamic_sidebar( 'sidebar-store' ) ) {

                $args = array(
                    'before_widget' => '<aside class="widget">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                );

                if ( class_exists( 'Dokan_Store_Location' ) ) {
                    the_widget( 'Dokan_Store_Category_Menu', array( 'title' => __( 'Store Category', 'tokopress' ) ), $args );
                    if( dokan_get_option( 'store_map', 'dokan_general', 'on' ) == 'on' ) {
                        if ( $map_location ) {
                            the_widget( 'Dokan_Store_Location', array( 'title' => __( 'Store Location', 'tokopress' ) ), $args );
                        }
                    }
                    if( dokan_get_option( 'contact_seller', 'dokan_general', 'on' ) == 'on' ) {
                        the_widget( 'Dokan_Store_Contact_Form', array( 'title' => __( 'Contact Seller', 'tokopress' ) ), $args );
                    }
                }

            }
            ?>

            <?php do_action( 'dokan_sidebar_store_after', $store_user, $store_info ); ?>
        </div>
    </div>
</aside>
