<?php

add_action( 'widgets_init', create_function( '', 'register_widget( "heart_and_style_posts_list_widget" );' ) );
class Heart_And_Style_Posts_List_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'heart_and_style_posts_list_widget', // Base ID
			__( 'MeridianThemes - Posts List', 'heart-and-style' ), // Name
			array( 'description' => __( 'Show recent or popular posts.', 'heart-and-style' ) ) // Args
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
		
		$amount = $instance['amount'];
		$type = $instance['type'];

		// Order by
		$orderby = 'date';
		if ( $type == 'popular' ) {
			$orderby = 'comment_count';
		}

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;

		/* Start - Widget Content */

		// General args
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $amount,
			'orderby' => $orderby,
			'ignore_sticky_posts' => true,
		);

		// order by view count
		if ( $type == 'popular_views' ) {
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = 'meridian_viewed_count';
		}

		$heart_and_style_query = new WP_Query( $args );

		if ( $heart_and_style_query->have_posts() ) :

			?>

			<div class="posts-list-widget">

				<?php while ( $heart_and_style_query->have_posts() ) : $heart_and_style_query->the_post(); ?>

					<div class="posts-list-widget-post">

						<div class="posts-list-widget-thumb">
							<?php
								$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
								$thumb_url = $thumb_url[0];
								$img_alt = heart_and_style_get_attachment_alt( get_post_thumbnail_id() );
							?>
							<a href="<?php the_permalink(); ?>"><img src="<?php $res_img = heart_and_style_aq_resize( $thumb_url, 600, 9999, false ); echo esc_attr( $res_img ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>
						</div><!-- .posts-list-widget-thumb -->

						<div class="posts-list-widget-main">

							<div class="posts-list-widget-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
							<div class="posts-list-widget-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							<div class="posts-list-widget-comments"><span class="fa fa-comments"></span><?php comments_number( __( 'No comments', 'heart-and-style' ), __( 'One comment', 'heart-and-style' ), __( '% comments', 'heart-and-style' ) ); ?></div>

						</div><!-- .posts-list-widget-main -->

					</div><!-- .posts-list-widget-post -->

				<?php endwhile; ?>

			</div><!-- .posts-list-widget -->

			<?php

		endif;

		wp_reset_postdata();

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
		$instance['amount'] = strip_tags( $new_instance['amount'] );
		$instance['type'] = strip_tags( $new_instance['type'] );

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
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ]; else $title = 'Recent Posts';
		if ( isset( $instance[ 'amount' ] ) ) $amount = $instance[ 'amount' ]; else $amount = '2';
		if ( isset( $instance[ 'type' ] ) ) $type = $instance[ 'type' ]; else $type = 'recent';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>"><?php _e( 'Amount:', 'heart-and-style' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="text" value="<?php echo esc_attr( $amount ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php _e( 'Type:', 'heart-and-style' ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>">
				<option <?php if ( $type == 'recent' ) echo 'selected="selected"'; ?> value="recent"><?php _e( 'Recent', 'heart-and-style' ); ?></option>
				<option <?php if ( $type == 'popular' ) echo 'selected="selected"'; ?> value="popular"><?php _e( 'Popular ( by comment count )', 'heart-and-style' ); ?></option>
				<option <?php if ( $type == 'popular_views' ) echo 'selected="selected"'; ?> value="popular_views"><?php _e( 'Popular ( by view count )', 'heart-and-style' ); ?></option>
			</select>
		</p>
		<?php 

	}

}