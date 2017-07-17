<?php
/*
Template Name: Blog index
*/
?>
<?php get_header() ?>
<div class="row">
<div class="col-md-4">
<div class="card">
<?php $eldest = array_pop(get_post_ancestors($post->ID)); ?>
<h2><a href="#"><?php echo get_the_title($eldest); ?></a></h2>
<div class="thumb">
	<?php if(!is_mobile()): ?>
	<?php echo get_the_post_thumbnail($eldest, 'medium'); ?>
	<?php endif; ?>
</div>
<div class="clearboth"></div>
</div>
	<?php if(!is_mobile()): ?>
<?php get_template_part( 'template-parts/menus', 'hardcoded' ); ?>
	<?php endif; ?>
</div>

<div class="col-md-8 col-lg-8">
<?php while ( have_posts() ) : the_post(); ?>
<div class="panel">
<?php the_content() ?>
</div>
<?php endwhile; ?>
<?php
wp_reset_query();
query_posts( array(
	'posts_per_page' => -1
) );
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="panel">
	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	<div class="date">
		<?php the_date() ?>
	</div>
	<div class="thumb">
	<a href="<?php the_permalink() ?>">
         <?php the_post_thumbnail('large') ?>
	</a>
	</div>
	<div class="content">
	<?php the_excerpt() ?>
	</div>
	<?php edit_post_link( __( 'Edit' )); ?>
</div>
<?php endwhile; ?>
</div>
</div>
<?php get_footer() ?>
