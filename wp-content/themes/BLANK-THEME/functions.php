<?php
//add menu bar to the dashboard
add_theme_support( 'menus' );
//add theme support for post_thumbnails
add_theme_support( 'post-thumbnails' );
//custom function that changes the default excerpt() length once we edit the function to the  add-filter
function wpt_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'wpt_excerpt_length', 999);

//Tell the wp that this menu exicts
function register_theme_menus() {


	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' )
		)
	);
}
//Where to call this, when wp first initialising
add_action( 'init', 'register_theme_menus');

//function thst calls all the stylesheets
function wpp_theme_styles() {

	wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.css');
	//wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style( 'googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic');
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css');
}
// add action is a wp function that runs the function above
add_action('wp_enqueue_scripts','wpp_theme_styles');

// function that calls all the js files
function wpp_theme_js() {
	wp_enqueue_script( 'modernizr_js',get_template_directory_uri() . '/js/modernizr.js','','',false);
	wp_enqueue_script( 'foundation_js',get_template_directory_uri() . '/js/foundation.min.js',array('jquery'),'',true);
	wp_enqueue_script( 'main_js',get_template_directory_uri() . '/js/app.js',array('jquery','foundation_js'),'',true);

}
//call the wpp_theme_js with add_action function
add_action('wp_enqueue_scripts','wpp_theme_js');

//Create widget
function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


?>