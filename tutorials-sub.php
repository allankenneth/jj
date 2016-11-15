<?php
/*
Template Name: Sub Section
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

<?php
$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
$introCheck =explode(" ", $child_pages[0]->post_title);
if($introCheck[0] == "Introduction") $intro = true;
if($intro):
$firstChild = array_shift($child_pages);
?>
	<h2><?php echo $firstChild->post_title; ?></h2>
	<div class="">
	<?php echo $firstChild->post_excerpt ?>
	</div>
	<div class="">
	<a href="<?php echo  get_permalink($firstChild->ID); ?>" rel="bookmark" title="<?php echo $firstChild->post_title; ?>">
		Read More
	</a>
	</div>

<?php else: ?>

	<h2><?php the_title(); ?></h2>
	<div class="">
		<?php the_content() ?>
	</div>
<?php endif; ?>
<?php edit_post_link( __( 'Edit' )); ?>
<div class="clearboth"></div>
</div>
<div class="panel">
	<h2 class="commonspecies">Common Species</h2>

<div class="row">

<?php
if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild );
?>
	<div class="col-md-6">
		<a href="<?php echo  get_permalink($pageChild->ID); ?>" 
			rel="bookmark" 
			title="<?php echo $pageChild->post_title; ?>">
			<?php echo get_the_post_thumbnail($pageChild->ID, 'medium'); ?>
		</a>
		<div class="speciestitle">
		<a href="<?php echo  get_permalink($pageChild->ID); ?>">
			<?php echo $pageChild->post_title; ?><?php if(get_post_meta($pageChild->ID, "Latin", true)): ?>, <span class="latin"><?php echo get_post_meta($pageChild->ID, "Latin", true); ?></span><?php endif; ?>
		</a>
		</div>

	</div>
<?php endforeach; endif; ?>

</div>
</div>
<?php endwhile; ?>
</div></div>
<?php get_footer() ?>
