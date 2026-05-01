<?php
add_action('admin_menu', 'globalSettings' );

function globalSettings(){

	add_menu_page(
		'Global Settings', // page <title>Title</title>
		'Global Settings', // link text
		'manage_options', // user capabilities
		'global_settings', // page slug
		'global_settings_callback', // this function prints the page content
		'dashicons-admin-generic', // icon (from Dashicons for example)
		4 // menu position
	);
}

function global_settings_callback(){
	?>
	<div class="wrap">
		<h1><?php echo get_admin_page_title() ?></h1>
		<form method="post" action="options.php">
			<?php
			    settings_fields( 'global_settings_group' ); // settings group name
		    	do_settings_sections( 'global_settings' ); // just a page slug
			    submit_button(); // "Save Changes" button
			?>
	</div>
	<?php
}

add_action( 'admin_init',  'globalSettingsFields' );
function globalSettingsFields(){
	$page_slug = 'global_settings_group';
	$option_group = 'global_settings_name';

	register_setting($page_slug, $option_group, 'sanitize' );

	add_settings_section(
		'global_settings_id', // ID
		'Πεδία', // Title
		'print_section_info', // Callback
		'global_settings' // Page
	);
	add_settings_field(
		'aff_link',
		'Affiliate Link',
		'text_callback',
		'global_settings',
		'global_settings_id',
		array('label_for' => 'aff_link','settings_name' => $option_group)
	);

//	add_settings_section(
//		'bonus_widget_id', // ID
//		'Bonus Widget', // Title
//		'print_section_info', // Callback
//		'global_settings' // Page
//	);
//
//    add_settings_field(
//		'bonus_1_title',
//		'Bonus 1 Title',
//		'text_callback',
//		'global_settings',
//		'bonus_widget_id',
//		array('label_for' => 'bonus_1_title','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'bonus_1_text',
//		'Bonus 1 Text',
//		'editor_callback',
//		'global_settings',
//		'bonus_widget_id',
//		array('label_for' => 'bonus_1_text','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'bonus_2_title',
//		'Bonus 2 Title',
//		'text_callback',
//		'global_settings',
//		'bonus_widget_id',
//		array('label_for' => 'bonus_2_title','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'bonus_2_text',
//		'Bonus 2 Text',
//		'editor_callback',
//		'global_settings',
//		'bonus_widget_id',
//		array('label_for' => 'bonus_2_text','settings_name' => $option_group)
//	);

//	add_settings_field(
//		'header',
//		'Header',
//		'editor_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'header','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'left_side_bar',
//		'Left SideBar',
//		'editor_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'left_side_bar','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'right_side_bar',
//		'Right SideBar',
//		'editor_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'right_side_bar','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'content',
//		'Content',
//		'editor_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'content','settings_name' => $option_group)
//	);
//
	add_settings_field(
		'footer',
		'Footer',
		'editor_callback',
		'global_settings',
		'global_settings_id',
		array('label_for' => 'footer','settings_name' => $option_group)
	);



//	add_settings_field(
//		'bonus_title',
//		'Bonus Τίτλος',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'bonus_title','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'bonus_subtitle',
//		'Bonus υπότιτλος',
//		'editor_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'bonus_subtitle','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'bonus_text',
//		'Bonus κείμενο',
//		'editor_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'bonus_text','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'step_info',
//		'Οδηγία για τα βήματα',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'step_info','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'step_1',
//		'Step 1',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'step_1','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'step_2',
//		'Step 2',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'step_2','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'step_3',
//		'Step 3',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'step_3','settings_name' => $option_group)
//	);
//	add_settings_field(
//		'step_4',
//		'Step 4',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'step_4','settings_name' => $option_group)
//	);
//
//	add_settings_field(
//		'bonus_btn',
//		'Bonus button Τίτλος',
//		'text_callback',
//		'global_settings',
//		'global_settings_id',
//		array('label_for' => 'bonus_btn','settings_name' => $option_group)
//	);


}

