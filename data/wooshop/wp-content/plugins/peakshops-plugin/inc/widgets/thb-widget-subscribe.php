<?php
// Subscribe
class thb_widget_subscribe extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_subscribe',
			'description' => esc_html__( 'Display a Subscribe Box', 'peakshops' ),
		);

		parent::__construct(
			'thb_subscribe_widget',
			esc_html__( 'Peak Shops - Subscribe', 'peakshops' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'       => '',
			'description' => '',
		);
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		// Before Widget.
		echo $args['before_widget'];

		?>
		<aside class="thb-newsletter-form">
			<?php
			// Title.
			if ( $params['title'] ) {
				echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $params['title'], $instance, $this->id_base ) . $args['after_title'] );
			}
			?>
			<?php
			if ( $params['description'] ) {
				echo wp_kses_post( wpautop( $params['description'] ) ); }
			?>
			<form class="newsletter-form" action="#" method="post" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_subscription' ) ); ?>">
				<input placeholder="<?php esc_attr_e( 'Your E-Mail', 'peakshops' ); ?>" type="email" name="widget_subscribe" class="widget_subscribe">
				<button type="submit" name="submit" class="btn accent"><?php esc_html_e( 'SUBSCRIBE', 'peakshops' ); ?></button>
				<?php do_action( 'thb_after_newsletter_submit' ); ?>
			</form>
			<?php do_action( 'thb_after_newsletter_form' ); ?>
		</aside>
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

			<!-- Content -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Short Description:', 'peakshops' ); ?></label>
				<textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" class="widefat" rows="5"><?php echo esc_textarea( $params['description'] ); ?></textarea>
			</p>
		<?php
	}
}
