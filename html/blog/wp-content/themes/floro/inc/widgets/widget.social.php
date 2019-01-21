<?php
/**
 * Widget API: Floro_Social_Widget class
 *
 * @package Floro
 * @since Floro 1.0
 */

// register widget
function floro_social_widget_register() {
	register_widget( 'floro_social_widget' );
} add_action( 'widgets_init', 'floro_social_widget_register' );

/**
 * Core class used to implement the widget
 *
 * @since 1.0
 *
 * @see WP_Widget
 */
class Floro_Social_Widget extends WP_Widget {

	/**
	 * Sets up a new widget instance
	 *
	 * @since 1.0
	 * @access public
	 */
	public function __construct() {
		parent::__construct(
			'floro_social_widget',
			esc_html__( 'Floro - Social', 'floro' ),
			array( 'description' => esc_html__( 'Show social links.', 'floro' ) )
		);
	}

	/**
	 * Outputs the content for the widget
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the widget
	 */
	public function widget( $args, $instance ) {
		
		extract( $args );

		// Apply filter on title
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		// Options
		$bg_image = empty( $instance['bg_image'] ) ? '' : $instance['bg_image'];
		$heading_primary = empty( $instance['heading_primary'] ) ? '' : $instance['heading_primary'];
		$heading_secondary = empty( $instance['heading_secondary'] ) ? '' : $instance['heading_secondary'];
		$facebook_url = empty( $instance['facebook_url'] ) ? '' : $instance['facebook_url'];
		$twitter_url = empty( $instance['twitter_url'] ) ? '' : $instance['twitter_url'];
		$pinterest_url = empty( $instance['pinterest_url'] ) ? '' : $instance['pinterest_url'];
		$instagram_url = empty( $instance['instagram_url'] ) ? '' : $instance['instagram_url'];

		// Output before widget
		echo $before_widget;

		// Output title
		if ( ! empty( $instance['title'] ) ) {
			echo $before_title . $title . $after_title;
		}

 		/**
		 * Output custom content
		 */
		?>

			<div class="social-widget" <?php if ( ! empty( $bg_image ) ) echo 'style="background-image:url(' . esc_url( $bg_image ) . ');"'; ?>>

				<?php if ( ! empty( $heading_primary ) ) : ?>
					<h4><?php echo esc_html( $heading_primary ); ?></h4>
				<?php endif; ?>

				<?php if ( ! empty( $heading_secondary ) ) : ?>
					<h5><?php echo esc_html( $heading_secondary ); ?></h5>
				<?php endif; ?>

				<?php if ( ! empty( $facebook_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-facebook" href="<?php echo esc_url( $facebook_url ); ?>"><span class="fa fa-facebook"></span><?php esc_html_e( 'Facebook', 'floro' ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $twitter_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-twitter" href="<?php echo esc_url( $twitter_url ); ?>"><span class="fa fa-twitter"></span><?php esc_html_e( 'Twitter', 'floro' ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $pinterest_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-pinterest" href="<?php echo esc_url( $pinterest_url ); ?>"><span class="fa fa-pinterest"></span><?php esc_html_e( 'Pinterest', 'floro' ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $instagram_url ) ) : ?>
					<a target="_blank" class="social-widget-link social-widget-instagram" href="<?php echo esc_url( $instagram_url ); ?>"><span class="fa fa-instagram"></span><?php esc_html_e( 'Instagram', 'floro' ); ?></a>
				<?php endif; ?>

			</div><!-- .social-widget -->

		<?php

		// Output after widget
		echo $after_widget;

	}

	/**
	 * Handles updating settings for the widget
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = sanitize_text_field( $new_instance['title'] );	
		$instance['bg_image'] = esc_url_raw( $new_instance['bg_image'] );
		$instance['heading_primary'] = sanitize_text_field( $new_instance['heading_primary'] );
		$instance['heading_secondary'] = sanitize_text_field( $new_instance['heading_secondary'] );
		$instance['facebook_url'] = esc_url_raw( $new_instance['facebook_url'] );
		$instance['twitter_url'] = esc_url_raw( $new_instance['twitter_url'] );
		$instance['pinterest_url'] = esc_url_raw( $new_instance['pinterest_url'] );
		$instance['instagram_url'] = esc_url_raw( $new_instance['instagram_url'] );

		return $instance;

	}

	/**
	 * Outputs the widget settings form.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {

		// Get values
		if ( isset( $instance[ 'title' ] ) ) $title = sanitize_text_field( $instance[ 'title' ] ); else $title = 'Social';
		if ( isset( $instance[ 'bg_image' ] ) ) $bg_image = sanitize_text_field( $instance[ 'bg_image' ] ); else $bg_image = '';
		if ( isset( $instance[ 'heading_primary' ] ) ) $heading_primary = sanitize_text_field( $instance[ 'heading_primary' ] ); else $heading_primary = 'Let\'s Connect!';
		if ( isset( $instance[ 'heading_secondary' ] ) ) $heading_secondary = sanitize_text_field( $instance[ 'heading_secondary' ] ); else $heading_secondary = 'Follow me on your favorite media';
		if ( isset( $instance[ 'facebook_url' ] ) ) $facebook_url = sanitize_text_field( $instance[ 'facebook_url' ] ); else $facebook_url = '';
		if ( isset( $instance[ 'twitter_url' ] ) ) $twitter_url = sanitize_text_field( $instance[ 'twitter_url' ] ); else $twitter_url = '';
		if ( isset( $instance[ 'pinterest_url' ] ) ) $pinterest_url = sanitize_text_field( $instance[ 'pinterest_url' ] ); else $pinterest_url = '';
		if ( isset( $instance[ 'instagram_url' ] ) ) $instagram_url = sanitize_text_field( $instance[ 'instagram_url' ] ); else $instagram_url = '';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'bg_image' ) ); ?>"><?php esc_html_e( 'BG Image URL:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bg_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bg_image' ) ); ?>" type="text" value="<?php echo esc_attr( $bg_image ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'heading_primary' ) ); ?>"><?php esc_html_e( 'Heading Primary:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'heading_primary' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'heading_primary' ) ); ?>" type="text" value="<?php echo esc_attr( $heading_primary ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'heading_secondary' ) ); ?>"><?php esc_html_e( 'Heading Secondary:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'heading_secondary' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'heading_secondary' ) ); ?>" type="text" value="<?php echo esc_attr( $heading_secondary ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>"><?php esc_html_e( 'Facebook URL:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_url' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>"><?php esc_html_e( 'Twitter URL:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_url' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_url' ) ); ?>"><?php esc_html_e( 'Pinterest URL:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_url' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>"><?php esc_html_e( 'Instagram URL:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_url' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>" />
		</p>

		<?php 

	}

}