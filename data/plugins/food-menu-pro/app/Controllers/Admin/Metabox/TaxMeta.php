<?php
/**
 * Admin Tax Metabox Class.
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
 * Admin Tax Metabox Class.
 */
class TaxMeta {
	use \RT\FoodMenuPro\Traits\SingletonTrait;

	/**
	 * Class Init.
	 *
	 * @return void
	 */
	protected function init() {
		// Add field to category.
		\add_action( 'food-menu-cat_add_form_fields', [ $this, 'add_category_fields' ] );
		\add_action( 'food-menu-cat_edit_form_fields', [ $this, 'edit_category_fields' ], 10 );

		// Save taxonomy fields.
		\add_action( 'created_term', [ $this, 'save_taxonomy_fields' ], 10, 3 );
		\add_action( 'edit_term', [ $this, 'save_taxonomy_fields' ], 10, 3 );
		\add_action( 'delete_term', [ $this, 'delete_taxonomy_fields' ], 5 );

		\add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );

		\add_action( 'quick_edit_custom_box', [ $this, 'taxonomy_quick_edit_order' ], 10, 2 );
		\add_action(
			'admin_print_footer_scripts-edit-tags.php',
			[
				$this,
				'taxonomy_quick_edit_order_javascript',
			]
		);
	}

	public function taxonomy_quick_edit_order_javascript() {
		$current_screen = get_current_screen();

		if ( $current_screen->id != 'edit-' . TLPFoodMenu()->taxonomies['category'] || $current_screen->taxonomy != TLPFoodMenu()->taxonomies['category'] ) {
			return;
		}

		wp_enqueue_script( 'jquery' );
		?>
		<script type="text/javascript">
			jQuery(function ($) {
				$('#the-list').on('click', 'button.editinline', function (e) {
					// e.preventDefault();
					var $tr = $(this).closest('tr'),
						order = $tr.find('td._fmp_order').text();
					// Update field
					$('tr.inline-edit-row :input[name="_order"]').val(order ? parseInt(order, 10) : 0);
				});
			});
		</script>
		<style>
			.fmp-quick-field-wrap:before,
			.fmp-quick-field-wrap:after {
				clear: both;
				display: block;
				content: "";
				float: none;
			}
		</style>
		<?php
	}

	public function taxonomy_quick_edit_order( $column_name, $screen ) {
		if ( $screen != 'edit-tags' || $column_name != '_fmp_order' || ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] !== TLPFoodMenu()->taxonomies['category'] ) {
			return false;
		}
		?>
		<div class="fmp-quick-field-wrap">
			<fieldset style="width: 50%; float: left">
				<div id="rtcl-taxonomy-content" class="inline-edit-col">
					<label>
						<span class="title"><?php esc_html_e( 'Order', 'food-menu-pro' ); ?></span>
						<span class="input-text-wrap"><input type="number" name="_order" value=""></span>
					</label>
				</div>
			</fieldset>
		</div>
		<?php
	}

	public function admin_enqueue_scripts() {
		global $pagenow, $typenow;

		// validate page.
		if ( ! in_array( $pagenow, [ 'edit-tags.php', 'term.php' ] ) ) {
			return;
		}

		if ( $typenow != TLPFoodMenu()->post_type ) {
			return;
		}

		wp_enqueue_media();
		wp_enqueue_script(
			[
				'jquery',
				'jquery-ui-core',
				'jquery-ui-sortable',
				'fmp-admin-taxonomy',
			]
		);

		wp_enqueue_style(
			[
				'fmp-admin',
			]
		);

		$nonce = wp_create_nonce( Fns::nonceText() );

		wp_localize_script(
			'fmp-admin',
			'fmp_var',
			[
				'nonceID' => esc_attr( Fns::nonceId() ),
				'nonce'   => esc_attr( $nonce ),
				'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			]
		);
	}

	/**
	 * save_taxonomy_fields function.
	 *
	 * @param mixed  $term_id Term ID being saved
	 * @param mixed  $tt_id
	 * @param string $taxonomy
	 */
	public function save_taxonomy_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
		if ( isset( $_POST['fmp_cat_thumbnail_id'] ) && TLPFoodMenu()->taxonomies['category'] === $taxonomy ) {
			update_term_meta( $term_id, 'fmp_cat_thumbnail_id', absint( $_POST['fmp_cat_thumbnail_id'] ) );
		}

		if ( isset( $_POST['_order'] ) && TLPFoodMenu()->taxonomies['category'] === $taxonomy ) {
			update_term_meta( $term_id, '_order', absint( $_POST['_order'] ) );
		} else {
			update_term_meta( $term_id, '_order', 0 );
		}
	}

	public function delete_taxonomy_fields() {}

	/**
	 * Category thumbnail fields.
	 */
	public function add_category_fields() {
		?>
		<div class="form-field">
			<label><?php esc_html_e( 'Order', 'food-menu-pro' ); ?></label>
			<input type="number" name="_order" value="0">
		</div>
		<div class="form-field term-thumbnail-wrap">
			<label><?php esc_html_e( 'Thumbnail', 'food-menu-pro' ); ?></label>
			<div id="fmp_cat_thumbnail" style="float: left; margin-right: 10px;">
				<img src="<?php echo esc_url( Fns::placeholder_img_src() ); ?>" width="60px" height="60px"/>
			</div>
			<div style="line-height: 60px;">
				<input type="hidden" id="fmp_cat_thumbnail_id" name="fmp_cat_thumbnail_id"/>
				<button type="button"
					class="upload_image_button button">
					<?php
					esc_html_e( 'Upload/Add image', 'food-menu-pro' );
					?>
				</button>
				<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'food-menu-pro' ); ?></button>
			</div>
			<script type="text/javascript">
				// Only show the "remove image" button when needed
				if (!jQuery('#fmp_cat_thumbnail_id').val()) {
					jQuery('.remove_image_button').hide();
				}

				// Uploading files
				var file_frame;

				jQuery(document).on('click', '.upload_image_button', function (event) {

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if (file_frame) {
						file_frame.open();
						return;
					}

					// Create the media frame.
					file_frame = wp.media.frames.downloadable_file = wp.media({
						title: '<?php esc_html_e( 'Choose an image', 'food-menu-pro' ); ?>',
						button: {
							text: '<?php esc_html_e( 'Use image', 'food-menu-pro' ); ?>'
						},
						multiple: false
					});

					// When an image is selected, run a callback.
					file_frame.on('select', function () {
						var attachment = file_frame.state().get('selection').first().toJSON();

						jQuery('#fmp_cat_thumbnail_id').val(attachment.id);
						jQuery('#fmp_cat_thumbnail').find('img').attr('src', attachment.sizes.thumbnail.url);
						jQuery('.remove_image_button').show();
					});

					// Finally, open the modal.
					file_frame.open();
				});

				jQuery(document).on('click', '.remove_image_button', function () {
					jQuery('#fmp_cat_thumbnail').find('img').attr('src', '<?php echo esc_js( Fns::placeholder_img_src() ); ?>');
					jQuery('#fmp_cat_thumbnail_id').val('');
					jQuery('.remove_image_button').hide();
					return false;
				});

				jQuery(document).ajaxComplete(function (event, request, options) {
					if (request && 4 === request.readyState && 200 === request.status
						&& options.data && 0 <= options.data.indexOf('action=add-tag')) {

						var res = wpAjax.parseAjaxResponse(request.responseXML, 'ajax-response');
						if (!res || res.errors) {
							return;
						}
						// Clear Thumbnail fields on submit
						jQuery('#fmp_cat_thumbnail').find('img').attr('src', '<?php echo esc_js( Fns::placeholder_img_src() ); ?>');
						jQuery('#fmp_cat_thumbnail_id').val('');
						jQuery('.remove_image_button').hide();
						// Clear Display type field on submit
						jQuery('#display_type').val('');
						return;
					}
				});

			</script>
			<div class="clear"></div>
		</div>
		<?php
	}

	/**
	 * Edit category thumbnail field.
	 *
	 * @param mixed $term Term (category) being edited
	 */
	public function edit_category_fields( $term ) {
		$thumbnail_id = absint( get_term_meta( $term->term_id, 'fmp_cat_thumbnail_id', true ) );
		$order        = absint( get_term_meta( $term->term_id, '_order', true ) );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = Fns::placeholder_img_src();
		}
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Order', 'food-menu-pro' ); ?></label></th>
			<td><input type="number" name="_order" value="<?php echo esc_attr( $order ); ?>"></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'food-menu-pro' ); ?></label></th>
			<td>
				<div id="fmp_cat_thumbnail" style="float: left; margin-right: 10px;"><img
							src="<?php echo esc_url( $image ); ?>" width="60px" height="60px"/></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="fmp_cat_thumbnail_id" name="fmp_cat_thumbnail_id" value="<?php echo absint( $thumbnail_id ); ?>"/>
					<button type="button"
						class="upload_image_button button">
						<?php
						esc_html_e( 'Upload/Add image', 'food-menu-pro' );
						?>
					</button>
					<button type="button"
						class="remove_image_button button">
						<?php
						esc_html_e( 'Remove image', 'food-menu-pro' );
						?>
					</button>
				</div>
				<script type="text/javascript">
					// Only show the "remove image" button when needed
					if ('0' === jQuery('#fmp_cat_thumbnail_id').val()) {
						jQuery('.remove_image_button').hide();
					}

					// Uploading files
					var file_frame;

					jQuery(document).on('click', '.upload_image_button', function (event) {
						event.preventDefault();
						// If the media frame already exists, reopen it.
						if (file_frame) {
							file_frame.open();
							return;
						}
						// Create the media frame.
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php esc_html_e( 'Choose an image', 'food-menu-pro' ); ?>',
							button: {
								text: '<?php esc_html_e( 'Use image', 'food-menu-pro' ); ?>'
							},
							multiple: false
						});

						// When an image is selected, run a callback.
						file_frame.on('select', function () {
							var attachment = file_frame.state().get('selection').first().toJSON();

							jQuery('#fmp_cat_thumbnail_id').val(attachment.id);
							jQuery('#fmp_cat_thumbnail').find('img').attr('src', attachment.sizes.thumbnail.url);
							jQuery('.remove_image_button').show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery(document).on('click', '.remove_image_button', function () {
						jQuery('#fmp_cat_thumbnail').find('img').attr('src', '<?php echo esc_js( Fns::placeholder_img_src() ); ?>');
						jQuery('#fmp_cat_thumbnail_id').val('');
						jQuery('.remove_image_button').hide();
						return false;
					});

				</script>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}
}
