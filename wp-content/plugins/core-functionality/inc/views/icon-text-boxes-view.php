<?php
$id              = esc_attr( $layout['crb_markupid'] );
$filter          = $id ? '[_' . $id . ']' : '';
$title           = esc_html( $layout['crb_section_title'] );
$animation_boxes = esc_attr( $layout['crb_animation_boxes'] );

echo beans_open_markup( 'icon_text_boxes'.$filter.'', 'section', array(
	'id'    => 'icon-text-boxes',
	'class' => 'tm-icon-text-boxes uk-container uk-container-center uk-margin-large'
) );
		echo beans_open_markup( 'section_title_wrapper'.$filter.'', 'div', array(
			'class'             => 'tm-section-title uk-text-center  ',
			'data-uk-scrollspy' => "{cls:'uk-animation-slide-top'}"
		) );
				echo beans_open_markup( 'section_title'.$filter.'', 'h2', array(
					'class'    => 'uk-heading-large',
				) );
						echo $title;
				echo beans_close_markup( 'section_title'.$filter.'', 'h2' );
				echo beans_open_markup( 'divider'.$filter.'', 'div', array(
					'class'    => 'divider',
				) );
					echo beans_open_markup( 'divider_icon'.$filter.'', 'div', array(
						'class'    => 'uk-icon-heart-o uk-icon-small',
					) );

					echo beans_close_markup( 'divider_icon'.$filter.'', 'div' );

				echo beans_close_markup( 'divider'.$filter.'', 'div' );



		echo beans_close_markup( 'section_title_wrapper', 'div' );
		echo beans_open_markup( 'icon_text_boxes_grid', 'div', array(
			'class'             => 'uk-grid uk-grid-width-medium-1-3 uk-margin-large-top',
			'data-uk-scrollspy' => "{cls:'uk-animation-slide-right uk-invisible',
				target:'>.uk-panel', delay:200}"
		) );
			 wst_get_layout_items( $layout, 'text_boxes_items', 'views/icon-text-boxes-item-view.php' );

		echo beans_close_markup( 'icon_text_boxes_grid', 'div' );
echo beans_close_markup( 'icon_text_boxes', 'section' );
