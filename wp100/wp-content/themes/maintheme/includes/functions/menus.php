<?php
function wpb_custom_new_menu() {
register_nav_menus(
array(
'main-menu' => __( 'Main Menu' ),
'footer-menu-1' => __( 'Footer Menu' ),
)
);
}
add_action( 'init', 'wpb_custom_new_menu' );
