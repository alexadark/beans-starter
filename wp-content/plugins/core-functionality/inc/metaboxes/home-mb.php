<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta','Home Images')
	->show_on_post_type('page')
	->show_on_page( (int) get_option( 'page_on_front' ) )
	->add_fields(array(
		Field::make('image','crb_top_image')
		->help_text('add the image to display on the top of the front page')
	));
