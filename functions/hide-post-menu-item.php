<?php
add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
    remove_menu_page('edit.php'); // Posts
}