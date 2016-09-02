<?php
$id = esc_attr($layout['crb_markupid']);
$filter = $id ? $id : '';

echo beans_open_markup('text_editor'.$filter.'','div',array('class'=>'uk-container uk-container-center uk-margin-large'));
	echo $text_area ;
echo beans_close_markup('text_editor'.$filter.'','div'); ?>