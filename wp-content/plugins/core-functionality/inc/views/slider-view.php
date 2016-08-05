<div class="uk-slidenav-position <?php echo esc_attr( $layout['crb_classes'] ); ?>"
     data-uk-slideshow="{<?php echo esc_attr( $layout['crb_animation_data'] ); ?>}">
	<ul class="uk-slideshow">
		<?php wst_display_slides( $layout ); ?>
	</ul>
	<a href="#"
	   class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
	   data-uk-slideshow-item="previous"></a>
	<a href="#"
	   class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
	   data-uk-slideshow-item="next"></a>
	<ul class="<?php echo esc_attr( $layout['crb_dotnav_classes'] ); ?>">
		<?php wst_display_dotnav_items( $layout ) ?>
	</ul>

</div>