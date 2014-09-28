<?php get_header( 'front-page' ); ?>

	<?php get_template_part( 'parts/tpl-nav', 'front-page' ); ?>

	<div id="content" class="container">	
		
		<?php get_template_part( 'parts/tpl-before-all-content', 'front-page' ); ?>			
		
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="masthead" class="container">			
					<div class="row">					
						<div class="small-12 large-6 columns text-content">				
							<?php the_content(); ?>	
						</div>
						<div class="small-12 large-6 columns slider">
							<?php echo do_shortcode( '[metaslider id=227]' ); ?>							
						</div>
					</div>
				</div>			
			<?php endwhile; ?>
		<?php endif; ?>

		<?php get_template_part( 'parts/tpl-after-all-content', 'front-page' ); ?>
	
	</div>

<?php get_footer( 'front-page' );
