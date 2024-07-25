<?php
if ( is_admin() ) {
	return;
}
function thb_get_social_list( $labels = false, $style = false ) {

	$socials = array(
		'facebook'  => array(
			'option' => ot_get_option( 'social_facebook_user' ),
			'label'  => esc_html__( 'Facebook', 'peakshops' ),
			'url'    => esc_url( 'https://facebook.com/%1$s' ),
		),
		'twitter'   => array(
			'option' => ot_get_option( 'social_twitter_user' ),
			'label'  => esc_html__( 'Twitter', 'peakshops' ),
			'url'    => esc_url( 'https://twitter.com/%1$s' ),
		),
		'instagram' => array(
			'option' => ot_get_option( 'social_instagram_user' ),
			'label'  => esc_html__( 'Instagram', 'peakshops' ),
			'url'    => esc_url( 'https://instagram.com/%1$s' ),
		),
		'pinterest' => array(
			'option' => ot_get_option( 'social_pinterest_user' ),
			'label'  => esc_html__( 'Pinterest', 'peakshops' ),
			'url'    => esc_url( 'https://pinterest.com/%1$s' ),
		),
		'youtube'   => array(
			'option' => ot_get_option( 'social_youtube_user' ),
			'label'  => esc_html__( 'Youtube', 'peakshops' ),
			'url'    => array(
				'user'    => esc_url( 'https://youtube.com/user/%1$s' ),
				'channel' => esc_url( 'https://youtube.com/channel/%1$s' ),
			),
		),
		'medium'    => array(
			'option' => ot_get_option( 'social_medium_user' ),
			'label'  => esc_html__( 'Medium', 'peakshops' ),
			'url'    => esc_url( 'https://medium.com/%1$s' ),
		),
		'vimeo'     => array(
			'option' => ot_get_option( 'social_vimeo_user' ),
			'label'  => esc_html__( 'Vimeo', 'peakshops' ),
			'url'    => esc_url( 'https://vimeo.com/channels/%1$s' ),
		),
		'vkontakte' => array(
			'option' => ot_get_option( 'social_vkontakte_user' ),
			'label'  => esc_html__( 'VK Username', 'peakshops' ),
			'url'    => esc_url( 'https://vk.com/%1$s' ),
		),
	);

	$active_links = array_filter(
		$socials,
		function( $value ) {
			return '' !== $value['option'] || ! empty( $value['option'] );
		}
	);

	if ( $active_links ) {
		$classes[] = 'thb-social-links-container';
		$classes[] = $style;
		?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<?php
		foreach ( $active_links as $network => $value ) {

			if ( '' === $value['option'] || empty( $value['option'] ) ) {
				return;
			}

			if ( 'youtube' === $network ) {
				$yt_type = ot_get_option( 'social_youtube_type', 'channel' );
				$url     = sprintf( $value['url'][ $yt_type ], $value['option'] );
			} else {
				$url = sprintf( $value['url'], $value['option'] );
			}
			?>
			<a href="<?php echo esc_url( $url ); ?>" target="_blank" class="thb-social-link social-link-<?php echo esc_attr( $network ); ?>" rel="noreferrer">
				<div class="thb-social-icon-container"><i class="thb-icon-<?php echo esc_attr( $network ); ?>"></i></div>
				<?php if ( $labels ) { ?>
					<div class="thb-social-label"><?php echo esc_html( $value['label'] ); ?></div>
				<?php } ?>
			</a>
		<?php } ?>
		</div>
		<?php
	}
}
