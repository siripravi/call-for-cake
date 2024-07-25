<?php
/**
 * Helpers class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Helpers;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Models\FMPFood;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Helpers class.
 */
class FnsPro {
	/**
	 * Render view.
	 *
	 * @param string  $viewName View name.
	 * @param array   $args View args.
	 * @param boolean $return View return.
	 * @return string|void
	 */
	public static function renderView( $viewName, $args = [], $return = false ) {
		$viewName = str_replace( '.', '/', $viewName );

		if ( ! empty( $args ) && is_array( $args ) ) {
			extract( $args );
		}

		$view_file = FMP()->pro_plugin_path() . '/resources/' . $viewName . '.php';

		if ( ! file_exists( $view_file ) ) {
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', esc_html( $view_file ) ), '1.7.0' );

			return;
		}

		if ( $return ) {
			ob_start();
			include $view_file;

			return ob_get_clean();
		} else {
			include $view_file;
		}
	}

	/**
	 * Insert Array.
	 *
	 * @param array $array Array.
	 * @param int   $position Position.
	 * @param array $insert_array Insert array.
	 * @return array
	 */
	public static function array_insert( $array, $position, $insert_array ) {
		$first_array = array_splice( $array, 0, $position + 1 );
		$array       = array_merge( $first_array, $insert_array, $array );

		return $array;
	}

	/**
	 * Food
	 *
	 * @param string $food Food.
	 * @return void|object
	 */
	public static function food( $food = null ) {
		return new FMPFood( $food );
	}

	/**
	 * Get nutrition list.
	 *
	 * @param int $post_id Post ID.
	 * @return void|string
	 */
	public static function get_fm_nutrition_list( $post_id = null ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		$post_id = absint( $post_id );

		$html      = null;
		$nutrition = get_post_meta( $post_id, '_nutrition' );

		if ( ! empty( $nutrition ) ) {
			$html .= '<ul>';
			foreach ( $nutrition as $nutrition ) {
				$nut   = ! empty( $nutrition['id'] ) ? get_term( $nutrition['id'], TLPFoodMenu()->taxonomies['nutrition'] ) : null;
				$unit  = ! empty( $nutrition['unit_id'] ) ? get_term( $nutrition['unit_id'], TLPFoodMenu()->taxonomies['unit'] ) : null;
				$value = ! empty( $nutrition['value'] ) ? ' ' . $nutrition['value'] : null;

				if ( is_object( $unit ) && ! empty( $unit->name ) && $value ) {
					$unit = " ( {$unit->name} )";
				} else {
					$unit = null;
				}

				if ( is_object( $nut ) ) {
					$html .= "<li>{$nut->name}{$value}{$unit}</li>";
				}
			}
			$html .= '</ul>';
		};

		return $html;
	}

	/**
	 * @param null $post_id
	 *
	 * @return null|string
	 */
	public static function get_fm_ingredient_list( $post_id = null ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		$post_id = absint( $post_id );

		$html        = null;
		$ingredients = get_post_meta( $post_id, '_ingredient' );

		if ( ! empty( $ingredients ) ) {
			$html .= '<ul>';
			foreach ( $ingredients as $ingredient ) {
				$ing   = ! empty( $ingredient['id'] ) ? get_term( $ingredient['id'], TLPFoodMenu()->taxonomies['ingredient'] ) : null;
				$unit  = ! empty( $ingredient['unit_id'] ) ? get_term( $ingredient['unit_id'], TLPFoodMenu()->taxonomies['unit'] ) : null;
				$value = ! empty( $ingredient['value'] ) ? ' ' . $ingredient['value'] : null;

				if ( is_object( $unit ) && $unit->name && $value ) {
					$unit = " ( {$unit->name} )";
				} else {
					$unit = null;
				}

				if ( is_object( $ing ) ) {
					$html .= "<li>{$ing->name}{$value}{$unit}</li>";
				}
			}
			$html .= '</ul>';
		};

		return $html;
	}

	/**
	 * Returns the product tags.
	 *
	 * @param int    $id ID.
	 * @param string $sep Seperator.
	 * @param string $before Before.
	 * @param string $after After.
	 *
	 * @return array
	 */
	public static function get_tags( $id, $sep = ', ', $before = '', $after = '' ) {
		return get_the_term_list( $id, TLPFoodMenu()->taxonomies['tag'], $before, $sep, $after );
	}

