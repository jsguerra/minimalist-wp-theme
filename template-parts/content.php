<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalist_wp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('item-article'); ?>>
	<div class="entry-container">
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="entry-meta">
				<?php
					minimalist_wp_posted_on();
					minimalist_wp_posted_by();
					minimalist_wp_updated_on();
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt();
			?>
		</div><!-- .entry-content -->
	</div>
	<div class="entry-thumbnail">
		<?php minimalist_wp_post_thumbnail(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
