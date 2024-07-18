<?php

// Mega Menu.
add_filter( 'wp_setup_nav_menu_item', 'thb_add_custom_nav_fields' );
function thb_add_custom_nav_fields( $menu_item ) {
	$menu_item->thb_menu_options = get_post_meta( $menu_item->ID, '_menu_item_thb_menu_options', true );
	$menu_item->menuimage        = get_post_meta( $menu_item->ID, '_menu_item_menuimage', true );
	return $menu_item;
}

add_action( 'wp_update_nav_menu_item', 'thb_update_custom_nav_fields', 1, 3 );
function thb_update_custom_nav_fields( $menu_id, $menu_item_db_id, $menu_item_data ) {
	if ( isset( $_REQUEST['edit-menu-item-thb_menu_options'] ) ) {
		$req = $_REQUEST['edit-menu-item-thb_menu_options'];
		if ( ! empty( $req ) ) {
			if ( isset( $req[ $menu_item_db_id ] ) ) {
				$thb_menu_options = $req[ $menu_item_db_id ];
				update_post_meta( $menu_item_db_id, '_menu_item_thb_menu_options', $thb_menu_options );
			}
		}
	}
	if ( isset( $_REQUEST['edit-menu-item-menuimage'] ) ) {
	$menuimage = $_REQUEST['edit-menu-item-menuimage'];
		if ( ! empty( $menuimage ) ) {
			if ( isset( $menuimage[ $menu_item_db_id ] ) ) {
				$menuimage = $menuimage[ $menu_item_db_id ];
				update_post_meta( $menu_item_db_id, '_menu_item_menuimage', $menuimage );
			}
		}
	}
}


/**
 * Custom Walker - Mobile Menu
 *
 * @access      public
 * @since       1.0
 * @return      void
*/
class thb_mobileDropdown extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = ! empty( $item->menuanchor ) ? 'has-hash' : '';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class=" ' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$menu_anchor = ! empty( $item->menuanchor ) ? '#' . esc_attr( $item->menuanchor ) : '';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value . $menu_anchor ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>' . ( in_array( 'menu-item-has-children', $item->classes ) ? '<span></span>' : '' );

		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0
 * @return      void
*/
class thb_MegaMenu extends Walker_Nav_Menu {

	var $active_megamenu = 0;

	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// Default class.
		$classes = array( 'sub-menu' );

		$classes[] = '' !== $args->menuimage ? ' has_bg' : false;
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$styles      = '' !== $args->menuimage ? ' style="background-image:url(' . $args->menuimage . ');"' : false;

		$output .= "{$n}{$indent}<ul$class_names$styles>{$n}";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
			$item_output = "";

			$indent    = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$classes[] = ! empty( $item->thb_menu_options['menuanchor'] ) ? 'has-hash' : '';

			if ( $depth === 1 && $this->active_megamenu ) {
				$classes[] = 'mega-menu-title';
			}
			/**
			 * Filter the CSS class(es) applied to a menu item's list item element.
			 *
			 * @since 3.0.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */


			if ( $depth === 0 ) {
				$this->active_megamenu = isset( $item->thb_menu_options['megamenu'] ) ? $item->thb_menu_options['megamenu'] : false;
				if ( $this->active_megamenu ) {
					$classes[] = "menu-item-mega-parent";
				}
			} else {
				$title_item = isset( $item->thb_menu_options['titleitem'] ) ? $item->thb_menu_options['titleitem'] : false;
				if ( 'enabled' === $title_item ) {
					$classes[] = "title-item";
				}
			}
			if ( $depth === 2) {
				if ( $this->active_megamenu ) {
					$classes[] = "menu-item-mega-link";
				}
			}
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

			/**
			 * Filters the arguments for a single nav menu item.
			 *
			 * @since 4.4.0
			 *
			 * @param array  $args  An array of arguments.
			 * @param object $item  Menu item data object.
			 * @param int    $depth Depth of menu item. Used for padding.
			 */
			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

