<?php get_header() ?>
<?php 
$args = array(
  'post_type' => 'page',
  'order' => 'asc', 
  'orderby' => 'menu_order',
  'post__in' => array(16,24,174,36)
  );
?>
<?php query_posts( $args ); ?>
<div class="section">
<div class="row">
<?php while ( have_posts() ) : the_post(); ?>
<?php
    $parent = $post->ID;
    $children = wp_list_pages("title_li=&child_of=" . $parent . "&depth=1&echo=0");
?>

<div class="col-sm-6 col-md-4 col-lg-4">
  <div class="card">
    <h2><?php the_title(); ?></h2>
    <div class="thumb" id="">
         <?php the_post_thumbnail('medium') ?>
    </div>
    <ul>
<?php
    echo $children;
?>
    </ul>
<div class="clearboth"></div>
</div>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<div class="col-sm-12 col-md-8">
<div class="card">
	<div class="row">
	<div class="col-md-9">
		<img src="/wp-content/uploads/2016/02/desktop_images.jpg" alt="placeholder">
	</div>
	<div class="col-md-3 shop">
	<?php get_template_part( 'template-parts/menus', 'shoptemp' ); ?>
	</div>
	</div>
	<div class="enjoy">
		<div>Enjoy beautiful desktop images and help support J &amp; J's website.</div>
		<div>A set of 52 for $4.95. Also available in 1080FHD, 4K and 5K displays</div>
	</div>
	<ul>
	<?php
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 1
		);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post();
			woocommerce_get_template_part( 'content', 'product' );
		endwhile;
	} else {
//		echo __( 'No products found' );
	}
	wp_reset_postdata();
	?>
	</ul>

</div>
</div>

</div>
</div>


<?php get_footer() ?>