	/**
	 * Pagination
	 *
	 * @param string  $pages Pages.
	 * @param integer $range Range.
	 * @param boolean $ajax Ajax.
	 * @param string  $scID Shortcode ID.
	 * @return string
	 */
	public static function pagination( $pages = '', $range = 4, $ajax = false, $scID = '' ) {
		$html      = null;
		$showitems = ( $range * 2 ) + 1;

		global $paged;

		if ( is_front_page() ) {
			$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
		} else {
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		}

		if ( empty( $paged ) ) {
			$paged = 1;
		}

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) {
				$pages = 1;
			}
		}

		$ajaxClass = null;
		$dataAttr  = null;

		if ( $ajax ) {
			$ajaxClass = ' fmp-ajax';
			$dataAttr  = "data-sc-id='{$scID}' data-paged='1'";
		}

		if ( 1 != $pages ) {
			$html .= '<div class="fmp-pagination' . $ajaxClass . '" ' . $dataAttr . '>';
			$html .= '<ul class="pagination-list">';

			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				$html .= "<li><a data-paged='1' href='" . get_pagenum_link( 1 ) . "' aria-label='First'>&laquo;</a></li>";
			}

			if ( $paged > 1 && $showitems < $pages ) {
				$p     = $paged - 1;
				$html .= "<li><a data-paged='{$p}' href='" . get_pagenum_link( $p ) . "' aria-label='Previous'>&lsaquo;</a></li>";
			}

			for ( $i = 1; $i <= $pages; $i ++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					$html .= ( $paged == $i ) ? '<li class="active"><span>' . $i . '</span></li>' : "<li><a data-paged='{$i}' href='" . get_pagenum_link( $i ) . "'>" . $i . '</a></li>';
				}
			}

			if ( $paged < $pages && $showitems < $pages ) {
				$p     = $paged + 1;
				$html .= "<li><a data-paged='{$p}' href=\"" . get_pagenum_link( $paged + 1 ) . "\"  aria-label='Next'>&rsaquo;</a></li>";
			}

			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				$html .= "<li><a data-paged='{$pages}' href='" . get_pagenum_link( $pages ) . "' aria-label='Last'>&raquo;</a></li>";
			}

			$html .= '</ul>';
			$html .= '</div>';
		}

		return $html;
	}

	public static function getStockStatus( $id = null ) {
		if ( $id ) {
			$id = absint( $id );
		} else {
			$id = get_the_ID();
		}

		$stock     = get_post_meta( $id, '_stock_status', true );
		$stockHtml = null;
		$fmp_type  = get_post_meta( $id, '_fmp_type', true );

		if ( 'variable' === $fmp_type ) {
			$stockHtml = '<span class="na">–</span>';
		} else {
			if ( $stock == 'instock' ) {
				$stockHtml = '<mark class="instock">In stock</mark>';
			} elseif ( $stock == 'outofstock' ) {
				$stockHtml = '<mark class="outofstock">Out of stock</mark>';
			}
		}

		return $stockHtml;
	}

	public static function fmpHtmlPrice( $id = null ) {
		if ( $id ) {
			$id = absint( $id );
		} else {
			global $post;
			$id = $post->ID;
		}

		$price_html         = null;
		$sale_price_html    = null;
		$regular_price_html = null;
		$regular_price      = get_post_meta( $id, '_regular_price', true );
		$sale_price         = get_post_meta( $id, '_sale_price', true );

		if ( $regular_price > 0 ) {
			$fRegularPrice      = self::getPriceWithSymbol( $regular_price );
			$regular_price_html = '<span class="fmp-price-amount amount">' . $fRegularPrice . '</span>';
		}

		if ( $sale_price > 0 ) {
			$fSalePrice      = self::getPriceWithSymbol( $sale_price );
			$sale_price_html = '<span class="fmp-price-amount amount">' . $fSalePrice . '</span>';
		} elseif ( $sale_price == '' ) {
			$sale_price_html = null;
		} elseif ( $sale_price == 0 ) {
			$sale_price_html = '<span class="amount">' . esc_html__( 'Free!', 'food-menu-pro' ) . '</span>';
		}

		if ( $regular_price_html && $sale_price_html ) {
			$price_html = '<del>' . $regular_price_html . '</del>' . '<inc>' . $sale_price_html . '</inc>';
		} elseif ( ! $regular_price_html && $sale_price_html ) {
			$price_html = $sale_price_html;
		} elseif ( $regular_price_html && ! $sale_price_html ) {
			$price_html = $regular_price_html;
		}

		$fmp_type = get_post_meta( $id, '_fmp_type', true );

		if ( 'variable' === $fmp_type ) {
			$vPrices    = [];
			$variations = get_posts(
				[
					'post_type'      => 'fmp_variation',
					'posts_per_page' => -1,
					'post_status'    => 'any',
					'post_parent'    => $id,
					'order'          => 'ASC',
				]
			);

			if ( ! empty( $variations ) ) {
				foreach ( $variations as $variation ) {
					$vp = get_post_meta( $variation->ID, '_price', true );
					if ( $vp ) {
						$vPrices[] = $vp;
					}
				}

				if ( ! empty( $vPrices ) && count( $vPrices ) > 1 ) {
					$max        = self::getPriceWithSymbol( max( $vPrices ) );
					$min        = self::getPriceWithSymbol( min( $vPrices ) );
					$price_html = $min . ' - ' . $max;
				} elseif ( ! empty( $vPrices ) && count( $vPrices ) == 1 ) {
					$price_html = self::getPriceWithSymbol( max( $vPrices ) );
				} else {
					$price_html = "<span class='na'>–</span>";
				}
			}
		}

		return $price_html;
	}

	public static function get_formatted_amount( $amount ) {
		$settings      = get_option( TLPFoodMenu()->options['settings'] );
		$thousands_sep = isset( $settings['price_thousand_sep'] ) ? stripslashes( $settings['price_thousand_sep'] ) : ',';
		$decimal_sep   = isset( $settings['price_decimal_sep'] ) ? stripslashes( $settings['price_decimal_sep'] ) : '.';
		$decimals      = isset( $settings['price_num_decimals'] ) ? absint( $settings['price_num_decimals'] ) : 2;

		$un_formatted_price = $amount;
		$negative           = $amount < 0;
		$amount             = apply_filters( 'fmp_raw_amount', floatval( $negative ? $amount * -1 : $amount ) );
		$amount             = apply_filters( 'fmp_formatted_amount', number_format( $amount, $decimals, $decimal_sep, $thousands_sep ) );

		if ( apply_filters( 'fmp_price_trim_zeros', false, $decimals ) && $decimals > 0 ) {
			$amount = self::trim_zeros( $amount, $decimal_sep );
		}

		return apply_filters( 'fmp_get_formatted_amount', $amount, $un_formatted_price, $decimals, $decimal_sep, $thousands_sep );
	}

	public static function trim_zeros( $amount, $decimal_sep ) {
		return preg_replace( '/' . preg_quote( $decimal_sep, '/' ) . '0++$/', '', $amount );
	}

	public static function getPriceWithSymbol( $price ) {
		$price     = self::get_formatted_amount( $price );
		$currencyP = Fns::getCurrencyPosition();
		$symbol    = '<span class="fmp-price-currencySymbol">' . Fns::getCurrencySymbol() . '</span>';

		switch ( $currencyP ) {
			case 'left':
				$price = $symbol . $price;
				break;

			case 'right':
				$price = $price . $symbol;
				break;

			case 'left_space':
				$price = $symbol . ' ' . $price;
				break;

			case 'right_space':
				$price = $price . ' ' . $symbol;
				break;

			default:
				break;
		}

		return $price;
	}

	public static function fmp_clean( $var ) {
		if ( is_array( $var ) ) {
			return array_map( [ $this, 'fmp_clean' ], $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}

	public static function getAllFmpIsoFilterType() {
		return [
			'default' => esc_html__( 'Layout Default', 'food-menu-pro' ),
			'type-1'  => esc_html__( 'Type 1', 'food-menu-pro' ),
			'type-2'  => esc_html__( 'Type 2', 'food-menu-pro' ),
			'type-3'  => esc_html__( 'Type 3', 'food-menu-pro' ),
		];
	}
}
