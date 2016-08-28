<?php
/**
 * Display a text editor
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_text_area( array $layout ) {
	$text_area = $layout['crb_text_editor'];
	if ( ! $text_area ) {
		return;
	}
	include ('views/text-editor-view.php');
}

//SLIDER
/**
 * Display a slider
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_slider( array $layout ) {

	include( 'views/slider-view.php' );
}



/**
 * Display the dotnav in sliders
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_dotnav_items( array $layout ) {
	$slides       = $layout['crb_slides'];
	$total_nb_of_slides = count( $slides );
	for ( $nb_of_slides = 0; $nb_of_slides < $total_nb_of_slides; $nb_of_slides ++ ) : ?>
		<li data-uk-slideshow-item="<?php echo (int) $nb_of_slides; ?>"><a href="#"></a></li>
	<?php endfor;
}

//SLIDESHOW PANEL
/**
 * Display slideshow panel
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_slideshow_panel( array $layout ) {
	if ( ! $layout['crb_slides'] ) {
		return;
	}
	include( 'views/slideshow-panel-view.php' );
}



/**
 * Display parallax area with content
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
//Parallax
function wst_display_parallax_area( array $layout ) {
	
	include( 'views/parallax-view.php' );
}

/**
 * Display panel switcher
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
//Panel Switcher
function wst_display_panel_switcher( array $layout ) {
	if ( ! $layout['crb_switcher_content'] ) {
		return;
	}
	include( 'views/panel-switcher-view.php' );
}

/**
 * Display each item in a subnav element
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_subnav_items( array $layout ) {
	$nav_items = $layout['crb_subnav'];
	foreach ( $nav_items as $nav_item ) { ?>
		<li><a href="#"><?php echo esc_html( $nav_item['crb_subnav_item'] ); ?></a></li>
	<?php }
}

/**
 * Display each item of a switcher
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_switcher_items( array $layout ) {
	$list_items = $layout['crb_switcher_content'];
	foreach ( $list_items as $list_item ) {
		$classes = esc_attr( $list_item['crb_classes'] );
		?>
		<li class="uk-grid uk-grid-width-medium-1-2 uk-margin-large-top <?php echo $classes ?>">
			<?php wst_display_switcher_panels_content( $list_item ); ?>
		</li>
	<?php }
}

/**
 * Display content of each panel in a switcher
 *
 * @since 1.0.0
 *
 * @param $list_item
 *
 * @return void
 */
function wst_display_switcher_panels_content( array $list_item ) {
	$panels = $list_item['crb_switcher_content_item'];
	foreach ( $panels as $panel ) {
		$badge   = esc_html( $panel['crb_badge_text'] );
		$title   = esc_html( $panel['crb_panel_title'] );
		$content = $panel['crb_panel_content'];
		$image   = wp_get_attachment_image( $panel['crb_panel_image'], 'thumbnail' );
		include( 'views/switcher-content-item-view.php' );
	}
}

/**
 * Display a versatile lightbox gallery, with content and hover effects
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_lightbox_gallery( array $layout ) {
	if ( ! $layout['crb_gallery_items'] ) {
		return;
	}
	include( 'views/lightbox-gallery-view.php' );
}


function wst_display_icon_text_boxes( array $layout ) {
	include('views/icon-text-boxes-view.php');
 }

function wst_display_boxes_items(array $layout, $animation_boxes){
	$boxes = $layout['text_boxes_items'];

	if ( ! $boxes ) {
		return;
	}
	foreach ( $boxes as $box ) {


	 }

}