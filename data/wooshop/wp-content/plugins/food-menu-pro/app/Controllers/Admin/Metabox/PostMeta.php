<?php
/**
 * Admin Post Metabox Class.
 *
 * @package RT_FoodMenuPro
 */

namespace RT\FoodMenuPro\Controllers\Admin\Metabox;

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenu\Helpers\Options;
use RT\FoodMenuPro\Helpers\FnsPro;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Admin Post Metabox Class.
 */
class PostMeta {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		\add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ], 10 );
		\add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		\add_action( 'add_meta_boxes', [ $this, 'remove_meta_boxes' ], 10 );
		\add_action( 'add_meta_boxes', [ $this, 'rename_meta_boxes' ], 20 );
		\add_action( 'save_post', [ $this, 'save_meta_boxes' ], 10, 2 );
	}

	/**
	 * Admin Enqueue Scripts.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		global $pagenow, $typenow;

		// Validate page.
		if ( ! in_array( $pagenow, [ 'post.php', 'post-new.php', 'edit.php' ] ) ) {
			return;
		}

		if ( $typenow != TLPFoodMenu()->post_type ) {
			return;
		}

		wp_dequeue_script( 'autosave' );
		$select2Id = 'fmp-select2';

		if ( class_exists( 'WPSEO_Admin_Asset_Manager' ) && class_exists( 'Avada' ) ) {
			$select2Id = 'yoast-seo-select2';
		} elseif ( class_exists( 'WPSEO_Admin_Asset_Manager' ) ) {
			$select2Id = 'yoast-seo-select2';
		} elseif ( class_exists( 'Avada' ) ) {
			$select2Id = 'select2-avada-js';
		} elseif ( class_exists( 'wp_megamenu_base' ) ) {
			wp_dequeue_script( 'wpmm-select2' );
			wp_dequeue_script( 'wpmm_scripts_admin' );
		}

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'ace_code_highlighter_js' );
		wp_enqueue_script( 'ace_mode_js' );
		wp_enqueue_script( 'fmp-accounting' );
		wp_enqueue_script( $select2Id );
		wp_enqueue_script( 'fmp-admin-food' );
		wp_enqueue_script( 'fmp-admin' );

		wp_enqueue_style( 'fm-select2' );
		wp_enqueue_style( 'fm-admin' );
		wp_enqueue_style( 'fmp-admin' );

		$units    = get_terms(
			[
				'taxonomy'   => TLPFoodMenu()->taxonomies['unit'],
				'hide_empty' => false,
				'orderby'    => 'name',
				'order'      => 'ASC',
			]
		);
		$unitList = [];

		if ( ! empty( $units ) ) {
			foreach ( $units as $unit ) {
				$unitList[ $unit->term_id ] = $unit->name;
			}
		}

		$nonce = wp_create_nonce( Fns::nonceText() );

		wp_localize_script(
			'fmp-admin',
			'fmp_var',
			[
				'nonceID' => esc_attr( Fns::nonceId() ),
				'nonce'   => esc_attr( $nonce ),
				'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
				'units'   => $unitList,
			]
		);
	}

	/**
	 * Remove bloat.
	 *
	 * @return void
	 */
	public function remove_meta_boxes() {
		remove_meta_box( 'tagsdiv-' . TLPFoodMenu()->taxonomies['ingredient'], TLPFoodMenu()->post_type, 'side' );
		remove_meta_box( 'tagsdiv-' . TLPFoodMenu()->taxonomies['nutrition'], TLPFoodMenu()->post_type, 'side' );
		remove_meta_box( 'tagsdiv-' . TLPFoodMenu()->taxonomies['unit'], TLPFoodMenu()->post_type, 'side' );
		remove_meta_box( 'pageparentdiv', TLPFoodMenu()->post_type, 'side' );
		remove_meta_box( 'commentsdiv', TLPFoodMenu()->post_type, 'normal' );
		remove_meta_box( 'commentstatusdiv', TLPFoodMenu()->post_type, 'side' );
		remove_meta_box( 'commentstatusdiv', TLPFoodMenu()->post_type, 'normal' );
	}

	/**
	 * Rename Meta Box.
	 *
	 * @return void
	 */
	public function rename_meta_boxes() {
		global $post;

		// Comments/Reviews.
		if ( isset( $post ) && ( 'publish' == $post->post_status || 'private' == $post->post_status ) ) {
			remove_meta_box( 'commentsdiv', 'product', 'normal' );

			add_meta_box( 'commentsdiv', esc_html__( 'Reviews', 'food-menu-pro' ), 'post_comment_meta_box', 'product', 'normal' );
		}
	}

	/**
	 * Save Meta Box.
	 *
	 * @param int    $post_id Post ID.
	 * @param object $post Post object.
	 * @return void
	 */
	public function save_meta_boxes( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! Fns::verifyNonce() ) {
			return $post_id;
		}

		if ( TLPFoodMenu()->post_type != $post->post_type ) {
			return $post_id;
		}

		$mates = Fns::singleFoodMetaFields();

		foreach ( $mates as $metaKey => $field ) {
			if ( $metaKey === 'menu_order' ) {
				continue;
			}

			$rValue = isset( $_REQUEST[ $metaKey ] ) ? $_REQUEST[ $metaKey ] : null;
			$value  = Fns::sanitize( $field, $rValue );

			if ( empty( $field['multiple'] ) ) {
				update_post_meta( $post_id, $metaKey, $value );
			} else {
				delete_post_meta( $post_id, $metaKey );

				if ( is_array( $value ) && ! empty( $value ) ) {
					foreach ( $value as $item ) {
						add_post_meta( $post_id, $metaKey, $item );
					}
				}
			}
		}

		// Ingredients.
		delete_post_meta( $post_id, '_ingredient' );

		if ( ! empty( $_POST['_ingredient'] ) ) {
			foreach ( $_POST['_ingredient'] as $id => $ingredient ) {
				$item = [
					'id'      => $id,
					'unit_id' => ! empty( $ingredient['unit_id'] ) ? $ingredient['unit_id'] : null,
					'value'   => ! empty( $ingredient['value'] ) ? $ingredient['value'] : null,
				];

				add_post_meta( $post_id, '_ingredient', $item );
			}
		}

		// Nutritions.
		delete_post_meta( $post_id, '_nutrition' );

		if ( ! empty( $_POST['_nutrition'] ) ) {
			foreach ( $_POST['_nutrition'] as $id => $ingredient ) {
				$item = [
					'id'      => $id,
					'unit_id' => ! empty( $ingredient['unit_id'] ) ? $ingredient['unit_id'] : null,
					'value'   => ! empty( $ingredient['value'] ) ? $ingredient['value'] : null,
				];

				add_post_meta( $post_id, '_nutrition', $item );
			}
		}

		$meta = [];

		// Gallery image.
		$meta['_fmp_image_gallery'] = isset( $_POST['fmp_image_gallery'] ) ? array_filter(
			explode(
				',',
				FnsPro::fmp_clean( $_POST['fmp_image_gallery'] )
			)
		) : [];

		$regular_price = get_post_meta( $post_id, '_regular_price', true );
		$sale_price    = get_post_meta( $post_id, '_sale_price', true );

		// Update price if on sale.
		if ( '' !== $sale_price ) {
			$meta['_price'] = $sale_price;
		} else {
			$meta['_price'] = $regular_price;
		}

		foreach ( $meta as $key => $value ) {
			update_post_meta( $post->ID, $key, $value );
		}

	}

	/**
	 * Add Meta Boxes
	 *
	 * @return void
	 */
	public function add_meta_boxes() {
		add_meta_box(
			'fmp-food-data',
			esc_html__( 'Food Data', 'food-menu-pro' ),
			[ $this, 'fmp_food_data' ],
			TLPFoodMenu()->post_type,
			'normal',
			'high'
		);

		add_meta_box(
			'postexcerpt',
			esc_html__( 'Excerpt', 'food-menu-pro' ),
			[ $this, 'fmp_excerpt' ],
			TLPFoodMenu()->post_type,
			'normal'
		);

		add_meta_box(
			'fmp-meta-images',
			esc_html__( 'Gallery', 'food-menu-pro' ),
			[ $this, 'fmp_food_images' ],
			TLPFoodMenu()->post_type,
			'side',
			'low'
		);
	}

	/**
	 * Meta Box Callback.
	 *
	 * @param object $post Post Object.
	 * @return void
	 */
	public function fmp_food_data( $post ) {
		wp_nonce_field( Fns::nonceText(), Fns::nonceId() );
		?>
		<div class="fmp-meta-data-container">
			<div class="panel-wrapper fmp-panel-wrapper fmp-clear">
				<ul class="fmp_data_tabs fmp-tabs">
					<li class="general_options fmp_options_tab active">
						<a href="#general_fmp_data"><span><?php esc_html_e( 'General', 'food-menu-pro' ); ?></span></a>
					</li>
					<li class="ingredient_options fmp_options_tab">
						<a href="#ingredient_fmp_data"><span><?php esc_html_e( 'Ingredient', 'food-menu-pro' ); ?></a>
					</li>
					<li class="nutrition_options fmp_options_tab">
						<a href="#nutrition_fmp_data"><span><?php esc_html_e( 'Nutrition', 'food-menu-pro' ); ?></a>
					</li>
					<li class="advanced_options fmp_options_tab">
						<a href="#advanced_fmp_data"><span><?php esc_html_e( 'Advanced', 'food-menu-pro' ); ?></a>
					</li>
				</ul>
				<div class="panel fmp_options_panel fmp-metaboxes-wrapper" id="general_fmp_data" style="display: block">

					<?php Fns::print_html( Fns::rtFieldGenerator( Options::foodGeneralOptions() ), true ); ?>

					<div class="variation-wrapper fmp-hidden">
						<div class="toolbar toolbar-top">
							<button type="button" class="button add_variation"><?php esc_html_e( 'Add Variation', 'food-menu-pro' ); ?></button>
						</div>
						<div class="fmp_variations">
							<?php
							$variations = get_posts(
								[
									'post_type'      => 'fmp_variation',
									'posts_per_page' => -1,
									'post_status'    => 'any',
									'post_parent'    => $post->ID,
									'order'          => 'ASC',
								]
							);
							if ( ! empty( $variations ) ) {
								foreach ( $variations as $variation ) {
									$variation_id    = $variation->ID;
									$variation_name  = get_post_meta( $variation_id, '_name', true );
									$variation_price = get_post_meta( $variation_id, '_price', true );
									$flug            = 'closed';
									FnsPro::renderView(
										'variation',
										[
											'variation_name' => $variation_name,
											'variation_price' => $variation_price,
											'variation_id' => $variation_id,
										]
									);
								}
							}
							?>
						</div>
						<div class="toolbar">
							<button class="button save_variations button-primary" type="button">
								<?php esc_html_e( 'Save Variations', 'food-menu-pro' ); ?>
							</button>
						</div>
					</div>
				</div>
				<div class="panel fmp_options_panel hidden" id="ingredient_fmp_data">
					<?php
					$metaIngredients    = get_post_meta( $post->ID, '_ingredient' );
					$excludeIngredients = [];

					if ( ! empty( $metaIngredients ) ) {
						foreach ( $metaIngredients as $item ) {
							$excludeIngredients[] = $item['id'];
						}
					}

					$ingredients = get_terms(
						[
							'taxonomy'   => TLPFoodMenu()->taxonomies['ingredient'],
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
							'exclude'    => $excludeIngredients,
						]
					);
					$units       = get_terms(
						[
							'taxonomy'   => TLPFoodMenu()->taxonomies['unit'],
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
						]
					);
					?>
					<div class="ingredient-wrapper">
						<div id="ingredient-container" class="fmp-clear fmp-lists-container">
							<ul id="fmp-active-ing-list" class="fmp-active-list fmp-sortable-list fmp-clear"
								data-title="Active Ingredient">
								<?php
								if ( ! empty( $metaIngredients ) ) {
									foreach ( $metaIngredients as $ingredient ) {
										$ingTerm     = get_term(
											! empty( $ingredient['id'] ) ? absint( $ingredient['id'] ) : 0,
											TLPFoodMenu()->taxonomies['ingredient']
										);
										$unit_id     = ! empty( $ingredient['unit_id'] ) ? absint( $ingredient['unit_id'] ) : 0;
										$ingValue    = ! empty( $ingredient['value'] ) ? absint( $ingredient['value'] ) : null;
										$ingTermID   = ! empty( $ingTerm->term_id ) ? $ingTerm->term_id : null;
										$ingTermName = ! empty( $ingTerm->name ) ? $ingTerm->name : null;

										echo "<li class='fmp-sortable-item active-item' data-id='{$ingTermID}'>" .
											"<label>{$ingTermName}</label>" .
											"<div class='fmp-sortable-item-values'>" .
											"<input type='text' class='item-value' name='_ingredient[{$ingTermID}][value]' value='{$ingValue}'>" .
											"<select name='_ingredient[{$ingTermID}][unit_id]' class='item-unit'>" .
											"<option value=''>Unit</option>";

										if ( ! empty( $units ) ) {
											foreach ( $units as $unit ) {
												$sel = ( $unit_id == $unit->term_id ? ' selected' : null );
												echo "<option value='{$unit->term_id}'{$sel}>{$unit->name}</option>";
											}
										}

										echo '</select>' .
											'</div>' .
											'</li>';
									}
								}
								?>
							</ul>
							<ul id="fmp-available-ing-list"
								class="fmp-available-list fmp-sortable-list fmp-clear"
								data-title="Available Ingredient">
								<li class="fmp-item-search with-title">
									<label class="fmp-search-label">
										<span>Search Ingredient</span>
										<input type="text" placeholder="Search">
									</label>
								</li>
								<?php
								if ( ! empty( $ingredients ) ) {
									foreach ( $ingredients as $ing ) {
										echo "<li class='fmp-sortable-item available-item' data-id='{$ing->term_id}'>" .
											"<label>{$ing->name}</label><div class='fmp-sortable-item-values'></div>" .
											'</li>';
									}
								}
								?>
							</ul>
						</div>
					</div> <!-- End Ingredient wrapper -->
				</div> <!-- End Ingredient panel -->
				<div class="panel fmp_options_panel hidden" id="nutrition_fmp_data">
					<?php
					$metaNutritionList = get_post_meta( $post->ID, '_nutrition' );
					$excludeNutrition  = [];
					if ( ! empty( $metaNutritionList ) ) {
						foreach ( $metaNutritionList as $item ) {
							$excludeNutrition[] = $item['id'];
						}
					}

					$nutritionList = get_terms(
						[
							'taxonomy'   => TLPFoodMenu()->taxonomies['nutrition'],
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
							'exclude'    => $excludeNutrition,
						]
					);

					$units = get_terms(
						[
							'taxonomy'   => TLPFoodMenu()->taxonomies['unit'],
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
						]
					);
					?>
					<div class="nutrition-wrapper">
						<div id="nutrition-container" class="fmp-clear fmp-lists-container">
							<ul id="fmp-active-nutrition-list" class="fmp-active-list fmp-sortable-list fmp-clear"
								data-title="Active Nutrition">
								<?php
								if ( ! empty( $metaNutritionList ) ) {
									foreach ( $metaNutritionList as $nutrition ) {
										$nutTerm = get_term(
											! empty( $nutrition['id'] ) ? absint( $nutrition['id'] ) : 0,
											TLPFoodMenu()->taxonomies['nutrition']
										);

										$unit_id     = ! empty( $nutrition['unit_id'] ) ? absint( $nutrition['unit_id'] ) : 0;
										$nutValue    = ! empty( $nutrition['value'] ) ? absint( $nutrition['value'] ) : null;
										$nutTermID   = ! empty( $nutTerm->term_id ) ? $nutTerm->term_id : null;
										$nutTermName = ! empty( $nutTerm->name ) ? $nutTerm->name : null;

										echo "<li class='fmp-sortable-item active-item' data-id='{$nutTermID}'>" .
											"<label>{$nutTermName}</label>" .
											"<div class='fmp-sortable-item-values'>" .
											"<input type='text' class='item-value' name='_nutrition[{$nutTermID}][value]' value='{$nutValue}'>" .
											"<select name='_nutrition[{$nutTermID}][unit_id]' class='item-unit'>" .
											"<option value=''>Unit</option>";

										if ( ! empty( $units ) ) {
											foreach ( $units as $unit ) {
												$sel = ( $unit_id == $unit->term_id ? ' selected' : null );
												echo "<option value='{$unit->term_id}'{$sel}>{$unit->name}</option>";
											}
										}

										echo '</select>' .
											'</div>' .
											'</li>';
									}
								}
								?>
							</ul>
							<ul id="fmp-available-ing-list"
								class="fmp-available-list fmp-sortable-list fmp-clear"
								data-title="Available Nutrition">
								<li class="fmp-item-search with-title">
									<label class="fmp-search-label">
										<span>Search Nutrition</span>
										<input type="text" placeholder="Search">
									</label>
								</li>
								<?php
								if ( ! empty( $nutritionList ) ) {
									foreach ( $nutritionList as $nutrition ) {
										echo "<li class='fmp-sortable-item available-item' data-id='{$nutrition->term_id}'>" .
											"<label>{$nutrition->name}</label><div class='fmp-sortable-item-values'></div>" .
											'</li>';
									}
								}
								?>
							</ul>
						</div>
					</div>  <!-- End nutrition wrapper -->
				</div> <!-- End nutrition -->
				<div class="panel fmp_options_panel" id="advanced_fmp_data">
					<?php Fns::print_html( Fns::rtFieldGenerator( Options::foodAdvancedOptions() ), true ); ?>
				</div><!-- End advanced -->
			</div>
		</div>
		<?php
	}

	/**
	 * Meta Box Callback.
	 *
	 * @param object $post Post Object.
	 * @return void
	 */
	public function fmp_excerpt( $post ) {
		$settings = [
			'textarea_name' => 'excerpt',
			'quicktags'     => [ 'buttons' => 'em,strong,link' ],
			'tinymce'       => [
				'theme_advanced_buttons1' => 'bold,italic,strikethrough,separator,bullist,numlist,separator,blockquote,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,separator,undo,redo,separator',
				'theme_advanced_buttons2' => '',
			],
			'editor_css'    => '<style>#wp-excerpt-editor-container .wp-editor-area{height:175px; width:100%;}</style>',
		];

		wp_editor(
			htmlspecialchars_decode( $post->post_excerpt ),
			'excerpt',
			apply_filters( 'woocommerce_product_short_description_editor_settings', $settings )
		);
	}

	/**
	 * Meta Box Callback.
	 *
	 * @param object $post Post Object.
	 * @return void
	 */
	public function fmp_food_images( $post ) {
		?>
		<div id="fmp_images_container">
			<ul class="fmp_images">
				<?php
				$attachments = get_post_meta( $post->ID, '_fmp_image_gallery', true );

				$update_meta         = false;
				$updated_gallery_ids = [];
				if ( ! empty( $attachments ) ) {
					foreach ( $attachments as $attachment_id ) {
						$attachment = wp_get_attachment_image( $attachment_id, 'thumbnail' );

						// if attachment is empty skip.
						if ( empty( $attachment ) ) {
							$update_meta = true;
							continue;
						}

						echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
							' . $attachment . '
							<ul class="actions">
								<li><a href="#" class="delete tips" data-tip="' . esc_attr__(
								'Delete image',
								'food-menu-pro'
							) . '">' . esc_html__( 'Delete', 'food-menu-pro' ) . '</a></li>
							</ul>
						</li>';

						// rebuild ids to be saved.
						$updated_gallery_ids[] = $attachment_id;
					}

					// need to update product meta to set new gallery ids.
					if ( $update_meta ) {
						update_post_meta( $post->ID, '_fmp_image_gallery', $updated_gallery_ids );
					}
				}
				?>
			</ul>

			<input type="hidden" id="fmp_image_gallery" name="fmp_image_gallery" value="<?php echo ! empty( $attachments ) ? esc_attr( implode( ',', $attachments ) ) : ''; ?>"/>

		</div>
		<p class="add_fmp_images hide-if-no-js">
			<a href="#" data-choose="<?php esc_attr_e( 'Add Images to Gallery', 'food-menu-pro' ); ?>"
				data-update="<?php esc_attr_e( 'Add to gallery', 'food-menu-pro' ); ?>"
				data-delete="<?php esc_attr_e( 'Delete image', 'food-menu-pro' ); ?>"
				data-text="<?php esc_attr_e( 'Delete', 'food-menu-pro' ); ?>">
				<?php
				esc_html_e( 'Add gallery images', 'food-menu-pro' );
				?>
			</a>
		</p>
		<?php
	}
}
