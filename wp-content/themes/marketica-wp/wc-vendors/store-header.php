<?php

if ( ! is_product() ) {
    if( of_get_option( 'tokopress_wcvendors_shop_description' ) == 'no' )
        return;

    $vendor_shop = urldecode( get_query_var( 'vendor_shop' ) );
    if ( !$vendor_shop )
        return;

    $vendor_id  = WCV_Vendors::get_vendor_id( $vendor_shop );

    if ( !$vendor_id )
        return;

    $vendor_avatar = of_get_option( 'tokopress_wcvendors_shop_avatar' ) != 'no' ? true : false;
    $vendor_profile = of_get_option( 'tokopress_wcvendors_shop_profile' ) != 'no' ? true : false;
}
else {
    if( of_get_option( 'tokopress_wcvendors_product_description' ) != 'yes' )
        return;

    $vendor_id = WCV_Vendors::get_vendor_from_product( get_the_ID() );    

    if ( !$vendor_id )
        return;

    $vendor_avatar = of_get_option( 'tokopress_wcvendors_product_avatar' ) == 'yes' ? true : false;
    $vendor_profile = of_get_option( 'tokopress_wcvendors_product_profile' ) != 'no' ? true : false;
}

$vendor = get_userdata( $vendor_id );
if ( !$vendor )
    return;

$vendor_display_name = WC_Vendors::$pv_options->get_option( 'vendor_display_name' ); 
switch ($vendor_display_name) {
    case 'display_name':
        $vendor_name = $vendor->display_name;
        break;
    case 'user_login': 
        $vendor_name = $vendor->user_login;
        break;
    default:
        $vendor_name = WCV_Vendors::get_vendor_shop_name( $vendor_id ); 
        break;
}
$vendor_description = do_shortcode( get_user_meta( $vendor_id, 'pv_shop_description', true ) );

$has_html = get_user_meta( $vendor_id, 'pv_shop_html_enabled', true );
$global_html = WC_Vendors::$pv_options->get_option( 'shop_html_enabled' );

$store_banner = '';
if ( !$store_banner && class_exists('WCVendors_Pro') ) {
    $store_banner = get_user_meta( $vendor_id, '_wcv_store_banner_id', true );
}
if ( !$store_banner ) {
    $store_banner = get_user_meta( $vendor_id, 'tppv_shop_banner', true );
}

if ( $vendor_avatar ) {
    $store_icon = '';
    if ( !$store_icon && class_exists('WCVendors_Pro') ) {
        $store_icon_src = wp_get_attachment_image_src( get_user_meta( $vendor_id, '_wcv_store_icon_id', true ), array( 80, 80 ) ); 
        if ( is_array( $store_icon_src ) ) { 
            $store_icon = '<img src="'. $store_icon_src[0].'" alt="" class="avatar avatar-80 photo" width="80" height="80" />'; 
        } 
    }
    if ( !$store_icon ) {
        $store_icon = get_avatar( $vendor_id, 80 );
    }
}

$store_info = '';
if ( $vendor_name )
    $store_info .= '<li class="store-name">'.esc_html( $vendor_name ).'</li>';
if ( trim( $vendor_description ) )
    $store_info .= '<li class="store-description">'.( $global_html || $has_html ) ? wpautop( wptexturize( wp_kses_post( $vendor_description ) ) ) : sanitize_text_field( $vendor_description ).'</li>';

