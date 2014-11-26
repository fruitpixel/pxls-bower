<?php



/**
 * pxls_footer_copyright()
 * 
 * Outputs the copyright message
 */
function pxls_footer_copyright( $before = "", $after = "", $echo = true ) {

    $result = apply_filters( 'pxls_footer_copyright_before', $before );

    $result .= '&#169; <time datetime="' . date( 'Y' ) . '">' . date( 'Y' ) . '</time> ' . get_bloginfo( 'name' );
    
    $result .= apply_filters( 'pxls_footer_copyright_after', $after );

    if ( $echo ) {
        echo apply_filters( 'pxls_footer_copyright', $result );
    }
    else {
        return  apply_filters( 'pxls_footer_copyright', $result );
    }
}



function pxls_get_social_links() {
    global $PXLS_Options;
    $twitter = $PXLS_Options['pxls_twitter_link'];
    $facebook = $PXLS_Options['pxls_facebook_link'];
    $linkedin = $PXLS_Options['pxls_linkedin_link'];
    $google = $PXLS_Options['pxls_google_link'];
    $youtube = $PXLS_Options['pxls_youtube_link'];
    $vimeo = $PXLS_Options['pxls_vimeo_link'];
    $instagram = $PXLS_Options['pxls_instagram_link'];
    $flickr = $PXLS_Options['pxls_flickr_link'];

    if ( $twitter ) {
        $social[] = array(
            'name' => __( 'Twitter', 'pxls' ),
            'link' => $twitter
        );
    }
    if ( $facebook ) {
        $social[] = array(
            'name' => __( 'Facebook', 'pxls' ),
            'link' => $facebook
        );
    }
    if ( $linkedin ) {
        $social[] = array(
            'name' => __( 'LinkedIn', 'pxls' ),
            'link' => $linkedin
        );
    }
    if ( $google ) {
        $social[] = array(
            'name' => __( 'Google+', 'pxls' ),
            'link' => $google
        );
    }
    if ( $youtube ) {
        $social[] = array(
            'name' => __( 'YouTube', 'pxls' ),
            'link' => $youtube
        );
    }
    if ( $vimeo ) {
        $social[] = array(
            'name' => __( 'Vimeo', 'pxls' ),
            'link' => $vimeo
        );
    }
    if ( $instagram ) {
        $social[] = array(
            'name' => __( 'Instagram', 'pxls' ),
            'link' => $instagram
        );
    }
    if ( $flickr ) {
        $social[] = array(
            'name' => __( 'Flickr', 'pxls' ),
            'link' => $flickr
        );
    }

    return $social;
}


