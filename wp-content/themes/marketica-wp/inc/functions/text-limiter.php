<?php
/**
 * Text Limiter Function
 */

/**
 * Text Limiter
 */
function tokopress_text_limiter($text, $limit = 25, $ending = '...') {
	if ( strlen($text) > $limit ) {

		$text = wp_strip_all_tags($text);
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, -(strlen(strrchr($text, ' '))));
		$text = $text . $ending;

	}

	return $text;
}
