<?php
/**
 * Frontend Control
 */

add_action('init', 'tokopress_rewrite_author_base');
function tokopress_rewrite_author_base() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'user';
}

/**
 * Charset
 */
add_action( 'wp_head', 'tokopress_wphead_charset', 0);
function tokopress_wphead_charset() {
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
}

/**
 * Fallback for Title Tag
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	add_action( 'wp_head', 'tokopress_wphead_title', 0);
	function tokopress_wphead_title() {
?>
<title><?php wp_title(); ?></title>
<?php
	}
}
else {
	remove_action( 'wp_head', '_wp_render_title_tag', 1);
	add_action( 'wp_head', '_wp_render_title_tag', 0);
}

/**
 * Meta Responsive
 */
add_action( 'wp_head', 'tokopress_wphead_responsive', 0);
function tokopress_wphead_responsive() {
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
}

/**
 * Favicon
 */
add_action( 'wp_head', 'tokopress_wphead_favicon', 0);
function tokopress_wphead_favicon() {
	if ( function_exists( 'get_site_icon_url' ) && get_site_icon_url() )
		return;

	$icon = of_get_option( 'tokopress_favicon' ) ? of_get_option( 'tokopress_favicon' ) : THEME_URI.'/img/favicon.png';
	?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($icon); ?>" />
	<?php
}

/**
 * Add sticky header status class to <body> class.
 */
add_filter( 'body_class', 'tokopress_header_sticky_class' );
function tokopress_header_sticky_class( $classes ) {
	if ( of_get_option( 'tokopress_sticky_header' ) )
		$classes[] = 'sticky-header-yes header-large';
	else
		$classes[] = 'sticky-header-no header-large';
	return $classes;
}

/**
 * Add header size class to <body> class.
 */
add_filter( 'body_class', 'tokopress_header_size_class' );
function tokopress_header_size_class( $classes ) {
	if ( '60' == of_get_option( 'tokopress_site_logo_h' ) )
		$classes[] = 'header-h60';
	elseif ( '90' == of_get_option( 'tokopress_site_logo_h' ) )
		$classes[] = 'header-h90';

	if ( '250' == of_get_option( 'tokopress_site_logo_w' ) )
		$classes[] = 'header-w250';

	return $classes;
}

/**
 * Body Filter Class
 */
add_filter( 'body_class', 'tokopress_body_class_filter' );
function tokopress_body_class_filter( $classes ) {

	$layout = 'layout-2c-l';

	if( is_page() || is_404() ) {
		$layout = 'layout-1c-full';
	}

	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() && !is_product() && of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) {
		$layout = 'layout-1c-full';
	}

	$classes[] = apply_filters( 'tokopress_layout_class', $layout );

	if ( of_get_option( 'tokopress_page_header_style' ) == 'inner' )  {
		$classes[] = 'layout-page-header-inner';
	}
	else {
		$classes[] = 'layout-page-header-outer';
	}

	// if ( function_exists( 'is_woocommerce' ) && is_woocommerce() && !is_product() && of_get_option( 'tokopress_wc_hide_products_header' ) ) {
	// 	$classes[] = 'layout-notitle';
	// }

	// if ( function_exists( 'is_woocommerce' ) && is_woocommerce() && is_product() && of_get_option( 'tokopress_wc_hide_product_header' ) ) {
	// 	$classes[] = 'layout-notitle';
	// }

	return $classes;
}

/**
 * Breadcrumb
 */
function tokopress_breadcrumb() {
	breadcrumb_trail(
		array(
			'container' => 'nav',
			'container_class' => 'breadcrumb-trail breadcrumbs',
			'separator' => '<i class="fa fa-angle-right"></i>',
			'labels'    => array(
				'browse' => ''
			),
			'markup_type'=>'no-list',
			'post_taxonomy' => array(
				'post'  => 'category',
			),
		)
	);
}

/**
 * Pagination
 */
if ( ! function_exists( 'tokopress_paging_nav' ) ) {
	function tokopress_paging_nav() {

		global $wp_query;

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		?>

		<nav class="pagination for-product">

			<?php

			echo paginate_links( array(
				'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
				'format' 		=> '',
				'current' 		=> max( 1, get_query_var( 'paged' ) ),
				'total' 		=> $wp_query->max_num_pages,
				'prev_text' 	=> __( 'Previous', 'tokopress' ),
				'next_text' 	=> __( 'Next', 'tokopress' ),
				'type'			=> 'plain',
				'end_size'		=> 3,
				'mid_size'		=> 3
			) );

			?>

		</nav><!-- End .pagination for-product -->

		<?php

	}
}

/**
 * Default Theme Title
 */
