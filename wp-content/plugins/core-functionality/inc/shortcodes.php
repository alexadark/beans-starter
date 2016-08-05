<?php
//Pink block
add_shortcode('pink-block','wst_render_pink_block');
function wst_render_pink_block($atts, $content = null){
	return '<div class="pink-block">'.do_shortcode($content).'</div>';
}

add_shortcode('pink-text','wst_render_pink_text');
function wst_render_pink_text($atts, $content = null){
	return '<div class="pink-text">'.($content).'</div>';
}

//Blue form

add_shortcode('blue-form', 'wst_render_blue_form');
function wst_render_blue_form($atts){
	$default = array(
		'id' => 1,
		'title' => '',
	);
	$atts = shortcode_atts($default, $atts, 'blue-form');
	$html = '';
	$form_id = esc_attr($atts['id']);
	$title = $atts['title'];

	ob_start();
	include( 'views/blue-form.php' );
	$html .= ob_get_clean();

	return $html;


}
