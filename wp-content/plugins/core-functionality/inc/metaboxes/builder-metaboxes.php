<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;



Container::make( 'post_meta', 'layouts' )
         ->show_on_post_type( 'page' )
         ->show_on_template( 'builder-page.php' )
         ->add_fields( array(
	         crb_get_layouts_complex_field( 'crb_block_layouts' )
         ));
function crb_get_layouts_complex_field($name){
	$dotnav_classes = Field::make( 'text', 'crb_dotnav_classes')
	                       ->set_default_value( 'uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center' );
	$slider_images  = Field::make( 'image', 'crb_slider_images', __('Image', CHILD_TEXT_DOMAIN ))
	                       ->set_conditional_logic( array(
		                       array(
			                       'field' => 'crb_type_of_media',
			                       'value' => 'image'
		                       )
	                       ) );
	$animation_data = Field::make( 'text', 'crb_animation_data' );
	$classes        = Field::make( 'text', 'crb_classes', 'Custom Classes' );
	$id             = Field::make( 'text', 'crb_section_id' )->help_text( 'give and id to the section in order to link it to the menu' );
	$content        = Field::make( 'rich_text', 'crb_text_editor', 'Content' );
	$media_select   = Field::make( "select", "crb_type_of_media" )
	                       ->add_options( array(
		                       'image'   => 'Image',
		                       'vimeo'   => 'Video Vimeo',
		                       'youtube' => 'Video Youtube'
	                       ) );
	$vimeo          = Field::make( 'text', 'crb_vimeo', 'Vimeo ID' )
	                       ->set_conditional_logic( array(
		                       array(
			                       'field' => 'crb_type_of_media',
			                       'value' => 'vimeo'
		                       )
	                       ) );
	$youtube        = Field::make( 'text', 'crb_youtube', 'Youtube ID' )
	                       ->set_conditional_logic( array(
		                       array(
			                       'field' => 'crb_type_of_media',
			                       'value' => 'youtube'
		                       )
	                       ) );



	$animation_name   = Field::make( 'text', 'crb_animation_name' )->help_text( 'choose between fade, slide-top, 
slide-bottom, slide-left, slide-right, scale, scale-down, scale-up, shake , leave blank if you don\'t want any 
animation' );
	$animation_repeat = Field::make( 'text', 'crb_animation_repeat' )
	                         ->help_text( 'true or false : if you want the animation to 
repeat each 
time that the item appears on the screen, write true, if you want to see the animation only the first time write false
 ' )
	                         ->set_default_value( 'true' )
	                         ->set_required( 'true' );

	$animation_delay  = Field::make( 'text', 'crb_animation_delay' )
	                         ->help_text( 'choose the delay for the animation in ms, 
default is 300' )
	                         ->set_default_value( '300' );

	$column_desktop = Field::make( 'text', 'crb_col_desktop', 'Column Number on Desktop' )->help_text( 'number of columns above
 768px' )
	                       ->set_default_value( '3' );
	$column_tablet  = Field::make( 'text', 'crb_col_tablet', 'Columns Number on Tablets' )->help_text( 'number of columns above 
480px, leave blank if it\'s one, and that you don\'t want a second breakpoint' );

	$active_layouts = (array) carbon_get_theme_option('crb_active_layouts');
	$complex = Field::make('complex',$name);
	$fields = array(
		/**
		 * TEXT AREA
		 */
		'text_area' => array(
			$classes,
			$content,
		),
		/**
		 * SLIDER
		 */
		'slider'=> array(
			$classes,
			$animation_data->set_default_value( 'autoplay:true, height:600, animation:\'swipe\'' ),

			Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     $media_select,
				     $slider_images,
				     $vimeo,
				     $youtube,
				     Field::make( 'text', 'crb_slide_caption_classes' )
				          ->set_default_value( 'uk-overlay-panel uk-overlay-background uk-overlay-active  uk-flex uk-flex-center
										uk-flex-middle
										uk-text-center' ),
				     Field::make( 'rich_text', 'crb_slide_caption' )
				          ->set_default_value( '<h3 class="uk-h4 uk-animation-middle-left">Grilling the good stuff
			                   since 1991</h3>
							<div class=" uk-margin">
								<h1 class="uk-heading-large">Gusto Steakhouse</h1>
								<p>San Francisco Avenue, Hamburg GER<br>
									Mon-Fri 10am – 12pm // Sat-Sun 1pm – 12pm</p>
							</div>' )
			     ) ),
			$dotnav_classes,
		),
		/**
		 * SLIDESHOW PANEL
		 */
		'slideshow_panel'=> array(
			$classes,
			$animation_data->set_default_value( 'height:\'400px\', animation:\'swipe\',kenburns:true' ),
			Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'text', 'crb_badge_title' ),
				     Field::make( 'text', 'crb_badge_classes' )->set_default_value( 'tm-slideshow-panel-badge uk-badge uk-position-top-right' ),
				     $media_select,
				     $slider_images,
				     $vimeo,
				     $youtube,
			     ) ),
			Field::make( 'text', 'crb_slider_text_classes' )
			     ->set_default_value( 'uk-width-medium-1-2 uk-panel-box-secondary uk-flex uk-flex-center uk-flex-middle' ),
			Field::make( 'complex', 'crb_slides_text' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'rich_text', 'crb_slide_content' ),
				     Field::make( 'text', 'crb_slide_content_classes' )
				          ->set_default_value( 'uk-width-2-3 uk-container-center uk-text-center' ),
			     ) ),
			$dotnav_classes,
		),
		/**
		 * PARALLAX AREA
		 */
		'parallax_area'=>array(
			$id,
			$classes,
			Field::make( 'text', 'crb_parallax_height' ),
			Field::make( 'image', 'crb_parallax_image' )->set_value_type( 'url' ),
			Field::make('color','crb_overlay_color',__('Overlay Color', CHILD_TEXT_DOMAIN))->help_text(__
			('if you want an overlay color write here the hexadecimal code, format #000000',CHILD_TEXT_DOMAIN)),
			Field::make('text','crb_overlay_opacity',__('Overlay Opacity', CHILD_TEXT_DOMAIN  ))->help_text
			(__('Write the overlay opacity that you want in decimal format, ex: 0.7',  CHILD_TEXT_DOMAIN )),
			Field::make( 'text', 'crb_content_classes', 'Content custom classes' ),
			$content,
		),
		/**
		 * PANEL SWITCHER
		 */
		'panel_switcher'=>array(
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
		'lightbox_gallery'=>array(
			$id,
			$classes,
			Field::make( 'text', 'crb_grid_width', 'Grid Width Classes' )->set_default_value
			( 'uk-grid-width-medium-1-3' ),
			Field::make( "separator", "crb_style_options", "Style" ),
			Field::make( 'text', 'crb_grid_gutter' ),
			$animation_name,
			Field::make( 'text', 'crb_animation_delay' )->set_default_value( '200' ),
			Field::make( 'complex', 'crb_gallery_items' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     Field::make( 'text', 'crb_gallery_item_classes' ),
				     $animation_name,
				     Field::make( 'image', 'crb_image' ),
				     Field::make( 'text', 'crb_image_size' ),
				     Field::make( 'text', 'crb_overlay_background_animation' )
				          ->set_default_value( 'fade' ),
				     Field::make( 'text', 'crb_overlay_content_animation' )
				          ->set_default_value( 'fade' ),
				     $content,
				     Field::make( 'text', 'crb_lightbox_position' )->set_default_value( 'cover' ),
//				              $media_select,
//				              $slider_images,
//				              $vimeo,
//				              $youtube,
				     Field::make( 'text', 'crb_lightbox_type' )->set_default_value( 'image' ),

			     ) )

		),
		/**
		 * ICON TEXT BOXES
		 */
		'icon_text_boxes'=>array(
			$id,
			$classes,
			$animation_repeat,
			$animation_name,
			$animation_delay,
			$column_desktop,
			$column_tablet,
			Field::make( 'text', __('crb_section_title', CHILD_TEXT_DOMAIN )),
			Field::make( 'text', 'crb_animation_boxes' )->help_text( 'Choose the animation for the boxes, choose 
		              between fade, slide-top, 
slide-bottom, slide-left, slide-right, scale, scale-down, scale-up, shake , leave blank if you don\'t want any 
animation' ),
			Field::make( 'complex', 'text_boxes_items' )->set_layout( 'tabbed' )
			     ->add_fields( array(
				     $classes,
				     Field::make( 'image', 'crb_icon' ),
				     Field::make( 'text', 'crb_box_title' ),
				     $content,
				     Field::make( 'text', 'crb_link_url' ),
				     Field::make( 'text', 'crb_button_label' )
			     ) )
		),


	);
	foreach ($active_layouts as $layout) {
		if ( empty( $fields[$layout] ) ) {
			continue;
		}

		$complex->add_fields( $layout, $fields[$layout] );
	}

	return $complex;
}