/**
 * Print the Section text
 */
function print_section_info()
{
//        print 'Enter your settings below:';
}

/**
 * Sanitize each setting field as needed
 *
 * @param array $input Contains all settings fields as array keys
 */


function sanitize( $input )
{
	$new_input = array();
	if( isset( $input['aff_link'] ) )$new_input['aff_link'] = sanitize_text_field( $input['aff_link'] );

//	if( isset( $input['bonus_1_title'] ) )$new_input['bonus_1_title'] = sanitize_text_field( $input['bonus_1_title'] );
//	if( isset( $input['bonus_1_text'] ) )$new_input['bonus_1_text'] = $input['bonus_1_text'];
//
//	if( isset( $input['bonus_2_title'] ) )$new_input['bonus_2_title'] = sanitize_text_field( $input['bonus_2_title'] );
//	if( isset( $input['bonus_2_text'] ) )$new_input['bonus_2_text'] = $input['bonus_2_text'];

//	if( isset( $input['header'] ) )$new_input['header'] = $input['header'];
//	if( isset( $input['left_side_bar'] ) )$new_input['left_side_bar'] = $input['left_side_bar'];
//	if( isset( $input['right_side_bar'] ) )$new_input['right_side_bar'] = $input['right_side_bar'];
//	if( isset( $input['content'] ) )$new_input['content'] = $input['content'];
	if( isset( $input['footer'] ) )$new_input['footer'] = $input['footer'];

//	if( isset( $input['footer_text'] ) )$new_input['footer_text'] = $input['footer_text'];

//	if( isset( $input['bonus_title'] ) )$new_input['bonus_title'] = $input['bonus_title'];
//	if( isset( $input['bonus_subtitle'] ) )$new_input['bonus_subtitle'] = $input['bonus_subtitle'];
//	if( isset( $input['bonus_text'] ) )$new_input['bonus_text'] = $input['bonus_text'];
//	if( isset( $input['step_info'] ) )$new_input['step_info'] = $input['step_info'];
//
//	if( isset( $input['step_1'] ) )$new_input['step_1'] = sanitize_text_field( $input['step_1'] );
//	if( isset( $input['step_2'] ) )$new_input['step_2'] = sanitize_text_field( $input['step_2'] );
//	if( isset( $input['step_3'] ) )$new_input['step_3'] = sanitize_text_field( $input['step_3'] );
//	if( isset( $input['step_4'] ) )$new_input['step_4'] = sanitize_text_field( $input['step_4'] );
//	if( isset( $input['bonus_btn'] ) )$new_input['bonus_btn'] = sanitize_text_field( $input['bonus_btn'] );

	return $new_input;
}


function text_callback($args) {

	$field_id = $args['label_for'];
	$otions_name = $args['settings_name'];
	$option = get_option('global_settings_name');

	printf(
		'<input class="w-100" style="width: 100&#37;;" type="text" id="'.$field_id.'" name="'.$otions_name.'['.$field_id.']" value="%s"/>',
		isset( $option[ $field_id ] ) ? esc_attr($option[''.$field_id.'']) : ''
	);

}
function editor_callback($args)
{
	$field_id = $args['label_for'];
	$otions_name = $args['settings_name'];
	$option = get_option($otions_name);
	$content   = isset( $option[ $field_id ] ) ? $option[$field_id] : '';
	$editor_id = $field_id;
	$settings = array( 'textarea_name' => $otions_name.'['.$field_id.']' );
	wp_editor( $content, $editor_id,$settings );
}

add_action( 'admin_notices', 'global_settings_notice' );

function global_settings_notice() {

	if( isset( $_GET['page'], $_GET['settings-updated'] ) && 'global_settings' === $_GET['page'] && true === $_GET['settings-updated'] ) {
		?>
		<div class="notice notice-success is-dismissible">
			<p>
				<strong>Settings saved.</strong>
			</p>
		</div>
		<?php
	}

}
