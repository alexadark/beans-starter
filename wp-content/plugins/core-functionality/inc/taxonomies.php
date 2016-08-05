<?php
add_action('init', 'register_case_category_taxonomy');

function register_case_category_taxonomy(){

	$labels = array(
		'name'          => _x( ' Cases Categories', 'taxonomy general name', 'webstantly' ),
		'singular_name' => _x( ' Case Category', 'taxonomy singular name', 'webstantly' ),
		'menu_name'     => _x( 'Cases Categories', 'taxonomy general name', 'webstantly' ),
		'all_items'     => __( 'All Cases Caetgories', 'webstantly' ),
		'add_new_item'  => __( 'Add new Case Category', 'webstantly' ),
		'edit_item'     => __( 'Edit Case Category', 'webstantly' ),
		'add_new_item'  => __( 'Add New Case Category', 'webstantly' ),
		'update_item'   => __( 'Update Case Category', 'webstantly' ),
	);
	$args   = array(
		'labels'            => $labels,
		'show_in_nav_menu'  => true,
		'hierarchical'      => true,
		'show_admin_column' => true,
	);

	register_taxonomy('case-category','cases', $args);
}