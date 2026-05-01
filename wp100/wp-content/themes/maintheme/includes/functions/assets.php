<?php
/**
 * Load theme's stylesheets and scripts
 */
function basicThemeAssets() {
	wp_enqueue_script( 'jquery' );
}

// Load theme's stylesheets and scripts
//add_action( 'wp_enqueue_scripts', 'basicThemeAssets' );

function pw_loading_scripts_wrong() {
	echo "<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>";
}
//add_action( 'admin_head', 'pw_loading_scripts_wrong' );


//add_action( 'admin_enqueue_scripts', 'customAdminScripts' );
function customAdminScripts( $hook ) {
	wp_enqueue_media();
	wp_enqueue_script( 'bootstrapJs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'admin_script', 'https://code.jquery.com/jquery-3.6.1.min.js', array(), '1.0' );
	wp_enqueue_script( 'admin_ui_script', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '1.0' );
}

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/core.css', false, false);
	wp_enqueue_style('core-style', get_template_directory_uri() . '/assets/css/core.css', false, false);
});