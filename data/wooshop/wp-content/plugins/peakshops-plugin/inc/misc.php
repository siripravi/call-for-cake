<?php
// Encoding.
if ( ! function_exists( 'thb_decode' ) ) {
	function thb_decode( $value ) {
		$func = 'base64' . '_decode';
		return $func( $value );
	}
}
// Remove Empty P tags.
function thb_remove_p( $content ) {
	$to_remove = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']',
	);

	$content = strtr( $content, $to_remove );
	return $content;
}
add_filter( 'the_content', 'thb_remove_p' );


// Remove VC-added P tags.
function thb_remove_vc_added_p( $content ) {
	if ( substr( $content, 0, 4 ) === '</p>' ) {
		$content = substr( $content, 4 );
	}
	if ( substr( $content, -3 ) === '<p>' ) {
		$content = substr( $content, 0, -3 );
	}
	return $content;
}

// P tag fix for certain shortcodes.
function thb_shortcode_empty_paragraph_fix( $content ) {
	$block = join( '|', array( 'thb_slidetype', 'thb_fadetype' ) );

	// opening tag.
	$rep = preg_replace( "/(<p>)?(\n|\r)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", '[$3$4]', $content );

	// closing tag.
	$rep = preg_replace( "/(<p>)?(\n|\r)?\[\/($block)](<\/p>|<br \/>)?/", '[/$3]', $rep );

	return $rep;
}
add_filter( 'the_content', 'thb_shortcode_empty_paragraph_fix' );

// Download Emails.
function thb_csv_export() {
	$download = filter_input( INPUT_GET, 'thb_download_emails', FILTER_SANITIZE_STRING );
	if ( $download && current_user_can( 'manage_options' ) ) {
		$filename = 'thb_subcribed_emails_' . time() . '.csv';

		// emails.
		$stack = get_option( 'subscribed_emails' );
		$fh    = @fopen( 'php://output', 'w' );

		header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
		header( 'Content-Description: File Transfer' );
		header( 'Content-type: text/csv' );
		header( "Content-Disposition: attachment; filename={$filename}" );
		header( 'Expires: 0' );
		header( 'Pragma: public' );

		foreach ( $stack as $line ) {
			$val = explode( ',', $line );
			fputcsv( $fh, $val );
		}

		fclose( $fh );
		die();
	}

}
add_action( 'admin_init', 'thb_csv_export' );
