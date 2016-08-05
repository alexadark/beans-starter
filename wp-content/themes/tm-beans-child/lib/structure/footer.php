<?php
beans_add_smart_action('wp','wst_set_up_footer_structure');
function wst_set_up_footer_structure(){
	beans_wrap_markup( 'beans_footer', 'beans_footer_wrapper', 'div', array( 'class' => 'tm-footer-wrapper' ) );

	//FAT FOOTER
	beans_add_smart_action( 'beans_footer_wrapper_prepend_markup', 'wst_display_fat_footer' );
	function wst_display_fat_footer() {
		?>
		<div class="tm-fat-footer uk-block">
			<div class="uk-container uk-container-center">
				<?php echo beans_widget_area( 'fat-footer' ); ?>
			</div>
		</div>

	<?php }
}