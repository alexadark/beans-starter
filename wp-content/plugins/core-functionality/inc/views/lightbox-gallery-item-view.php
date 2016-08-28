<?php
$id     = esc_attr( $layout['crb_markupid'] );
$filter = $id ? '[_' . $id . ']' : '';
$image_id    = esc_html( $item['crb_image'] );
$image       = wp_get_attachment( $image_id );
$image_size  = esc_attr( $item['crb_image_size'] );
$image_url   = wp_get_attachment_image_url( $image_id, 'full' );
$image_alt   = esc_attr( $image['alt'] );
$image_title = esc_attr( $image['title'] );
$content     = $item['crb_text_editor'];
echo beans_open_markup( 'lightbox_gallery_item'.$filter.'', 'div', array( 'class' => 'uk-panel uk-invisible' ) );
	echo beans_open_markup( 'lightbox-gallery-figure'.$filter.'', 'figure', array( 'class' => 'uk-overlay 
	uk-overlay-hover' ) );
		echo beans_selfclose_markup( 'lightbox-gallery-image'.$filter.'', 'img', array(
		'src'   => $image_url,
		'class' => 'uk-overlay-scale',
		'alt'   => $image_alt,
	)
);
		echo beans_open_markup( 'lightbox_gallery_overlay'.$filter.'', 'div', array( 'class' => 'uk-overlay-panel uk-overlay-background uk-overlay-slide-top' ) );
		echo beans_close_markup( 'lightbox_gallery_overlay'.$filter.'', 'div' );
		echo beans_open_markup( 'lightbox_gallery_overlay_content'.$filter.'', 'div', array( 'class' => 'uk-overlay-panel uk-overlay-slide-top uk-flex uk-flex-center uk-flex-middle uk-text-center' ) );
			echo '<div>';
				echo $content;
			echo '</div>';

		echo beans_close_markup( 'lightbox_gallery_overlay_content'.$filter.'', 'div' );
		echo beans_open_markup( 'lightbox_gallery_lightbox'.$filter.'', 'a', array(
			'href '              => $image_url,
			'class'              => 'uk-position-cover',
			'data-lightbox-type' => 'image',
			'data-uk-lightbox'   => "{group:'gallery'}",
			'title'              => $image_title
		) );
		echo beans_close_markup( 'lightbox_gallery_lightbox'.$filter.'', 'a' );
	echo beans_close_markup( 'lightbox-gallery-figure'.$filter.'', 'figure' );
echo beans_close_markup( 'lightbox_gallery_item'.$filter.'', 'div' );
?>

