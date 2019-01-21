<?php

// Register Widget
add_action( 'widgets_init', create_function( '', 'register_widget( "heart_and_style_about_author_widget" );' ) );

// Widget Class
class Heart_And_Style_About_Author_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'heart_and_style_about_author_widget', // Base ID
			__( 'MeridianThemes - About Author', 'heart-and-style' ), // Name
			array( 'description' => __( 'Show info about the author.', 'heart-and-style' ) ) // Args
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
		$author_image = $instance['author_image'];
		$name = $instance['name'];
		$position = $instance['position'];
		$text = $instance['text'];
		$button_url = $instance['button_url'];
		$button_text = $instance['button_text'];

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;

		/* Start - Widget Content */

		?>

			<div class="about-author-widget <?php if ( $author_image == '' ) echo 'about-author-widget-no-avatar'; ?>">

				<?php if ( $author_image !== '' ) : ?>
					<div class="about-author-widget-avatar"><img src="<?php echo esc_attr( $author_image ); ?>" alt="<?php echo esc_html( $name ); ?>" /></div>
					<div class="about-author-widget-avatar-overlay"></div>
				<?php endif; ?>
				<div class="about-author-widget-info">
					<h2 class="about-author-widget-name"><?php echo esc_html( $name ); ?></h2>
					<h3 class="about-author-widget-position"><?php echo esc_html( $position ); ?></h3>
					<div class="about-author-widget-text"><?php echo esc_html( $text ); ?></div>
					<?php if ( isset( $button_url ) && strlen( $button_url ) > 0 ) : ?>
						<div class="about-author-widget-button">
							<a href="<?php echo esc_attr( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
						</div><!-- .about-author-widget-button -->
					<?php endif; ?>
				</div><!-- .about-author-widget-info -->

			</div><!-- .about-author-widget -->

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
			
		$instance['author_image'] = strip_tags( $new_instance['author_image'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['position'] = strip_tags( $new_instance['position'] );
		$instance['text'] = strip_tags( $new_instance['text'] );
		$instance['button_url'] = strip_tags( $new_instance['button_url'] );
		$instance['button_text'] = strip_tags( $new_instance['button_text'] );

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
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ]; else $title = 'About Me';
		if ( isset( $instance[ 'author_image' ] ) ) $author_image = $instance[ 'author_image' ]; else $author_image = '';
		if ( isset( $instance[ 'name' ] ) ) $name = $instance[ 'name' ]; else $name = 'Hi! My name is Elizabeth.';
		if ( isset( $instance[ 'position' ] ) ) $position = $instance[ 'position' ]; else $position = 'Fashion Designer';
		if ( isset( $instance[ 'text' ] ) ) $text = $instance[ 'text' ]; else $text = 'Etiam porta elit mi, quis viverra dui aliquet ultricies. Nulla non tortor ac nisi ultrices.';
		if ( isset( $instance[ 'button_url' ] ) ) $button_url = $instance[ 'button_url' ]; else $button_url = '';
		if ( isset( $instance[ 'button_text' ] ) ) $button_text = $instance[ 'button_text' ]; else $button_text = 'LEARN MORE';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_image' ) ); ?>"><?php _e( 'Author Image URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_image' ) ); ?>" type="text" value="<?php echo esc_attr( $author_image ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php _e( 'Heading Title:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'position' ) ); ?>"><?php _e( 'Heading Subtitle:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'position' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'position' ) ); ?>" type="text" value="<?php echo esc_attr( $position ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php _e( 'Author Description:', 'heart-and-style' ); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo esc_html( $text ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><?php _e( 'Button URL:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php _e( 'Button Text:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
		</p>
		

		<?php 

	}

}