			/**
			 * Filters the CSS class(es) applied to a menu item's list item element.
			 *
			 * @since 3.0.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of wp_nav_menu() arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			/**
			 * Filters the ID applied to a menu item's list item element.
			 *
			 * @since 3.0.1
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of wp_nav_menu() arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			/**
			 * Filters the HTML attributes applied to a menu item's anchor element.
			 *
			 * @since 3.6.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $title  Title attribute.
			 *     @type string $target Target attribute.
			 *     @type string $rel    The rel attribute.
			 *     @type string $href   The href attribute.
			 * }
			 * @param object $item  The current menu item.
			 * @param array  $args  An array of wp_nav_menu() arguments.
			 * @param int    $depth Depth of menu item. Used for padding.
			 */
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$menu_anchor  = ! empty( $item->thb_menu_options['menuanchor'] ) ? '#' . esc_attr( $item->thb_menu_options['menuanchor'] ) : '';

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value . $menu_anchor ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );

			/**
			 * Filters a menu item's title.
			 *
			 * @since 4.4.0
			 *
			 * @param string $title The menu item's title.
			 * @param object $item  The current menu item.
			 * @param array  $args  An array of wp_nav_menu() arguments.
			 * @param int    $depth Depth of menu item. Used for padding.
			 */
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			$item_output = $args->before;

			if ( $depth !== 0 ) {
				$imagetoggle = isset( $item->thb_menu_options['imagetoggle'] ) ? $item->thb_menu_options['imagetoggle'] : false;
				if ( 'enabled' === $imagetoggle ) {
					$imagelink      = isset( $item->thb_menu_options['imagelink'] ) ? $item->thb_menu_options['imagelink'] : false;
					$imagelinkwidth = isset( $item->thb_menu_options['imagelinkwidth'] ) ? $item->thb_menu_options['imagelinkwidth'] : '200px';
					if ( ! empty( $imagelink ) ) {
						$attributes_img = $attributes;
						$attributes_img .= ' style="min-width:' . esc_attr( $imagelinkwidth ) . '"';
						$item_output    .= '<a class="thb-menu-image-link" ' . $attributes_img . '>';
						$item_output    .= '<img data-src="' . esc_url( $imagelink ) . '" alt="' . esc_attr( $title ) . '" class="thb-lazyload lazyload" />';
						$item_output    .= '</a>';

					}

				}
			}
			if (!isset( $item->logo) && !$item->logo) {
				$item_output .= '<a'. $attributes .'>';
			}

			$item_output .= $args->link_before . $title . $args->link_after;

			if (!isset( $item->logo) && !property_exists($item, 'logo')) {
				$item_output .= '</a>';
			}
			$item_output .= $args->after;

			/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

			apply_filters( 'walker_nav_menu_start_lvl', $item_output, $depth, $args->menuimage = $item->menuimage );
	}
}


