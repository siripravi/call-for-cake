<?php
/**
 * Frontend Shortcode Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Frontend;

use WP_Query;
use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenu\Helpers\Options;
use RT\FoodMenu\Helpers\RenderHelpers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Frontend Shortcode Class.
 */
class Shortcode {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_filter( 'rtfm_meta_sc_builder', [ $this, 'metaBuilder' ], 10, 2 );
		\add_filter( 'rtfm_arg_builder', [ $this, 'argBuilder' ], 10, 3 );

		\add_filter( 'rt_fm_shortcode_data', [ $this, 'foodmenu_shortcode' ], 10, 4 );
		\add_filter( 'rt_fm_sc_query_args', [ $this, 'query_args' ], 5, 2 );
		\add_filter( 'rt_fm_row_class', [ $this, 'row_class' ], 10, 2 );
		\add_action( 'fmp_sc_custom_css', [ $this, 'layoutStyle' ], 10, 2 );
		\add_action( 'rt_fm_sc_before_loop', [ $this, 'add_container_before_shortcode' ], 10, 2 );
		\add_action( 'rt_fm_sc_after_loop', [ $this, 'add_container_after_shortcode' ], 99 );

		\add_filter( 'rtfm_styles_list', [ $this, 'scStyles' ] );
		\add_filter( 'rtfm_scripts_list', [ $this, 'scScripts' ] );
		\add_filter( 'rtfm_layout_default_columns', [ $this, 'defaultColumns' ], 10, 2 );
		\add_filter( 'rtfm_pagination', [ $this, 'scPagination' ], 10, 4 );
		\add_filter( 'rtfm_add_to_cart_btn', [ $this, 'cartBtn' ], 10, 7 );
	}

	public function metaBuilder( $metas, $meta ) {
		$cImageSize = ! empty( $meta['fmp_custom_image_size'][0] ) ? $meta['fmp_custom_image_size'][0] : [];

		// Excerpt.
		$metas['load_more_text'] = ! empty( $meta['fmp_load_more_button_text'][0] ) ? esc_html( $meta['fmp_load_more_button_text'][0] ) : esc_html__( 'Load More', 'food-menu-pro' );

		// Image.
		$metas['customImgSize'] = ! empty( $cImageSize ) && is_array( $cImageSize ) ? $cImageSize : [];
		$metas['imageShape']    = ! empty( $meta['fmp_image_type'][0] ) ? $meta['fmp_image_type'][0] : 'normal';
		$metas['defaultImgId']  = ! empty( $meta['fmp_placeholder_image'][0] ) ? absint( $meta['fmp_placeholder_image'][0] ) : null;

		// Animation.
		$metas['animation'] = ! empty( $meta['fmp_image_hover'][0] ) ? esc_html( $meta['fmp_image_hover'][0] ) : 'zoom_in';

		// Popup.
		$metas['linkType'] = ! empty( $meta['fmp_detail_page_link_type'][0] ) ? esc_html( $meta['fmp_detail_page_link_type'][0] ) : 'newpage';

		// Margin.
		$metas['margin']    = ! empty( $meta['fmp_margin'][0] ) ? esc_html( $meta['fmp_margin'][0] ) : 'default';
		$metas['read_more'] = ! empty( $meta['fmp_read_more_button_text'][0] ) ? esc_attr( $meta['fmp_read_more_button_text'][0] ) : esc_html__( 'Read More', 'food-menu-pro' );

		return $metas;
	}

	public function argBuilder( $arg, $metas, $scMeta ) {
		$isIsotope       = preg_match( '/isotope/', $metas['layout'] );
		$isCarousel      = preg_match( '/carousel/', $metas['layout'] );
		$lazyLoad        = false;
		$arg['lazyLoad'] = false;

		if ( $isIsotope ) {
			$arg['class'] .= ' fmp-isotope-item';
		}

		if ( $isCarousel ) {
			$cOpt = ! empty( $scMeta['fmp_carousel_options'] ) ? $scMeta['fmp_carousel_options'] : [];

			$arg['class']   .= ' fmp-carousel-item';
			$arg['lazyLoad'] = ( in_array( 'lazy_load', $cOpt, true ) ? true : false );
		}

		// if ( 'circle' === $metas['imageShape'] ) {
		// 	$arg['class'] .= ' fmp-img-circle';
		// }

		if ( 'no' === $metas['margin'] ) {
			$arg['class'] .= ' no-margin';
		}

		if ( $metas['link'] && 'popup' === $metas['linkType'] ) {
			$arg['anchorClass'] .= ' fmp-popup';
		}

		return $arg;
	}

	public function add_container_before_shortcode( $scMeta, $rand ) {
		$layout   = ( ! empty( $scMeta['fmp_layout'][0] ) ? $scMeta['fmp_layout'][0] : 'layout-free' );
		$lazyLoad = false;

		if ( ! in_array( $layout, array_keys( Options::scLayouts() ) ) ) {
			$layout = 'layout-free';
		}

		$isCarousel = preg_match( '/carousel/', $layout );
		$isIsotope  = preg_match( '/isotope/', $layout );

		$source            = ( ! empty( $scMeta['fmp_source'][0] ) ? $scMeta['fmp_source'][0] : 'food-menu' );
		$args['post_type'] = ( $source && in_array( $source, array_keys( Options::scProductSource() ) ) ) ? $source : TLPFoodMenu()->post_type;
		$categoryTaxonomy  = ( $args['post_type'] == 'product' ) ? 'product_cat' : TLPFoodMenu()->taxonomies['category'];

		$cats = ( isset( $scMeta['fmp_categories'] ) ? array_filter( $scMeta['fmp_categories'] ) : [] );

		$isoStyle     = ! empty( $scMeta['fmp_isotope_filter_tyle'][0] ) ? esc_attr( $scMeta['fmp_isotope_filter_tyle'][0] ) : 'default';
		$allText      = ! empty( $scMeta['fmp_isotope_filter_show_all_text'][0] ) ? esc_attr( $scMeta['fmp_isotope_filter_show_all_text'][0] ) : esc_html__( 'Show all', 'food-menu-pro' );
		$isoStyleType = 'default' === $isoStyle ? RenderHelpers::defaultIsoButtons( $layout ) : $isoStyle;

		$html = '';

		if ( $isIsotope ) {
			$metaKey = ( $categoryTaxonomy === 'product' ) ? 'order' : '_order';

			if ( function_exists( 'get_term_meta' ) ) {
				$terms = get_terms(
					[
						'taxonomy'   => $categoryTaxonomy,
						'hide_empty' => false,
						'orderby'    => 'meta_value_num',
						'order'      => 'ASC',
						'meta_query' => [
							'relation' => 'OR',
							[
								'key'     => $metaKey,
								'compare' => 'NOT EXISTS',
							],
							[
								'key'  => $metaKey,
								'type' => 'NUMERIC',
							],
						],
						'include'    => $cats,
					]
				);
			} else {
				$terms = get_terms(
					$categoryTaxonomy,
					[
						'hide_empty' => false,
						'orderby'    => 'meta_value_num',
						'order'      => 'ASC',
						'meta_query' => [
							'relation' => 'OR',
							[
								'key'     => $metaKey,
								'compare' => 'NOT EXISTS',
							],
							[
								'key'  => $metaKey,
								'type' => 'NUMERIC',
							],
						],
						'include'    => $cats,
					]
				);
			}

			$html          .= '<div class="fmp-iso-filter ' . esc_attr( $isoStyleType ) . '"><div id="iso-button-' . $rand . '" class="fmp-isotope-buttons button-group filter-button-group option-set">';
			$htmlButton     = null;
			$fSelectTrigger = false;

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$tItem   = ! empty( $scMeta['fmp_isotope_selected_filter'][0] ) ? $scMeta['fmp_isotope_selected_filter'][0] : null;
					$fSelect = null;
					if ( $tItem == $term->term_id ) {
						$fSelect        = 'class="selected"';
						$fSelectTrigger = true;
					}
					$htmlButton .= "<button data-filter='.iso_{$term->term_id}' {$fSelect}>" . $term->name . '</button>';
				}
			}

			if ( ! empty( $scMeta['fmp_isotope_filter_show_all'][0] ) ) {
				$fSelect = ( $fSelectTrigger ? null : 'class="selected"' );
				$html   .= "<button data-filter='*' {$fSelect}>" . esc_html( $allText ) . '</button>';
			}

			$html .= $htmlButton;
			$html .= '</div>';

			if ( ! empty( $scMeta['fmp_isotope_search_filtering'][0] ) ) {
				$html .= "<div class='iso-search'><input type='text' class='iso-search-input' placeholder='" . esc_html__(
					'Search',
					'food-menu-pro'
				) . "' /></div>";
			}

			$html .= '</div>';

			$html .= '<div class="fmp-isotope" id="fmp-isotope-' . $rand . '">';
		} elseif ( $isCarousel ) {
			$items              = ! empty( $scMeta['fmp_carousel_items_per_slider'][0] ) ? absint( $scMeta['fmp_carousel_items_per_slider'][0] ) : 0;
			$cols               = 0 === $items ? RenderHelpers::defaultColumns( $layout ) : $items;
			$smartSpeed         = ! empty( $scMeta['fmp_carousel_speed'][0] ) ? absint( $scMeta['fmp_carousel_speed'][0] ) : 250;
			$autoplayTimeout    = ! empty( $scMeta['fmp_carousel_autoplay_timeout'][0] ) ? absint( $scMeta['fmp_carousel_autoplay_timeout'][0] ) : 5000;
			$cOpt               = ! empty( $scMeta['fmp_carousel_options'] ) ? $scMeta['fmp_carousel_options'] : [];
			$autoPlay           = ( in_array( 'autoplay', $cOpt, true ) ? true : false );
			$autoPlayHoverPause = ( in_array( 'autoplayHoverPause', $cOpt, true ) ? true : false );
			$nav                = ( in_array( 'nav', $cOpt, true ) ? true : false );
			$dots               = ( in_array( 'dots', $cOpt, true ) ? true : false );
			$loop               = ( in_array( 'loop', $cOpt, true ) ? true : false );
			$lazyLoad           = ( in_array( 'lazy_load', $cOpt, true ) ? true : false );
			$autoHeight         = ( in_array( 'auto_height', $cOpt, true ) ? true : false );
			$rtl                = ( in_array( 'rtl', $cOpt, true ) ? true : false );
			$rtlHtml            = $rtl ? 'rtl' : 'ltr';
			$hasDots            = $dots ? ' has-dots' : ' no-dots';
			$hasDots           .= $nav ? ' has-nav' : ' no-nav';
			$hasDots           .= $nav ? ' has-nav' : ' no-nav';

			$carouselClass = 'swiper rtfm-carousel-slider rt-pos-s ' . $hasDots;
			$sliderOptions = [
				'slidesPerView'  => $cols,
				'slidesPerGroup' => $cols,
				'spaceBetween'   => 0,
				'speed'          => $smartSpeed,
				'loop'           => (bool) $loop,
				'autoHeight'     => (bool) $autoHeight,
				'rtl'            => (bool) $rtl,
				'preloadImages'  => (bool) $lazyLoad ? false : true,
				'lazy'           => (bool) $lazyLoad ? true : false,
				'breakpoints'    => [
					0   => [
						'slidesPerView'  => 1,
						'slidesPerGroup' => 1,
					],
					767 => [
						'slidesPerView'  => 2,
						'slidesPerGroup' => 2,
					],
					991 => [
						'slidesPerView'  => $cols,
						'slidesPerGroup' => $cols,
					],
				],
			];

			if ( $autoPlay ) {
				$sliderOptions['autoplay'] = [
					'delay'                => absint( $autoplayTimeout ),
					'pauseOnMouseEnter'    => (bool) $autoPlayHoverPause,
					'disableOnInteraction' => (bool) false,
				];
			}

			$html .= '<div class="fmp-carousel ' . esc_attr( $carouselClass ) . ' slider-loading" data-options="' . esc_js( wp_json_encode( $sliderOptions ) ) . '"  dir="' . esc_attr( $rtlHtml ) . '">';
			$html .= '<div class="swiper-wrapper">';
		}

		Fns::print_html( $html );
	}

	public function add_container_after_shortcode( $scMeta ) {
		$layout = ( ! empty( $scMeta['fmp_layout'][0] ) ? $scMeta['fmp_layout'][0] : 'layout-free' );

		$isCarousel = preg_match( '/carousel/', $layout );
		$isIsotope  = preg_match( '/isotope/', $layout );
		$cOpt       = ! empty( $scMeta['fmp_carousel_options'] ) ? $scMeta['fmp_carousel_options'] : [];
		$nav        = ( in_array( 'nav', $cOpt, true ) ? true : false );
		$dots       = ( in_array( 'dots', $cOpt, true ) ? true : false );

		$html = '';

		if ( $isIsotope ) {
			$html .= '</div>'; // end of Isotope.
		}

		if ( $isCarousel ) {
			$html .= '</div>';

			$navHtml = '<div class="swiper-nav"><div class="swiper-arrow swiper-button-next"><i class="fa fa-chevron-right"></i></div><div class="swiper-arrow swiper-button-prev"><i class="fa fa-chevron-left"></i></div></div>';

			$html .= $nav ? $navHtml : '';
			$html .= $dots ? '<div class="swiper-pagination"></div>' : '';

			$html .= '</div>'; // end of carousel.
		}

		Fns::print_html( $html );
	}

	public function row_class( $class, $meta ) {
		$isIsotope = preg_match( '/isotope/', $meta['layout'] );

		if ( $isIsotope ) {
			$class .= ' fmp-isotope-layout';
		}

		if ( $meta['read_more'] ) {
			$class .= ' fmp-read-more-active';
		}

		if ( 'no' === $meta['margin'] ) {
			$class .= ' fmp-no-margin';
		}

		return $class;
	}

	public function query_args( $args, $scID ) {
		$scMeta = get_post_meta( $scID );
		$layout = ( ! empty( $scMeta['fmp_layout'][0] ) ? $scMeta['fmp_layout'][0] : 'layout-free' );

		if ( ! in_array( $layout, array_keys( Options::scLayout() ) ) ) {
			$layout = 'layout-free';
		}

		$isCarousel = preg_match( '/carousel/', $layout );

		$limit      = ( ( empty( $scMeta['fmp_limit'][0] ) || $scMeta['fmp_limit'][0] === '-1' ) ? 10000000 : (int) $scMeta['fmp_limit'][0] );
		$pagination = ( ! empty( $scMeta['fmp_pagination'][0] ) ? true : false );

		if ( $pagination ) {
			$posts_per_page = ( isset( $scMeta['fmp_posts_per_page'][0] ) ? intval( $scMeta['fmp_posts_per_page'][0] ) : $limit );

			if ( $posts_per_page > $limit ) {
				$posts_per_page = $limit;
			}

			// Set 'posts_per_page' parameter
			$args['posts_per_page'] = $posts_per_page;

			// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if ( is_front_page() ) {
				$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
			} else {
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			}

			$offset        = $posts_per_page * ( (int) $paged - 1 );
			$args['paged'] = $paged;

			// Update posts_per_page
			if ( intval( $args['posts_per_page'] ) > $limit - $offset ) {
				$args['posts_per_page'] = $limit - $offset;
				$args['offset']         = $offset;
			}
		}

		if ( $isCarousel ) {
			$args['posts_per_page'] = $limit;
		}

		return $args;

	}

	public function foodmenu_shortcode( $arg, $meta, $scMeta, $scID ) {
		$image_shape = ! empty( $scMeta['fmp_image_shape'][0] ) ? $scMeta['fmp_image_shape'][0] : null;

		// if ( $image_shape == 'circle' ) {
		// 	$arg['class'] .= ' fmp-img-circle';
		// }

		$layout = ( ! empty( $scMeta['fmp_layout'][0] ) ? $scMeta['fmp_layout'][0] : 'layout-free' );

		if ( ! in_array( $layout, array_keys( Options::scLayout() ) ) ) {
			$layout = 'layout-free';
		}

		$isCarousel = preg_match( '/carousel/', $layout );
		$isIsotope  = preg_match( '/isotope/', $layout );

		if ( $isCarousel ) {
			$arg['class'] .= ' fmp-carousel-item';
		}

		if ( $isIsotope ) {
			$arg['class'] .= ' fmp-isotope-item';
		}

		$margin = ! empty( $scMeta['fmp_margin'][0] ) ? $scMeta['fmp_margin'][0] : 'default';

		if ( $margin == 'no' ) {
			$arg['class'] .= ' no-margin';
		}

		$cImageSize = ! empty( $scMeta['fmp_custom_image_size'][0] ) ? $scMeta['fmp_custom_image_size'][0] : null;

		$arg['customImgSize']    = ! empty( $cImageSize ) ? unserialize( $cImageSize ) : null;
		$arg['defaultImgId']     = ( ! empty( $scMeta['fmp_placeholder_image'][0] ) ? absint( $scMeta['fmp_placeholder_image'][0] ) : null );
		$arg['read_more']        = ! empty( $scMeta['fmp_read_more_button_text'][0] ) ? esc_attr( $scMeta['fmp_read_more_button_text'][0] ) : esc_html__( 'Read More', 'food-menu-pro' );
		$arg['add_to_cart_text'] = ! empty( $scMeta['fmp_add_to_cart_text'][0] ) ? esc_attr( $scMeta['fmp_add_to_cart_text'][0] ) : esc_html__( 'Add to cart', 'food-menu-pro' );
		$popup                   = ! empty( $scMeta['fmp_single_food_popup'][0] ) ? true : false;
		$arg['popup']            = $popup ? true : false;

		if ( $arg['link'] && $popup ) {
			$arg['anchorClass'] = ' fmp-popup';
		}

		return $arg;
	}

	public function scPagination( $scID, $type, $text, $query ) {
		if ( ! $scID ) {
			return;
		}

		$html = null;

		if ( 'load_more' === $type ) {
			$html .= "<div class='fmp-load-more rt-pos-r'>
						<button data-sc-id='{$scID}' data-paged='2' data-max-page='{$query->max_num_pages}'>" . esc_html( $text ) . '</button>
						<div class="rtfm-loadmore-loading rtfm-ball-scale-multiple rtfm-2x">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>';
		} elseif ( 'load_on_scroll' === $type ) {
			if ( $query->max_num_pages > 1 ) {
				$html .= "<div class='fmp-scroll-load-more' data-trigger='1' data-sc-id='{$scID}' data-paged='2' data-max-page='{$query->max_num_pages}'>
					<div class='rt-infinite-action'>
						<div class='rt-infinite-loading la-fire la-2x'>
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
				</div>";
			}
		}

		return $html;
	}

	public function layoutStyle( $ID, $scMeta ) {
		$css = null;

		// Primary Color.
		$primaryColor = ( ! empty( $scMeta['fmp_primary_color'][0] ) ? $scMeta['fmp_primary_color'][0] : null );

		if ( $primaryColor ) {
			// Primary Color.
			$css .= "#{$ID} { ";
			$css .= '--rtfm-primary-color:' . $primaryColor . ';';
			$css .= '}';

			// Cat layout.
			$css .= "#{$ID} .fmp-cat1 .fmp-cat-title:after,
					#{$ID} .fmp-layout2 .fmp-box .fmp-content .fmp-title:before,
					#{$ID} .fmp-layout5 .fmp-price-box .fmp-attr-variation-wrapper,
					#{$ID} .fmp-layout5 .fmp-price-box .fmp-price,
					#{$ID} .fmp-layout7 .fmp-box-wrapper .fmp-price-wrapper.is-variable::after,
					#{$ID} .fmp-layout7 .fmp-box-wrapper .fmp-price-wrapper:not(.is-variable) .fmp-price::after,
					#{$ID} .fmp-layout1 .fmp-box span.fmp-price { ";
			$css .= 'background :' . $primaryColor . ';';
			$css .= '}';

			$css .= "#{$ID} .fmp-cat1 .fmp-media-body h3, ";
			$css .= "#{$ID} .fmp-cat2 .fmp-box ul.menu-list li, ";
			$css .= "#{$ID} .fmp-cat1 .fmp-media-body h3 {";
			$css .= 'border-color :' . $primaryColor . ';';
			$css .= '}';
		}

		// Overlay.
		$overlay_color = ( ! empty( $scMeta['fmp_overlay_color'][0] ) ? Fns::rtHex2rgba( $scMeta['fmp_overlay_color'][0], ! empty( $scMeta['fmp_overlay_opacity'][0] ) ? absint( $scMeta['fmp_overlay_opacity'][0] ) / 100 : .8 ) : null );

		if ( $overlay_color) {
			$css .= "#{$ID}.fmp-wrapper .fmp-image-wrap > a::before,";
			$css .= "#{$ID} .fmp-layout2 .fmp-box .fmp-img-wrapper:before,";
			$css .= "#{$ID} .fmp-layout-grid-by-cat2 .fmp-cat2 .fmp-cat-title:after {";

			if ( $overlay_color ) {
				$css .= 'background-color:' . $overlay_color . ';';
			}

			$css .= '}';

			$css .= "#{$ID} .fmp-layout1 .fmp-box::before {";
			$css .= 'background: linear-gradient(180deg, rgba(0, 0, 0, 0) 44.82%, ' . $primaryColor . ' 100%);';
			$css .= '}';

			$css .= "#{$ID} .fmp-layout1 .fmp-box::after {";
			$css .= 'background: linear-gradient(180deg, rgba(0, 0, 0, 0.15) 0%, ' . $primaryColor . ' 100%);';
			$css .= '}';
		}

		// Short Description.
		$sDesc = ( ! empty( $scMeta['fmp_short_description_style'][0] ) ? unserialize( $scMeta['fmp_short_description_style'][0] ) : [] );

		if ( ! empty( $sDesc ) ) {
			$sDesc_color     = ( ! empty( $sDesc['color'] ) ? $sDesc['color'] : null );
			$sDesc_color_h   = ( ! empty( $sDesc['hover_color'] ) ? $sDesc['hover_color'] : null );
			$sDesc_size      = ( ! empty( $sDesc['size'] ) ? absint( $sDesc['size'] ) : null );
			$sDesc_weight    = ( ! empty( $sDesc['weight'] ) ? $sDesc['weight'] : null );
			$sDesc_alignment = ( ! empty( $sDesc['align'] ) ? $sDesc['align'] : null );
			$css            .= "#{$ID} .fmp-box .fmp-title p,";
			$css            .= "#{$ID} .fmp-content-wrap > p,";
			$css            .= "#{$ID} .fmp-media-body > p,";
			$css            .= "#{$ID} .fmp-box li > p,";
			$css            .= "#{$ID} .fmp-body > p,";
			$css            .= "#{$ID} .fmp-content > p,";
			$css            .= "#{$ID} [class*=fmp-layout-free] .fmp-food-item .fmp-body p,";
			$css            .= "#{$ID} .fmp-media-body .info-part > p {";

			if ( $sDesc_color ) {
				$css .= 'color:' . $sDesc_color . ';';
			}

			if ( $sDesc_size ) {
				$css .= 'font-size:' . $sDesc_size . 'px;';
			}

			if ( $sDesc_weight ) {
				$css .= 'font-weight:' . $sDesc_weight . ';';
			}

			if ( $sDesc_alignment ) {
				$css .= 'text-align:' . $sDesc_alignment . ';';
			}

			$css .= '}';

			if ( $sDesc_color_h ) {
				$css .= "#{$ID} .fmp-box .fmp-title p:hover,";
				$css .= "#{$ID} .fmp-content-wrap > p:hover,";
				$css .= "#{$ID} .fmp-media-body > p:hover,";
				$css .= "#{$ID} .fmp-body > p:hover,";
				$css .= "#{$ID} .fmp-box li > p:hover,";
				$css .= "#{$ID} .fmp-content > p:hover,";
				$css .= "#{$ID} [class*=fmp-layout-free] .fmp-food-item .fmp-body p:hover,";
				$css .= "#{$ID} .fmp-media-body .info-part > p:hover {";
				$css .= 'color:' . $sDesc_color_h . ';';
				$css .= '}';
			}
		}

		// Category name.
		$cat = ( ! empty( $scMeta['fmp_category_name_style'][0] ) ? unserialize( $scMeta['fmp_category_name_style'][0] ) : [] );

		if ( ! empty( $cat ) ) {
			$cat_color     = ( ! empty( $cat['color'] ) ? $cat['color'] : null );
			$cat_size      = ( ! empty( $cat['size'] ) ? absint( $cat['size'] ) : null );
			$cat_weight    = ( ! empty( $cat['weight'] ) ? $cat['weight'] : null );
			$cat_alignment = ( ! empty( $cat['align'] ) ? $cat['align'] : null );

			$css .= "#{$ID} .fmp-category-title,";
			$css .= "#{$ID} .fmp-cat-title h2 {";

			if ( $cat_color ) {
				$css .= 'color:' . $cat_color . ';';
			}

			if ( $cat_size ) {
				$css .= 'font-size:' . $cat_size . 'px;';
			}

			if ( $cat_weight ) {
				$css .= 'font-weight:' . $cat_weight . ';';
			}

			if ( $cat_alignment ) {
				$css .= 'text-align:' . $cat_alignment . ';';
			}

			$css .= '}';

			if ( $cat_color ) {
				$css .= "#{$ID} .fmp-cat-title p.cat-description {";
				$css .= 'color:' . $cat_color . ';';
				$css .= '}';
			}
		}

		Fns::print_html( $css, true );
	}

	public function scStyles( $styles ) {
		array_push( $styles, 'fmp-swiper' );
		array_push( $styles, 'fmp-scrollbar' );
		array_push( $styles, 'fmp-fontawsome' );
		array_push( $styles, 'fmp-modal' );

		if ( is_rtl() ) {
			array_push( $styles, 'fmp-rtl' );
		}

		return $styles;
	}

	public function scScripts( $scripts ) {
		array_push( $scripts, 'fmp-image-load' );
		array_push( $scripts, 'fmp-isotope' );
		array_push( $scripts, 'fmp-swiper' );
		array_push( $scripts, 'fmp-scrollbar' );
		array_push( $scripts, 'fmp-modal' );
		array_push( $scripts, 'fmp-actual-height' );
		array_push( $scripts, 'fmp-frontend' );

		return $scripts;
	}

	public function defaultColumns( $columns, $layout ) {
		switch ( $layout ) {
			case 'layout1':
				$columns = 3;
				break;

			case 'layout3':
				$columns = 4;
				break;

			case 'layout5':
				$columns = 1;
				break;

			case 'layout6':
				$columns = 3;
				break;

			case 'layout8':
				$columns = 4;
				break;

			case 'carousel1':
				$columns = 3;
				break;

			case 'carousel2':
				$columns = 2;
				break;

			case 'carousel3':
				$columns = 4;
				break;

			case 'isotope1':
				$columns = 3;
				break;

			case 'isotope3':
				$columns = 4;
				break;
		}

		return $columns;
	}

	public function cartBtn( $content, $link, $id, $type, $text, $items, $popup = false ) {
		if ( 'variable' === $type ) {
			if ( ! empty( $popup ) ) {
				$content = sprintf(
					'<div class="fmp-wc-add-to-cart-wrap"><a href="%1$s" class="fmp-btn-read-more fmp-popup" data-id="%3$s">%2$s</a></div>',
					esc_url( $link ),
					esc_html__( 'Select Options', 'food-menu-pro' ),
					absint( $id )
				);

				return $content;
			} else {
				$content = sprintf(
					'<div class="fmp-wc-add-to-cart-wrap"><a href="%1$s" data-quantity="1" class="fmp-btn-read-more add-to-cart" data-product_id="%3$s" rel="nofollow">%2$s</a></div>',
					esc_url( $link ),
					esc_html__( 'Select Options', 'food-menu-pro' ),
					absint( $id )
				);

				return $content;
			}
		}

		$quantity_html = sprintf(
			'<div class="fmp-wc-quantity-wrap">
				<input class="fmp-input-text" type="number" name="quantity" step="%1$d" min="%1$d" title="%2$s" size="4" pattern="[0-9]*" inputmode="numeric" value="%1$d">
				<div class="input-group-btn">
					<span class="quantity-btn quantity-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
					<span class="quantity-btn quantity-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
				</div>
			</div>',
			1,
			esc_html__( 'Quantity', 'food-menu-pro' )
		);

		$add_to_cart_button = sprintf(
			'<a href="%1$s?add-to-cart=%2$d" class="fmp-wc-add-to-cart-btn" data-id="%2$d" data-type="%3$s">%4$s<span></span></a>',
			esc_url( $link ),
			absint( $id ),
			esc_html( $type ),
			esc_html( $text )
		);

		if ( ( in_array( 'add_to_cart', $items, true ) ) && ( in_array( 'quantity', $items, true ) ) ) {
			$content = sprintf(
				'<div class="fmp-wc-add-to-cart-wrap">%s%s</div>',
				in_array( 'quantity', $items, true ) ? $quantity_html : null,
				in_array( 'add_to_cart', $items, true ) ? $add_to_cart_button : null
			);
		} elseif ( ( in_array( 'add_to_cart', $items, true ) ) && ( ! in_array( 'quantity', $items, true ) ) ) {
			$content = sprintf(
				'<div class="fmp-wc-add-to-cart-wrap">%s</div>',
				in_array( 'add_to_cart', $items, true ) ? $add_to_cart_button : null
			);
		}

		return $content;
	}
}