add_filter( 'wp_title', 'tokopress_default_title', 10, 2 );
function tokopress_default_title( $title, $sep = '', $seplocation = '' ) {
	if ( is_home() ) $title = get_bloginfo('name');
	global $wp_query;
	$doctitle = '';
	if ( is_404() )
		$doctitle = __( '404 - Not Found', 'tokopress' );
	elseif ( is_search() )
		$doctitle = sprintf( __( 'Search Results for "%1$s"', 'tokopress' ), esc_attr( get_search_query() ) );
	elseif ( ( is_home() || is_front_page() ) )
		$doctitle = get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
	elseif ( is_author() )
		$doctitle = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
	elseif ( is_date() ) {
		if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
			$doctitle = sprintf( __( 'Archive for %1$s', 'tokopress' ), get_the_time( __( 'g:i a', 'tokopress' ) ) );

		elseif ( get_query_var( 'minute' ) )
			$doctitle = sprintf( __( 'Archive for minute %1$s', 'tokopress' ), get_the_time( __( 'i', 'tokopress' ) ) );

		elseif ( get_query_var( 'hour' ) )
			$doctitle = sprintf( __( 'Archive for %1$s', 'tokopress' ), get_the_time( __( 'g a', 'tokopress' ) ) );

		elseif ( is_day() )
			$doctitle = sprintf( __( 'Archive for %1$s', 'tokopress' ), get_the_time( __( 'F jS, Y', 'tokopress' ) ) );

		elseif ( get_query_var( 'w' ) )
			$doctitle = sprintf( __( 'Archive for week %1$s of %2$s', 'tokopress' ), get_the_time( __( 'W', 'tokopress' ) ), get_the_time( __( 'Y', 'tokopress' ) ) );

		elseif ( is_month() )
			$doctitle = sprintf( __( 'Archive for %1$s', 'tokopress' ), single_month_title( ' ', false) );

		elseif ( is_year() )
			$doctitle = sprintf( __( 'Archive for %1$s', 'tokopress' ), get_the_time( __( 'Y', 'tokopress' ) ) );
	}
	elseif ( class_exists( 'woocommerce' ) && is_shop() ) {
		$doctitle = __( 'Shop', 'tokopress' );
	}
	elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) {
		$post_type = get_post_type_object( get_query_var( 'post_type' ) );
		$doctitle = $post_type->labels->name;
	}
	elseif ( is_category() || is_tag() || is_tax() ) {
		$term = $wp_query->get_queried_object();
		$doctitle = $term->name;
	}
	elseif ( is_singular() ) {
		$post_id = $wp_query->get_queried_object_id();
		$doctitle = get_post_field( 'post_title', $post_id );
	}
	if ( get_query_var( 'paged' ) ) {
		$doctitle .= ' ' . sprintf( __( '- Page %s' , 'tokopress' ), get_query_var( 'paged' ) );
	}
	$doctitle = esc_attr( $doctitle );
	if ( $doctitle ) return $doctitle;
	else return $title;
}

/**
 * Custom Background Callback
 */
function tokopress_custom_background_cb() {
	// $background is the saved custom image, or the default image.
	$background = set_url_scheme( get_background_image() );

	// $color is the saved custom color.
	// A default has to be specified in style.css. It will not be printed here.
	$color = get_background_color();

	if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
		$color = false;
	}

	if ( ! $background && ! $color )
		return;

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat_css = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position_css = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment_css = " background-attachment: $attachment;";

		$style .= $image . $repeat_css . $position_css . $attachment_css;
	}
?>
<style type="text/css" id="custom-background-css">
body.custom-background { <?php echo trim( $style ); ?> }
</style>
<?php
}

/**
 * Custom Header
 */
function tokopress_custom_header() {
	$img = get_header_image();
	if ( $img )
		echo '.page-header { background-image: url('.esc_url($img).') }';
}
add_action( 'tokopress_custom_styles', 'tokopress_custom_header' );

/**
 * Header script
 */
function tokopress_header_script() {
	// if( "" !== of_get_option( 'tokopress_header_script' ) ) {
		// echo '<script type="text/javascript">';
		echo of_get_option( 'tokopress_header_script' );
		// echo '</script>';
	// }
}
add_action( 'wp_head', 'tokopress_header_script', 999 );

/**
 * Footer script
 */
function tokopress_footer_script() {
	// if( "" !== of_get_option( 'tokopress_footer_script' ) ) {
		// echo '<script type="text/javascript">';
		echo of_get_option( 'tokopress_footer_script' );
		// echo '</script>';
	// }
}
add_action( 'wp_footer', 'tokopress_footer_script', 999 );

