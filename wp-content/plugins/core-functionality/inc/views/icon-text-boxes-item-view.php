<?php
$id           = esc_attr( $layout['crb_markupid'] );
$filter       = $id ? '[_' . $id . ']' : '';
$icon_id      = esc_html( $item['crb_icon'] );
$icon         = wp_get_attachment( $icon_id );
$icon_url     = esc_url( $icon['src'] );
$icon_alt     = esc_attr( $icon['alt'] );
$box_title    = esc_html( $item['crb_box_title'] );
$box_content  = $item['crb_text_editor'];
$button_label = esc_html( $item['crb_button_label'] );
$button_link  = esc_attr( $item['crb_link_url'] );

echo beans_open_markup( 'icon_text_box_item_wrapper'.$filter.'', 'div', array(
	'class'    => 'uk-panel uk-panel-box uk-panel-hover uk-text-center uk-panel-space uk-invisible',
) );
if ( $icon_url || $box_title ):
	echo beans_open_markup( 'icon_text_box_header'.$filter.'', 'div', array(
		'class'    => 'uk-panel-header',
	) );
		if ( $icon_url ){
			echo beans_open_markup( 'icon_text_box_icon_wrapper'.$filter.'', 'div', array(
				'class'    => 'uk-text-center uk-panel-teaser',
			) );
			echo beans_open_markup( 'icon_text_box_img'.$filter.'', 'img', array(
				'src'    => $icon_url,
				'alt' => $icon_alt,
				'width'=> '60px',
				'height'=>'60px',
			) );


			echo beans_close_markup( 'icon_text_box_icon_wrapper'.$filter.'', 'div' );

		}
		if ( $box_title ){
			echo beans_open_markup( 'icon_box_item_title'.$filter.'', 'h3', array(
				'class'    => 'uk-panel-title uk-h2',
			) );
				echo $box_title;
			echo beans_close_markup( 'icon_box_item_title'.$filter.'', 'h3' );
		}
	echo beans_close_markup( 'icon_text_box_header'.$filter.'', 'div' );

endif;
	if ( $box_content ){
		echo beans_open_markup( 'icon_box_content_wrapper'.$filter.'', 'p');
		    echo $box_content;
		echo beans_close_markup( 'icon_box_content_wrapper'.$filter.'', 'p' );
	}
	if ( $button_label ) {
		echo beans_open_markup( 'icon_box_content_wrapper'.$filter.'', 'a', array(
			'class' => 'uk-button uk-text-center',
			'href'  => $button_link
		) );
			echo $button_label;
		echo beans_close_markup( 'icon_text_box_button'.$filter.'', 'a' );
	}

echo beans_close_markup( 'icon_text_box_item_wrapper'.$filter.'', 'div' );
