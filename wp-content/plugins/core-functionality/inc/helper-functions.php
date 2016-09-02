<?php
function wst_get_complex_field_group($group_view_path){
	include($group_view_path);
}

function wst_get_items($item_field, $item_view_path){
$items = carbon_get_the_post_meta($item_field,'complex');
	if(!$items){
		return;
	}
	foreach ( $items as $item ) {
		include(($item_view_path));

	}

}
/**
 * get items from complex fields inside a layout
 *
 * @since 1.0.0
 *
 * @param array $layout array of available layouts
 * @param $item_field name of the item field
 * @param $item_view_path path to the view from here
 *
 * @return void
 */
function wst_get_layout_items(array $layout, $item_field, $item_view_path){
	$items = $layout[$item_field];
	if(!$items){
		return;
	}
	foreach ( $items as $item ) {
		include($item_view_path);
	}
}
/**
 * Display the dotnav in simple sliders
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_dotnav_items_simple( $item_field) {
	$slides       = carbon_get_the_post_meta($item_field,'complex');
	$total_nb_of_slides = count( $slides );
	for ( $nb_of_slides = 0; $nb_of_slides < $total_nb_of_slides; $nb_of_slides ++ ) : ?>
		<li data-uk-slideshow-item="<?php echo (int) $nb_of_slides; ?>"><a href="#"></a></li>
	<?php endfor;
}
/**
 * Retrieve parameters from attachments
 *
 * @since 1.0.0
 *
 * @param $attachment_id
 *
 * @return array
 */
function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );

	return array(
		'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href'         => get_permalink( $attachment->ID ),
		'src'         => $attachment->guid,
		'title'       => $attachment->post_title
	);
}

function hex2rgb( $colour ) {
	if ( $colour[0] == '#' ) {
		$colour = substr( $colour, 1 );
	}
	if ( strlen( $colour ) == 6 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
	} elseif ( strlen( $colour ) == 3 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
	} else {
		return false;
	}
	$r = hexdec( $r );
	$g = hexdec( $g );
	$b = hexdec( $b );
	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}