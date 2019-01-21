<?php
/**
 * Template for displaying 404 page
 *
 * @package Floro
 * @since Floro 1.0
 */

get_header(); ?>

	<div id="content" class="col col-8" role="main">

		<h1 class="page-title"><?php esc_html_e( 'Sorry, Nothing Found!', 'floro' ); ?></h1>
		<p><?php esc_html_e( 'The page you were looking for could not be found. Maybe try the search form below.', 'floro' ); ?></p>
		<?php get_search_form(); ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer();
