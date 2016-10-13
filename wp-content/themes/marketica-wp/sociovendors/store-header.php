<?php

if ( !is_tax(array('multi_vendor') ) )
    return;

// if ( get_query_var('paged') != 0 ) 
//     return;

$term = get_queried_object();

$vendor_avatar = true;
$vendor_profile = true;

$vendor_name = single_term_title("", false);
$vendor_description = term_description();

$store_banner = '';

if ( $vendor_avatar ) {
    $store_icon = '';
    $store_icon_id = absint(get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true));
    $store_icon_src = wp_get_attachment_image_src( $store_icon_id, array( 80, 80 ) ); 
    if ( is_array( $store_icon_src ) ) { 
        $store_icon = '<img src="'. $store_icon_src[0].'" alt="" class="avatar avatar-80 photo" width="80" height="80" />'; 
    } 
}

$store_info = '';
if ( $vendor_name )
    $store_info .= '<li class="store-name">'.esc_html( single_term_title("", false) ).'</li>';
if ( trim( $vendor_description ) )
    $store_info .= '<li class="store-description">'.wpautop( wptexturize( wp_kses_post( $vendor_description ) ) ).'</li>';

$store_contact = '';

$store_social = '';

?>

<div class="profile-frame store-profile <?php if ( $store_banner ) echo 'store-banner-yes'; ?>" <?php if ( $store_banner ) echo 'style="background-image:url('.wp_get_attachment_url( $store_banner ).'"'; ?> >

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