$store_contact = '';
if ( $vendor_profile ) {
    if ( class_exists('WCVendors_Pro') ) {
        $address1           = get_user_meta( $vendor_id, '_wcv_store_address1', true ); 
        $address2           = get_user_meta( $vendor_id, '_wcv_store_address2', true ); 
        $city               = get_user_meta( $vendor_id, '_wcv_store_city', true ); 
        $state              = get_user_meta( $vendor_id, '_wcv_store_state', true ); 
        $postcode           = get_user_meta( $vendor_id, '_wcv_store_postcode', true ); 
        $address            = ($address1 != '') ? $address1 .', ' . $city .', '. $state .', '. $postcode : '';   
        $phone              = get_user_meta( $vendor_id, '_wcv_store_phone', true ); 
        $url                = get_user_meta( $vendor_id, '_wcv_company_url', true ); 
        if ( $address && ( !of_get_option( 'tokopress_wcvendors_address' ) || of_get_option( 'tokopress_wcvendors_address' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_address' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-address"><a href="http://maps.google.com/maps?&amp;q='.$address.'"><address><i class="fa fa-location-arrow"></i> '.$address.'</address></a></span></li>';
        }
        if ( $phone && ( of_get_option( 'tokopress_wcvendors_phone' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_phone' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-phone"><a href="tel:'.$phone.'"><i class="fa fa-phone"></i>'.$phone.'</a></span></li>';
        }
        if( $vendor->user_email && ( of_get_option( 'tokopress_wcvendors_email' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_email' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-email"><i class="fa fa-envelope"></i> '.antispambot($vendor->user_email).'</span></li>';
        }
        if( $url && ( of_get_option( 'tokopress_wcvendors_url' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_url' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-url"><i class="fa fa-globe"></i> <a rel="nofollow" href="'.$url.'">'.$url.'</a></span></li>';
        }
    }
    else {
        if( $vendor->phone_number && ( of_get_option( 'tokopress_wcvendors_phone' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_phone' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-phone"><i class="fa fa-phone"></i> '.$vendor->phone_number.'</span></li>';
        }
        if( $vendor->user_email && ( of_get_option( 'tokopress_wcvendors_email' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_email' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-email"><i class="fa fa-envelope"></i> '.antispambot($vendor->user_email).'</span></li>';
        }
        if( $vendor->user_url && ( of_get_option( 'tokopress_wcvendors_url' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_url' ) == 'loggedin' ) ) ) {
            $store_contact .= '<li><span class="user-url"><i class="fa fa-globe"></i> <a rel="nofollow" href="'.$vendor->user_url.'">'.$vendor->user_url.'</a></span></li>';
        }
    }
}

$store_social = '';
if ( $vendor_profile ) {
    if ( class_exists('WCVendors_Pro') ) {
        $twitter_username   = get_user_meta( $vendor_id, '_wcv_twitter_username', true ); 
        $instagram_username = get_user_meta( $vendor_id, '_wcv_instagram_username', true ); 
        $facebook_url       = get_user_meta( $vendor_id, '_wcv_facebook_url', true ); 
        $linkedin_url       = get_user_meta( $vendor_id, '_wcv_linkedin_url', true ); 
        $youtube_url        = get_user_meta( $vendor_id, '_wcv_youtube_url', true ); 
        $pinterest_url      = get_user_meta( $vendor_id, '_wcv_pinterest_url', true ); 
        $googleplus_url     = get_user_meta( $vendor_id, '_wcv_googleplus_url', true ); 
        if ( $twitter_username ) {
            $store_social .= '<li><span class="user-twitter"><a rel="nofollow" href="//twitter.com/'.esc_attr( $twitter_username ).'"><i class="fa fa-twitter-square"></i></a></span></li>';
        }
        if ( $instagram_username ) {
            $store_social .= '<li><span class="user-instagram"><a rel="nofollow" href="//instagram.com/'.esc_attr( $instagram_username ).'"><i class="fa fa-instagram"></i></a></span></li>';
        }
        if ( $facebook_url ) {
            $store_social .= '<li><span class="user-facebook"><a rel="nofollow" href="'.esc_url( $facebook_url ).'"><i class="fa fa-facebook-square"></i></a></span></li>';
        }
        if ( $linkedin_url ) {
            $store_social .= '<li><span class="user-linkedin"><a rel="nofollow" href="'.esc_url( $linkedin_url ).'"><i class="fa fa-linkedin-square"></i></a></span></li>';
        }
        if ( $youtube_url ) {
            $store_social .= '<li><span class="user-youtube"><a rel="nofollow" href="'.esc_url( $youtube_url ).'"><i class="fa fa-youtube-square"></i></a></span></li>';
        }
        if ( $pinterest_url ) {
            $store_social .= '<li><span class="user-pinterest"><a rel="nofollow" href="'.esc_url( $pinterest_url ).'"><i class="fa fa-pinterest-square"></i></a></span></li>';
        }
        if ( $googleplus_url ) {
            $store_social .= '<li><span class="user-facebook"><a rel="nofollow" href="'.esc_url( $googleplus_url ).'"><i class="fa fa-google-plus-square"></i></a></span></li>';
        }
    }
    else {
        if ( $vendor->facebook_url ) {
            $store_social .= '<li><span class="user-facebook"><a rel="nofollow" href="'.esc_url( $vendor->facebook_url ).'"><i class="fa fa-facebook-square"></i></a></span></li>';
        }
        if ( $vendor->gplus_url ) {
            $store_social .= '<li><span class="user-facebook"><a rel="nofollow" href="'.esc_url( $vendor->gplus_url ).'"><i class="fa fa-google-plus-square"></i></a></span></li>';
        }
        if ( $vendor->twitter_url ) {
            $store_social .= '<li><span class="user-twitter"><a rel="nofollow" href="'.esc_url( $vendor->twitter_url ).'"><i class="fa fa-twitter-square"></i></a></span></li>';
        }
        if ( $vendor->instagram_url ) {
            $store_social .= '<li><span class="user-instagram"><a rel="nofollow" href="'.esc_url( $vendor->instagram_url ).'"><i class="fa fa-instagram"></i></a></span></li>';
        }
        if ( $vendor->linkedin_url ) {
            $store_social .= '<li><span class="user-linkedin"><a rel="nofollow" href="'.esc_url( $vendor->linkedin_url ).'"><i class="fa fa-linkedin-square"></i></a></span></li>';
        }
        if ( $vendor->youtube_url ) {
            $store_social .= '<li><span class="user-youtube"><a rel="nofollow" href="'.esc_url( $vendor->youtube_url ).'"><i class="fa fa-youtube-square"></i></a></span></li>';
        }
        if ( $vendor->pinterest_url ) {
            $store_social .= '<li><span class="user-pinterest"><a rel="nofollow" href="'.esc_url( $vendor->pinterest_url ).'"><i class="fa fa-pinterest-square"></i></a></span></li>';
        }
        if ( $vendor->flickr_url ) {
            $store_social .= '<li><span class="user-flickr"><a rel="nofollow" href="'.esc_url( $vendor->flickr_url ).'"><i class="fa fa-flickr"></i></a></span></li>';
        }
    }
}

?>

<div class="profile-frame store-profile <?php if ( $store_banner ) echo 'store-banner-yes'; ?>" <?php if ( $store_banner ) echo 'style="background-image:url('.wp_get_attachment_url( $store_banner ).');"'; ?> >

    <div class="profile-info-box">
        <?php if ( $vendor_avatar && $store_icon ) : ?>
            <div class="profile-img">
                <?php echo $store_icon; ?>
            </div>
        <?php endif; ?>

        <?php if ( $store_info || $store_contact || $store_social ) : ?>
            <div class="profile-info">
                <?php if ( $store_info ) : ?>
                    <?php printf( '<ul class="store-info">%s</ul>', $store_info ); ?>
                <?php endif; ?>

                <?php if ( $store_contact ) : ?>
                    <?php printf( '<ul class="store-contact">%s</ul>', $store_contact ); ?>
                <?php endif; ?>

                <?php if ( $store_social ) : ?>
                    <?php printf( '<ul class="store-social">%s</ul>', $store_social ); ?>
                <?php endif; ?>
            </div> <!-- .profile-info -->
        <?php endif; ?>

    </div> <!-- .profile-info-box -->
</div> <!-- .profile-frame -->
