<?php
/**
 * Template: Review Meta.
 *
 * @package RT_FoodMenuPro
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

global $comment;

if ( '0' === $comment->comment_approved ) { ?>
	<p class="meta"><em><?php esc_html_e( 'Your comment is awaiting approval', 'food-menu-pro' ); ?></em></p>
<?php } else { ?>
	<p class="meta">
		<strong itemprop="author"><?php comment_author(); ?></strong>&ndash; <time itemprop="datePublished" datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date(); ?></time>:
	</p>
	<?php
}
