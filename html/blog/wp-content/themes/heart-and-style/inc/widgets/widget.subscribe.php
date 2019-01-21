<?php

// Register Widget
add_action( 'widgets_init', create_function( '', 'register_widget( "heart_and_style_subscribe_widget" );' ) );

// Widget Class
class Heart_And_Style_Subscribe_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'heart_and_style_subscribe_widget', // Base ID
			__( 'MeridianThemes - Subscribe', 'heart-and-style' ), // Name
			array( 'description' => __( 'Show subscription form.', 'heart-and-style' ) ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		// Options
		$bg_image = $instance['bg_image'];
		$heading_primary = $instance['heading_primary'];
		$heading_secondary = $instance['heading_secondary'];
		$subscribe_id = $instance['subscribe_id'];

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;

		/* Start - Widget Content */

		?>

			<div class="subscribe-widget" <?php if ( $bg_image != '' ) echo 'style="background-image:url(' . $bg_image . ');"'; ?>>

				<h4><?php echo esc_html( $heading_primary ); ?></h4>
				<h5><?php echo esc_html( $heading_secondary ); ?></h5>

				<?php echo do_shortcode( '[wysija_form id="' . $subscribe_id . '"]' ); ?>

			</div><!-- .subscribe-widget -->

		<?php

		/* End - Widget Content */

		echo $after_widget;

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
			
		$instance['bg_image'] = strip_tags( $new_instance['bg_image'] );
		$instance['heading_primary'] = strip_tags( $new_instance['heading_primary'] );
		$instance['heading_secondary'] = strip_tags( $new_instance['heading_secondary'] );
		$instance['subscribe_id'] = strip_tags( $new_instance['subscribe_id'] );
	

		return $instance;

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		// Get values
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ]; else $title = 'Subscribe';
		if ( isset( $instance[ 'bg_image' ] ) ) $bg_image = $instance[ 'bg_image' ]; else $bg_image = '';
		if ( isset( $instance[ 'heading_primary' ] ) ) $heading_primary = $instance[ 'heading_primary' ]; else $heading_primary = 'Join The Tribe!';
		if ( isset( $instance[ 'heading_secondary' ] ) ) $heading_secondary = $instance[ 'heading_secondary' ]; else $heading_secondary = 'Subscribe to the newsletter';
		if ( isset( $instance[ 'subscribe_id' ] ) ) $subscribe_id = $instance[ 'subscribe_id' ]; else $subscribe_id = '';
		

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'bg_image' ) ); ?>"><?php _e( 'BG Image URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bg_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_image' ) ); ?>" type="text" value="<?php echo esc_attr( $bg_image ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'heading_primary' ) ); ?>"><?php _e( 'Heading Primary:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'heading_primary' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'heading_primary' ) ); ?>" type="text" value="<?php echo esc_attr( $heading_primary ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'heading_secondary' ) ); ?>"><?php _e( 'Heading Secondary:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'heading_secondary' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'heading_secondary' ) ); ?>" type="text" value="<?php echo esc_attr( $heading_secondary ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'subscribe_id' ) ); ?>"><?php _e( 'Subscribe ID ( mailpoet ):', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subscribe_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subscribe_id' ) ); ?>" type="text" value="<?php echo esc_attr( $subscribe_id ); ?>" />
		</p>

		<?php 

	}

}