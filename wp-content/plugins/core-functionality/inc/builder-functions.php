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
	$classes   = esc_attr( $layout['crb_classes'] );
	if ( ! $text_area ) {
		return;
	}
	?>
	<div class="<?php echo $classes ?>">
		<?php echo $text_area ?>
	</div>
	<?php
}

////SLIDER
///**
// * Display a slider
// *
// * @since 1.0.0
// *
// * @param $layout
// *
// * @return void
// */
//function wst_display_slider( array $layout ) {
//	if ( ! $layout['crb_slides'] ) {
//		return;
//	}
//	include( 'views/slider-view.php' );
//}
//
///**
// * Display the slides and caption inside the slider
// *
// * @since 1.0.0
// *
// * @param $layout
// *
// * @return void
// */
//function wst_display_slides( array $layout ) {
//	$slides = $layout['crb_slides'];
//	foreach ( $slides as $slide ) {
//		$slide_id              = esc_html( $slide['crb_slider_images'] );
//		$slide_image           = wp_get_attachment( $slide_id );
//		$slide_url             = esc_url( $slide_image['src'] );
//		$slide_alt             = esc_attr( $slide_image['alt'] );
//		$slide_title           = esc_attr( $slide_image['title'] );
//		$slide_caption         = $slide['crb_slide_caption'];
//		$slide_caption_classes = esc_attr( $slide['crb_slide_caption_classes'] );
//		$badge_title           = esc_html( $slide['crb_badge_title'] );
//		$badge_classes         = esc_attr( $slide['crb_badge_classes'] );
//		$slide_choice          = $slide['crb_type_of_media'];
//		$vimeo                 = $slide['crb_vimeo'];
//		$youtube               = $slide['crb_youtube'];
//		include( 'views/slide-view.php' );
//	}
//}
//
///**
// * Display the dotnav in sliders
// *
// * @since 1.0.0
// *
// * @param $layout
// *
// * @return void
// */
//function wst_display_dotnav_items( array $layout ) {
//	$slides       = $layout['crb_slides'];
//	$total_nb_of_slides = count( $slides );
//	for ( $nb_of_slides = 0; $nb_of_slides < $total_nb_of_slides; $nb_of_slides ++ ) : ?>
<!--		<li data-uk-slideshow-item="--><?php //echo (int) $nb_of_slides; ?><!--"><a href="#"></a></li>-->
<!--	--><?php //endfor;
//}

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
	$animate       = count( $layout['crb_slides_text'] ) > 1;
	$animate_class = $animate ? 'slideshow-panel-animate' : '';
	if ( ! $layout['crb_slides'] ) {
		return;
	}
	include( 'views/slideshow-panel-view.php' );
}

/**
 * Display text slides
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_text_slides( array $layout ) {
	if ( ! $layout['crb_slides_text'] ) {
		return;
	}
	$slides_text = $layout['crb_slides_text'];
	foreach ( $slides_text as $slide_text ) {
		$content       = $slide_text['crb_slide_content'];
		$slide_classes = esc_attr( $slide_text['crb_slide_content_classes'] );
		?>
		<li>
			<div class="<?php echo $slide_classes; ?>"><?php echo $content; ?></div>
		</li>
	<?php }
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

/**
 * Displays the items image and content for the lightbox gallery
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_lightbox_gallery_items( array $layout ) {

	$items = $layout['crb_gallery_items'];
	if ( ! $items ) {
		return;
	}
	foreach ( $items as $item ) {
		$image_id    = esc_html( $item['crb_image'] );
		$image       = wp_get_attachment( $image_id );
		$image_size  = esc_attr( $item['crb_image_size'] );
		$image_url   = wp_get_attachment_image_url( $image_id, $image_size );
		$image_alt   = esc_attr( $image['alt'] );
		$image_title = esc_attr( $image['title'] );
		$content     = $item['crb_text_editor'];
		include( 'views/lightbox-gallery-item-view.php' );
	}
}

function wst_display_icon_text_boxes( array $layout ) {
	$classes = esc_attr( $layout['crb_classes'] );
	$id = esc_attr( $layout['crb_section_id'] );
	$animation_repeat = esc_attr($layout['crb_animation_repeat']);
	$animation_name = esc_attr($layout['crb_animation_name']);
	$animation_delay = esc_attr($layout['crb_animation_delay']);
	$animation_boxes = esc_attr($layout['crb_animation_boxes']);
	$column_desktop = esc_attr($layout['crb_col_desktop']);
	$column_tablet = esc_attr($layout['crb_col_tablet']);
	?>
	<section id="<?php echo $id; ?>"
	         class="tm-icon-text-boxes uk-container uk-container-center <?php echo $classes; ?>">
		<div class="tm-section-title uk-text-center"
			<?php if($animation_name){?>
		     data-uk-scrollspy="{cls:'uk-animation-<?php echo $animation_name; ?>', repeat:<?php echo
		     $animation_repeat; ?>}"<?php }?>>


			<h2 class="uk-heading-large"><?php echo esc_html( $layout['crb_section_title'] ); ?></h2>
			<div class="divider">
				<div class="uk-icon-heart-o uk-icon-small"></div>
			</div>
		</div>
		<div class="uk-grid uk-grid-width-small-1-<?php echo $column_tablet;?> uk-grid-width-medium-1-<?php echo
		$column_desktop; ?>
		uk-margin-large-top"
			<?php if($animation_boxes){?>
		     data-uk-scrollspy="{cls:'uk-animation-<?php echo $animation_boxes; ?> uk-invisible',
		target:'>.uk-panel', delay:<?php echo $animation_delay?>,
		repeat:<?php echo
		     $animation_repeat; ?>}"<?php }?>>

			<?php wst_display_boxes_items($layout, $animation_boxes);?>


		</div>

	</section>

<?php }

function wst_display_boxes_items(array $layout, $animation_boxes){
	$boxes = $layout['text_boxes_items'];

	if ( ! $boxes ) {
		return;
	}
	foreach ( $boxes as $box ) {
		$icon_id      = esc_html( $box['crb_icon'] );
		$icon         = wp_get_attachment( $icon_id );
		$icon_url     = esc_url( $icon['src'] );
		$icon_alt     = esc_attr( $icon['alt'] );
		$box_title    = esc_html( $box['crb_box_title'] );
		$box_content  = $box['crb_text_editor'];
		$button_label = esc_html( $box['crb_button_label'] );


		?>
		<div class="uk-panel uk-panel-box uk-panel-hover uk-text-center uk-panel-space <?php if($animation_boxes)
		{echo 'uk-invisible';} ?> ">
			<?php if ( $icon_url || $box_title ) { ?>
				<div class="uk-panel-header">
					<?php if ( $icon_url ) { ?>
						<div class="uk-text-center uk-panel-teaser">
							<img src="<?php echo $icon_url; ?>"
							     alt="<?php echo $icon_alt ?>"
							     width="60px"
							     height="60px"
							     class="">
						</div>
					<?php }
					if ( $box_title ) {
						?>
						<h3 class="uk-panel-title uk-h2"><?php echo $box_title; ?></h3>
					<?php } ?>
				</div>
			<?php }
			if ( $box_content ) {
				?>
				<p><?php echo $box_content; ?></p>
			<?php } ?>
			<?php if ( $button_label ) { ?>
				<a href="<?php echo esc_attr( $box['crb_link_url'] ); ?>"
				   class="uk-button uk-text-center "><?php echo $button_label;
					?></a>
			<?php } ?>
		</div>

	<?php }

}