<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ) ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>
    
	<?php get_template_part( 'parts/tpl-head-ie', get_post_format() ); ?>

	<script>
(function(){
    function addFont() {
        var style = document.createElement('style');
        style.rel = 'stylesheet';
        document.head.appendChild(style);
        style.textContent = localStorage.opensansfont;
    }

    try {
        if (localStorage.opensansfont) {
            // The font is in localStorage, we can load it directly
            addFont();
        } else {
            // We have to first load the font file asynchronously
            var request = new XMLHttpRequest();
            request.open('GET', '<?php echo trailingslashit( PXLS_URI ) ?>fonts/opensans.css', true);

            request.onload = function() {
                if (request.status >= 200 && request.status < 400) {
                    // We save the file in localStorage
                    localStorage.opensansfont = request.responseText;

                    // ... and load the font
                    addFont();
                }
            }

            request.send();
        }
    } catch(ex) {
        // maybe load the font synchronously for woff-capable browsers
        // to avoid blinking on every request when localStorage is not available
    }
}());
</script>
<noscript>
	<link href='//fonts.googleapis.com/css?family=OpenSans:400,300,700' rel='stylesheet' type='text/css'>
</noscript>

</head>

<body <?php body_class(); ?>> 
	<div class="page">

		<div class="header">

			<div class="container">

				<div class="row">
					<div class="small-12 medium-4 columns">

						<div id="logo header__logo">
	                        <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo trailingslashit( PXLS_URI ) ?>images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</div>

					</div>

					<div class="small-12 medium-8 columns">
						<div class="row hide-for-small">
							<div class="small-12 columns">
								<div id="courtesy-container">
									 <?php 
									 if ( has_nav_menu( 'courtesy-menu' ) ) {
									 	$args = array( 
									 		'theme_location' => 'courtesy-menu' 
									 	);
									 	wp_nav_menu( $args ); 
									 } 
									 ?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>	

		



		