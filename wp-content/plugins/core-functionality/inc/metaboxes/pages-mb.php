<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'header_image' )
         ->show_on_post_type( 'page' )
         ->add_fields( array(
         	Field::make('image','crb_header_image'),
	));
