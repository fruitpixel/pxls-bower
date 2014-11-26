<div id="topnav-container">
	<div class="row">
		<div class="small-12 columns">
			<nav class="top-bar" data-topbar role="navigation">
				<ul class="title-area">
					<li class="name"></li>
		            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		        </ul>
		     	<section id="nav-container" class="contain-to-grid top-bar-section">
					<?php if ( has_nav_menu( 'primary-menu' ) ) { wp_nav_menu(array('container' => '', 'theme_location' => 'primary-menu', 'menu_class' => 'left', 'walker' => new themeslug_walker_nav_menu() )); } ?>
				</section>
			</nav>				
		</div>
	</div>	
</div>
