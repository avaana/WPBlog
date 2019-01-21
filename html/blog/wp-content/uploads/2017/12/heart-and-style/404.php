<?php get_header(); ?>

	<div id="content" class="col col-8">

		<h2><?php esc_html_e( 'Sorry, Nothing Found!', 'heart-and-style' ); ?></h2>
		<p><?php esc_html_e( 'The page you were looking for could not be found. Maybe try the search form below.', 'heart-and-style' ); ?></p>
		<?php get_search_form(); ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer();
