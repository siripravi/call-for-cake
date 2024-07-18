<?php
// thb Social Links.
class thb_widget_social_links extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_social_links',
			'description' => esc_html__( 'Display your social links defined inside Appearance > Theme Options.', 'peakshops' ),
		);

		parent::__construct(
			'thb_social_links_widget',
			esc_html__( 'Peak Shops - Social Links', 'peakshops' ),
			$widget_ops
		);

		$this->defaults = array(
			'style' => 'style1',
			'title' => '',
		);
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		$class[] = 'thb-social-links-element thb-social-links-widget';
		$class[] = $params['style'];

		// Before Widget.
		echo $args['before_widget'];

		// Title.
		if ( $params['title'] ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $params['title'], $instance, $this->id_base ) . $args['after_title'] );
		}

		?>
		<div class="<?php echo esc_attr( implode( ' ', $class ) ); ?>">
		  <?php thb_get_social_list( false, $params['style'] ); ?>
	  </div>
		<?php

		echo $args['after_widget'];
	}
	function update( $new_instance, $old_instance ) {
		$instance = $new_instance;

		return $instance;
	}
	function form( $instance ) {
		$params = array_merge( $this->defaults, $instance );

		?>
			<!-- Title -->
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'peakshops' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $params['title'] ); ?>" /></p>

			<!-- Style -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Style', 'peakshops' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" class="widefat">
					<option value="style1" <?php selected( $params['style'], 'style1' ); ?>><?php esc_html_e( 'Style - 1', 'peakshops' ); ?></option>
					<option value="style2" <?php selected( $params['style'], 'style2' ); ?>><?php esc_html_e( 'Style - 2', 'peakshops' ); ?></option>
					<option value="style3" <?php selected( $params['style'], 'style3' ); ?>><?php esc_html_e( 'Style - 3', 'peakshops' ); ?></option>
					<option value="style4" <?php selected( $params['style'], 'style4' ); ?>><?php esc_html_e( 'Style - 4', 'peakshops' ); ?></option>
				</select>
			</p>

		<?php
	}
}
