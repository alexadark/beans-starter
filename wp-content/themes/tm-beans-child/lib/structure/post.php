<?php

beans_add_smart_action('wp','wst_set_up_post_structure');
function wst_set_up_post_structure(){
	//Remove title only on pages
	if ( is_page() ) {
		beans_remove_action( 'beans_post_title' );
	}

}
