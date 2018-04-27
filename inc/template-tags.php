<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package minimalist_wp
 */

if ( ! function_exists( 'minimalist_wp_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function minimalist_wp_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			$time_updated = '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Published %s', 'post date', 'minimalist-wp' ),
			$time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'minimalist_wp_updated_on' )) :
	/**
	 * Prints HTML with meta information for the updated post-date/time.
	 */
	function minimalist_wp_updated_on() {
		$time_modified = '%2$s';
		$time_modified = sprintf( $time_modified,
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			echo '<span class="updated-on">Updated ' . $time_modified . '</span>';
		}
	}
endif;

if ( ! function_exists( 'minimalist_wp_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function minimalist_wp_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'minimalist-wp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'minimalist_wp_share_buttons' )) :
	/**
	 * Prints HTML links with Social Media Share Buttons.
	 */
	function minimalist_wp_share_buttons() {
		// Get current page URL 
		$minimalistURL = urlencode(get_permalink());
 
		// Get current page title
		$minimalistTitle = str_replace( ' ', '%20', get_the_title());

		$twitterURL = 'https://twitter.com/intent/tweet?text='.$minimalistTitle.'&amp;url='.$minimalistURL.'&amp;via=JoseGuerraUK';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$minimalistURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$minimalistURL.'&amp;title='.$minimalistTitle;

		// Add sharing button at the end of page/page content
		$shareButton = '<div class="share-buttons">';
		$shareButton .= '<a class="icon icon-facebook" href="'.$facebookURL.'" target="_blank"></a>';
		$shareButton .= '<a class="icon icon-twitter" href="'. $twitterURL .'" target="_blank"></a>';
		$shareButton .= '<a class="icon icon-linkedin" href="'.$linkedInURL.'" target="_blank"></a>';
		$shareButton .= '</div>';

		// Print the Share Buttons
		echo $shareButton;
	}
endif;

if ( ! function_exists( 'minimalist_wp_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function minimalist_wp_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'minimalist-wp' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'minimalist-wp' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'minimalist-wp' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'minimalist-wp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

function minimalist_wp_category() {
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'minimalist-wp' ) );
	if ( $categories_list ) {
		/* translators: 1: list of categories. */
		printf( '<span class="cat-links">' . esc_html__( '%1$s', 'minimalist-wp' ) . '</span>', $categories_list ); // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'minimalist_wp_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function minimalist_wp_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('featured-img'); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'medium', array(
							'alt' => the_title_attribute( array(
								'echo' => false,
							) ),
						) );
					else :
						echo '<img src="https://placehold.it/300x250/" alt="place holder" />';
					endif;
				?>
			</a>			

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Post navigation (previous / next post) for single posts.
 */
function minimalist_wp_post_navigation() {
	the_post_navigation( array(
		'next_text' => '<div><span class="meta-nav" aria-hidden="true">' . __( 'Next', 'minimalist_wp' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'minimalist_wp' ) . '</span> ' .
			'<span class="post-title">%title</span></div><div class="nav-arrow">&rsaquo;</div>',
		'prev_text' => '<div class="nav-arrow">&lsaquo;</div><div><span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'minimalist_wp' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'minimalist_wp' ) . '</span> ' .
			'<span class="post-title">%title</span></div>',
	) );
}