<?php
$id = esc_attr($layout['crb_markupid']);
$filter = $id ?'[_'.$id.']' : '';
$slide_id              = esc_html( $item['crb_slider_images'] );
$slide_image           = wp_get_attachment( $slide_id );
$slide_url             = esc_url( $slide_image['src'] );
$slide_alt             = esc_attr( $slide_image['alt'] );
$slide_title           = esc_attr( $slide_image['title'] );
$slide_caption         = $item['crb_slide_caption'];
$badge_title           = esc_html( $item['crb_badge_title'] );
$slide_choice          = $item['crb_type_of_media'];
$vimeo                 = $item['crb_vimeo'];
$youtube               = $item['crb_youtube'];
?>
<li>

	<?php if ( $badge_title ) {
			echo beans_open_markup( 'panel_badge'.$filter.'', 'span', array( 'class' => 'tm-slideshow-panel-badge uk-badge uk-position-top-right' ) );
					echo $badge_title;
			echo beans_close_markup( 'panel_badge'.$filter.'', 'span' );
			  }
	if ( $slide_choice == 'image' ) {
		?>

		<img src="<?php echo $slide_url; ?>"
		     alt="<?php echo $slide_alt; ?>"
		     title="<?php echo $slide_title ?>">
	<?php } elseif ( $slide_choice == 'vimeo') { ?>
		<iframe src="https://player.vimeo.com/video/<?php echo $vimeo;?>?autoplay=1;loop=1;controls=0;showinfo=0;"
		        width="480"
		        height="270"
		        allowfullscreen="">
		</iframe>
	<?php } else { ?>
		<iframe src="http://www.youtube.com/embed/<?php echo $youtube; ?>?autoplay=1;loop=1;controls=0;showinfo=0;"
		        width="480"
		        height="270"
		        allowfullscreen="">
		</iframe>
	<?php }

	if ( ! $slide_caption ) {
		return;
	} else {
		echo beans_open_markup( 'slide_caption'.$filter.'', 'div', array( 'class' => 'uk-overlay-panel uk-overlay-background uk-overlay-active  uk-flex uk-flex-center uk-flex-middle uk-text-center' ) ); ?>
			<div>
				<?php echo $slide_caption; ?>
			</div>
		<?php echo beans_close_markup( 'slide_caption'.$filter.'', 'div' );
	 } ?>
</li>