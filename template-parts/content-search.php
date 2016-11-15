<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
	<header class="col-md-8 col-md-offset-2">
		<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	</div>
	<div class="row">
	<div class="col-md-4 col-md-offset-2">
	<a href="<?php the_permalink() ?>">
	<?php the_post_thumbnail('medium'); ?>
	</a>
	</div>
	<div class="col-md-4">
	<?php the_excerpt(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php //the_entry_meta(); ?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
	</div>
	</div>
</article><!-- #post-## -->

