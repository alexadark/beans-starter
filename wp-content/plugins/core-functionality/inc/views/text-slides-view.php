<?php
$id = esc_attr($layout['crb_markupid']);
$filter = $id ?'[_'.$id.']' : '';
$content       = $item['crb_slide_content'];
?>
<li>
	<?php
	echo beans_open_markup( 'slide_text'.$filter.'', 'div', array( 'class' => 'uk-width-2-3 uk-container-center 
	uk-text-center'
	) );
	echo $content;
	echo beans_close_markup( 'slide_text'.$filter.'', 'div' );?>
</li>