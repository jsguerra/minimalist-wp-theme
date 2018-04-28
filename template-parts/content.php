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
	
	<?php
		if ( has_post_thumbnail() ) {
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-thumb' );
			if ( ! empty( $image_url[0] ) ) {
				$image_url = esc_url( $image_url[0] );
			}
		} else {
			$image_url = get_template_directory_uri() . '/images/default-travel.jpg';
		}
	?>

	<div class="entry-thumbnail" style="background-image: url('<?php echo $image_url; ?>');">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true"></a>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
