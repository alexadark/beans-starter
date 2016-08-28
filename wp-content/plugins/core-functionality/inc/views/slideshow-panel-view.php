<?php
$id = esc_attr($layout['crb_markupid']);
$filter = $id ?'[_'.$id.']' : '';
echo beans_open_markup('slideshow_panel_wrapper'.$filter.'','div',array(
	'class'=>'tm-slideshow-panel slideshow-panel-animate',
));
?>
	<div class="uk-grid uk-grid-collapse"
	     data-uk-grid-match>
		<?php
		//image slider
		echo beans_open_markup('slideshow_panel_image'.$filter.'','div',array(
			'class'=> 'uk-width-medium-1-2',
		));
		include( 'slider-view.php' );
		echo beans_close_markup('slideshow_panel_image'.$filter.'','div'); //end image slider

		//text slider
		echo beans_open_markup('slideshow_panel_text'.$filter.'','div', array(
			'class'=>'uk-width-medium-1-2 uk-panel-box-secondary uk-flex uk-flex-center uk-flex-middle',
			'data-uk-slideshow' =>''
		));
		?>

			<ul class="uk-slideshow">
				<?php wst_get_layout_items($layout,'crb_slides_text','views/text-slides-view.php'); ?>

			</ul>
		<?php beans_close_markup('slideshow_panel_text'.$filter.'','div'); //end slider text?>

	</div>


<?php echo beans_close_markup('slideshow_panel_wrapper'.$filter.'','div');?>