<?php

function pxls_theme_settings( $sections ) {

	

	

	
	



return $sections;

}

add_filter('redux/options/PXLS_Options/sections', 'pxls_theme_settings', 1);