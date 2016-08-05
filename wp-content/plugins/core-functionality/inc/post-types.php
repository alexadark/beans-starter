<?php
add_action( 'init', 'register_cases_post_type' );
function register_cases_post_type() {

	$labels = array(
		'name'          => _x( 'Cases', 'post type general name', 'webstantly' ),
		'singular_name' => _x( 'Case', 'post type singular name', 'webstantly' ),
		'menu_name'     => _x( 'Cases', 'admin menu name', 'webstantly' ),
		'add_new'       => _x( 'Add New Case', 'faq', 'webstantly' ),
		'add_new_item'  => _x( 'Add New Case', 'webstantly' ),
		'search_items'  => _x( 'Search Case', 'webstantly' ),
		'not_found'     => _x( 'No Case Found', 'webstantly' ),

	);
	$args   = array(
		'label'        => __( 'Cases', 'webstantly' ),
		'labels'       => $labels,
		'supports'     => get_cpt_supports(),
		'public'       => true,
		'taxonomies'   => array(),
		'hierarchical' => true,
		'has_archive'  => true,
	);

	register_post_type( 'cases', $args );
}

function get_cpt_supports() {
	$all_supports = get_all_post_type_supports( 'post' );


	$all_supports = array_keys( $all_supports );

	$supports_to_exclude = array(
		'comments',
		'trackbacks',
		'post_formats',
		'custom-fields',
	);


	$supports   = array_filter( $all_supports, function ( $support ) use ( $supports_to_exclude ) {
		return ! in_array( $support, $supports_to_exclude );
	} );
	$supports[] = 'page-attributes';

	return ( $supports );


}
