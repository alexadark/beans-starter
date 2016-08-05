<li>

	<?php if ( $badge_title ) { ?>
		<span class="<?php echo $badge_classes ?>"><?php echo $badge_title; ?></span>
	<?php }
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
	} else { ?>
		<div class="<?php echo $slide_caption_classes; ?>">
			<div>
				<?php echo $slide_caption; ?>
			</div>
		</div>
	<?php } ?>
</li>