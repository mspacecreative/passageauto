<div class="featured-product-container top-bottom-padding">
	<div class="max-width-1440 top-bottom-padding">
		<div class="display-flex gutter-space-2 align-middle">
			<?php 
			if ( function_exists(promo_item('featured-product')) || function_exists(promo_item('flyer')) ):
				promo_item('featured-product');
				promo_item('flyer');
			endif; ?>
		</div>
	</div>
</div>
	