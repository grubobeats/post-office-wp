<?php
/**
 * Search Block
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'type here and hit enter &hellip;', 'placeholder', 'tokopress' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'tokopress' ); ?>" />
    <input type="hidden" name="post_type" value="post" />
    <div class="quicknav-close">
        <a rel="nofollow" class="quicknav-icon" href="javascript:void(0)">
            <i class="sli sli-close"></i>
        </a>
    </div>
</form>
