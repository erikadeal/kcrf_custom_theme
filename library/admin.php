<?php
/*
Customizes admin area and functions
*/

/************* WELCOME PANEL *********************/
function rf_welcome_panel() {
 
	$screen = get_current_screen();

	if ( $screen->base == 'dashboard') {
		echo
			'<div class="wrap">'.
				'<h2></h2>'.
				'<div id="welcome-panel" class="welcome-panel">'.
					'<section class="welcome-panel-content">' .
						'<h3>Refugee Forum of King County</h3>' .
				 		'<p class="about-deecsription">Welcome to the Refugee Forum website! Check the menu on the left to find your profile and options for sharing updates and events.</p>' .
						'<div class="welcome-column-container">'.
							'<div class="welcome-panel-column">'.
								'<a class="button button-primary button-hero" href="post-new.php">Share Update</a>'.
								'<p>Add an update to share with other forum members.</p>'.
							'</div>'.
							'<div class="welcome-panel-column">'.
								'<a class="button button-hero" href="post-new.php?post_type=tribe_events">New Event</a>'.
								'<p>Create an event to put on the shared calendar.</p>'.
							'</div>'.
							'<div class="welcome-panel-column">'.
								'<a class="button button-primary button-hero" href="index.php">Back to Site</a>'.
								'<p>Return to the Refugee Forum website.</p>'.
							'</div>'.
						'</div>'.

					'</section>'.
				'</div>'.
			'</div>';
	}
}

remove_action( 'welcome_panel', 'wp_welcome_panel');
add_action( 'admin_notices', 'rf_welcome_panel');


/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');
}

// removing the dashboard widgets
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );
// adding any custom widgets
add_action( 'wp_dashboard_setup', 'bones_custom_dashboard_widgets' );

/************* CUSTOM POST LABEL *****************/
function custom_post_menu_label() {
 global $menu;
 global $submenu;
 $menu[5][0] = 'Updates';
 $submenu['edit.php'][5][0] = 'Update';
 $submenu['edit.php'][10][0] = 'Add Update';         
}

//Change Posts labels in other admin area
function custom_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Updates';
	$labels->singular_name = 'Update';
	$labels->add_new = 'Add Update';
	$labels->add_new_item = 'Add Update';
	$labels->edit_item = 'Edit Updates';
	$labels->new_item = 'Updates';
	$labels->view_item = 'View Updates';
	$labels->search_items = 'Search Updates';
	$labels->not_found = 'No results on Updates';
	$labels->not_found_in_trash = 'No Updates in Trash';
	$labels->name_admin_bar = 'Add Updates';       

}

add_action( 'init', 'custom_post_object_label' );
add_action( 'admin_menu', 'custom_post_menu_label' );

/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );


/************* CUSTOMIZE ADMIN *******************/

//Remove unneeded profile fields
add_filter('user_contactmethods','hide_profile_fields',10,1);

function hide_profile_fields( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	return $contactmethods;
}

//Remove personal options
function hide_personal_options(){
	echo '<script type="text/javascript">jQuery(document).ready(function($) { $("form#your-profile > h3:first").hide(); $("form#your-profile > table:first").hide(); $("form#your-profile").show(); });</script>';
}
add_action('admin_head','hide_personal_options');

//Change profile field labels
add_filter( 'gettext', 'wpse6096_gettext', 10, 2 );
function wpse6096_gettext( $translation, $original )
{
    if ( 'Nickname' == $original ) {
        return 'Short name';
    }
    if ( 'Biographical Info' == $original ) {
        return 'Description';
    }
    return $translation;
}

//Remove extra admin bar links and change link name for home

function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('comments');
}

add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

//Remove comments
function remove_menus() {
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'tools.php' );
}

add_action( 'admin_menu', 'remove_menus' );

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://erikadeal.com" target="_blank">Erika Deal</a>, Laura Horan, and Danielle Trierweiler</span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.', 'bonestheme' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'bones_custom_admin_footer' );

?>
