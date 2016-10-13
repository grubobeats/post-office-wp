<?php
/**
 * Functions to handle contact form
 */

/**
 * Get contact form.
 */
function tokopress_get_contact_form( $args = array() ){
	global $wp_query;

	$defaults = array(
		'email' => get_bloginfo('admin_email'),
		'title' => __( 'Leave a message', 'tokopress' ),
		'subject' => __( 'Message via the contact form', 'tokopress' ),
		'sendcopy' => 'yes',
		'question' => '',
		'answer' => '',
		'button_text' => __( 'Submit', 'tokopress' )
	);
	$args = wp_parse_args( $args, $defaults );
	extract( $args );

	if( trim($email) == '' )
		$email = get_bloginfo('admin_email');

	// Get the site domain and get rid of www.
	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) == 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}

	$email_server = 'noreply@'.$sitename;

	$html = '';
	$error_messages = array();
	$notification = false;
	$email_sent = false;
	if ( ( count( $_POST ) > 3 ) && isset( $_POST['submitted'] ) ) {
		if ( isset ( $_POST['checking'] ) && $_POST['checking'] != '' )
			$error_messages['checking'] = 1;
		if ( isset ( $_POST['contact-name'] ) && $_POST['contact-name'] != '' )
			$message_name = $_POST['contact-name'];
		else
			$error_messages['contact-name'] = __( 'Please enter your name', 'tokopress' );
		if ( isset ( $_POST['contact-email'] ) && $_POST['contact-email'] != '' && is_email( $_POST['contact-email'] ) )
			$message_email = $_POST['contact-email'];
		else
			$error_messages['contact-email'] = __( 'Please enter your email address (and please make sure it\'s valid)', 'tokopress' );
		if ( isset ( $_POST['contact-message'] ) && $_POST['contact-message'] != '' )
			$message_body = $_POST['contact-message'] . "\n\r\n\r";
		else
			$error_messages['contact-message'] = __( 'Please enter your message', 'tokopress' );
		if ( $question && $answer ) {
			if ( isset ( $_POST['contact-quiz'] ) && $_POST['contact-quiz'] != '' ) {
				$message_quiz = $_POST['contact-quiz'];
				if ( esc_attr( $message_quiz ) != esc_attr( $answer ) )
					$error_messages['contact-quiz'] = __( 'Your answer was wrong!', 'tokopress' );
			}
			else {
				$error_messages['contact-quiz'] = __( 'Please enter your answer', 'tokopress' );
			}
		}
		if ( count( $error_messages ) ) {
			$notification = '<p class="alert alert-danger">' . __( 'There were one or more errors while submitting the form.', 'tokopress' ) . '</p>';
		}
		else {
			$ipaddress = '';
			if ( isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] )
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] )
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if( isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED'] )
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if( isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR'] )
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if( isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED'] )
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] )
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$message_body = __( 'Email:', 'tokopress' ) . ' '. $message_email . "\r\n\r\n" . $message_body;
			$message_body = __( 'Name:', 'tokopress' ) . ' '. $message_name . "\r\n" . $message_body;
			$message_body = $message_body."\r\n\r\n".__( 'IP Address:', 'tokopress' ).$ipaddress . "\r\n" . __( 'User Agent:', 'tokopress' ).$useragent;

			$headers = array();
			$headers[] = 'From: '.$message_name.' <' . $email_server . '>';
			$headers[] = 'Reply-To: '.$message_email;
			$email_sent = wp_mail($email, $subject, $message_body, $headers);

			if ( $sendcopy == 'yes' ) {
				// Send a copy of the e-mail to the sender, if specified.
				if ( isset( $_POST['send-copy'] ) && $_POST['send-copy'] == 'true' ) {
					$subject = __( '[COPY]', 'tokopress' ) . ' ' . $subject;
					$headers = array();
					$headers[] = 'From: '.get_bloginfo('name').' <' . $email_server . '>';
					$headers[] = 'Reply-To: '.$email;
					$email_sent = wp_mail($message_email, $subject, $message_body, $headers);
				}
			}

			if( $email_sent == true ) {
				$notification = do_shortcode( '<p class="alert alert-success">' . __( 'Your email was successfully sent.', 'tokopress' ) . '</p>' );
			}
			else {
				$notification = '<p class="alert alert-danger">' . __( 'There were technical error while submitting the form. Sorry for the inconvenience.', 'tokopress' ) . '<p>';
			}

		}
	}

	if( $email_sent == true ) {
		return '<div class="contact-form">'.$notification.'</div>';
	}

	$html .= '<div class="contact-form">' . "\n";
	$html .= '<h2>' . $title . '</h2>' . "\n";
	$html .= $notification;
	if ( $email == '' ) {
		$html .= do_shortcode( '<p class="alert alert-danger">' . __( 'E-mail has not been setup properly. Please add your contact e-mail!', 'tokopress' ) . '</p>' );
	}
	else {
		$html .= '<form action="" id="contact-form" method="post">' . "\n";
		$html .= '<fieldset class="forms">' . "\n";
		$contact_name = '';
		if( isset( $_POST['contact-name'] ) ) { $contact_name = $_POST['contact-name']; }
		$contact_email = '';
		if( isset( $_POST['contact-email'] ) ) { $contact_email = $_POST['contact-email']; }
		$contact_message = '';
		if( isset( $_POST['contact-message'] ) ) { $contact_message = stripslashes( $_POST['contact-message'] ); }

		$html .= '<div class="left-column">' . "\n";
		$html .= '<p class="field-contact-name">' . "\n";
		$html .= '<input placeholder="' . __( 'Your Name', 'tokopress' ) . '" type="text" name="contact-name" id="contact-name" value="' . esc_attr( $contact_name ) . '" class="txt requiredField" />' . "\n";
		if( array_key_exists( 'contact-name', $error_messages ) ) {
			$html .= '<span class="contact-error">' . $error_messages['contact-name'] . '</span>' . "\n";
		}
		$html .= '</p>' . "\n";

		$html .= '<p class="field-contact-email">' . "\n";
		$html .= '<input placeholder="' . __( 'Your Email', 'tokopress' ) . '" type="text" name="contact-email" id="contact-email" value="' . esc_attr( $contact_email ) . '" class="txt requiredField email" />' . "\n";
		if( array_key_exists( 'contact-email', $error_messages ) ) {
			$html .= '<span class="contact-error">' . $error_messages['contact-email'] . '</span>' . "\n";
		}
		$html .= '</p>' . "\n";
		$html .= '</div>' . "\n";

		$html .= '<div class="right-column">' . "\n";
		$html .= '<p class="field-contact-message">' . "\n";
		$html .= '<textarea placeholder="' . __( 'Your Message', 'tokopress' ) . '" name="contact-message" id="contact-message" rows="10" cols="30" class="textarea requiredField">' . esc_textarea( $contact_message ) . '</textarea>' . "\n";
		if( array_key_exists( 'contact-message', $error_messages ) ) {
			$html .= '<span class="contact-error">' . $error_messages['contact-message'] . '</span>' . "\n";
		}
		$html .= '</p>' . "\n";
		$html .= '</div>' . "\n";

		if ( $question && $answer ) {
			$html .= '<p class="field-contact-quiz">' . "\n";
			$html .= $question.'<br/>' . "\n";
			$html .= '<input placeholder="' . __( 'Your Answer', 'tokopress' ) . '" type="text" name="contact-quiz" id="contact-quiz" value="" class="txt requiredField quiz" />' . "\n";
			if( array_key_exists( 'contact-quiz', $error_messages ) ) {
				$html .= '<span class="contact-error">' . $error_messages['contact-quiz'] . '</span>' . "\n";
			}
			$html .= '</p>' . "\n";
		}

		if ( $sendcopy == 'yes' ) {
			$send_copy = '';
			if(isset($_POST['send-copy']) && $_POST['send-copy'] == true) {
				$send_copy = ' checked="checked"';
			}
			$html .= '<div class="block-column">' . "\n";
			$html .= '<p class="inline"><input type="checkbox" name="send-copy" id="send-copy" value="true"' . $send_copy . ' />&nbsp;&nbsp;<label for="send-copy">' . __( 'Send a copy of this email to you', 'tokopress' ) . '</label></p>' . "\n";
			$html .= '</div>' . "\n";
		}

		$checking = '';
		if(isset($_POST['checking'])) {
			$checking = $_POST['checking'];
		}

		$html .= '<div class="block-column">' . "\n";
		$html .= '<p class="screen-reader-text"><label for="checking" class="screen-reader-text">' . __( 'If you want to submit this form, do not enter anything in this field', 'tokopress' ) . '</label><input type="text" name="checking" id="checking" class="screen-reader-text" value="' . esc_attr( $checking ) . '" /></p>' . "\n";

		$html .= '<p class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><input id="contactSubmit" class="btn button" type="submit" value="' . $button_text . '" /></p>';
		$html .= '<div>' . "\n";

		$html .= '</fieldset>' . "\n";
		$html .= '</form>' . "\n";

		$html .= '</div><!--/.post .contact-form-->' . "\n";

	}

	return $html;

}

/**
 * Return formatted post meta.
 */
function tokopress_get_post_meta( $meta, $postid = '', $format = '' ) {
	if ( !$postid ) {
		global $post;
		if ( null === $post )
			return false;
		else
			$postid = $post->ID;
	}
	$meta_value = get_post_meta($postid, $meta, true);
	if ( !$meta_value )
		return false;
	$meta_value = wp_kses_stripslashes( wp_kses_decode_entities( $meta_value ) );
	if ( is_ssl() )
		$meta_value = str_replace("http://", "https://", $meta_value);
	if ( !$format )
		return $meta_value;
	else return str_replace("%meta%", $meta_value, $format);
}
