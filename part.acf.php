<?php 

if ( !class_exists('acf') ) {

	add_filter('acf/settings/path', 'swp_acf_settings_path');

	function swp_acf_settings_path( $path ) {
		$path = __DIR__ . '/acf/';
		return $path;
	}

	add_filter('acf/settings/dir', 'swp_acf_settings_dir');

	function swp_acf_settings_dir( $dir ) {
		$dir = plugins_url() . '/swp-cf7-analytics/acf/';
		return $dir;
	}

	// add_filter('acf/settings/show_admin', '__return_false');

	include_once( __DIR__ . '/acf/acf.php' );
}

if ( function_exists('acf_add_options_page') ) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'CF7 Analytics',
		'menu_title' 	=> 'CF7 Analytics',
		'menu_slug' 	=> 'swp-cf7-analytics',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
		));
}

if ( function_exists('acf_add_local_field_group') ) {

	acf_add_local_field_group(array (
		'key' => 'group_595a5e90f0972',
		'title' => 'Contact Form 7 Analytics',
		'fields' => array (
			array (
				'key' => 'field_595a67c320bca',
				'label' => 'Donate to Sam Wright on Patreon',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'message' => 'If you find this plugin helpful please consider donating $1 on my Patreon page <a href="https://www.patreon.com/samwright">here</a>. By donating you can help shape future plugin updates to better fit your websites needs.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
				),
			array (
				'key' => 'field_595a5f8a279c9',
				'label' => 'Use Plugins Tracking ID',
				'name' => 'swp_cf7_use_plugins_tracking_id',
				'type' => 'radio',
				'instructions' => 'Select yes to use the plugins tracking ID and object name, choose no if you have your own tracking already installed.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a5ea2279c6',
				'label' => 'Google Analytics Tracking ID',
				'name' => 'swp_cf7_tracking_id',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_595a5f8a279c9',
							'operator' => '==',
							'value' => 'yes',
							),
						),
					),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				),
			array (
				'key' => 'field_595a630387958',
				'label' => 'Track Standard Page Views',
				'name' => 'track_standard_page_views',
				'type' => 'radio',
				'instructions' => 'Track basic page views across your website.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_595a5f8a279c9',
							'operator' => '==',
							'value' => 'yes',
							),
						),
					),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a6046279ca',
				'label' => 'Tracking Object Name',
				'name' => 'swp_cf7_tracking_object_name',
				'type' => 'text',
				'instructions' => 'The name of the tracking object you wish to send the events with. If your unsure the default name supplied should work for you.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_595a5f8a279c9',
							'operator' => '==',
							'value' => 'no',
							),
						),
					),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'default_value' => 'ga',
				'placeholder' => 'ga',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				),
			array (
				'key' => 'field_595a5ee0279c7',
				'label' => 'Anonymize IP',
				'name' => 'swp_cf7_ip_anonymization',
				'type' => 'radio',
				'instructions' => 'Anonymize the visitors IP?',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a6185b47dc',
				'label' => 'Track Successful Submissions',
				'name' => 'swp_cf7_track_successful_submissions',
				'type' => 'radio',
				'instructions' => 'Track when the form has been successfully submitted and an email sent',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a6203b47dd',
				'label' => 'Track Failed Submissions',
				'name' => 'swp_cf7_track_failed_submissions',
				'type' => 'radio',
				'instructions' => 'Track when the form has been successfully submitted but the email failed send.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a622bb47de',
				'label' => 'Track Invalid Submissions',
				'name' => 'swp_cf7_track_invalid_submissions',
				'type' => 'radio',
				'instructions' => 'Track when the form has generated user input errors.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a6263b47df',
				'label' => 'Track Spam Submissions',
				'name' => 'swp_cf7_track_spam_submissions',
				'type' => 'radio',
				'instructions' => 'Track when the form has generated spammer input errors.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			array (
				'key' => 'field_595a627bb47e0',
				'label' => 'Track All Submissions',
				'name' => 'swp_cf7_track_all_submissions',
				'type' => 'radio',
				'instructions' => 'Track an additional hit for all submissions, good for getting a separated total but can cause duplicate tracking hits.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
					),
				'choices' => array (
					'no' => 'No',
					'yes' => 'Yes',
					),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'vertical',
				'return_format' => 'value',
				),
			),
'location' => array (
	array (
		array (
			'param' => 'options_page',
			'operator' => '==',
			'value' => 'swp-cf7-analytics',
			),
		),
	),
'menu_order' => 0,
'position' => 'normal',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => 1,
'description' => '',
));

}