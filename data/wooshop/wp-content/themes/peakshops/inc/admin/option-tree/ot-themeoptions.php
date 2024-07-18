<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'thb_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function thb_custom_theme_options() {

	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option( 'option_tree_settings', array() );

	/**
	 * Create a custom settings array that we pass to
	 * the OptionTree Settings API Class.
	 */
	$custom_settings = array(
		'sections' => array(
			array(
				'title' => esc_html__( 'General', 'peakshops' ),
				'id'    => 'general',
			),
			array(
				'title' => esc_html__( 'Sub-Header', 'peakshops' ),
				'id'    => 'subheader',
			),
			array(
				'title' => esc_html__( 'Header', 'peakshops' ),
				'id'    => 'header',
			),
			array(
				'title' => esc_html__( 'Menu', 'peakshops' ),
				'id'    => 'menu',
			),
			array(
				'title' => esc_html__( 'Newsletter', 'peakshops' ),
				'id'    => 'newsletter',
			),
			array(
				'title' => esc_html__( 'Articles', 'peakshops' ),
				'id'    => 'article',
			),
			array(
				'title' => esc_html__( 'Shop', 'peakshops' ),
				'id'    => 'shop',
			),
			array(
				'title' => esc_html__( 'Product Page', 'peakshops' ),
				'id'    => 'product',
			),
			array(
				'title' => esc_html__( 'Footer', 'peakshops' ),
				'id'    => 'footer',
			),
			array(
				'title' => esc_html__( 'Sub-Footer', 'peakshops' ),
				'id'    => 'subfooter',
			),
			array(
				'title' => esc_html__( 'Typography', 'peakshops' ),
				'id'    => 'typography',
			),
			array(
				'title' => esc_html__( 'Customization', 'peakshops' ),
				'id'    => 'customization',
			),
			array(
				'title' => esc_html__( 'Misc', 'peakshops' ),
				'id'    => 'misc',
			),
			array(
				'title' => esc_html__( 'GDPR', 'peakshops' ),
				'id'    => 'gdpr',
			),
		),
		'settings' => array(
			array(
				'id'      => 'general_tab0',
				'label'   => esc_html__( 'General', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'id'      => 'subscribe_text',
				'label'   => esc_html__( 'Download Subscription Emails', 'peakshops' ),
				'desc'    => __( 'You can download the subscribed emails through the subscription element/widget here: <br><br> <a href="?thb_download_emails=true" class="button button-primary">Download Emails</a>', 'peakshops' ),
				'type'    => 'textblock',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Boxed', 'peakshops' ),
				'id'      => 'general_boxed',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Wraps the body of the site content in a wrapper so that you can have different background colors, similar to our demo, Winery.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'general',
			),
			array(
				'label'     => esc_html__( 'Boxed Margin', 'peakshops' ),
				'id'        => 'boxed_margin',
				'type'      => 'spacing',
				'desc'      => esc_html__( 'You can change the boxed versions margins here. Affects large screens only.', 'peakshops' ),
				'section'   => 'general',
				'condition' => 'general_boxed:is(on)',
			),
			array(
				'label'   => esc_html__( 'Lazy Load Images', 'peakshops' ),
				'id'      => 'lazy_load',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle lazy-loading of images here.', 'peakshops' ),
				'section' => 'general',
				'std'     => 'on',
			),
			array(
				'label'   => esc_html__( 'AJAX Search', 'peakshops' ),
				'id'      => 'general_search_ajax',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle Ajax search on the search screen.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'general',
			),

			array(
				'id'      => 'general_tab1',
				'label'   => esc_html__( 'Blog', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Blog Style', 'peakshops' ),
				'id'      => 'blog_style',
				'std'     => 'style1',
				'type'    => 'radio-image',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Category', 'peakshops' ),
				'id'      => 'post_meta_cat',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying article categories on listing pages.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Date', 'peakshops' ),
				'id'      => 'post_meta_date',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying article date on listing pages.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Excerpt', 'peakshops' ),
				'id'      => 'post_meta_excerpt',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying article excerpt on listing pages.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'id'      => 'general_tab2',
				'label'   => esc_html__( 'Social Links', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Facebook Username', 'peakshops' ),
				'id'      => 'social_facebook_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Twitter Username', 'peakshops' ),
				'id'      => 'social_twitter_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Instagram Username', 'peakshops' ),
				'id'      => 'social_instagram_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Pinterest Username', 'peakshops' ),
				'id'      => 'social_pinterest_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Youtube ID', 'peakshops' ),
				'id'      => 'social_youtube_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Youtube Type', 'peakshops' ),
				'id'      => 'social_youtube_type',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Is this a channel or a user?', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Channel', 'peakshops' ),
						'value' => 'channel',
					),
					array(
						'label' => esc_html__( 'Username', 'peakshops' ),
						'value' => 'username',
					),
				),
				'std'     => 'channel',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Medium Username', 'peakshops' ),
				'id'      => 'social_medium_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Vimeo Channel Name', 'peakshops' ),
				'id'      => 'social_vimeo_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'VK Username/ID', 'peakshops' ),
				'id'      => 'social_vkontakte_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'id'      => 'general_tab3',
				'label'   => esc_html__( 'Global Notification', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Global Notification', 'peakshops' ),
				'id'      => 'global_notification',
				'type'    => 'on-off',
				'desc'    => esc_html__( 'This adds a global notification at the top.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Global Notification Color', 'peakshops' ),
				'id'      => 'global_notification_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'Changes the color of the contents of the global notificaion', 'peakshops' ),
				'std'     => 'light',
				'section' => 'general',
			),
			array(
				'label'     => esc_html__( 'Global Notification Content', 'peakshops' ),
				'id'        => 'global_notification_content',
				'type'      => 'textarea',
				'desc'      => esc_html__( 'Content of the notification.', 'peakshops' ),
				'rows'      => '4',
				'section'   => 'general',
				'condition' => 'global_notification:is(on)',
			),
			array(
				'id'      => 'newsletter_tab0',
				'label'   => esc_html__( 'General', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'Display Newsletter Popup?', 'peakshops' ),
				'id'      => 'newsletter',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Newsletter Popup?', 'peakshops' ),
				'std'     => 'off',
				'section' => 'newsletter',
			),
			array(
				'label'     => esc_html__( 'Newsletter Lightbox Color', 'peakshops' ),
				'id'        => 'newsletter_lightbox_color',
				'type'      => 'radio-image',
				'desc'      => esc_html__( 'You can choose your newsletter lightbox color here.', 'peakshops' ),
				'std'       => 'light',
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter refresh interval', 'peakshops' ),
				'id'        => 'newsletter-interval',
				'type'      => 'radio',
				'desc'      => esc_html__( 'When the user closes the popup, the newsletter will not be visible on the next page. After the below period, its going to be visible again unless he closes it again', 'peakshops' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'Never - the popup will be shown every page', 'peakshops' ),
						'value' => '0',
					),
					array(
						'label' => esc_html__( '1 Day', 'peakshops' ),
						'value' => '1',
					),
					array(
						'label' => esc_html__( '2 Days', 'peakshops' ),
						'value' => '2',
					),
					array(
						'label' => esc_html__( '3 Days', 'peakshops' ),
						'value' => '3',
					),
					array(
						'label' => esc_html__( '1 Week', 'peakshops' ),
						'value' => '7',
					),
					array(
						'label' => esc_html__( '2 Weeks', 'peakshops' ),
						'value' => '14',
					),
					array(
						'label' => esc_html__( '3 Weeks', 'peakshops' ),
						'value' => '21',
					),
					array(
						'label' => esc_html__( '1 Month', 'peakshops' ),
						'value' => '30',
					),

				),
				'std'       => '1',
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'label'        => esc_html__( 'Newsletter Delay', 'peakshops' ),
				'id'           => 'newsletter_delay',
				'std'          => '0',
				'type'         => 'numeric-slider',
				'min_max_step' => '0,120,1',
				'desc'         => esc_html__( 'You can delay the newsletter popup reveal by certain seconds.', 'peakshops' ),
				'section'      => 'newsletter',
				'condition'    => 'newsletter:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter Image', 'peakshops' ),
				'id'        => 'newsletter_image',
				'type'      => 'upload',
				'class'     => 'ot-upload-attachment-id',
				'desc'      => esc_html__( 'You can add an image to your newsletter if you want. This is optional.', 'peakshops' ),
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter Background', 'peakshops' ),
				'id'        => 'newsletter_bg',
				'type'      => 'background',
				'desc'      => esc_html__( 'You can change the background of the newsletter from here.', 'peakshops' ),
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'id'      => 'newsletter_tab1',
				'label'   => esc_html__( 'Phrases & Translation', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'Enable Translation & Disable language file', 'peakshops' ),
				'id'      => 'newsletter_translation',
				'type'    => 'on_off',
				'desc'    => wp_kses_post( 'By enabling this, you are overriding the language files. This is not recommended if you are running a multi-language website. <em>Newsletter widgets and page builder elements have their own options to change the phrases.</em>', 'peakshops' ),
				'std'     => 'off',
				'section' => 'newsletter',
			),
			array(
				'label'     => esc_html__( 'Newsletter Title', 'peakshops' ),
				'id'        => 'newsletter_translation_title',
				'type'      => 'text',
				'section'   => 'newsletter',
				'condition' => 'newsletter_translation:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter Text', 'peakshops' ),
				'id'        => 'newsletter_translation_text',
				'type'      => 'text',
				'section'   => 'newsletter',
				'condition' => 'newsletter_translation:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter GDPR Checkbox Text', 'peakshops' ),
				'id'        => 'newsletter_checkbox_text',
				'type'      => 'text',
				'section'   => 'newsletter',
				'condition' => 'newsletter_translation:is(on)',
			),
			array(
				'id'      => 'newsletter_tab2',
				'label'   => esc_html__( 'MailChimp Integration', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'MailChimp API Key', 'peakshops' ),
				'id'      => 'newsletter_mailchimp_api',
				'type'    => 'text',
				'desc'    => wp_kses_post( '1) Log in to your MailChimp account.<br>2) Go to your Account.<br>3) Click the Extras drop-down menu and choose API keys.<br>4) Copy an existing API key or create a new one.<br>5) After saving your Theme Options, please choose a mail list below.', 'peakshops' ),
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'MailChimp List', 'peakshops' ),
				'id'      => 'newsletter_mailchimp_list',
				'type'    => 'mc_list_select',
				'desc'    => esc_html__( 'Your MailChimp lists will appear here after you have entered your API key and saved your Theme Options.', 'peakshops' ),
				'std'     => '',
				'section' => 'newsletter',
			),
			array(
				'id'      => 'article_tab1',
				'label'   => esc_html__( 'Sharing Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => 'Article Sharing buttons',
				'id'      => 'sharing_buttons_top',
				'type'    => 'social_checkbox',
				'desc'    => 'You can choose which social networks to display.',
				'section' => 'article',
			),
			array(
				'id'      => 'article_tab2',
				'label'   => esc_html__( 'Article Blocks', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Category?', 'peakshops' ),
				'id'      => 'article_cat',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays article category over article title', 'peakshops' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Author Name?', 'peakshops' ),
				'id'      => 'article_author_name',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This hides the Author Name below the article title.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Article Date?', 'peakshops' ),
				'id'      => 'article_date',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This hides the Author Date below the article title.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Tags?', 'peakshops' ),
				'id'      => 'article_tags',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays article tags at the bottom', 'peakshops' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Article Navigation?', 'peakshops' ),
				'id'      => 'blog_nav',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays article navigation at the bottom', 'peakshops' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( 'Limit Article Navigation to Same Categories?', 'peakshops' ),
				'id'        => 'blog_nav_cat',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'When enabled, the prev/next posts will be limited to same categories.', 'peakshops' ),
				'std'       => 'off',
				'section'   => 'article',
				'condition' => 'blog_nav:is(on)',
			),
			array(
				'id'      => 'article_tab3',
				'label'   => esc_html__( 'Related Articles', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Related Articles?', 'peakshops' ),
				'id'      => 'article_related',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays related articles at the bottom.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'id'           => 'article_related_count',
				'label'        => esc_html__( 'Number of Related Articles', 'peakshops' ),
				'type'         => 'numeric-slider',
				'min_max_step' => '3,12,1',
				'std'          => '6',
				'section'      => 'article',
				'condition'    => 'article_related:is(on)',
			),
			array(
				'id'      => 'shop_tab0',
				'label'   => esc_html__( 'General', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Shop Filter Style', 'peakshops' ),
				'id'      => 'shop_listing_filter_style',
				'std'     => 'style1',
				'type'    => 'radio-image',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Shop Header Style', 'peakshops' ),
				'id'      => 'shop_listing_header_style',
				'std'     => 'style1',
				'type'    => 'radio-image',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Shop Header Background Style', 'peakshops' ),
				'id'      => 'shop_listing_header_bgstyle',
				'std'     => 'style1',
				'type'    => 'radio-image',
				'section' => 'shop',
				'desc'    => esc_html__( 'You can override ( or assign images) these styles inside individual Edit Category / Edit Tag pages.', 'peakshops' ),
			),
			array(
				'label'   => esc_html__( 'Shop Header - Categories', 'peakshops' ),
				'id'      => 'shop_listing_header_categories',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Display categories / sub-categories inside the header.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'shop',
			),
			array(
				'label'     => esc_html__( 'Shop Header - Height', 'peakshops' ),
				'id'        => 'shop_listing_header_height',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify the header height here.', 'peakshops' ),
				'section'   => 'shop',
				'operator'  => 'OR',
				'condition' => 'shop_listing_header_bgstyle:is(style2),shop_listing_header_bgstyle:is(style3)',
			),
			array(
				'label'   => esc_html__( 'Shop Header Background Color', 'peakshops' ),
				'id'      => 'shop_listing_header_bgstyle_color',
				'std'     => 'light',
				'type'    => 'radio-image',
				'section' => 'shop',
			),
			array(
				'label'     => esc_html__( 'Shop Header Background Image', 'peakshops' ),
				'id'        => 'shop_listing_header_bg',
				'type'      => 'background',
				'class'     => 'ot-colorpicker-opacity',
				'section'   => 'shop',
				'operator'  => 'OR',
				'condition' => 'shop_listing_header_bgstyle:is(style2),shop_listing_header_bgstyle:is(style3)',
			),
			array(
				'label'   => esc_html__( 'Shop Quantity Style', 'peakshops' ),
				'id'      => 'shop_quantity_style',
				'std'     => 'style1',
				'type'    => 'radio-image',
				'section' => 'shop',
			),
			array(
				'id'      => 'shop_tab1',
				'label'   => esc_html__( 'Content', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Shop - Description', 'peakshops' ),
				'id'      => 'shop_description',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This is the shop description similar to category descriptions.', 'peakshops' ),
				'rows'    => '3',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Shop - Top Content', 'peakshops' ),
				'id'      => 'shop_top_content',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the top of the shop page, categories have individual settings inside "Edit Category" screens.', 'peakshops' ),
				'rows'    => '3',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Shop - Bottom Content', 'peakshops' ),
				'id'      => 'shop_bottom_content',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the bottom of the shop page, categories have individual settings inside "Edit Category" screens.', 'peakshops' ),
				'rows'    => '3',
				'section' => 'shop',
			),
			array(
				'id'      => 'shop_tab2',
				'label'   => esc_html__( 'Products Grid Layout', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Full Width Product Listing', 'peakshops' ),
				'id'      => 'shop_product_listing_fullwidth',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, products will be displayed full width.', 'peakshops' ),
				'section' => 'shop',
				'std'     => 'off',
			),
			array(
				'label'   => esc_html__( 'Product Listing Layout', 'peakshops' ),
				'id'      => 'shop_product_listing_layout',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which layout would you like to use on listing pages?', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Grid', 'peakshops' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Alternating - 3 / 4 columns', 'peakshops' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Alternating - 4 / 5 columns', 'peakshops' ),
						'value' => 'style3',
					),
					array(
						'label' => esc_html__( 'Alternating - 5 / 6 columns', 'peakshops' ),
						'value' => 'style4',
					),
					array(
						'label' => esc_html__( 'Alternating - 4 / 3 columns', 'peakshops' ),
						'value' => 'style5',
					),
					array(
						'label' => esc_html__( 'Alternating - 5 / 4 columns', 'peakshops' ),
						'value' => 'style6',
					),
					array(
						'label' => esc_html__( 'Alternating - 6 / 5 columns', 'peakshops' ),
						'value' => 'style7',
					),
					array(
						'label' => esc_html__( 'Alternating - 4 / 4 / 3 columns', 'peakshops' ),
						'value' => 'style8',
					),
				),
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'     => esc_html__( 'Products Per Row', 'peakshops' ),
				'id'        => 'products_per_row',
				'std'       => 'thb-5',
				'type'      => 'radio-image',
				'section'   => 'shop',
				'condition' => 'shop_product_listing_layout:is(style1)',
			),
			array(
				'label'        => esc_html__( 'Product Spacing', 'peakshops' ),
				'id'           => 'products_spacing',
				'desc'         => esc_html__( 'Speed of the mobile menu opening animation.', 'peakshops' ),
				'std'          => '30',
				'type'         => 'numeric-slider',
				'min_max_step' => '10,50,10',
				'section'      => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Pagination Style', 'peakshops' ),
				'id'      => 'shop_product_listing_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on shop page?', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'peakshops' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'peakshops' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'peakshops' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Products Per Page', 'peakshops' ),
				'id'      => 'products_per_page',
				'type'    => 'text',
				'desc'    => esc_html__( 'Number of Products to show per page.', 'peakshops' ),
				'section' => 'shop',
				'std'     => '12',
			),
			array(
				'label'   => esc_html__( 'Products Per Page Variations', 'peakshops' ),
				'id'      => 'products_per_page_variations',
				'type'    => 'text',
				'desc'    => esc_html__( 'Displays option to select different products per page counts. For ex.: 12,24,36,-1. Use -1 to show all products on the page', 'peakshops' ),
				'section' => 'shop',
				'std'     => '',
			),
			array(
				'id'      => 'shop_tab3',
				'label'   => esc_html__( 'Products Grid Style', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Listing Style', 'peakshops' ),
				'id'      => 'shop_product_listing',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Listing Text Alignment', 'peakshops' ),
				'id'      => 'shop_product_listing_text_alignment',
				'type'    => 'radio-image',
				'std'     => 'thb-align-left',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Listing Button Style', 'peakshops' ),
				'id'      => 'shop_product_listing_button',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'     => esc_html__( 'Add to Cart Button Color', 'peakshops' ),
				'id'        => 'shop_product_listing_button_color',
				'type'      => 'radio',
				'desc'      => esc_html__( 'You can change add to cart button color here.', 'peakshops' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'Black', 'peakshops' ),
						'value' => 'black',
					),
					array(
						'label' => esc_html__( 'Accent', 'peakshops' ),
						'value' => 'accent',
					),
					array(
						'label' => esc_html__( 'White', 'peakshops' ),
						'value' => 'white-alt',
					),
				),
				'std'       => 'black',
				'section'   => 'shop',
				'operator'  => 'or',
				'condition' => 'shop_product_listing_button:is(style1),shop_product_listing_button:is(style2),shop_product_listing_button:is(style3),shop_product_listing_button:is(style5)',
			),
			array(
				'label'   => esc_html__( 'Product Listing Tag Style', 'peakshops' ),
				'id'      => 'shop_product_listing_tag',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Listing Image Hover', 'peakshops' ),
				'id'      => 'shop_product_hover',
				'type'    => 'radio',
				'desc'    => esc_html__( 'When enabled, this shows a secondary product image on hover.', 'peakshops' ),
				'section' => 'shop',
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular', 'peakshops' ),
						'value' => 'regular',
					),
					array(
						'label' => esc_html__( 'Show Image', 'peakshops' ),
						'value' => 'image',
					),
					array(
						'label' => esc_html__( 'Show Slider', 'peakshops' ),
						'value' => 'slider',
					),
				),
				'std'     => 'regular',
			),
			array(
				'label'        => esc_html__( 'Max number of slider images', 'peakshops' ),
				'id'           => 'shop_product_hover_count',
				'desc'         => esc_html__( 'Number of Images on Slider except the featured image.', 'peakshops' ),
				'std'          => '2',
				'type'         => 'numeric-slider',
				'min_max_step' => '1,10,1',
				'section'      => 'shop',
				'condition'    => 'shop_product_hover:is(slider)',
			),
			array(
				'label'   => esc_html__( 'Display Product Category?', 'peakshops' ),
				'id'      => 'shop_product_listing_category',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, this will display product category on listing pages.', 'peakshops' ),
				'section' => 'shop',
				'std'     => 'on',
			),
			array(
				'label'     => esc_html__( 'Display Single Category', 'peakshops' ),
				'id'        => 'shop_product_listing_category_single',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'If enabled, only 1 category per product will be displayed.', 'peakshops' ),
				'section'   => 'shop',
				'std'       => 'on',
				'condition' => 'shop_product_listing_category:is(on)',
			),
			array(
				'label'   => esc_html__( 'Display Attribute/Swatch?', 'peakshops' ),
				'id'      => 'shop_product_listing_attribute_display',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, this will show the selected attribute on listing pages.', 'peakshops' ),
				'section' => 'shop',
				'std'     => 'off',
			),
			array(
				'label'     => esc_html__( 'Select Attribute to Display', 'peakshops' ),
				'id'        => 'shop_product_listing_variation',
				'type'      => 'attribute_select',
				'desc'      => esc_html__( 'Select Attribute to display. How it is displayed depends on the Attribute Type on Edit Attribute page. The swatches html is cached for 1 hour for performance reasons.', 'peakshops' ),
				'section'   => 'shop',
				'condition' => 'shop_product_listing_attribute_display:is(on)',
			),
			array(
				'label'   => esc_html__( 'Display Product Short Description?', 'peakshops' ),
				'id'      => 'shop_product_listing_excerpt',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, this will display product short description on listing pages.', 'peakshops' ),
				'section' => 'shop',
				'std'     => 'off',
			),
			array(
				'label'        => esc_html__( 'Short Description Word Count', 'peakshops' ),
				'id'           => 'shop_product_listing_excerpt_words',
				'std'          => '12',
				'type'         => 'numeric-slider',
				'section'      => 'shop',
				'min_max_step' => '2,30,1',
				'desc'         => esc_html__( 'Number of words to display for the short description.', 'peakshops' ),
				'condition'    => 'shop_product_listing_excerpt:is(on)',
			),
			array(
				'label'   => esc_html__( 'Product Quick View', 'peakshops' ),
				'id'      => 'shop_product_quickview',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When enabled, this shows the quick view button on products.', 'peakshops' ),
				'section' => 'shop',
				'std'     => 'on',
			),
			array(
				'id'      => 'shop_tab4',
				'label'   => esc_html__( 'Product Categories', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Category Listing Style', 'peakshops' ),
				'id'      => 'shop_product_category_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'id'      => 'shop_tab5',
				'label'   => esc_html__( 'Misc', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Catalog Mode', 'peakshops' ),
				'id'      => 'shop_catalog_mode',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, this will hide add to cart buttons and prices along the site.', 'peakshops' ),
				'section' => 'shop',
				'std'     => 'off',
			),
			array(
				'label'        => esc_html__( 'Notification Duration', 'peakshops' ),
				'id'           => 'notification_duration',
				'desc'         => esc_html__( 'This determines how long the notifications stay on screen in seconds.', 'peakshops' ),
				'std'          => '5',
				'type'         => 'numeric-slider',
				'min_max_step' => '1,10,1',
				'section'      => 'shop',
			),
			array(
				'label'   => esc_html__( 'Sale Badge Content', 'peakshops' ),
				'id'      => 'shop_sale_badge',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Changes the content of the sale badge.', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Sale Text', 'peakshops' ),
						'value' => 'text',
					),
					array(
						'label' => esc_html__( 'Discount Percentage', 'peakshops' ),
						'value' => 'discount',
					),
					array(
						'label' => esc_html__( 'Discount Amount', 'peakshops' ),
						'value' => 'discount_amount',
					),
				),
				'std'     => 'text',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product "Just Arrived" Badge time', 'peakshops' ),
				'id'      => 'shop_newness',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Products that are added before the below time will display the new product page', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Never - "Just Arrived" Badge will never be shown', 'peakshops' ),
						'value' => '0',
					),
					array(
						'label' => esc_html__( '1 Day', 'peakshops' ),
						'value' => '1',
					),
					array(
						'label' => esc_html__( '2 Days', 'peakshops' ),
						'value' => '2',
					),
					array(
						'label' => esc_html__( '3 Days', 'peakshops' ),
						'value' => '3',
					),
					array(
						'label' => esc_html__( '1 Week', 'peakshops' ),
						'value' => '7',
					),
					array(
						'label' => esc_html__( '2 Weeks', 'peakshops' ),
						'value' => '14',
					),
					array(
						'label' => esc_html__( '3 Weeks', 'peakshops' ),
						'value' => '21',
					),
					array(
						'label' => esc_html__( '1 Month', 'peakshops' ),
						'value' => '30',
					),
				),
				'std'     => '7',
				'section' => 'shop',
			),
			array(
				'id'      => 'product_tab0',
				'label'   => esc_html__( 'General', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Product Page Style', 'peakshops' ),
				'id'      => 'shop_product_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Full Width Product Page', 'peakshops' ),
				'id'      => 'shop_product_fullwidth',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, product page will be full width.', 'peakshops' ),
				'section' => 'product',
				'std'     => 'off',
			),
			array(
				'label'     => esc_html__( 'Thumbnail Layout', 'peakshops' ),
				'id'        => 'shop_product_thumbnail_layout',
				'type'      => 'radio-image',
				'std'       => 'style1',
				'section'   => 'product',
				'condition' => 'shop_product_style:is(style1)',
			),
			array(
				'label'        => esc_html__( 'Thumbnail Count', 'peakshops' ),
				'id'           => 'shop_product_thumbnail_count',
				'desc'         => esc_html__( 'Number of thumbnails visible on desktop.', 'peakshops' ),
				'std'          => '4',
				'type'         => 'numeric-slider',
				'min_max_step' => '2,20,1',
				'section'      => 'product',
				'operator'     => 'or',
				'condition'    => 'shop_product_style:is(style1),shop_product_thumbnail_layout:is(style1)',
			),
			array(
				'label'     => esc_html__( 'Product Page Sidebar', 'peakshops' ),
				'id'        => 'shop_product_sidebar',
				'type'      => 'radio',
				'desc'      => esc_html__( 'Would you like to display a sidebar on product pages?', 'peakshops' ),
				'std'       => 'off',
				'choices'   => array(
					array(
						'label' => esc_html__( 'No Sidebar', 'peakshops' ),
						'value' => 'off',
					),
					array(
						'label' => esc_html__( 'Left Sidebar', 'peakshops' ),
						'value' => 'left',
					),
					array(
						'label' => esc_html__( 'Right Sidebar', 'peakshops' ),
						'value' => 'right',
					),
				),
				'section'   => 'product',
				'condition' => 'shop_product_style:is(style1)',
			),
			array(
				'id'      => 'product_tab1',
				'label'   => esc_html__( 'Features', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Display Breadcrumbs?', 'peakshops' ),
				'id'      => 'shop_product_breadcrumbs',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display breadcrumbs on product pages?', 'peakshops' ),
				'std'     => 'on',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Display Product Navigation?', 'peakshops' ),
				'id'      => 'shop_product_nav',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display prev/next arrows?', 'peakshops' ),
				'std'     => 'on',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Sticky Add To Cart Bar', 'peakshops' ),
				'id'      => 'shop_product_sticky_addtocart',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to sticky Ajax Add to Cart on product pages? Appears when you scroll down the product page.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Use Lightbox or Zoom?', 'peakshops' ),
				'id'      => 'shop_product_lightbox',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Would you like to use a lightbox or a mouse hover zoom?', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Lightbox', 'peakshops' ),
						'value' => 'lightbox',
					),
					array(
						'label' => esc_html__( 'Zoom', 'peakshops' ),
						'value' => 'zoom',
					),
				),
				'std'     => 'lightbox',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Use Ajax Add To Cart?', 'peakshops' ),
				'id'      => 'shop_product_ajax_addtocart',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to use Ajax Add to Cart on product pages?', 'peakshops' ),
				'std'     => 'on',
				'section' => 'product',
			),
			array(
				'id'      => 'product_tab2',
				'label'   => esc_html__( 'Tabs', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Tab Position', 'peakshops' ),
				'id'      => 'shop_product_tab_position',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'product',
			),
			array(
				'label'   => esc_html__( 'Tab Style', 'peakshops' ),
				'id'      => 'shop_product_tab_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'product',
			),
			array(
				'id'      => 'product_tab3',
				'label'   => esc_html__( 'Sharing', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'product',
			),
			array(
				'label'   => 'Product Sharing buttons',
				'id'      => 'product_sharing_buttons',
				'type'    => 'social_checkbox',
				'desc'    => 'You can choose which social networks to display',
				'section' => 'product',
			),
			array(
				'id'      => 'subheader_tab0',
				'label'   => esc_html__( 'Sub-Header Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Display Sub-Header', 'peakshops' ),
				'id'      => 'subheader',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Sub-Header?', 'peakshops' ),
				'std'     => 'off',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Sub-Header Full Width', 'peakshops' ),
				'id'      => 'thb_subheader_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'By default, the subheader on Peak Shops is limited to the grid, you can make it full width here.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Display Sub-Header on Mobile?', 'peakshops' ),
				'id'      => 'subheader_mobile',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Sub-Header on mobile screens?', 'peakshops' ),
				'std'     => 'off',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Sub-Header Color', 'peakshops' ),
				'id'      => 'subheader_color',
				'type'    => 'radio-image',
				'std'     => 'light',
				'section' => 'subheader',
			),
			array(
				'id'      => 'subheader_tab1',
				'label'   => esc_html__( 'Sub-Header - Left Content', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'subheader',
			),
			array(
				'label'    => esc_html__( 'Sections', 'peakshops' ),
				'id'       => 'subheader_left_sections',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Add your desired sections here.', 'peakshops' ),
				'settings' => array(
					array(
						'label'   => esc_html__( 'Section Type', 'peakshops' ),
						'id'      => 'section_type',
						'type'    => 'select',
						'choices' => array(
							array(
								'label' => esc_html__( 'Menu', 'peakshops' ),
								'value' => 'menu',
							),
							array(
								'label' => esc_html__( 'Text', 'peakshops' ),
								'value' => 'text',
							),
							array(
								'label' => esc_html__( 'Language Switcher (WPML/Polylang)', 'peakshops' ),
								'value' => 'ls',
							),
							array(
								'label' => esc_html__( 'Currency Switcher (WPML)', 'peakshops' ),
								'value' => 'cs',
							),
							array(
								'label' => esc_html__( 'Social Links', 'peakshops' ),
								'value' => 'social',
							),
						),
					),
					array(
						'label'     => esc_html__( 'Sub-Header Text', 'peakshops' ),
						'id'        => 'text',
						'type'      => 'textarea',
						'desc'      => esc_html__( 'This content appears on the sub-header', 'peakshops' ),
						'rows'      => '4',
						'condition' => 'section_type:is(text)',
					),
					array(
						'label'     => esc_html__( 'Sub-Header Menu', 'peakshops' ),
						'id'        => 'menu',
						'type'      => 'menu_select',
						'desc'      => esc_html__( 'Menu to be displayed on the sub-header', 'peakshops' ),
						'condition' => 'section_type:is(menu)',
					),
				),
				'section'  => 'subheader',
			),
			array(
				'id'      => 'subheader_tab2',
				'label'   => esc_html__( 'Sub-Header - Right Content', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'subheader',
			),
			array(
				'label'    => esc_html__( 'Sections', 'peakshops' ),
				'id'       => 'subheader_right_sections',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Add your desired sections here.', 'peakshops' ),
				'settings' => array(
					array(
						'label'   => esc_html__( 'Section Type', 'peakshops' ),
						'id'      => 'section_type',
						'type'    => 'select',
						'choices' => array(
							array(
								'label' => esc_html__( 'Menu', 'peakshops' ),
								'value' => 'menu',
							),
							array(
								'label' => esc_html__( 'Text', 'peakshops' ),
								'value' => 'text',
							),
							array(
								'label' => esc_html__( 'Language Switcher (WPML/Polylang)', 'peakshops' ),
								'value' => 'ls',
							),
							array(
								'label' => esc_html__( 'Currency Switcher (WPML)', 'peakshops' ),
								'value' => 'cs',
							),
							array(
								'label' => esc_html__( 'Social Links', 'peakshops' ),
								'value' => 'social',
							),
						),
					),
					array(
						'label'     => esc_html__( 'Sub-Header Text', 'peakshops' ),
						'id'        => 'text',
						'type'      => 'textarea',
						'desc'      => esc_html__( 'This content appears on the sub-header', 'peakshops' ),
						'rows'      => '4',
						'condition' => 'section_type:is(text)',
					),
					array(
						'label'     => esc_html__( 'Sub-Header Menu', 'peakshops' ),
						'id'        => 'menu',
						'type'      => 'menu_select',
						'desc'      => esc_html__( 'Menu to be displayed on the sub-header', 'peakshops' ),
						'condition' => 'section_type:is(menu)',
					),
				),
				'section'  => 'subheader',
			),
			array(
				'id'      => 'header_tab0',
				'label'   => esc_html__( 'General Header Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Style', 'peakshops' ),
				'id'      => 'header_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Color', 'peakshops' ),
				'id'      => 'header_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'Color of the header. You can change the background from Customization > Backgrounds.', 'peakshops' ),
				'std'     => 'light-header',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header - Full Width Content', 'peakshops' ),
				'id'      => 'header_fullwidth',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'The contents of the header are full width by default.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Border', 'peakshops' ),
				'id'      => 'header_border',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays a border under header.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header - Left Content', 'peakshops' ),
				'id'      => 'header_left_content',
				'type'    => 'select',
				'desc'    => esc_html__( 'Allows you to add content on the LEFT of the logo if the selected header allows it', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Nothing', 'peakshops' ),
						'value' => 'nothing',
					),
					array(
						'label' => esc_html__( 'Search', 'peakshops' ),
						'value' => 'search',
					),
					array(
						'label' => esc_html__( 'Custom Content', 'peakshops' ),
						'value' => 'custom-content',
					),
				),
				'std'     => 'nothing',
				'section' => 'header',
			),
			array(
				'label'     => esc_html__( 'Header - Left Custom Content', 'peakshops' ),
				'id'        => 'header_left_custom_content',
				'type'      => 'textarea',
				'desc'      => esc_html__( 'This content appears at on the LEFT of the logo. You can use your shortcodes here.', 'peakshops' ),
				'rows'      => '2',
				'condition' => 'header_left_content:is(custom-content)',
				'section'   => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Search - Categories', 'peakshops' ),
				'id'      => 'header_search_categories',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays product categories inside Search field.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Search - Parent Categories', 'peakshops' ),
				'id'      => 'header_search_categories_parent',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggle this to only show Parent Categories inside the search field.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Search - Style', 'peakshops' ),
				'id'      => 'header_search_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Header Style', 'peakshops' ),
				'id'      => 'mobile_header_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab1',
				'label'   => esc_html__( 'Fixed Header Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header', 'peakshops' ),
				'id'      => 'fixed_header',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Display the fixed header?', 'peakshops' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Style', 'peakshops' ),
				'id'      => 'fixed_header_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header - Full Width Content', 'peakshops' ),
				'id'      => 'fixed_header_fullwidth',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'The contents of the fixed header are full width by default.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Auto-Hide Fixed Header on Scroll', 'peakshops' ),
				'id'      => 'fixed_header_scroll',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Fixed header is hidden when you scroll down and only shown when you scroll up.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Shadow', 'peakshops' ),
				'id'      => 'fixed_header_shadow',
				'type'    => 'select',
				'desc'    => esc_html__( 'You can set your fixed header shadow here.', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'None', 'peakshops' ),
						'value' => 'thb-fixed-noshadow',
					),
					array(
						'label' => esc_html__( 'Small', 'peakshops' ),
						'value' => 'thb-fixed-shadow-style1',
					),
					array(
						'label' => esc_html__( 'Medium', 'peakshops' ),
						'value' => 'thb-fixed-shadow-style2',
					),
					array(
						'label' => esc_html__( 'Large', 'peakshops' ),
						'value' => 'thb-fixed-shadow-style3',
					),
				),
				'std'     => 'thb-fixed-shadow-style1',
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab5',
				'label'   => esc_html__( 'Logo Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Upload', 'peakshops' ),
				'id'      => 'logo',
				'type'    => 'upload',
				'desc'    => esc_html__( 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Height', 'peakshops' ),
				'id'      => 'logo_height',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Logo Height', 'peakshops' ),
				'id'      => 'logo_height_mobile',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the logo height for mobile screens from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Logo Upload', 'peakshops' ),
				'id'      => 'logo_fixed',
				'type'    => 'upload',
				'desc'    => esc_html__( 'You can upload your logo here for the fixed header. This should be 80px in height for retina screens.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Logo Height', 'peakshops' ),
				'id'      => 'logo_height_fixed',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the fixed logo height here.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab6',
				'label'   => esc_html__( 'Header Spacing', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Padding', 'peakshops' ),
				'id'      => 'header_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects header on large screens. The values are in px.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Padding', 'peakshops' ),
				'id'      => 'header_padding_fixed',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects the fixed header on large screens. The values are in px.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Header Padding', 'peakshops' ),
				'id'      => 'header_padding_mobile',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects header on mobile screens for both regular and fixed versions. The values are in px.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab7',
				'label'   => esc_html__( 'Logo Spacing', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Padding', 'peakshops' ),
				'id'      => 'logo_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects padding of the logo on large screens. The values are in px.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Logo Padding', 'peakshops' ),
				'id'      => 'logo_mobile_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects padding of the logo on mobile screens. The values are in px.', 'peakshops' ),
				'section' => 'header',
			),
			array(
				'id'      => 'menu_tab0',
				'label'   => esc_html__( 'Full Menu Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Full Menu Dropdown Style', 'peakshops' ),
				'id'      => 'full_menu_dropdown_style',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'Which dropdown style would you like to use?', 'peakshops' ),
				'std'     => 'style1',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Full Menu Dropdown Color', 'peakshops' ),
				'id'      => 'full_menu_dropdown_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your dropdown color here.', 'peakshops' ),
				'std'     => 'dark',
				'section' => 'menu',
			),
			array(
				'id'      => 'menu_margin',
				'label'   => esc_html__( 'Top Level Item Margin', 'peakshops' ),
				'desc'    => esc_html__( 'If you want to fit more menu items to the given space, you can decrease the margin between them here. The default margin is 30px', 'peakshops' ),
				'type'    => 'measurement',
				'section' => 'menu',
			),
			array(
				'id'      => 'menu_tab1',
				'label'   => esc_html__( 'Secondary Area Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'menu',
			),
			array(
				'id'      => 'secondary_text',
				'label'   => esc_html__( 'About Heading Typography', 'peakshops' ),
				'desc'    => esc_html__( 'These are the icons that appear next to the full menu.', 'peakshops' ),
				'type'    => 'textblock',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Display Separator', 'peakshops' ),
				'id'      => 'header_secondary_separator',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays a separator between items.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'menu',
			),
			array(
				'label'        => esc_html__( 'Icon Size', 'peakshops' ),
				'id'           => 'header_secondary_icon_size',
				'std'          => '18',
				'type'         => 'numeric-slider',
				'min_max_step' => '14,30,1',
				'desc'         => esc_html__( 'You can change the icons size here. Does not affect mobile screens.', 'peakshops' ),
				'section'      => 'menu',
			),
			array(
				'label'   => esc_html__( 'Icon Color', 'peakshops' ),
				'id'      => 'header_secondary_icon_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the icon colors here.', 'peakshops' ),
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Search Icon', 'peakshops' ),
				'id'      => 'header_search',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the search icon here.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Display Label for Search', 'peakshops' ),
				'id'      => 'header_search_label',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying text label for search icon.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'My Account Icon', 'peakshops' ),
				'id'      => 'header_myaccount',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the profile icon here.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Display Label for My Account', 'peakshops' ),
				'id'      => 'header_myaccount_label',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying text label for my account icon.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'My Wishlist Icon', 'peakshops' ),
				'id'      => 'header_wishlist',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the wishlist icon here. Requires YitH Wishlist plugin to work.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Display Label for Wishlist', 'peakshops' ),
				'id'      => 'header_wishlist_label',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying text label for wishlist icon.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Cart Icon', 'peakshops' ),
				'id'      => 'header_cart',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the cart icon here.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Display Label for Cart', 'peakshops' ),
				'id'      => 'header_cart_label',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying text label for cartt icon.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Cart Amount', 'peakshops' ),
				'id'      => 'header_cart_amount',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying the cart amount here.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'     => esc_html__( 'Cart Icon Style', 'peakshops' ),
				'id'        => 'header_cart_icon',
				'type'      => 'radio-image',
				'desc'      => esc_html__( 'You can change your cart icon here.', 'peakshops' ),
				'std'       => 'style1',
				'section'   => 'menu',
				'condition' => 'header_cart:is(on)',
			),
			array(
				'label'   => esc_html__( 'After Cart Text', 'peakshops' ),
				'id'      => 'header_cart_after_text',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the bottom of the cart. You can use your shortcodes here.', 'peakshops' ),
				'rows'    => '2',
				'section' => 'menu',
			),
			array(
				'id'      => 'menu_tab3',
				'label'   => esc_html__( 'Mobile Menu Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'menu',
			),
			array(
				'label'        => esc_html__( 'Mobile Menu Animation Speed', 'peakshops' ),
				'id'           => 'mobile_menu_animation_speed',
				'desc'         => esc_html__( 'Speed of the mobile menu opening animation.', 'peakshops' ),
				'std'          => '0.3',
				'type'         => 'numeric-slider',
				'min_max_step' => '0.05,1,0.01',
				'section'      => 'menu',
			),
			array(
				'label'   => esc_html__( 'Mobile Submenu Behaviour', 'peakshops' ),
				'id'      => 'submenu_behaviour',
				'type'    => 'radio',
				'desc'    => esc_html__( 'You can choose how your arrows signs work', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Default - Clickable parent links', 'peakshops' ),
						'value' => 'thb-default',
					),
					array(
						'label' => esc_html__( 'Open Submenu - Parent links open submenus', 'peakshops' ),
						'value' => 'thb-submenu',
					),
				),
				'std'     => 'thb-submenu',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Color', 'peakshops' ),
				'id'      => 'mobile_menu_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your mobile menu color here.', 'peakshops' ),
				'std'     => 'light',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Override Mobile Menu?', 'peakshops' ),
				'id'      => 'mobilemenu_override',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can override the mobile menu here.', 'peakshops' ),
				'section' => 'menu',
				'std'     => 'off',
			),
			array(
				'label'     => esc_html__( 'Select Mobile Menu', 'peakshops' ),
				'id'        => 'mobilemenu_override_menu',
				'type'      => 'menu_select',
				'desc'      => esc_html__( 'Menu to be displayed inside the Mobile Menu', 'peakshops' ),
				'section'   => 'menu',
				'condition' => 'mobilemenu_override:is(on)',
			),
			array(
				'label'   => esc_html__( 'Display Search?', 'peakshops' ),
				'id'      => 'mobilemenu_search',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying search here.', 'peakshops' ),
				'section' => 'menu',
				'std'     => 'on',
			),
			array(
				'label'   => esc_html__( 'Display Social Icons?', 'peakshops' ),
				'id'      => 'mobilemenu_social_link',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying social links here.', 'peakshops' ),
				'section' => 'menu',
				'std'     => 'on',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Footer', 'peakshops' ),
				'id'      => 'mobile_menu_footer',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the bottom of the menu. You can use your shortcodes here.', 'peakshops' ),
				'rows'    => '4',
				'section' => 'menu',
			),
			array(
				'id'      => 'footer_tab0',
				'label'   => esc_html__( 'Footer Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Display Footer', 'peakshops' ),
				'id'      => 'footer',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Footer?', 'peakshops' ),
				'std'     => 'on',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Color', 'peakshops' ),
				'id'      => 'footer_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your footer color here. You can also change your footer background from "Customization"', 'peakshops' ),
				'std'     => 'light',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Full Width', 'peakshops' ),
				'id'      => 'footer_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'By default, the footer on Peak Shops is limited to the grid. You can extend it to full width using this option.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Columns', 'peakshops' ),
				'id'      => 'footer_columns',
				'type'    => 'radio-image',
				'std'     => 'threecolumns',
				'section' => 'footer',
			),
			array(
				'id'      => 'footer_tab1',
				'label'   => esc_html__( 'Content', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'footer',
			),

			array(
				'label'   => esc_html__( 'Display Footer Logo?', 'peakshops' ),
				'id'      => 'footer_logo',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Footer Logo on top of widgets?', 'peakshops' ),
				'std'     => 'off',
				'section' => 'footer',
			),
			array(
				'label'     => esc_html__( 'Footer Logo Upload', 'peakshops' ),
				'id'        => 'footer_logo_upload',
				'type'      => 'upload',
				'desc'      => esc_html__( 'You can upload your own footer logo here. Since this theme is retina-ready, <strong>please upload a double the size you set below.</strong>', 'peakshops' ),
				'section'   => 'footer',
				'condition' => 'footer_logo:is(on)',
			),
			array(
				'label'     => esc_html__( 'Footer Logo Height', 'peakshops' ),
				'id'        => 'footer_logo_height',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify the footer logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside footer', 'peakshops' ),
				'section'   => 'footer',
				'condition' => 'footer_logo:is(on)',
			),
			array(
				'label'   => esc_html__( 'Footer Top Content', 'peakshops' ),
				'id'      => 'footer_top_content',
				'type'    => 'page-select',
				'desc'    => esc_html__( 'This allows you to add contents of a page inside the footer.', 'peakshops' ),
				'section' => 'footer',
			),
			array(
				'id'      => 'footer_tab4',
				'label'   => esc_html__( 'Measurements', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Margin', 'peakshops' ),
				'id'      => 'footer_margin',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'You can modify the footer margin here', 'peakshops' ),
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Padding', 'peakshops' ),
				'id'      => 'footer_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'You can modify the footer padding here', 'peakshops' ),
				'section' => 'footer',
			),
			array(
				'id'      => 'subfooter_tab0',
				'label'   => esc_html__( 'Settings', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'subfooter',
			),
			array(
				'label'   => esc_html__( 'Display Sub-Footer', 'peakshops' ),
				'id'      => 'subfooter',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Sub-Footer?', 'peakshops' ),
				'std'     => 'off',
				'section' => 'subfooter',
			),

			array(
				'label'   => esc_html__( 'Full Width', 'peakshops' ),
				'id'      => 'subfooter_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'By default, the sub-footer is limited to the grid. You can extend it to full width using this option.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'subfooter',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Color', 'peakshops' ),
				'id'      => 'subfooter_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your sub-footer color here. You can also change your sub-footer background from "Customization"', 'peakshops' ),
				'std'     => 'light',
				'section' => 'subfooter',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Style', 'peakshops' ),
				'id'      => 'subfooter_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'subfooter',
			),
			array(
				'id'      => 'subfooter_tab1',
				'label'   => esc_html__( 'Content', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'subfooter',
			),
			array(
				'label'     => esc_html__( 'Display Sub-Footer Logo?', 'peakshops' ),
				'id'        => 'subfooter_logo',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Would you like to display the Subfooter Logo?', 'peakshops' ),
				'std'       => 'off',
				'section'   => 'subfooter',
				'operator'  => 'or',
				'condition' => 'subfooter_style:is(style2),subfooter_style:is(style4),subfooter_style:is(style6),subfooter_style:is(style7)',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Logo', 'peakshops' ),
				'id'        => 'subfooter_logo_upload',
				'type'      => 'upload',
				'desc'      => esc_html__( 'You can upload your own subfooter logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>', 'peakshops' ),
				'section'   => 'subfooter',
				'condition' => 'subfooter_logo:is(on)',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Logo Height', 'peakshops' ),
				'id'        => 'subfooter_logo_height',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify the subfooter logo height from here. This is maximum height, so your logo may get smaller depending on screen size', 'peakshops' ),
				'section'   => 'subfooter',
				'condition' => 'subfooter_logo:is(on)',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Menu', 'peakshops' ),
				'id'        => 'subfooter_menu',
				'type'      => 'menu_select',
				'desc'      => esc_html__( 'Menu to be displayed on the subfooter', 'peakshops' ),
				'section'   => 'subfooter',
				'operator'  => 'or',
				'condition' => 'subfooter_style:is(style2),subfooter_style:is(style3),subfooter_style:is(style4),subfooter_style:is(style5),subfooter_style:is(style6)',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Text', 'peakshops' ),
				'id'      => 'subfooter_text',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'Text Content to be displayed on the subfooter', 'peakshops' ),
				'section' => 'subfooter',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Social Links', 'peakshops' ),
				'id'        => 'subfooter_social_link',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'You can toggle displaying social links here.', 'peakshops' ),
				'section'   => 'subfooter',
				'std'       => 'on',
				'operator'  => 'or',
				'condition' => 'subfooter_style:is(style1),subfooter_style:is(style2),subfooter_style:is(style4),subfooter_style:is(style5),subfooter_style:is(style7)',
			),
			array(
				'label'    => esc_html__( 'Payment Icons to display', 'peakshops' ),
				'id'       => 'footer_payment_icons',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Add your desired Payment Icons for the footer here', 'peakshops' ),
				'settings' => array(
					array(
						'label'   => esc_html__( 'Payment Type', 'peakshops' ),
						'id'      => 'payment_type',
						'type'    => 'select',
						'choices' => array(
							array(
								'label' => 'Amazon',
								'value' => 'amazon',
							),
							array(
								'label' => 'American Express',
								'value' => 'american-express',
							),
							array(
								'label' => 'American Express - 2',
								'value' => 'american-express-alt',
							),
							array(
								'label' => 'atm',
								'value' => 'atm',
							),
							array(
								'label' => 'Bankomat',
								'value' => 'bankomat',
							),
							array(
								'label' => 'Bank Transfer',
								'value' => 'bank-transfer',
							),
							array(
								'label' => 'Bitcoin',
								'value' => 'bitcoin',
							),
							array(
								'label' => 'Bitcoin Sign',
								'value' => 'bitcoin-sign',
							),
							array(
								'label' => 'BrainTree',
								'value' => 'braintree',
							),
							array(
								'label' => 'BTC',
								'value' => 'btc',
							),
							array(
								'label' => 'Card',
								'value' => 'card',
							),
							array(
								'label' => 'Carta Si',
								'value' => 'carta-si',
							),
							array(
								'label' => 'Cash',
								'value' => 'cash',
							),
							array(
								'label' => 'Cash On Delivery',
								'value' => 'cash-on-delivery',
							),
							array(
								'label' => 'CB',
								'value' => 'cb',
							),
							array(
								'label' => 'Cirrus',
								'value' => 'cirrus',
							),
							array(
								'label' => 'Cirrus - 2',
								'value' => 'cirrus-alt',
							),
							array(
								'label' => 'Click and Buy',
								'value' => 'clickandbuy',
							),
							array(
								'label' => 'Credit Card',
								'value' => 'credit-card',
							),
							array(
								'label' => 'Diners',
								'value' => 'diners',
							),
							array(
								'label' => 'Discover',
								'value' => 'discover',
							),
							array(
								'label' => 'EC',
								'value' => 'ec',
							),
							array(
								'label' => 'EPS',
								'value' => 'eps',
							),
							array(
								'label' => 'EURO',
								'value' => 'eur',
							),
							array(
								'label' => 'Facture',
								'value' => 'facture',
							),
							array(
								'label' => 'Fattura',
								'value' => 'fattura',
							),
							array(
								'label' => 'Flattr',
								'value' => 'flattr',
							),
							array(
								'label' => 'GiroPay',
								'value' => 'giropay',
							),
							array(
								'label' => 'Google Wallet',
								'value' => 'google-wallet',
							),
							array(
								'label' => 'Google Wallet - Alt',
								'value' => 'google-wallet',
							),
							array(
								'label' => 'GPB',
								'value' => 'gpb',
							),
							array(
								'label' => 'GratiPay',
								'value' => 'gratipay',
							),
							array(
								'label' => 'Ideal',
								'value' => 'ideal',
							),
							array(
								'label' => 'ILS',
								'value' => 'ils',
							),
							array(
								'label' => 'INR',
								'value' => 'inr',
							),
							array(
								'label' => 'Invoice',
								'value' => 'invoice',
							),
							array(
								'label' => 'JCB',
								'value' => 'jcb',
							),
							array(
								'label' => 'JPY',
								'value' => 'jpy',
							),
							array(
								'label' => 'KRW',
								'value' => 'krw',
							),
							array(
								'label' => 'Maestro',
								'value' => 'maestro',
							),
							array(
								'label' => 'Maestro - 2',
								'value' => 'maestro-alt',
							),
							array(
								'label' => 'MasterCard',
								'value' => 'mastercard',
							),
							array(
								'label' => 'MasterCard - 2',
								'value' => 'mastercard-alt',
							),
							array(
								'label' => 'MasterCard - Secure Code',
								'value' => 'mastercard-securecode',
							),
							array(
								'label' => 'Ogone',
								'value' => 'ogone',
							),
							array(
								'label' => 'PayBox',
								'value' => 'paybox',
							),
							array(
								'label' => 'PayLife',
								'value' => 'paylife',
							),
							array(
								'label' => 'PayPal',
								'value' => 'paypal',
							),
							array(
								'label' => 'PayPal - 2',
								'value' => 'paypal-alt',
							),
							array(
								'label' => 'PaySafe Card',
								'value' => 'paysafecard',
							),
							array(
								'label' => 'Poste Pay',
								'value' => 'postepay',
							),
							array(
								'label' => 'Quick',
								'value' => 'quick',
							),
							array(
								'label' => 'Rechnung',
								'value' => 'rechnung',
							),
							array(
								'label' => 'Ripple',
								'value' => 'ripple',
							),
							array(
								'label' => 'RUB',
								'value' => 'rub',
							),
							array(
								'label' => 'Skrill',
								'value' => 'skrill',
							),
							array(
								'label' => 'SoFort',
								'value' => 'sofort',
							),
							array(
								'label' => 'Square',
								'value' => 'square',
							),
							array(
								'label' => 'Stripe',
								'value' => 'stripe',
							),
							array(
								'label' => 'TrustE',
								'value' => 'truste',
							),
							array(
								'label' => 'TrustE',
								'value' => 'truste',
							),
							array(
								'label' => 'TrustE',
								'value' => 'truste',
							),
							array(
								'label' => 'TRY',
								'value' => 'try',
							),
							array(
								'label' => 'Union Pay',
								'value' => 'unionpay',
							),
							array(
								'label' => 'USD',
								'value' => 'usd',
							),
							array(
								'label' => 'Verified by Visa',
								'value' => 'verified-by-visa',
							),
							array(
								'label' => 'VeriSign',
								'value' => 'verisign',
							),
							array(
								'label' => 'VISA',
								'value' => 'visa',
							),
							array(
								'label' => 'Visa Electron',
								'value' => 'visa-electron',
							),
							array(
								'label' => 'Western Union',
								'value' => 'western-union',
							),
							array(
								'label' => 'Western Union - 2',
								'value' => 'western-union-alt',
							),
							array(
								'label' => 'Wire Card',
								'value' => 'wirecard',
							),
							array(
								'label' => 'Sepa',
								'value' => 'sepa',
							),
							array(
								'label' => 'Sepa - 2',
								'value' => 'sepa-alt',
							),
							array(
								'label' => 'Apple Pay',
								'value' => 'apple-pay',
							),
							array(
								'label' => 'Interac',
								'value' => 'interac',
							),
							array(
								'label' => 'Dankort',
								'value' => 'dankort',
							),
							array(
								'label' => 'Bancontact Mister Cash',
								'value' => 'bancontact-mister-cash',
							),
							array(
								'label' => 'Moip',
								'value' => 'moip',
							),
							array(
								'label' => 'Pagseguro',
								'value' => 'pagseguro',
							),
							array(
								'label' => 'Cash on Pickup',
								'value' => 'cash-on-pickup',
							),
							array(
								'label' => 'Sage',
								'value' => 'sage',
							),
							array(
								'label' => 'Elo',
								'value' => 'elo',
							),
							array(
								'label' => 'Elo - 2',
								'value' => 'elo-alt',
							),
							array(
								'label' => 'Pay U',
								'value' => 'payu',
							),
							array(
								'label' => 'Mercado Pago',
								'value' => 'mercado-pago',
							),
							array(
								'label' => 'PayShop',
								'value' => 'payshop',
							),
							array(
								'label' => 'Multi Banco',
								'value' => 'multibanco',
							),
							array(
								'label' => 'Six',
								'value' => 'six',
							),
							array(
								'label' => 'Cash Cloud',
								'value' => 'cashcloud',
							),
							array(
								'label' => 'Klarna',
								'value' => 'klarna',
							),
							array(
								'label' => 'Bitpay',
								'value' => 'bitpay',
							),
							array(
								'label' => 'Venmo',
								'value' => 'venmo',
							),
							array(
								'label' => 'Visa Debit',
								'value' => 'visa-debit',
							),
							array(
								'label' => 'Ali Pay',
								'value' => 'alipay',
							),
							array(
								'label' => 'Hipercard',
								'value' => 'hipercard',
							),
							array(
								'label' => 'Direct Debit',
								'value' => 'direct-debit',
							),
							array(
								'label' => 'Sodexo',
								'value' => 'sodexo',
							),
							array(
								'label' => 'B Pay',
								'value' => 'bpay',
							),
							array(
								'label' => 'Contactless',
								'value' => 'contactless',
							),
							array(
								'label' => 'ETH',
								'value' => 'eth',
							),
							array(
								'label' => 'LTC',
								'value' => 'ltc',
							),
							array(
								'label' => 'Visa Pay',
								'value' => 'visa-pay',
							),
							array(
								'label' => 'WeChat Pay',
								'value' => 'wechat-pay',
							),
							array(
								'label' => 'Amazon Pay',
								'value' => 'amazon-pay',
							),
							array(
								'label' => 'Amazon Pay',
								'value' => 'amazon-pay-alt',
							),
						),
					),
				),
				'section'  => 'subfooter',
			),
			array(
				'label'    => esc_html__( 'Custom Payment Icon', 'peakshops' ),
				'id'       => 'footer_payment_icons_custom',
				'type'     => 'list-item',
				'settings' => array(
					array(
						'label' => esc_html__( 'Icon Image / SVG', 'peakshops' ),
						'id'    => 'icon_image',
						'type'  => 'upload',
						'desc'  => esc_html__( 'Select your payment image / svg.', 'peakshops' ),
					),
				),
				'section'  => 'subfooter',
			),
			array(
				'id'      => 'subfooter_tab2',
				'label'   => esc_html__( 'Measurements', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'subfooter',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Padding', 'peakshops' ),
				'id'      => 'subfooter_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'You can modify the subfooter padding here', 'peakshops' ),
				'section' => 'subfooter',
			),
			array(
				'id'      => 'misc_tab0',
				'label'   => esc_html__( 'General', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Google Maps API Key', 'peakshops' ),
				'id'      => 'map_api_key',
				'type'    => 'text',
				'desc'    => esc_html__( 'Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>', 'peakshops' ),
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Use Combined JavaScript Library?', 'peakshops' ),
				'id'      => 'thb_combined_libraries',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When disabled, each javascript library will be loaded on its own. It will allow for greater control using plugins, but may hinder site speed as multiple files will be loaded instead of one.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Remove Default WPBakery Styles?', 'peakshops' ),
				'id'      => 'thb_remove_wpbakery_styles',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When enabled, theme removes default WPBakery element styling for speed. If you are going to use default WPbakery elements, you need to enable this.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Yoast SEO Breadcrumbs', 'peakshops' ),
				'id'      => 'thb_yoast_breadcrumbs',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Enables Yoast Breadcrumbs if needed.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Rank Math Breadcrumbs', 'peakshops' ),
				'id'      => 'thb_rankmath_breadcrumbs',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Enables Rank Math Breadcrumbs if needed.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Scroll To Top?', 'peakshops' ),
				'id'      => 'scroll_to_top',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can enable the Scroll To Top button here', 'peakshops' ),
				'std'     => 'on',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Extra CSS', 'peakshops' ),
				'id'      => 'extra_css',
				'type'    => 'css',
				'desc'    => esc_html__( 'Any CSS that you would like to add to the theme.', 'peakshops' ),
				'section' => 'misc',
			),
			array(
				'id'      => 'misc_tab4',
				'label'   => esc_html__( 'Create Additional Sidebars', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'misc',
			),
			array(
				'id'      => 'sidebars_text',
				'label'   => esc_html__( 'About the sidebars', 'peakshops' ),
				'desc'    => esc_html__( 'All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page', 'peakshops' ),
				'std'     => '',
				'type'    => 'textblock',
				'section' => 'misc',
			),
			array(
				'label'    => esc_html__( 'Create Sidebars', 'peakshops' ),
				'id'       => 'sidebars',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Please choose a unique title for each sidebar!', 'peakshops' ),
				'section'  => 'misc',
				'settings' => array(
					array(
						'label' => esc_html__( 'ID', 'peakshops' ),
						'id'    => 'id',
						'type'  => 'text',
						'desc'  => esc_html__( 'Please write a lowercase id, with <strong>no spaces</strong>', 'peakshops' ),
					),
				),
			),
			array(
				'id'      => 'misc_tab6',
				'label'   => esc_html__( 'Site Border', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Site Border', 'peakshops' ),
				'id'      => 'site_borders',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This will add borders around the viewport.', 'peakshops' ),
				'std'     => 'off',
				'section' => 'misc',
			),
			array(
				'label'     => esc_html__( 'Border Width', 'peakshops' ),
				'id'        => 'site_borders_width',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify border width here', 'peakshops' ),
				'section'   => 'misc',
				'condition' => 'site_borders:is(on)',
			),
			array(
				'label'     => esc_html__( 'Border Color', 'peakshops' ),
				'id'        => 'site_borders_color',
				'type'      => 'colorpicker',
				'desc'      => esc_html__( 'You can modify the border color here', 'peakshops' ),
				'section'   => 'misc',
				'condition' => 'site_borders:is(on)',
			),
			array(
				'id'      => 'misc_tab7',
				'label'   => esc_html__( 'Other', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Site Grid Size', 'peakshops' ),
				'id'      => 'thb_grid_size',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'By default, Grid size is 1270px. Rows also have 35px padding + 15px negative margin on each side, so your grid is 1270 - (50 x 2) = 1170px wide on desktops.', 'peakshops' ),
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Right Click Protection', 'peakshops' ),
				'id'      => 'right_click',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can disable right click here.', 'peakshops' ),
				'section' => 'misc',
				'std'     => 'on',
			),
			array(
				'label'     => esc_html__( 'Right Click Text Content', 'peakshops' ),
				'id'        => 'right_click_content',
				'type'      => 'textarea',
				'desc'      => esc_html__( 'This content appears inside the right click protection overlay.', 'peakshops' ),
				'rows'      => '4',
				'section'   => 'misc',
				'condition' => 'right_click:is(on)',
			),
			array(
				'label'   => esc_html__( 'Google Theme Color', 'peakshops' ),
				'id'      => 'thb_google_theme_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'Applied only on Android mobile devices, click <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android" target="_blank">here</a> to learn more about this', 'peakshops' ),
				'section' => 'misc',
			),
			array(
				'id'      => 'typography_tab1',
				'label'   => esc_html__( 'Font Families', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'id'      => 'font_cache_text',
				'label'   => esc_html__( 'Clear Font Cache', 'peakshops' ),
				'desc'    => __( 'If you cant find Google Webfonts inside the boxes below, you can clear your transient for the font cache here: <br><br> <a href="themes.php?page=ot-theme-options&thb_clear_font_cache=true" class="button button-primary">Clear Font Cache</a>', 'peakshops' ),
				'type'    => 'textblock',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Google Fonts API Key', 'peakshops' ),
				'id'      => 'google_fonts_api_key',
				'type'    => 'text',
				'desc'    => esc_html__( 'Please enter the Google Fonts Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/fonts/docs/developer_api#APIKey">https://developers.google.com/fonts/docs/developer_api</a></small>', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Primary Font', 'peakshops' ),
				'id'      => 'primary_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the primary font. Affects all headings tags.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Content Font', 'peakshops' ),
				'id'      => 'secondary_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the general content.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Full Menu Font', 'peakshops' ),
				'id'      => 'fullmenu_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the full menu. Uses the Secondary Font by default.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Font', 'peakshops' ),
				'id'      => 'mobilemenu_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the mobile menu. Uses the Secondary Font by default.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Button Font', 'peakshops' ),
				'id'      => 'button_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the button. Uses the Secondary Font by default.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Widget Title Font', 'peakshops' ),
				'id'      => 'widget_title_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'This adds a separate font for styling of widget titles.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( '<EM> Font', 'peakshops' ),
				'id'      => 'em_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'This adds a separate font for styling of EM tags so you can add stylish typographic elements.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( '<label> Font', 'peakshops' ),
				'id'      => 'label_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'This adds a separate font for styling of label tags.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab2',
				'label'   => esc_html__( 'Typography', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Full Menu Font', 'peakshops' ),
				'id'      => 'fullmenu_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the full menu', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Full Menu Sub-Menu Font', 'peakshops' ),
				'id'      => 'fullmenu_sub_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the sub-menus inside full menu', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Secondary Area Font', 'peakshops' ),
				'id'      => 'secondary_area_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the secondary area', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Font', 'peakshops' ),
				'id'      => 'mobilemenu_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the mobile menu', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Sub-Menu Font', 'peakshops' ),
				'id'      => 'mobilemenu_sub_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the sub-menus inside mobile menu', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Secondary Mobile Menu Font', 'peakshops' ),
				'id'      => 'mobilemenu_secondary_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the secondary mobile menu', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Footer Font', 'peakshops' ),
				'id'      => 'mobilemenu_footer_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the mobile menu footer', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Social Icon Font', 'peakshops' ),
				'id'      => 'mobilemenu_social_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the social icons inside the mobile menu.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Widget Title Font', 'peakshops' ),
				'id'      => 'widget_title_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the general widget titles', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Footer Widget Title Font', 'peakshops' ),
				'id'      => 'widget_title_type_footer',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the footer widget titles', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Footer Text Font', 'peakshops' ),
				'id'      => 'footer_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the footer widgets', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Full Menu Font', 'peakshops' ),
				'id'      => 'subfooter_fullmenu_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the full menu inside the subfooter', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Copyright Text', 'peakshops' ),
				'id'      => 'subfooter_copyright_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the copyright text inside the subfooter', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Social Icons Font-size ', 'peakshops' ),
				'id'      => 'subfooter_social_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting specifically for the social icons inside the footer', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab3',
				'label'   => esc_html__( 'Shop Page Typography', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Shop Page Title', 'peakshops' ),
				'id'      => 'shop_product_page_title',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the shop archive page titles.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Category Title', 'peakshops' ),
				'id'      => 'shop_product_category_title',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the category titles for products', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Product Title', 'peakshops' ),
				'id'      => 'shop_product_title',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the product titles.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Product Price', 'peakshops' ),
				'id'      => 'shop_product_price',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the product prices.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Product Excerpt', 'peakshops' ),
				'id'      => 'shop_product_excerpt',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the excerpts for products', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Add To Cart Button', 'peakshops' ),
				'id'      => 'shop_product_button',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the buttons for products. ', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab4',
				'label'   => esc_html__( 'Product Page Typography', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Product Title', 'peakshops' ),
				'id'      => 'shop_product_detail_title',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the product titles on product pages.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Product Price', 'peakshops' ),
				'id'      => 'shop_product_detail_price',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the product price on product pages.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Product Short Description', 'peakshops' ),
				'id'      => 'shop_product_detail_excerpt',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the product excerpt on product pages.', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab5',
				'label'   => esc_html__( 'Heading Typography', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'id'      => 'heading_text',
				'label'   => esc_html__( 'About Heading Typography', 'peakshops' ),
				'desc'    => esc_html__( 'These affect all h* tags inside the theme, so use wisely. Some particular headings may need additional css to target. The settings affect the desktop sizes only.', 'peakshops' ),
				'type'    => 'textblock',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 1', 'peakshops' ),
				'id'      => 'h1_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H1 tag', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 2', 'peakshops' ),
				'id'      => 'h2_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H2 tag', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 3', 'peakshops' ),
				'id'      => 'h3_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H3 tag', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 4', 'peakshops' ),
				'id'      => 'h4_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H4 tag', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 5', 'peakshops' ),
				'id'      => 'h5_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H5 tag', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 6', 'peakshops' ),
				'id'      => 'h6_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H6 tag', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab6',
				'label'   => esc_html__( 'Font Support', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Google Font Subsets', 'peakshops' ),
				'id'      => 'font_subsets',
				'type'    => 'radio',
				'desc'    => esc_html__( 'You can add additional character subset specific to your language.', 'peakshops' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'No Subset', 'peakshops' ),
						'value' => 'no-subset',
					),
					array(
						'label' => esc_html__( 'Latin Extended', 'peakshops' ),
						'value' => 'latin-ext',
					),
					array(
						'label' => esc_html__( 'Greek', 'peakshops' ),
						'value' => 'greek',
					),
					array(
						'label' => esc_html__( 'Cyrillic', 'peakshops' ),
						'value' => 'cyrillic',
					),
					array(
						'label' => esc_html__( 'Vietnamese', 'peakshops' ),
						'value' => 'vietnamese',
					),
				),
				'std'     => 'no-subset',
				'section' => 'typography',
			),
			array(
				'id'      => 'typekit_text',
				'label'   => esc_html__( 'About Adobe Fonts Support', 'peakshops' ),
				'desc'    => esc_html__( 'Please make sure that you enter your Project ID or the fonts wont work. After adding Font Names, these names will appear on the font selection dropdown on the Font Families tab (at the bottom of the list).', 'peakshops' ),
				'std'     => '',
				'type'    => 'textblock',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Adobe Fonts Project ID', 'peakshops' ),
				'id'      => 'typekit_id',
				'type'    => 'text',
				'desc'    => esc_html__( 'Paste the provided Project ID. <small>Usually 6-7 random letters</small>', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Adobe Font Names', 'peakshops' ),
				'id'      => 'typekit_fonts',
				'type'    => 'text',
				'desc'    => esc_html__( 'Enter your Adobe Font Name, seperated by comma. For example: futura-pt,aktiv-grotesk <strong>Do not leave spaces between commas</strong>', 'peakshops' ),
				'section' => 'typography',
			),
			array(
				'label'    => esc_html__( 'Self Hosted Fonts', 'peakshops' ),
				'id'       => 'self_hosted_fonts',
				'type'     => 'list-item',
				'settings' => array(
					array(
						'label' => esc_html__( 'Font Stylesheet URL', 'peakshops' ),
						'id'    => 'font_url',
						'type'  => 'text',
						'desc'  => esc_html__( 'URL of the font stylesheet (.css file) you want to use.', 'peakshops' ),
					),
					array(
						'label' => esc_html__( 'Font Family Names', 'peakshops' ),
						'id'    => 'font_name',
						'type'  => 'text',
						'desc'  => esc_html__( 'Enter your Font Family Name, use the name that will be used in css. For example: futura-pt, aktiv-grotesk. After saving, you will be able to use this name in the typography settings.', 'peakshops' ),
					),
				),
				'section'  => 'typography',
			),
			array(
				'id'      => 'customization_tab1',
				'label'   => esc_html__( 'Backgrounds', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Global Notification Background', 'peakshops' ),
				'id'      => 'global_notification_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Content Background', 'peakshops' ),
				'id'      => 'content_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Header Background', 'peakshops' ),
				'id'      => 'subheader_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Header Background', 'peakshops' ),
				'id'      => 'header_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Background', 'peakshops' ),
				'id'      => 'fixed_header_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Menu Background', 'peakshops' ),
				'id'      => 'menu_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Menu Background', 'peakshops' ),
				'id'      => 'submenu_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Background', 'peakshops' ),
				'id'      => 'footer_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub - Footer Background', 'peakshops' ),
				'id'      => 'subfooter_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Background', 'peakshops' ),
				'id'      => 'mobilemenu_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Cookie Bar Background', 'peakshops' ),
				'id'      => 'cookiebar_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab2',
				'label'   => esc_html__( 'Colors', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Accent Color', 'peakshops' ),
				'id'      => 'accent_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the accent color here, default red you see in some areas.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Icon Color', 'peakshops' ),
				'id'      => 'mobile_menu_icon_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the hamburger menu icon color here.', 'peakshops' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Full Menu Sub-Menu Border Color', 'peakshops' ),
				'id'      => 'submenu_border_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the border color of the sub-menus under the full menu here.', 'peakshops' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Widget Title Color', 'peakshops' ),
				'id'      => 'widget_title_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the widget title color here', 'peakshops' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Widget Title Color', 'peakshops' ),
				'id'      => 'footer_widget_title_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the footer widget title color here', 'peakshops' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Text Color', 'peakshops' ),
				'id'      => 'footer_text_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the footer text color here', 'peakshops' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub - Footer Text Color', 'peakshops' ),
				'id'      => 'subfooter_text_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the sub-footer text color here', 'peakshops' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab3',
				'label'   => esc_html__( 'Link Colors', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'General Link Color', 'peakshops' ),
				'id'      => 'general_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the general link color here.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Header Link Color', 'peakshops' ),
				'id'      => 'subheader_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link colors inside Sub-Header', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Full Menu Link Color', 'peakshops' ),
				'id'      => 'fullmenu_link_color_dark',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link color of the full menu.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Menu Link Color', 'peakshops' ),
				'id'      => 'submenu_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link colors inside the sub-menus of the full menu.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Link Color', 'peakshops' ),
				'id'      => 'mobilemenu_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link color of the mobile menu.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Secondary Link Color', 'peakshops' ),
				'id'      => 'mobilemenu_secondary_link_color',
				'type'    => 'link_color',
				'desc'    => esc_html__( 'You can modify the link color of the secondary mobile menu.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Link Color', 'peakshops' ),
				'id'      => 'footer_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the footer link color here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Link Color', 'peakshops' ),
				'id'      => 'subfooter_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the sub-footer link color here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab4',
				'label'   => esc_html__( 'Shop Colors', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Rating Star Color', 'peakshops' ),
				'id'      => 'rating_star_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the rating start color here.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Price Color', 'peakshops' ),
				'id'      => 'shop_price_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the color of the prices here.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Category Title Link Color', 'peakshops' ),
				'id'      => 'product_category_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'Changes the link color of product categories on shop pages.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Product Title Link Color', 'peakshops' ),
				'id'      => 'product_title_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'Changes the link color of product title on shop pages.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Category Title Link Color', 'peakshops' ),
				'id'      => 'product_category_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'Changes the link color of product categories on shop pages.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Product Page Product Title Color', 'peakshops' ),
				'id'      => 'product_detail_title_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the color of the product title on product detail pages.', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab5',
				'label'   => esc_html__( 'Badge Colors', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'New Badge Color', 'peakshops' ),
				'id'      => 'badge_justarrived',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the new badge color from here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'On Sale Badge Color', 'peakshops' ),
				'id'      => 'badge_sale',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the on sale badge color from here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Out of Stock Badge Color', 'peakshops' ),
				'id'      => 'badge_outofstock',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the out of stock badge color from here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab6',
				'label'   => esc_html__( 'Notification Colors', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Success Notification Color', 'peakshops' ),
				'id'      => 'notification_color_success',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the success notification background color from here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Info Notification Color', 'peakshops' ),
				'id'      => 'notification_color_info',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the info notification background color from here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Error Notification Color', 'peakshops' ),
				'id'      => 'notification_color_error',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the error notification background color from here', 'peakshops' ),
				'section' => 'customization',
			),
			array(
				'id'      => 'gdpr_tab0',
				'label'   => esc_html__( 'Newsletter', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'gdpr',
			),
			array(
				'label'   => esc_html__( 'Newsletter Privacy Checkbox', 'peakshops' ),
				'id'      => 'newsletter_privacy_checkbox',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying a checkbox underneath the subscribe box.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'gdpr',
			),
			array(
				'label'   => esc_html__( 'Newsletter Privacy Checkbox - Checked by Default?', 'peakshops' ),
				'id'      => 'newsletter_privacy_checkbox_checked',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the default state of the checkbox.', 'peakshops' ),
				'std'     => 'on',
				'section' => 'gdpr',
			),
			array(
				'id'      => 'gdpr_tab1',
				'label'   => esc_html__( 'Cookie Bar', 'peakshops' ),
				'type'    => 'tab',
				'section' => 'gdpr',
			),
			array(
				'label'   => esc_html__( 'Cookie Bar', 'peakshops' ),
				'id'      => 'thb_cookie_bar',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to show the cookie bar?', 'peakshops' ),
				'std'     => 'off',
				'section' => 'gdpr',
			),
			array(
				'label'     => esc_html__( 'Cookie Bar Content', 'peakshops' ),
				'id'        => 'thb_cookie_bar_content',
				'type'      => 'textarea',
				'desc'      => esc_html__( 'This content appears inside the cookie bar.', 'peakshops' ),
				'rows'      => '4',
				'section'   => 'gdpr',
				'condition' => 'thb_cookie_bar:is(on)',
			),
		),
	);
	apply_filters( 'peakshops_theme_options', $custom_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings );
	}
}
/**
 * Variation Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_attribute_select' ) ) {

	function ot_type_attribute_select( $args = array() ) {

		extract( $args );

		$has_desc = $field_desc ? true : false;

		echo '<div class="format-setting type-attribute-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>';
		}

		echo '<div class="format-setting-inner">';

		echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';

		$attributes = array();

		if ( thb_wc_supported() ) {
			foreach ( wc_get_attribute_taxonomies() as $attribute ) {
				$attributes[ 'pa_' . $attribute->attribute_name ] = array(
					'name'  => $attribute->attribute_label,
					'value' => 'pa_' . $attribute->attribute_name,
				);
			}
		}

		if ( ! empty( $attributes ) ) {
			echo '<option value="">-- ' . esc_html__( 'Choose One', 'peakshops' ) . ' --</option>';
			foreach ( $attributes as $attribute ) {
				echo '<option value="' . esc_attr( $attribute['value'] ) . '"' . selected( $field_value, $attribute['value'], false ) . '>' . esc_attr( $attribute['name'] ) . '</option>';
			}
		} else {
			echo '<option value="">' . esc_html__( 'No Attributes Found', 'peakshops' ) . '</option>';
		}
		echo '</select>';
		echo '</div>';
		echo '</div>';
	}
}


/**
 * Social Checkbox option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_social_checkbox' ) ) {

	function ot_type_social_checkbox( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-category-checkbox type-checkbox ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

			echo '<ul class="option-tree-setting-wrap option-tree-sortable" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-type="' . esc_attr( $type ) . '">';

				$field_value = is_array( $field_value ) ? $field_value : array();

				$socials = array(
					'facebook'  => 'Facebook',
					'twitter'   => 'Twitter',
					'pinterest' => 'Pinterest',
					'linkedin'  => 'Linkedin',
					'vkontakte' => 'Vkontakte',
					'whatsapp'  => 'WhatsApp',
					'email'     => 'E-Mail',
					'reddit'    => 'Reddit',
				);

				$ordered_array = array_merge( array_flip( $field_value ), $socials );

				/* build categories */
				if ( ! empty( $ordered_array ) ) {
					foreach ( $ordered_array as $social => $label ) {

						echo '<li class="ui-state-default list-list-item"><div class="option-tree-setting"><div class="open">';

							echo '<input type="checkbox"
								name="' . esc_attr( $field_name ) . '[' . esc_attr( $social ) . ']"
								id="' . esc_attr( $field_id ) . '-' . esc_attr( $social ) . '"
								value="' . esc_attr( $social ) . '" ' . ( isset( $field_value[ $social ] ) ? checked( $field_value[ $social ], $social, false ) : '' ) . '" class="option-tree-ui-checkbox ' . esc_attr( $field_class ) . '" />';
							echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $social ) . '">' . esc_attr( $label ) . '</label>';
						echo '</div></div></li>';
					}
				}

				echo '</ul>';

				echo '</div>';

				echo '</div>';

	}
}
/**
 * MC List Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_mc_list_select' ) ) {

	function ot_type_mc_list_select( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-mc-list-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

		/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>';
		}

		/* format setting inner wrapper */
		echo '<div class="format-setting-inner">';

		/* build category */
		echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';

		/* get category array */
		$newsletter_mailchimp_api = ot_get_option( 'newsletter_mailchimp_api' );

		/* has cats */
		if ( ! $newsletter_mailchimp_api ) {
			echo '<option value="">' . esc_html__( 'No Lists Found', 'peakshops' ) . '</option>';
		} else {
			$transient_name = 'thb_mc_lists_' . $newsletter_mailchimp_api;
			$data           = get_transient( $transient_name );

			if ( ! $data ) {
				$data = thb_mailchimp_request(
					'GET',
					'lists',
					array(
						'sort_field' => 'date_created',
						'sort_dir'   => 'DESC',
						'count'      => 1000,
					)
				);
				set_transient( $transient_name, $data, 12 * HOUR_IN_SECONDS );
			}
			if ( ! empty( $data ) ) {
				echo '<option value="">-- ' . esc_html__( 'Choose One', 'peakshops' ) . ' --</option>';
				if ( is_array( $data ) && isset( $data['lists'] ) && $data['lists'] ) {
					foreach ( $data['lists'] as $list ) {
						echo '<option value="' . esc_attr( $list['id'] ) . '"' . selected( $field_value, $list['id'], false ) . '>' . esc_attr( $list['name'] ) . '</option>';
					}
				}
			} else {
				echo '<option value="">' . esc_html__( 'No Lists Found', 'peakshops' ) . '</option>';
			}
		}

		echo '</select>';
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Menu Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_menu_select' ) ) {

	function ot_type_menu_select( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

				/* build category */
				echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';

				/* get category array */
				$menus = get_terms( 'nav_menu' );

				/* has cats */
		if ( ! empty( $menus ) ) {
			echo '<option value="">-- ' . esc_html__( 'Choose One', 'peakshops' ) . ' --</option>';
			foreach ( $menus as $menu ) {
				echo '<option value="' . esc_attr( $menu->slug ) . '"' . selected( $field_value, $menu->slug, false ) . '>' . esc_attr( $menu->name ) . '</option>';
			}
		} else {
			echo '<option value="">' . esc_html__( 'No Menus Found', 'peakshops' ) . '</option>';
		}

				echo '</select>';

			echo '</div>';

		echo '</div>';

	}
}

