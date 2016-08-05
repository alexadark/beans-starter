<div class="uk-panel uk-invisible <?php echo esc_attr($item['crb_gallery_item_classes']);?>">
	<figure class="uk-overlay uk-overlay-hover">
		<img src="<?php echo $image_url; ?>"
		     class="uk-overlay-<?php echo esc_attr($item['crb_animation_name']);?>"
		     alt="<?php echo $image_alt; ?>">
		<div class="uk-overlay-panel uk-overlay-background uk-overlay-<?php echo esc_attr
		($item['crb_overlay_background_animation']);?> "></div>
		<div class="uk-overlay-panel uk-overlay-<?php echo esc_attr
		($item['crb_overlay_content_animation']);?> uk-flex uk-flex-center
					uk-flex-middle
					uk-text-center">
			<div>
				<?php echo $content; ?>
			</div>
		</div>
		<a href="<?php echo $image_url; ?>"
		   class="uk-position-<?php echo esc_attr
		   ($item['crb_lightbox_position']);?>"
		   data-lightbox-type="image"
		   data-uk-lightbox="{group:'gallery'}"
		   title="<?php echo $image_title; ?>"
		></a>
	</figure>
</div>