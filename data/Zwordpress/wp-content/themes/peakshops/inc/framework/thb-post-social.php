<?php
if ( is_admin() ) {
	return;
}
function thb_article_get_accounts( $share_url, $post_id, $options ) {
	$sharing_buttons  = ot_get_option( $options, array() );
	$sharing_accounts = array();
	$post_url         = esc_url( $share_url );
	$post_title       = rawurlencode( get_the_title( $post_id ) );
	$post_content     = get_post_field( 'post_content', intval( $post_id ) );
	$post_thumbnail   = get_the_post_thumbnail_url( intval( $post_id ), 'full' );
	$default_via      = apply_filters( 'thb_twitter_via', 'fuel_themes' );
	$twitter_user     = ot_get_option( 'social_twitter_user', $default_via );

	foreach ( $sharing_buttons as $button ) {
		switch ( $button ) {
			case 'facebook':
				$sharing_accounts['facebook'] = array(
					'slug'  => 'facebook',
					'url'   => esc_url( 'https://www.facebook.com/sharer.php?u=' . $share_url ),
					'icon'  => 'thb-icon-facebook',
					'label' => esc_html__( 'Share', 'peakshops' ),
					'count' => 'thb_facebook_count',
				);
				break;
			case 'twitter':
				$sharing_accounts['twitter'] = array(
					'slug'  => 'twitter',
					'url'   => esc_url( 'https://twitter.com/share?text=' . $post_title . '&via=' . $twitter_user . '&url=' . $share_url ),
					'icon'  => 'thb-icon-twitter',
					'label' => esc_html__( 'Tweet', 'peakshops' ),
				);
				break;
			case 'pinterest':
				$sharing_accounts['pinterest'] = array(
					'slug'  => 'pinterest',
					'url'   => esc_url( 'https://pinterest.com/pin/create/bookmarklet/?url=' . $share_url . '&media=' . $post_thumbnail ),
					'icon'  => 'thb-icon-pinterest',
					'label' => esc_html__( 'Pin', 'peakshops' ),
					'count' => 'thb_pinterest_count',
				);
				break;
			case 'linkedin':
				$sharing_accounts['linkedin'] = array(
					'slug'  => 'linkedin',
					'url'   => esc_url( 'https://www.linkedin.com/cws/share?url=' . $share_url ),
					'icon'  => 'thb-icon-linkedin',
					'label' => esc_html__( 'Share', 'peakshops' ),
					'count' => 'thb_linkedin_count',
				);
				break;
			case 'email':
				$sharing_accounts['email'] = array(
					'slug'  => 'email',
					'url'   => esc_url( 'mailto:?subject=' . $post_title . '&body=' . $post_title . '%20' . $share_url ),
					'icon'  => 'thb-icon-mail',
					'label' => esc_html__( 'Share', 'peakshops' ),
				);
				break;
			case 'vkontakte':
				$sharing_accounts['vkontakte'] = array(
					'slug'  => 'vkontakte',
					'url'   => esc_url( 'https://vk.com/share.php?url=' . $share_url ),
					'icon'  => 'thb-icon-vkontakte',
					'label' => esc_html__( 'Like', 'peakshops' ),
				);
				break;
			case 'whatsapp':
				$sharing_accounts['whatsapp'] = array(
					'slug'  => 'whatsapp',
					'url'   => esc_url( 'https://wa.me/?text=' . $post_title . ' ' . $share_url ),
					'icon'  => 'thb-icon-whatsapp',
					'label' => esc_html__( 'Share', 'peakshops' ),
				);
				break;
			case 'reddit':
				$sharing_accounts['reddit'] = array(
					'slug'  => 'reddit',
					'url'   => esc_url( 'https://reddit.com/submit?url=' . $share_url ),
					'icon'  => 'thb-icon-reddit',
					'label' => esc_html__( 'Share', 'peakshops' ),
				);
				break;
		}
	}
	return $sharing_accounts;
}

/* Article Sharing Buttons - Top */
function thb_article_share_top() {
	$post_id         = get_the_ID();
	$post_url        = get_permalink();
	$sharing_buttons = thb_article_get_accounts( $post_url, $post_id, 'sharing_buttons_top' );
	if ( empty( $sharing_buttons ) ) {
		return;
	}

	?>
	<div class="thb-fixed-shares-container">
		<div class="thb-social-top thb-fixed">
			<span class="thb-sharing-title"><?php esc_html_e( 'Share', 'peakshops' ); ?></span>
			<div class="thb-social-buttons">
				<?php
				$i = 0;
				foreach ( $sharing_buttons as $button ) {
					?>
				<div class="social-button-holder">
					<a href="<?php echo esc_attr( $button['url'] ); ?>" class="social social-<?php echo esc_attr( $button['slug'] ); ?>"<?php if ( 'whatsapp' === $button['slug'] ) { ?> data-action="share/whatsapp/share"<?php } ?>>
						<i class="<?php echo esc_attr( $button['icon'] ); ?>"></i>
					</a>
				</div>
				<?php $i++; } ?>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'thb_article_fixed', 'thb_article_share_top' );
