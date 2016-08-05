<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'Theme Options' )
         ->add_fields( array(
	         Field::make( 'set', 'crb_active_layouts' )
	              ->add_options( array(
		              'text_area'       => 'Text Area',
		              'slider'          => 'Slider',
		              'slideshow_panel' => 'Slideshow Panel',
		              'parallax'        => 'Parallax Area',
		              'panel_switcher'  => 'Panel Switcher'
	              ) )
         ) );