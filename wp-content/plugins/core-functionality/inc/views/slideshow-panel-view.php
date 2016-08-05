<div class="tm-slideshow-panel <?php echo $animate_class; ?>">
	<div class="uk-grid uk-grid-collapse"
	     data-uk-grid-match>
		<?php include( 'slider-view.php' ); ?>

		<div class="<?php echo $layout['crb_slider_text_classes']; ?>"
		     data-uk-slideshow>
			<ul class="uk-slideshow">
				<?php wst_display_text_slides( $layout ); ?>

			</ul>
		</div>

	</div>
</div>