function thb_custom_nav_fields_action( $item_id, $item, $depth, $args, $id ) {
	?>
	<div class="thb_menu_options">
		<?php $thb_values = get_post_meta( $item_id, '_menu_item_thb_menu_options', true ); ?>
		<p class="thb-field-link-mega description-thin">
			<label for="edit-menu-item-megamenu-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Mega Menu', 'peakshops' ); ?></strong><br />
				<?php $value = isset( $thb_values['megamenu'] ) ? $thb_values['megamenu'] : false; ?>
				<input type="checkbox" value="enabled" id="edit-menu-item-megamenu-<?php echo esc_attr( $item_id ); ?>" name="edit-menu-item-thb_menu_options[<?php echo esc_attr( $item_id ); ?>][megamenu]" <?php checked( $value, 'enabled' ); ?> />
				<?php esc_html_e( 'Enable', 'peakshops' ); ?>
				<span class="description"><?php esc_html_e( 'Check to enable Mega Menu Display.', 'peakshops' ); ?></span>
			</label>
		</p>

		<p class="thb-field-link-title description-thin">
			<label for="edit-menu-item-titleitem-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Title?', 'peakshops' ); ?></strong><br />
				<?php $value = isset( $thb_values['titleitem'] ) ? $thb_values['titleitem'] : false; ?>
				<input type="checkbox" value="enabled" id="edit-menu-item-titleitem-<?php echo esc_attr( $item_id ); ?>" name="edit-menu-item-thb_menu_options[<?php echo esc_attr( $item_id ); ?>][titleitem]" <?php checked( $value, 'enabled' ); ?> />
				<?php esc_html_e( 'Enable', 'peakshops' ); ?>
				<span class="description"><?php esc_html_e( 'Will display your link in an uppercase typography.', 'peakshops' ); ?></span>
			</label>
		</p>
		<p class="thb-field-link-imagetoggle description-thin">
			<label for="edit-menu-item-imagetoggle-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Image Link?', 'peakshops' ); ?></strong><br />
				<?php $value = isset( $thb_values['imagetoggle'] ) ? $thb_values['imagetoggle'] : false; ?>
				<input type="checkbox" value="enabled" id="edit-menu-item-imagetoggle-<?php echo esc_attr( $item_id ); ?>" name="edit-menu-item-thb_menu_options[<?php echo esc_attr( $item_id ); ?>][imagetoggle]" <?php checked( $value, 'enabled' ); ?> />
				<?php esc_html_e( 'Enable', 'peakshops' ); ?>
				<span class="description"><?php esc_html_e( 'This will show an image above your link.', 'peakshops' ); ?></span>
			</label>
		</p>
		<p class="thb-field-link-imagelink description-wide">
			<label for="edit-menu-item-imagelink-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Image Link Source', 'peakshops' ); ?></strong><br />
				<?php $imagelink = isset( $thb_values['imagelink'] ) ? $thb_values['imagelink'] : false; ?>
				<input type="text" class="widefat code edit-menu-item-custom" id="edit-menu-item-imagelink-<?php echo esc_attr( $item_id ); ?>" name="edit-menu-item-thb_menu_options[<?php echo esc_attr( $item_id ); ?>][imagelink]" value="<?php echo esc_attr( $imagelink ); ?>"/>
				<span class="description"><?php esc_html_e( 'Add your image url.', 'peakshops' ); ?></span>
			</label>
		</p>
		<p class="thb-field-link-imagelink description-wide">
			<label for="edit-menu-item-imagelinkwidth-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Image Link Width', 'peakshops' ); ?></strong><br />
				<?php $imagelinkwidth = isset( $thb_values['imagelinkwidth'] ) ? $thb_values['imagelinkwidth'] : false; ?>
				<input type="text" class="widefat code edit-menu-item-custom" id="edit-menu-item-imagelinkwidth-<?php echo esc_attr( $item_id ); ?>" name="edit-menu-item-thb_menu_options[<?php echo esc_attr( $item_id ); ?>][imagelinkwidth]" value="<?php echo esc_attr( $imagelinkwidth ); ?>"/>
				<span class="description"><?php esc_html_e( 'Add your image width. Please add "px" as well.', 'peakshops' ); ?></span>
			</label>
		</p>
		<p class="thb-field-link-image description-wide">
			<label for="edit-menu-item-menuimage-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Mega Menu Background', 'peakshops' ); ?></strong><br />
				<?php $savedimage = get_post_meta( $item_id, '_menu_item_menuimage', true ); ?>
				<input type="text" class="widefat code edit-menu-item-custom" id="edit-menu-item-menuimage-<?php echo esc_attr( $item_id ); ?>" name="edit-menu-item-menuimage[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $savedimage ); ?>"/>
				<span class="description"><?php esc_html_e( 'Add your image url.', 'peakshops' ); ?></span>
			</label>
		</p>
		<p class="thb-field-menuanchor description-wide">
			<label for="edit-menu-item-menuanchor-<?php echo esc_attr( $item_id ); ?>">
				<strong><?php esc_html_e( 'Menu Anchor', 'peakshops' ); ?></strong><br />
				<?php $value = isset( $thb_values['menuanchor'] ) ? $thb_values['menuanchor'] : false; ?>
				<input type="text" id="edit-menu-item-menuanchor-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-menuanchor" name="edit-menu-item-thb_menu_options[<?php echo esc_attr( $item_id ); ?>][menuanchor]" value="<?php echo esc_attr( $value ); ?>" />
				<span class="description"><?php esc_html_e( 'Add your row ID without the hashtag.', 'peakshops' ); ?></span>
			</label>
		</p>
	</div>
	<?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'thb_custom_nav_fields_action', 10, 5 );
