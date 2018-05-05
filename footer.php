<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minimalist_wp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( has_nav_menu( 'footer-menu' ) || has_nav_menu( 'social-menu' ) ) : ?>
			<div class="site-footer-menus">
				<?php
					wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );
					wp_nav_menu( array( 'theme_location' => 'social-menu' ) );
				?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			&copy; <?php echo date('Y'); ?> All Rights Reserved.
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
