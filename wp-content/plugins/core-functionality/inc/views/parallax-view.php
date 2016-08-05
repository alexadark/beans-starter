<?php
$overlay_color = hex2rgb($layout['crb_overlay_color']);
$overlay_opacity = esc_attr($layout['crb_overlay_opacity']);
?>
<div id="<?php echo esc_attr($layout['crb_section_id'])?>" class="tm-parallax-area uk-text-contrast uk-flex
uk-flex-middle
uk-flex-center
	uk-text-center
	uk-container-center <?php echo
esc_attr($layout['crb_classes']);?>"
     data-uk-parallax="{bg:'-200', }">
	<div class="tm-parallax-content"  >
		<div class="<?php echo $layout['crb_content_classes'];?>" data-uk-parallax="{y:'-50,50'}" >
			<?php echo $layout['crb_text_editor']; ?>
		</div>
	</div>
</div>
<style>
	.tm-parallax-area{
		background: url(<?php echo esc_url($layout['crb_parallax_image']);?>) no-repeat;
		-webkit-background-size:cover;
		background-size:cover;
		min-height:<?php echo esc_attr($layout['crb_parallax_height']);?>
	}
	.tm-parallax-content{
		padding:<?php echo esc_attr($layout['crb_parallax_height'])/2;?>px 0;
		background-color: <?php echo sprintf( 'rgba( %1$s, %2$s, %3$s, %4$s )', $overlay_color['red'],
		$overlay_color['green'],$overlay_color['blue'], $overlay_opacity ); ?>
	}
</style>