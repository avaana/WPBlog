<?php

// Register Widget
add_action( 'widgets_init', create_function( '', 'register_widget( "heart_and_style_social_widget" );' ) );

// Widget Class
class Heart_And_Style_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'heart_and_style_social_widget', // Base ID
			__( 'MeridianThemes - Social', 'heart-and-style' ), // Name
			array( 'description' => __( 'Show social links.', 'heart-and-style' ) ) // Args
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
		$facebook_url = $instance['facebook_url'];
		$twitter_url = $instance['twitter_url'];
		$pinterest_url = $instance['pinterest_url'];
		$instagram_url = $instance['instagram_url'];

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;

		/* Start - Widget Content */

		?>

			<div class="social-widget" <?php if ( $bg_image != '' ) echo 'style="background-image:url(' . $bg_image . ');"'; ?>>

				<h4><?php echo esc_html( $heading_primary ); ?></h4>
				<h5><?php echo esc_html( $heading_secondary ); ?></h5>

				<?php if ( ! empty( $facebook_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-facebook" href="<?php echo esc_url( $facebook_url ); ?>"><span class="fa fa-facebook"></span><?php _e( 'Facebook', 'heart-and-style' ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $twitter_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-twitter" href="<?php echo esc_url( $twitter_url ); ?>"><span class="fa fa-twitter"></span><?php _e( 'Twitter', 'heart-and-style' ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $pinterest_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-pinterest" href="<?php echo esc_url( $pinterest_url ); ?>"><span class="fa fa-pinterest"></span><?php _e( 'Pinterest', 'heart-and-style' ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $instagram_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-instagram" href="<?php echo esc_url( $instagram_url ); ?>"><span class="fa fa-instagram"></span><?php _e( 'Instagram', 'heart-and-style' ); ?></a>
				<?php endif; ?>

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
		$instance['facebook_url'] = strip_tags( $new_instance['facebook_url'] );
		$instance['twitter_url'] = strip_tags( $new_instance['twitter_url'] );
		$instance['pinterest_url'] = strip_tags( $new_instance['pinterest_url'] );
		$instance['instagram_url'] = strip_tags( $new_instance['instagram_url'] );
	

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
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ]; else $title = 'Social';
		if ( isset( $instance[ 'bg_image' ] ) ) $bg_image = $instance[ 'bg_image' ]; else $bg_image = '';
		if ( isset( $instance[ 'heading_primary' ] ) ) $heading_primary = $instance[ 'heading_primary' ]; else $heading_primary = 'Let\'s Connect!';
		if ( isset( $instance[ 'heading_secondary' ] ) ) $heading_secondary = $instance[ 'heading_secondary' ]; else $heading_secondary = 'Follow me on your favorite media';
		if ( isset( $instance[ 'facebook_url' ] ) ) $facebook_url = $instance[ 'facebook_url' ]; else $facebook_url = '';
		if ( isset( $instance[ 'twitter_url' ] ) ) $twitter_url = $instance[ 'twitter_url' ]; else $twitter_url = '';
		if ( isset( $instance[ 'pinterest_url' ] ) ) $pinterest_url = $instance[ 'pinterest_url' ]; else $pinterest_url = '';
		if ( isset( $instance[ 'instagram_url' ] ) ) $instagram_url = $instance[ 'instagram_url' ]; else $instagram_url = '';
		

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>"><?php _e( 'Facebook URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_url' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>"><?php _e( 'Twitter URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_url' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_url' ) ); ?>"><?php _e( 'Pinterest URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_url' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>"><?php _e( 'Instagram URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_url' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>" />
		</p>

		<?php 

	}

}