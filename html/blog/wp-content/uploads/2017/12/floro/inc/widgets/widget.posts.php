<?php
/**
 * Widget API: Floro_Posts_List_Widget class
 *
 * @package Floro
 * @since Floro 1.0
 */

// register widget
function floro_posts_list_widget_register() {
	register_widget( 'floro_posts_list_widget' );
} add_action( 'widgets_init', 'floro_posts_list_widget_register' );

/**
 * Core class used to implement the widget
 *
 * @since 1.0
 *
 * @see WP_Widget
 */
class Floro_Posts_List_Widget extends WP_Widget {

	/**
	 * Sets up a new widget instance
	 *
	 * @since 1.0
	 * @access public
	 */
	public function __construct() {
		parent::__construct(
			'floro_posts_list_widget',
			esc_html__( 'Floro - Posts List', 'floro' ),
			array( 'description' => esc_html__( 'Show recent or popular posts.', 'floro' ) )
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
		$amount = ( ! empty( $instance['amount'] ) ) ? absint( $instance['amount'] ) : 2;
		if ( ! $amount )
			$amount = 2;

		$type = empty( $instance['type'] ) ? 'recent' : $instance['type'];

		// Output before widget
		echo $before_widget;

		// Output title
		if ( ! empty( $instance['title'] ) ) {
			echo $before_title . $title . $after_title;

		}

		/**
		 * Output custom content
		 */

		// General args
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $amount,
			'orderby' => 'date',
		);

		// Order by comment count
		if ( $type == 'popular' ) {
			$args['orderby'] = 'comment_count';
		}

		// Do the query
		$floro_query = new WP_Query( $args );

		// If there are posts
		if ( $floro_query->have_posts() ) :

			?>

			<div class="posts-list-widget">

				<?php while ( $floro_query->have_posts() ) : $floro_query->the_post(); ?>

					<div class="posts-list-widget-post">

						<div class="posts-list-widget-thumb">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'floro-posts-widget' ); ?></a>
						</div><!-- .posts-list-widget-thumb -->

						<div class="posts-list-widget-main">

							<div class="posts-list-widget-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
							<div class="posts-list-widget-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							<div class="posts-list-widget-comments"><span class="fa fa-comments"></span><?php comments_number( esc_html__( 'No comments', 'floro' ), esc_html__( 'One comment', 'floro' ), esc_html__( '% comments', 'floro' ) ); ?></div>

						</div><!-- .posts-list-widget-main -->

					</div><!-- .posts-list-widget-post -->

				<?php endwhile; ?>

			</div><!-- .posts-list-widget -->

			<?php

		// End if there are posts
		endif;

		// Reset post data
		wp_reset_postdata();

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
		$instance['amount'] = sanitize_text_field( $new_instance['amount'] );
		
		if ( in_array( $new_instance['type'], array( 'recent', 'popular' ) ) ) {
			$instance['type'] = $new_instance['type'];
		} else {
			$instance['type'] = 'recent';
		}

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
		if ( isset( $instance[ 'title' ] ) ) $title = sanitize_text_field( $instance[ 'title' ] ); else $title = 'Recent Posts';
		if ( isset( $instance[ 'amount' ] ) ) $amount = sanitize_text_field( $instance[ 'amount' ] ); else $amount = '2';
		if ( isset( $instance[ 'type' ] ) ) $type = sanitize_text_field( $instance[ 'type' ] ); else $type = 'recent';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>"><?php esc_html_e( 'Amount:', 'floro' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="text" value="<?php echo esc_attr( $amount ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e( 'Type:', 'floro' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>">
				<option <?php selected( $type, 'recent' ); ?> value="recent"><?php esc_html_e( 'Recent', 'floro' ); ?></option>
				<option <?php selected( $type, 'popular' ); ?> value="popular"><?php esc_html_e( 'Popular ( by comment count )', 'floro' ); ?></option>
			</select>
		</p>
		<?php 

	}

}