<!-- MENU TOGGLE -->
<button class="hamburger hamburger--spin" type="button">
	<span class="hamburger-box">
		<span class="hamburger-inner"></span>
	</span>
</button>
<!-- / MENU TOGGLE -->

<!-- MENU OVERLAY -->
<div class="menuOverlay">
	<div class="menuContainer">
		<div class="menuInner light">
			<?php 
            $menuClass = 'nav';
            $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'mobile-menu', 'echo' => false ) );
			echo $primaryNav;
			?>
		</div>
	</div>
</div>
<!-- / MENU OVERLAY -->