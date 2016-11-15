<?php get_header() ?>
<div class="row">
<div class="col-md-3">
<div class="card">
<h2>Sidebar</h2>
</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<div class="col-md-9 col-lg-9">
  <div class="card">
    <h2><?php the_title(); ?></h2>
    <div class="thumb">
         <?php the_post_thumbnail('medium') ?>
    </div>
	<div class="content">
	<?php the_content() ?>
	</div>
<?php
    $parent = $post->ID;
    $children = wp_list_pages("title_li=&child_of=" . $parent . "&echo=0");
    echo $children;
?>
<?php edit_post_link( __( 'Edit' )); ?>
<div class="clearboth"></div>
</div>
</div>
<?php endwhile; ?>
</div>
<?php get_footer() ?>
