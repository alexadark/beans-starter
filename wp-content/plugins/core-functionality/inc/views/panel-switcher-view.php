<div id="<?php echo $layout['crb_section_id'];?>" class="tm-panel-switcher uk-container uk-container-center 
uk-margin-large <?php echo 
esc_attr(
	$layout['crb_classes']
); ?>">
	<ul class="uk-subnav tm-subnav-panel-switcher <?php echo esc_attr( $layout['crb_subnav_classes'] ); ?> "
	    data-uk-switcher="{connect:'.switcher-content'}">
		<?php wst_display_subnav_items( $layout ); ?>
	</ul>
	<ul class="uk-switcher switcher-content" >
		<?php wst_display_switcher_items( $layout ); ?>
	</ul>
</div>