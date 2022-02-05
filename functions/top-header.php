<?php
function add_address_to_header() {
 echo '
 	<div id="top-header">
		<div class="container clearfix">

			<div id="et-info">
				<span class="mobile-info"><span id="et-info-phone">902-637-2929</span></span>
				<span class="mobile-info"><a href="mailto:info@passageautoparts.com"><span id="et-info-email">info@passageautoparts.com</span></a></span>
				<span class="mobile-info"><span><span style="font-family: ETmodules; display: inline-block; margin-left: 10px; margin-right: 5px;">&#xe01d;</span>3743 Highway #3, Barrington Passage, NS</span></span>
			</div>

		</div>
	</div>';
}
add_action( 'et_html_top_header', 'add_address_to_header' );