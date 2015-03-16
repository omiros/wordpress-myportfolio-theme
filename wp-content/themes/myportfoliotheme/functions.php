<?php
//enable custom menus
add_theme_support( 'menus' );
//set feature image option
add_theme_support( 'post-thumbnails' );

/**
* ENABLE CSS FILES 
*/
function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/styles.css' );
	wp_enqueue_style( 'googlefont_css', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700');
	wp_enqueue_style( 'googlefont_lato', 'http://fonts.googleapis.com/css?family=Lato:400,700,900');
	wp_enqueue_style('googlefont_roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,700,900');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'introLoader', get_template_directory_uri() . '/css/introLoader.min.css');

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

/** 
* ENABLE JS FILES 
*/
function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script( 'green_sock', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.0/TweenMax.min.js', array('jquery'), '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri(). '/js/script.min.js', array('jquery', 'bootstrap_js'), '', true );
	wp_enqueue_script( 'knob_js', get_template_directory_uri(). '/js/jquery.knob.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array(), '20150206', true );
	wp_enqueue_script( 'introLoader_js', get_template_directory_uri() . '/js/jquery.introLoader.pack.min.js', array('jquery'), '20150206', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

//Remove admin navigation bar

//add_filter( 'show_admin_bar', '__return_false' );

//Register Theme Nav-menu
function register_theme_menus() {

	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' )
			)
		);
}
add_action( 'init', 'register_theme_menus' );

/**
* Create Widget
*/
function create_widget( $name, $id,$description ) {

	register_sidebar(array(
		'name' 			=> __( $name ),
		'id' 			=> $id,
		'description' 	=> __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));
}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage');
create_widget( 'Front Page Center', 'front-center', 'Displays on the center of the homepage');
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage');
create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar');
create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of blog site with a sidebar');

/**
 * Add a widget to the dashboard.
 */
function wpet_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'wpet_welcome_dashboard_widget', // Widget slug.
                 '<h2>Welcome to my Site!</h2>',  // Title.
                 'wpet_dashboard_widget_function'// Display function.
        );
}
add_action( 'wp_dashboard_setup', 'wpet_add_dashboard_widgets' );

/**
 * Create the function to output the contents of my Dashboard Widget.
 */
function wpet_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo "<h3>This is my Portfolio, checkout my theme!</h3>";
}
function front_page_scripts() {
	if ( is_front_page() ) {
		wp_enqueue_style( 'front_page_css', get_template_directory_uri() . '/css/front-page-styles.css' );
	}
}
add_action('wp_enqueue_scripts', 'front_page_scripts');

/**
* 
* 
*/

function register_theme_customizer( $wp_customize ) {
	 // var_dump the customize register of your theme for TESTING AND TROUBLESHOOTING
	//var_dump( $wp_customize->sections() );

	//Customize title anc tagline sections and labels
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Name and Description', 'myportfoliotheme' );
	$wp_customize->get_control( 'blogname' )->label = __( 'Site Name', 'myportfoliotheme' );
	$wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description', 'myportfoliotheme' );
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Customize the Front Page settings
	$wp_customize->get_section( 'static_front_page' )->priority = 20;
	$wp_customize->get_control( 'page_on_front' )->label = __( 'Select Homepage', 'myportfoliotheme' );
	$wp_customize->get_control( 'page_for_posts' )->label = __( 'Select Blog Homepage', 'myportfoliotheme' );

	//Customize Background Settings
	$wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'myportfoliotheme' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	//Create custom panels
	$wp_customize->add_panel( 'general_settings', array(
		'priority' => 10,
		'theme_supports' => '',
		'title' => __( 'General Settings', 'myportfoliotheme' ),
		'description' => __( 'Controls the basic theme settings', 'myportfoliotheme'),
		) );
	$wp_customize->add_panel( 'design_settings', array(
		'priority' => 20,
		'theme_supports' => '',
		'title' => __( 'Design Settings', 'myportfoliotheme' ),
		'description' => __( 'Controls the basic design theme settings', 'myportfoliotheme'),
		) );

	// Assing sections to panels
	$wp_customize->get_section('title_tagline')->panel = 'general_settings';
	$wp_customize->get_section('nav')->panel = 'general_settings';
	$wp_customize->get_section('static_front_page')->panel = 'general_settings';
	$wp_customize->get_section('background_image')->panel = 'design_settings';
	$wp_customize->get_section('background_image')->priority = 1000;

	// Add Logo Settings
	$wp_customize->add_section( 'custom_logo', array(
		'title'    => __( 'Change Your Logo', 'myportfoliotheme' ),
		'panel'    => 'design_settings',
		'priority' => 20
		) );
	$wp_customize->add_setting(
		'wp_logo',
		array(
			'default' => get_template_directory_uri() . '/images/elias-tahmazidis.png',
			//'transport' => 'postMessage'
			)
		);
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Upload a logo', 'myportfoliotheme' ),
               'section'    => 'custom_logo',
               'settings'   => 'wp_logo',
               'context'    => 'wp-custom-logo'
           )
       )
   );

	//Add Custom CSS Textfield
	$wp_customize->add_section( 'css_field', array(
		'title'    => __( 'Custom CSS', 'myportfoliotheme' ),
		'panel'    => 'design_settings',
		'priority' => 2000
		) );
	$wp_customize->add_setting(
		'wp_custom_css',
		array(
			'sanitize_callback' => 'sanitize_text'
			)
		);
		$wp_customize->add_control(
       new WP_Customize_Control(
           $wp_customize,
           'custom_css',
           array(
               'label'      => __( 'Add custom CSS here', 'myportfoliotheme' ),
               'section'    => 'css_field',
               'settings'   => 'wp_custom_css',
               'type'    => 'textarea'
           )
       )
   );

}

add_action( 'customize_register', 'register_theme_customizer' );

/**
* js for theme customizer
*/
function wp_customizer_js() {
	wp_enqueue_script('wp_them_customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '', true);
}
add_action( 'customize_preview_init', 'wp_customizer_js' );

/**
* Add theme support for Custom Backgrounds
*/
$defaults = array(
	'default-color' => '#4D5059'
	);
add_theme_support( 'custom-background', $defaults );


?>