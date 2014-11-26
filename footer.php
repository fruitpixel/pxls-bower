
	</div> <!-- /.page -->

	<?php get_template_part( 'parts/tpl-before-footer', get_post_format() ); ?>

	<div class="footer">
		<div class="row">
			<div class="small-12 large-4 columns">

				<div class="row">
					<div class="small-12 columns">
						<div class="menu-container footer__menu-container clearfix">
							<?php 
							if ( has_nav_menu( 'footer-menu' ) ) { 
								$args = array( 
									'theme_location' => 'footer-menu' 
								);
								wp_nav_menu( $args ); 
							} 
							?>
						</div>							
					</div>
				</div>
				
				<div class="row">
					<div class="small-12 columns">
						<div class="footer__copyright-container">
							<?php pxls_footer_copyright( '<p class="footer__copyright">', '</p>' ); ?>							
						</div>
					</div>
				</div>

			</div>					
		</div>
	</footer>

	

	<?php wp_footer(); ?>

</body>
</html>