function tokopress_gallery_grabber() {
	global $post;
	$post_id = $post->ID;

	$attachment_ids = array();

	$regex_pattern = get_shortcode_regex();
	preg_match ('/'.$regex_pattern.'/s', $post->post_content, $regex_matches);
	if (isset($regex_matches[2]) && $regex_matches[2] == 'gallery') {
		$attribureStr = str_replace (" ", "&", trim ($regex_matches[3]));
		$attribureStr = str_replace ('"', '', $attribureStr);
		$defaults = array (
			'ids' => '',
		);
		$attributes = wp_parse_args ($attribureStr, $defaults);
		if ( isset ( $attributes["ids"] ) && $attributes["ids"] != '' ) {
			$attachment_ids = explode( ',', $attributes["ids"] );
		}
		else {
			$attachment_ids = get_posts( 'post_parent=' . $post_id . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' );
		}
	}
	else {
		$attachment_ids = get_posts( 'post_parent=' . $post_id . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' );
	}
	if ( !empty( $attachment_ids ) ) {
		return $attachment_ids;
	}
	else {
		return false;
	}
}

add_action( 'wp_footer', 'tokopress_print_js', 25 );
function tokopress_enqueue_js( $code ) {
	global $tokopress_queued_js;

	if ( empty( $tokopress_queued_js ) ) {
		$tokopress_queued_js = '';
	}

	$tokopress_queued_js .= "\n" . $code . "\n";
}

function tokopress_print_js() {
	global $tokopress_queued_js;

	if ( ! empty( $tokopress_queued_js ) ) {

		echo "<!-- JavaScript -->\n<script type=\"text/javascript\">\njQuery(function($) {";

		// Sanitize
		$tokopress_queued_js = wp_check_invalid_utf8( $tokopress_queued_js );
		$tokopress_queued_js = preg_replace( '/&#(x)?0*(?(1)27|39);?/i', "'", $tokopress_queued_js );
		$tokopress_queued_js = str_replace( "\r", '', $tokopress_queued_js );

		echo $tokopress_queued_js . "});\n</script>\n";

		unset( $tokopress_queued_js );
	}
}


/**
 * Allow to remove method for an hook when, it's a class method used and class don't have global for instanciation !
 * @link https://github.com/herewithme/wp-filters-extras
 * @author BeAPI http://www.beapi.fr
 */
function tokopress_remove_filter( $hook_name = '', $method_name = '', $priority = 0 ) {
	global $wp_filter;
	
	// Take only filters on right hook name and priority
	if ( !isset($wp_filter[$hook_name][$priority]) || !is_array($wp_filter[$hook_name][$priority]) )
		return false;
	
	// Loop on filters registered
	foreach( (array) $wp_filter[$hook_name][$priority] as $unique_id => $filter_array ) {
		// Test if filter is an array ! (always for class/method)
		if ( isset($filter_array['function']) && is_array($filter_array['function']) ) {
			// Test if object is a class and method is equal to param !
			if ( is_object($filter_array['function'][0]) && get_class($filter_array['function'][0]) && $filter_array['function'][1] == $method_name ) {
				unset($wp_filter[$hook_name][$priority][$unique_id]);
			}
		}
		
	}
	
	return false;
}

/**
 * Allow to remove method for an hook when, it's a class method used and class don't have variable, but you know the class name :)
 * @link https://github.com/herewithme/wp-filters-extras
 * @author BeAPI http://www.beapi.fr
 */
function tokopress_remove_filter_class( $hook_name = '', $class_name ='', $method_name = '', $priority = 0 ) {
	global $wp_filter;
	
	// Take only filters on right hook name and priority
	if ( !isset($wp_filter[$hook_name][$priority]) || !is_array($wp_filter[$hook_name][$priority]) )
		return false;
	
	// Loop on filters registered
	foreach( (array) $wp_filter[$hook_name][$priority] as $unique_id => $filter_array ) {
		// Test if filter is an array ! (always for class/method)
		if ( isset($filter_array['function']) && is_array($filter_array['function']) ) {
			// Test if object is a class, class and method is equal to param !
			if ( is_object($filter_array['function'][0]) && get_class($filter_array['function'][0]) && get_class($filter_array['function'][0]) == $class_name && $filter_array['function'][1] == $method_name ) {
				unset($wp_filter[$hook_name][$priority][$unique_id]);
			}
		}
		
	}
	
	return false;
}

function tokopress_get_the_term( $id, $taxonomy = 'post_tag' ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	$links = array();

	foreach ( $terms as $term ) {
		$links[] = $term->term_id;
	}

	return $links;
}

function tokopress_get_the_term_list( $id, $taxonomy = 'post_tag', $before = '', $sep = '', $after = '' ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	$links = array();

	foreach ( $terms as $term ) {
		$link = get_term_link( $term, $taxonomy );
		if ( is_wp_error( $link ) ) {
			return $link;
		}
		$links[] = '<a href="' . esc_url( $link ) . '">' . $term->name . '</a>';
	}

	$term_links = apply_filters( "term_links-$taxonomy", $links );

	return $before . join( $sep, $term_links ) . $after;
}
