<?php
/*
Plugin Name: DX Shortcode Freezer
Plugin URI: http://devrix.com/shortcode-freezer
Description: Shortcode Freezer. If you have a website with content based on shortcodes and this content generates some static data (i.e. authors, pricing, buttons and other listing that just provides html markup with a 'short code'), then feel free to convert that to the static values before switching themes. Warning: it ain't gonna work with dynamic data like post listings etc.
Author: nofearinc
Version: 1.0
Author URI: http://devwp.eu/
License: GPL2
 
 Copyright 2014 DevriX (email : mpeshev@devrix.com)
 
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as
 published by the Free Software Foundation.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if ( ! defined( 'DX_SHORTCODEFR_URL' ) ) {
	define( 'DX_SHORTCODEFR_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}

/**
 * The nasty function that parses everything.
 *
 * Could be very dangerous as it messes up with the entire posts table!
 */
function dx_freeze_shortcodes_now() {
	global $wpdb;
	// we iterate 100 posts a time, for memory reasons
	$ITERATION_COUNT = 100;
	$offset = 0;
	$count = 0;
	
	// get the name of the posts table, prefix-independent
	$posts_table = $wpdb->prefix. 'posts';

	do {
		// get some 100 posts to maintain
		$results = $wpdb->get_results("SELECT ID, post_content FROM $posts_table LIMIT $ITERATION_COUNT OFFSET $offset;", ARRAY_A);

		// iterate each post and update accordingly
		foreach($results as $row) {
			$row_id = $row['ID'];
	
			// evaluate as shortcode and parse
			$parsed_content = esc_sql(do_shortcode($row['post_content']));
		
			// prevent from blank end results and update with the parsed markup content
			if(!empty($parsed_content)) {
				$wpdb->query("UPDATE $posts_table SET post_content='$parsed_content' WHERE ID = $row_id;");
			}
		}

		$count = count($results);
		$offset = $offset + $count;
	} while($count == $ITERATION_COUNT); // till the end of the iteration
	
}

add_action('admin_menu', 'dx_register_admin_freezer_menu');

// register the page in the Tools panel
function dx_register_admin_freezer_menu() {
	add_submenu_page( 'tools.php', 'DX Shortcode Freezer', 'DX Shortcode Freezer', 'manage_options', 'dx-shortcode-freezer', 'dx_shortcode_freezer_page' ); 
}

// include the template file
function dx_shortcode_freezer_page() {
	include_once('help-page.php');
}

add_action( 'admin_enqueue_scripts', 'dx_shortcode_freezer_media' );

function dx_shortcode_freezer_media( $hook ) {
	if( 'tools_page_dx-shortcode-freezer' === $hook ) {
		wp_register_style('dx_help_page',  DX_SHORTCODEFR_URL .'/help-page.css');
		wp_enqueue_style('dx_help_page');
	}
}

?>
