<?php

function pxls_theme_settings( $sections ) {

	$sections[] = array(
		'icon' => PXLS_OPTIONS_URL.'img/glyphicons/glyphicons_029_notes_2.png',
		'title' => __('Company Info', 'pxls-opts'),
		'desc' => __('', 'pxls-opts'),
		'fields' => array(			

			array(
				'id' => 'pxls_company_phone', //must be unique
				'type' => 'text', //the field type
				'title' => __('Company Phone Number', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_company_email', //must be unique
				'type' => 'text', //the field type
				'title' => __('Company Email Address', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_company_logo', //must be unique
				'type' => 'upload', //the field type
				'title' => __('Company Logo', 'pxls-opts'),
				'sub_desc' => __("Upload your image.<br/>(TIP - Don't remove the 'link' field!)", 'pxls-opts'),
				'desc' => __('', 'pxls-opts')
			)
		)
	);

	$sections[] = array(
		'icon' => PXLS_OPTIONS_URL.'img/glyphicons/glyphicons_244_conversation.png',
		'title' => __( 'Social Accounts', 'pxls' ),
		'desc' => __( '', 'pxls' ),
		'fields' => array(
			array(
				'id' => 'pxls_twitter_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('Twitter', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_facebook_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('Facebook', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_linkedin_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('LinkedIn', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_google_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('Google+', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_youtube_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('YouTube', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_vimeo_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('Vimeo', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_instagram_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('Instagram', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			),
			array(
				'id' => 'pxls_flickr_link', //must be unique
				'type' => 'text', //the field type
				'title' => __('Flickr', 'pxls-opts'),
				'sub_desc' => __("", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			)
		)
	);

	
	$sections[] = array(
		'icon' => PXLS_OPTIONS_URL.'img/glyphicons/glyphicons_044_keys.png',
		'title' => __('Login Screen', 'pxls-opts'),
		'desc' => __('', 'pxls-opts'),
		'fields' => array(
			array(
				'id' => 'pxls_login_logo', //must be unique
				'type' => 'upload', //the field type
				'title' => __('Login Logo', 'pxls-opts'),
				'sub_desc' => __("Upload an image to display on the login screen.<br/>(TIP - Don't remove the 'link' field!)", 'pxls-opts'),
				'desc' => __('', 'pxls-opts'),
				'std' => ''
			),
			array(
				'id' => 'pxls_login_logo_url', //must be unique
				'type' => 'text', //the field type
				'title' => __('Login Logo Link', 'pxls-opts'),
				'sub_desc' => __("Website address linked to when clicking on the logo on the login screen.", 'pxls-opts'),
				'validate' => 'url',
				'desc' => __('', 'pxls-opts'),
				'std' => __('', 'pxls-opts')
			)
		)
	);



return $sections;

}

add_filter('pxls-opts-sections-pxls', 'pxls_theme_settings', 1);