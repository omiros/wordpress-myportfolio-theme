<?php 
/**
 * Plugin Name: Badges Plugin by Elias.
 * Description: Provides widgets and shortcodes to viewed profile badges on wordpress.
 * Version: 1.0.0
 * Author: Elias Tahmazidis
 * Author URI: http://eliastahmazidis.com
 * License: GPL2
 */

/*
* Add a link to our plugin in the admin menu
* under 'Settings > Elias Badges'
*
*/
/*
* Assign global variables
*
*/
$plugin_url = WP_PLUGIN_URL . '/wpelias-badges';
$options = [];
$display_json = false;

function wpelias_badges_menu() {

	/*
	* Use the add_options_page function
	* add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
	*/
	add_options_page( 
	'Official Elias Badges Plugin',
	'Elias Programming Badges',
	'manage_options',
	'wpelias-badges',
	'wpelias_badges_options_page'
	);
}
add_action( 'admin_menu', 'wpelias_badges_menu' );

function wpelias_badges_options_page() {

	if( !current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have permision to access this page.' );
	}

	global $plugin_url;
	global $options;
	global $display_json;

	if ( isset( $_POST['wp_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['wp_form_submitted'] );

		if ( $hidden_field == 'Y') {
			$wp_username = esc_html( $_POST['wp_username'] );
			$teamtreehouse_profile = teamtreehouse_badges_get_profile( $wp_username );

			$options['wp_username']   = $wp_username;
			$options['last_updated']  = time();
			$options['teamtreehouse_profile'] = $teamtreehouse_profile;

			update_option( 'wp_badges', $options );
		}
	}

	$options = get_option( 'wp_username' );

	if ($options != '') {
		$wp_username = $options['wp_username'];
		$teamtreehouse_profile = $options['teamtreehouse_profile'];
	}
	// var_dump($teamtreehouse_profile);
	require( 'inc/options-page.php' );
}

class Wp_Badges_Widget extends WP_Widget {

	function wp_badges_widget() {
		// Instantiate the parent object
		parent::__construct( false, 'My Badges Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output
		extract( $args );
		//This function allows the user to add a custom title to the Widget
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$num_badges =  $instance['num_badges'];
		$display_tooltip =  $instance['display_tooltip'];

		//Get the profile for the user
		$options = get_option( 'wp_badges' );
		$teamtreehouse_profile = $options['teamtreehouse_profile'];

		require( 'inc/front-end.php' );
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title']			= strip_tags($new_instance['title']);
		$instance['num_badges'] 	= strip_tags($new_instance['num_badges']);
		$instance['display_tooltip'] = strip_tags($new_instance['display_tooltip']);


		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form

		$title 			= esc_attr( $instance['title'] );
		$num_badges 	= esc_attr( $instance['num_badges'] );
		$display_tooltip = esc_attr( $instance['display_tooltip'] );

		$options = get_option( 'wp_badges' );
		$teamtreehouse_profile = $options['teamtreehouse_profile'];
		require( 'inc/widget-fields.php' );
	}
}

function my_badges_register_widgets() {
	register_widget( 'Wp_Badges_Widget' );
}

add_action( 'widgets_init', 'my_badges_register_widgets' );


function teamtreehouse_badges_get_profile( $wp_username ) {

	$json_feed_url = 'http://teamtreehouse.com/' . $wp_username . '.json';
	$args = array( 'timeout' => 120 );

	$json_feed = wp_remote_get( $json_feed_url, $args );

	$teamtreehouse_profile = json_decode($json_feed['body']);
	return $teamtreehouse_profile;
}

// Adding and creating shortcode
function badges_shortcode( $atts, $content = null ) {

	global $post;

	extract( shortcode_atts( array(
		'num_badges' => '8',
		'tooltip' => 'on'
	), $atts ) );

	if( $tooltip == 'on' ) $tooltip == 1;
	if( $tooltip == 'off' ) $tooltip == 0;

	$display_tooltip = $tooltip;

	$options = get_option( 'wp_badges' );
	$teamtreehouse_profile = $options['teamtreehouse_profile'];

	// Buffering the require file
	ob_start();
	require( 'inc/front-end.php' );
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'my_badges', 'badges_shortcode');

// Refresh Recent Badges function for ajaxcall
function badges_refresh_profile() {

	$options = get_option( 'wp_badges' );
	$last_updated = $options['last_updated'];

	$current_time = time();

	$update_difference = $current_time - $last_updated;

	if ( $update_difference > 86400 ) {

		$wp_username = $options['wp_username'];

		$options['teamtreehouse_profile'] = teamtreehouse_badges_get_profile( $wp_username );
		$options['last_updated'] = time();

		update_option( 'wp_badgdes', $options );
	}
	die();
}
add_action( 'wp_ajax_badges_refresh_profile', 'badges_refresh_profile' );

function badges_enable_frontend_ajax() {
?>
	<script>
	var ajaxurl = '<?php  echo admin_url('admin-ajax.php'); ?>';
	</script>


<?php
}
add_action( 'wp_head', 'badges_enable_frontend_ajax' );


// Add CSS to the plugin page
function badges_backend_styles() {

	wp_enqueue_style( 'badges_backend_styles', plugins_url( 'wpelias-badges/wpelias-badges.css' ) );
}
add_action( 'admin_head', 'badges_backend_styles' );

function badges_frontend_js_css() {

	wp_enqueue_style( 'badges_frontend_css', plugins_url( 'wpelias-badges/wptreehouse-badges.css' ) );
	wp_enqueue_script( 'badges_frontend_js', plugins_url( 'wpelias-badges/wpelias-badges.js'), array('jquery'),'',true );
}
add_action( 'wp_enqueue_scripts', 'badges_frontend_js_css' );

?>