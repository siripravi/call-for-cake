<?php
/**
 * Preview Filters Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenu\Helpers\Options;
use RT\FoodMenu\Helpers\RenderHelpers;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Preview Filters Class.
 */
class Preview {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'rt_fm_preview_before_loop', [ $this, 'beforeLoop' ], 10, 2 );
		\add_action( 'rt_fm_preview_after_loop', [ $this, 'afterLoop' ] );
	}

	public function beforeLoop( $scMeta, $rand ) {
		$layout   = ( ! empty( $scMeta['fmp_layout'] ) ? $scMeta['fmp_layout'] : 'layout-free' );
		$lazyLoad = false;

		if ( ! in_array( $layout, array_keys( Options::scLayouts() ) ) ) {
			$layout = 'layout-free';
		}

		$isCarousel = preg_match( '/carousel/', $layout );
		$isIsotope  = preg_match( '/isotope/', $layout );

		$source            = ( ! empty( $scMeta['fmp_source'] ) ? $scMeta['fmp_source'] : 'food-menu' );
		$args['post_type'] = ( $source && in_array( $source, array_keys( Options::scProductSource() ) ) ) ? $source : TLPFoodMenu()->post_type;
		$categoryTaxonomy  = ( $args['post_type'] == 'product' ) ? 'product_cat' : TLPFoodMenu()->taxonomies['category'];

		$cats = ( isset( $scMeta['fmp_categories'] ) ? array_filter( $scMeta['fmp_categories'] ) : [] );

		$isoStyle     = ! empty( $scMeta['fmp_isotope_filter_tyle'] ) ? esc_attr( $scMeta['fmp_isotope_filter_tyle'] ) : 'default';
		$allText      = ! empty( $scMeta['fmp_isotope_filter_show_all_text'] ) ? esc_attr( $scMeta['fmp_isotope_filter_show_all_text'] ) : esc_html__( 'Show all', 'food-menu-pro' );
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
					$tItem   = ! empty( $scMeta['fmp_isotope_selected_filter'] ) ? $scMeta['fmp_isotope_selected_filter'] : null;
					$fSelect = null;
					if ( $tItem == $term->term_id ) {
						$fSelect        = 'class="selected"';
						$fSelectTrigger = true;
					}
					$htmlButton .= "<button data-filter='.iso_{$term->term_id}' {$fSelect}>" . $term->name . '</button>';
				}
			}

			if ( ! empty( $scMeta['fmp_isotope_filter_show_all'] ) ) {
				$fSelect = ( $fSelectTrigger ? null : 'class="selected"' );
				$html   .= "<button data-filter='*' {$fSelect}>" . esc_html( $allText ) . '</button>';
			}

			$html .= $htmlButton;
			$html .= '</div>';

			if ( ! empty( $scMeta['fmp_isotope_search_filtering'] ) ) {
				$html .= "<div class='iso-search'><input type='text' class='iso-search-input' placeholder='" . esc_html__(
					'Search',
					'food-menu-pro'
				) . "' /></div>";
			}

			$html .= '</div>';

			$html .= '<div class="fmp-isotope" id="fmp-isotope-' . $rand . '">';
		} elseif ( $isCarousel ) {
			$items              = ! empty( $scMeta['fmp_carousel_items_per_slider'] ) ? absint( $scMeta['fmp_carousel_items_per_slider'] ) : 0;
			$cols               = 0 === $items ? self::defaultColumns( $layout ) : $items;
			$smartSpeed         = ! empty( $scMeta['fmp_carousel_speed'] ) ? absint( $scMeta['fmp_carousel_speed'] ) : 1000;
			$autoplayTimeout    = ! empty( $scMeta['fmp_carousel_autoplay_timeout'] ) ? absint( $scMeta['fmp_carousel_autoplay_timeout'] ) : 5000;
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

	public function afterLoop( $scMeta ) {
		$layout = ( ! empty( $scMeta['fmp_layout'] ) ? $scMeta['fmp_layout'] : 'layout-free' );

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

	public static function defaultColumns( $layout ) {
		$columns = 2;

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
}
