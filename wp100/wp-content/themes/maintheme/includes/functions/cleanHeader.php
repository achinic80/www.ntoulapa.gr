<?php

add_theme_support('title-tag');

add_filter('wpseo_debug_markers', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // index link
remove_action('wp_head', '_wp_render_title_tag', 1);
remove_action('wp_head', 'parent_post_rel_link', 10); // prev link
remove_action('wp_head', 'start_post_rel_link', 10); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'rel_canonical' );
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action( 'wp_head', '_wp_render_title_tag', 1 );

if (defined('WPSEO_VERSION')) {
	global $wpseo_front;
	if (defined($wpseo_front)) {
		remove_action('wp_head', array($wpseo_front, 'head'), 1);
	} else {
		$wp_thing = WPSEO_Frontend::get_instance();
		remove_action('wp_head', array($wp_thing, 'head'), 1);
	}
	add_filter('wpseo_opengraph_url', '__return_false');
	add_filter('wpseo_opengraph_desc', '__return_false');
	add_filter('wpseo_opengraph_title', '__return_false',10);
	add_filter('wpseo_opengraph_locale', '__return_false',10);
	add_filter('wpseo_opengraph_type', '__return_false');
	add_filter('wpseo_opengraph_site_name', '__return_false',10);
	add_filter('wpseo_opengraph_image', '__return_false',10);
	add_filter('wpseo_opengraph_author_facebook', '__return_false');
	add_filter('wpseo_output_twitter_card', '__return_false');
//	add_filter('wpseo_robots', '__return_false');
	add_filter('wpseo_json_ld_output', '__return_false');
	add_filter('wpseo_canonical', '__return_false');
	add_filter('wpseo_title', '__return_false');
	add_filter('document_title_parts', '__return_empty_array', 10);
}

function remove_json_api () {
    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    // Remove all embeds rewrite rules.
    // add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

//	add_filter( 'show_admin_bar', '__return_false' );
}
add_action( 'after_setup_theme', 'remove_json_api' );

//
add_filter( 'wp_robots', 'wp_robots_remove_noindex', 999 );
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');

function wp_robots_remove_noindex( $robots ){

	if (!is_404()){
		$robots[ 'index' ] = true;
		$robots[ 'follow' ] = true;
		$robots[ 'noindex' ] = false;
	}else{
		$robots[ 'index' ] = false;
		$robots[ 'follow' ] = false;
		$robots[ 'noindex' ] = true;
		$robots[ 'nofollow' ] = true;
	}
	return $robots;
}


function header_remove_scripts() {
    global $post;

//	wp_dequeue_style('wp-block-library');
//	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS

	wp_dequeue_style('dashicons');
	wp_deregister_style('dashicons');

    wp_dequeue_style('global-styles');
    wp_deregister_style('global-styles');

	wp_dequeue_style('buttons');
	wp_deregister_style('buttons');

//	wp_dequeue_style('custom');
//	wp_deregister_style('custom');

//	wp_dequeue_style('imgareaselect');
//	wp_deregister_style('imgareaselect');
//
//	wp_dequeue_style('media-views');
//	wp_deregister_style('media-views');
//
//	wp_dequeue_style('mediaelement');
//	wp_deregister_style('mediaelement');

	wp_dequeue_style('wp-block-library');
	wp_deregister_style('wp-block-library');

//	wp_dequeue_style('yoast-seo-adminbar-cs');
//	wp_deregister_style('yoast-seo-adminbar-cs');

    wp_dequeue_script('jquery-core');
    wp_deregister_script('jquery-core');

    wp_dequeue_script('jquery-migrate');
    wp_deregister_script('jquery-migrate');

//	wp_dequeue_script('moxiejs');
//	wp_deregister_script('moxiejs');
//
//	wp_deregister_script('avatar-manager');
//	wp_deregister_script('avatar-manager');
//
//	wp_deregister_script('utils');
//	wp_deregister_script('utils');


//	wp_deregister_script('admin-bar');
//	wp_deregister_script('admin-bar');

//	wp_deregister_script('underscorer');
//	wp_deregister_script('underscore');
//
//	wp_deregister_script('shortcode');
//	wp_deregister_script('shortcode');
//
//	wp_deregister_script('hoverintent');
//	wp_deregister_script('hoverintent');
//
//	wp_deregister_script('plupload');
//	wp_deregister_script('plupload');
//
//	wp_dequeue_style('imgareaselect');
//	wp_deregister_style('imgareaselect');
//
//	wp_deregister_style('avatar-manager');
//	wp_deregister_style('avatar-manager');
//
//	wp_deregister_style('duplicate-post');
//	wp_deregister_style('duplicate-post');
//
//    wp_dequeue_style('elusive');
//    wp_deregister_style('elusive');

    wp_dequeue_style('foundation-icons'); // Μικρά σπασίματα
    wp_deregister_style('foundation-icons');

    wp_dequeue_style('genericons'); // Μικρά σπασίματα
    wp_deregister_style('genericons');

    wp_dequeue_style('font-awesome'); // Μικρά σπασίματα
    wp_deregister_style('font-awesome');

    wp_dequeue_style('menu-icons-extra'); // Μικρά σπασίματα
    wp_deregister_style('menu-icons-extra');
    // Now register your styles and scripts here
}
//add_action( 'wp_enqueue_scripts', 'header_remove_scripts', 10);
//
//

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
//	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
//	}
}
