<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalist_wp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			minimalist_wp_category();
            the_title( '<h1 class="entry-title">', '</h1>' );
        ?>

        <div class="entry-meta">
            <?php
                minimalist_wp_posted_on();
                minimalist_wp_posted_by();
                minimalist_wp_updated_on();
                minimalist_wp_share_buttons();
            ?>
        </div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php minimalist_wp_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'minimalist-wp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minimalist-wp' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php minimalist_wp_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
