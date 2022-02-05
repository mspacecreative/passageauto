<?php
function add_social_to_nav() {
	echo '
	<ul class="et-social-icons">

		<li class="et-social-icon et-social-facebook">
			<a href="https://www.facebook.com/www.passageautoparts.ca/" class="icon" target="_blank">
				<span>Facebook</span>
			</a>
		</li>
		<li class="et-social-icon et-social-instagram">
			<a href="https://www.instagram.com/passageautoparts/" class="icon" target="_blank">
				<span>Instagram</span>
			</a>
		</li>

	</ul>';
}

add_action( 'et_header_top', 'add_social_to_nav' );