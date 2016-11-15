<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'widgets' );
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_theme_support( 'custom-background');
add_filter( 'logo_customizer_default_logo', function() {
    return '/wp-content/themes/jandj/images/logo.png';
} );
function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post','page') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');
/**
 * Register our sidebars and widgetized areas.
 *
 */
function jandj_widgets_init() {

	register_sidebar( array(
		'name'          => 'Menu Widgets',
		'id'            => 'menu_widgets',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<div>',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'Home shop area',
		'id'            => 'home_shop_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	

}
add_action( 'widgets_init', 'jandj_widgets_init' );
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
