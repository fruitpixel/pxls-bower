
		<?php get_template_part( 'parts/tpl-before-footer', get_post_format() ); ?>

		<footer>
			<div class="row">
				<div class="small-12 large-4 columns">
					<div class="row">
						<div class="small-12 columns">
							<div class="footer-menu-container clearfix">
								<?php if ( has_nav_menu( 'footer-menu' ) ) { wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); } ?>
							</div>							
						</div>
					</div>
					
					<div class="row">
						<div class="small-12 columns">
							<div id="footer-copyright">
								<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
							</div>
						</div>
					</div>
				</div>
						
			</div>
		</footer>

	<?php wp_footer(); ?>

</body>
</html>