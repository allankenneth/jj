<?php
/*
Template Name: Species
*/
?>

<?php get_header() ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="row">
<div class="col-md-4">
<div class="card">
<?php $eldest = array_pop(get_post_ancestors($post->ID)); ?>
<h2><?php echo get_the_title($eldest); ?></h2>
<div class="thumb">
	<?php if(!is_mobile()): ?>
	<?php echo get_the_post_thumbnail($eldest, 'medium'); ?>
	<?php endif; ?>
</div>
<ul>
<?php
$children = wp_list_pages("title_li=&child_of=" . $eldest . "&echo=0&depth=1");
echo $children;
?> 
</ul>
<div class="clearboth"></div>
</div>
	<?php if(!is_mobile()): ?>
<?php get_template_part( 'template-parts/menus', 'hardcoded' ); ?>
	<?php endif; ?>
</div>

<div class="col-md-8 col-lg-8">
  <div class="panel">


    <div class="thumb">
         <?php the_post_thumbnail('large') ?>
    </div>
	<div class="speciestitle">
		<?php the_title() ?>, <em><?php echo get_post_meta($post->ID, 'Latin', true); ?></em>
	</div>
	<div class="meta">
	<?php the_meta(); ?>
	</div>
	<div class="content">
	<?php the_content() ?>
	</div>
	<div class="row" style="display:none">
		<div class="col-md-6">
			<?php previous_post_link(); ?>
		</div>
		<div class="col-md-6">
			<?php next_post_link(); ?>
		</div>
	</div>
<?php edit_post_link( __( 'Edit' )); ?>
<div class="clearboth"></div>
<?php endwhile; ?>

<?php ?>
</div>

<?php
$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
// print_r($child_pages);
// The following is a bit weird; the_title and edit_post_link 
// all echo the immediate parents values and not the child pages.
// Accessing the object directly seems to work for the title, 
// and the_content works as expected, but it's screwy somehow.
//
foreach($child_pages as $kid):?>
<div class="panel">
<?php setup_postdata($kid) ?>
<header>
<h1><?php echo $kid->post_title ?></h1>
</header>
<section>
<?php the_content() ?>
</section>
</div>
<?php endforeach ?>
</div>
<?php get_footer() ?>
