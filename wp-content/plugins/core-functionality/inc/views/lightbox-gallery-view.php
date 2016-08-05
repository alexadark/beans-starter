<div class="tm-lightbox-gallery <?php echo esc_attr($layout['crb_classes']);?>">
		<div class="uk-grid <?php echo esc_attr($layout['crb_grid_width']);?>"
		     data-uk-grid="{gutter:'<?php echo esc_attr($layout['crb_grid_gutter']);?>'}"
		     data-uk-scrollspy="{cls:'uk-animation-<?php echo esc_attr($layout['crb_animation_name']);?> uk-invisible',
		     target:'>.uk-panel', delay:<?php echo esc_attr($layout['crb_animation_delay']);?>,
		     repeat:true}">

			<?php wst_display_lightbox_gallery_items($layout); ?>

</div>
</div>
