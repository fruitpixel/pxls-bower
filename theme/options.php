<?php

function pxls_theme_settings( $sections ) {

    $sections[] = array(
        'title' => __( 'Social Accounts', 'pxls' ),
        'desc' => __( '', 'pxls' ),
        'icon'   => 'el-icon-link',
        'fields' => array(
            array(
                'id' => 'pxls_twitter_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('Twitter', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_facebook_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('Facebook', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_linkedin_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('LinkedIn', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_google_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('Google+', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_youtube_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('YouTube', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_vimeo_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('Vimeo', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_instagram_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('Instagram', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            ),
            array(
                'id' => 'pxls_flickr_link', //must be unique
                'type' => 'text', //the field type
                'title' => __('Flickr', 'pxls-opts'),
                'subtitle' => __("", 'pxls-opts'),
                'desc' => __('', 'pxls-opts'),
            )
        )
    );	

    return $sections;

}

add_filter('redux/options/PXLS_Options/sections', 'pxls_theme_settings', 1);