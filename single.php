<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package minimalist_wp
 */

get_header();
?>

	<main id="main" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		// Get the Author bio
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'template-parts/author-bio' );
		endif;

		// the_post_navigation();
		minimalist_wp_post_navigation();
		

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
