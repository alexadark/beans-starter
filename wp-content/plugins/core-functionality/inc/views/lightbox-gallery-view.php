<?php
$id     = esc_attr( $layout['crb_markupid'] );
$filter = $id ?  $id  : '';

echo beans_open_markup( 'lightbox_gallery_wrapper'.$filter.'', 'div', array( 'class' => 'tm-lightbox-gallery' ) );
	echo beans_open_markup( 'lightbox_gallery'.$filter.'', 'div', array(
	'class'             => 'uk-grid uk-grid-width-medium-1-3',
	'data-uk-grid'      => 'gutter:1',
	'data-uk-scrollspy' => "{cls:'uk-animation-fade uk-invisible',target:'>.uk-panel', delay:200, repeat:true}"
) );
		wst_get_layout_items( $layout, 'crb_gallery_items', 'views/lightbox-gallery-item-view.php' );
	echo beans_close_markup( 'lightbox_gallery'.$filter.'', 'div' );
 echo beans_close_markup( 'lightbox_gallery_wrapper'.$filter.'', 'div' );
