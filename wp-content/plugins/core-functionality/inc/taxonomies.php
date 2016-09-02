<?php
add_action('init', 'register_brands_and_services_category_taxonomy');

function register_brands_and_services_category_taxonomy(){

	$labels = array(
		'name'          => _x( ' Brand & Services Categories', 'taxonomy general name', CHILD_TEXT_DOMAIN ),
		'singular_name' => _x( ' Case Category', 'taxonomy singular name', CHILD_TEXT_DOMAIN ),
		'menu_name'     => _x( 'Brand & Services Categories', 'taxonomy general name', CHILD_TEXT_DOMAIN ),
		'all_items'     => __( 'All Brand & Services Categories', CHILD_TEXT_DOMAIN ),
		'add_new_item'  => __( 'Add new Case Category', CHILD_TEXT_DOMAIN ),
		'edit_item'     => __( 'Edit Case Category', CHILD_TEXT_DOMAIN ),
		'add_new_item'  => __( 'Add New Case Category', CHILD_TEXT_DOMAIN ),
		'update_item'   => __( 'Update Case Category', CHILD_TEXT_DOMAIN ),
	);
	$args   = array(
		'labels'            => $labels,
		'show_in_nav_menu'  => true,
		'hierarchical'      => true,
		'show_admin_column' => true,
	);

	register_taxonomy('brands-and-services-category','brands-and-services', $args);
}