<?php




function pxls_get_social_links() {
    global $PXLS_Options;
    $twitter = $PXLS_Options->get( 'pxls_twitter_link' );
    $facebook = $PXLS_Options->get( 'pxls_facebook_link' );
    $linkedin = $PXLS_Options->get( 'pxls_linkedin_link' );
    $google = $PXLS_Options->get( 'pxls_google_link' );
    $youtube = $PXLS_Options->get( 'pxls_youtube_link' );
    $vimeo = $PXLS_Options->get( 'pxls_vimeo_link' );
    $instagram = $PXLS_Options->get( 'pxls_instagram_link' );
    $flickr = $PXLS_Options->get( 'pxls_flickr_link' );

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


