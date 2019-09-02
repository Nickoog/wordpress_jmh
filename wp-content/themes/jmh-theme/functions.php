<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_theme_support( 'post-thumbnails' ); 

/* INCLUDE ALL CPT FILES */
foreach(glob(get_template_directory() . "/lib/cpt/*.php") as $file){
	require $file;
}

/* ACF OPTION WIDGET */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
} 

function wpshout_longer_excerpts( $length ) {
	// Don't change anything inside /wp-admin/
	if ( is_admin() ) {
		return $length;
	}
	// Set excerpt length to 140 words
	return 20;
}
// "999" priority makes this run last of all the functions hooked to this filter, meaning it overrides them
add_filter( 'excerpt_length', 'wpshout_longer_excerpts', 999 );

function wpshout_change_and_link_excerpt( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	// Change text, make it link, and return change
	return '&hellip; <a href="' . get_the_permalink() . '">[...]</a>';
 }
 add_filter( 'excerpt_more', 'wpshout_change_and_link_excerpt', 999 );

 show_admin_bar(false);