<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'post_meta', 'layouts' )
         ->show_on_post_type( 'page' )
//         ->show_on_template( 'builder-page.php' )
//         ->show_on_page( (int) get_option( 'page_on_front' ) )
         ->add_fields( array(
		crb_get_layouts_complex_field( 'crb_block_layouts' )
	) );
function crb_get_layouts_complex_field( $name ) {
	$markupid = Field::make( 'text', 'crb_markupid', __( 'Unique MarkupId filter', CHILD_TEXT_DOMAIN ) )->help_text( __( 'setup an 
unique 
markup id 
filter
 in order to implement different attributes', CHILD_TEXT_DOMAIN ) );


	$slider_images = Field::make( 'image', 'crb_slider_images', __( 'Image', CHILD_TEXT_DOMAIN ) )
	                      ->set_conditional_logic( array(
		                      array(
			                      'field' => 'crb_type_of_media',
			                      'value' => 'image'
		                      )
	                      ) );

	$classes      = Field::make( 'text', 'crb_classes', 'Custom Classes' );
	$id           = Field::make( 'text', 'crb_section_id' )->help_text( 'give and id to the section in order to link it to the menu' );
	$content      = Field::make( 'rich_text', 'crb_text_editor', 'Content' );
	$media_select = Field::make( "select", "crb_type_of_media" )
	                     ->add_options( array(
		                     'image'   => 'Image',
		                     'vimeo'   => 'Video Vimeo',
		                     'youtube' => 'Video Youtube'
	                     ) );
	$vimeo        = Field::make( 'text', 'crb_vimeo', 'Vimeo ID' )
	                     ->set_conditional_logic( array(
		                     array(
			                     'field' => 'crb_type_of_media',
			                     'value' => 'vimeo'
		                     )
	                     ) );
	$youtube      = Field::make( 'text', 'crb_youtube', 'Youtube ID' )
	                     ->set_conditional_logic( array(
		                     array(
			                     'field' => 'crb_type_of_media',
			                     'value' => 'youtube'
		                     )
	                     ) );


	$active_layouts = (array) carbon_get_theme_option( 'crb_active_layouts' );
	$complex        = Field::make( 'complex', $name );
	$fields         = array(
		/**
		 * TEXT AREA
		 */
		'text_area'        => array(
			$markupid,
			$content,
		),
		/**
		 * SLIDER
		 */
		'slider'           => array(
			$markupid,
			Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     $media_select,
				     $slider_images,
				     $vimeo,
				     $youtube,

				     Field::make( 'rich_text', 'crb_slide_caption' )
				          ->set_default_value( '<h3 class="uk-h4 uk-animation-middle-left">Grilling the good stuff
			                   since 1991</h3>
							<div class=" uk-margin">
								<h1 class="uk-heading-large">Gusto Steakhouse</h1>
								<p>San Francisco Avenue, Hamburg GER<br>
									Mon-Fri 10am – 12pm // Sat-Sun 1pm – 12pm</p>
							</div>' ),
			     ) ),
		),
		/**
		 * SLIDESHOW PANEL
		 */
		'slideshow_panel'  => array(
			$markupid,
			Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'text', 'crb_badge_title' ),
				     $media_select,
				     $slider_images,
				     $vimeo,
				     $youtube,
			     ) ),

			Field::make( 'complex', 'crb_slides_text' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'rich_text', 'crb_slide_content' ),

			     ) ),
		),
		/**
		 * PARALLAX AREA
		 */
		'parallax_area'    => array(
			$markupid,
			Field::make( 'text', 'crb_parallax_height' ),
			Field::make( 'image', 'crb_parallax_image' )->set_value_type( 'url' ),
			Field::make( 'color', 'crb_overlay_color', __( 'Overlay Color', CHILD_TEXT_DOMAIN ) )->help_text( __
			( 'if you want an overlay color write here the hexadecimal code, format #000000', CHILD_TEXT_DOMAIN ) ),
			Field::make( 'text', 'crb_overlay_opacity', __( 'Overlay Opacity', CHILD_TEXT_DOMAIN ) )->help_text
			( __( 'Write the overlay opacity that you want in decimal format, ex: 0.7', CHILD_TEXT_DOMAIN ) ),
			$content,
		),
		/**
		 * PANEL SWITCHER
		 */
		'panel_switcher'   => array(
			$id,
			$classes->set_default_value( 'uk-container-center uk-container uk-block uk-margin-large ' ),
			Field::make( 'text', 'crb_subnav_classes' )->set_default_value( 'uk-subnav-pill  uk-flex uk-flex-center' ),
			Field::make( 'complex', 'crb_subnav' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'text', 'crb_subnav_item' ),
			     ) ),
			Field::make( 'complex', 'crb_switcher_content' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     $classes->set_default_value( '' ),
				     Field::make( 'complex', 'crb_switcher_content_item' )->set_layout( 'tabbed' )
				          ->add_fields( array(
					          Field::make( 'text', 'crb_badge_text' ),
					          Field::make( 'text', 'crb_panel_title', 'Title' ),
					          Field::make( 'image', 'crb_panel_image', 'Image' ),
					          Field::make( 'textarea', 'crb_panel_content', 'Content' )->set_rows( 3 ),

				          ) )
			     ) )
		),
		/**
		 * LIGHTBOX GALLERY
		 */
		'lightbox_gallery' => array(
			$markupid,
			Field::make( 'complex', 'crb_gallery_items' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'image', 'crb_image' ),
				     $content,
//				              $media_select,
//				              $slider_images,
//				              $vimeo,
//				              $youtube,
				     // Field::make( 'text', 'crb_lightbox_type' )->set_default_value( 'image' ),

			     ) )

		),
		/**
		 * ICON TEXT BOXES
		 */
		'icon_text_boxes'  => array(
			$markupid,
			$id,
			Field::make( 'text', __( 'crb_section_title', CHILD_TEXT_DOMAIN ) ),
			Field::make( 'complex', 'text_boxes_items' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'image', 'crb_icon' ),
				     Field::make( 'text', 'crb_box_title' ),
				     $content,
				     Field::make( 'text', 'crb_link_url' ),
				     Field::make( 'text', 'crb_button_label' )
			     ) )
		),


	);
	foreach ( $active_layouts as $layout ) {
		if ( empty( $fields[ $layout ] ) ) {
			continue;
		}

		$complex->add_fields( $layout, $fields[ $layout ] )->set_layout( 'tabbed' );
	}

	return $complex;
}
