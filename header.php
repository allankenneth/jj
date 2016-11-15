<!DOCTYPE html>
<html>
<head>
<!-- volans -->
        <title>J&amp;J Naturalists</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/wp-content/themes/jandj/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/wp-content/themes/jandj/style.css">
<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
<div class="navbar" role="navigation">
  <div class="containeri-fluid">
	<div class="pull-right">
		<a class="menushow" href="#">
			<span class="hidden-xs txt">Menu</span> &#9776;
		</a>
	</div>
	<div class="navbar-header">
		<a href="/">
			<?php if ( function_exists( 'the_logo' ) ) the_logo(); ?>
		</a>
	</div>

  </div>
</div>
<section class="container">
	<div class="row menupanel">
	<div id="blinkered" class="col-md-4">
<?php if ( is_active_sidebar( 'menu_widgets' ) ) : ?>
        <div class="card dark" role="complementary">
                <?php dynamic_sidebar( 'menu_widgets' ); ?>
		<div style="clear:both"></div>
        </div><!-- #menu-widgets -->
<?php endif; ?>

	</div>
	</div>
