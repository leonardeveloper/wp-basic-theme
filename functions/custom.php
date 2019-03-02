<?php

// Image Sizes
set_post_thumbnail_size( 150, 150, true );
//add_image_size( 'some', 175, 70);

// Content Width
if ( ! isset( $content_width) ) $content_width = 500;

// Menus
register_nav_menus( array(
	'primary' => 'Main Menu'
) );

// Widgets
add_action( 'widgets_init', 'mr_widgets_init' );
function mr_widgets_init() {
  register_sidebar(array(
	'id' => 'sidebar',
	'name' => 'Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}

// Core Enqueues
function mr_core_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-core' );
	wp_enqueue_script( 'jquery.main.js', get_template_directory_uri().'/assets/js/jquery.main.js', array( 'jquery-core' ) );

	wp_enqueue_style( 'mr-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts','mr_core_scripts_styles' );

// Custom WP Head
function mr_head() {
?>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>" />
	<meta name="msapplication-TileColor" content="#ffffff" />
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<?php
}
add_action( 'wp_head', 'mr_head' );

// Advanced Custom Fields Options Panels
if ( function_exists( 'acf_add_options_page' ) ) {
	// acf_add_options_page();
	// acf_add_options_sub_page( 'General Options' );
}

// Advanced Custom Fields Google Map Key
add_filter('acf/settings/google_api_key', function () {
    return '';
});

// Remove All Yoast HTML Comments
if ( defined( 'WPSEO_VERSION' ) ){
	add_action( 'get_header', function() {
		ob_start(
			function ( $o ) {
				return preg_replace( '/\n?<.*?yoast.*?>/mi', '', $o );
			}
		);
	});
	add_action( 'wp_head', function() {
		ob_end_flush();
	}, 999 );
}

// No, bad emojis! (and how much code is required to remove them)
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}