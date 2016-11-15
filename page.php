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


    <h2><?php the_title(); ?></h2>
		<?php the_content() ?>
<?php edit_post_link( __( 'Edit' )); ?>
<div class="clearboth"></div>
</div>
<?php
$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
if ( $child_pages ) : 
echo '<div class="panel">';
foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild );
?>
<div class="row">
	<div class="col-md-6">
	<a href="<?php echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">
		<?php echo get_the_post_thumbnail($pageChild->ID, 'medium'); ?>
	</a>
	</div>
	<div class="col-md-6">
	<div>
	<a class="childtitle" href="<?php echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">
		<?php echo $pageChild->post_title; ?>
	</a>
	</div>
	<div class="excerpt"><?php echo $pageChild->post_excerpt ?></div>
	</div>
</div>
<hr style="border:0;height:0"/>
<?php endforeach; endif; ?>
<?php if ( $child_pages ) : ?>
</div>
<?php endif; ?>
<?php endwhile; ?>
</div></div>
<?php get_footer() ?>
