<?php
$id     = esc_attr( $layout['crb_markupid'] );
$filter = $id ? $id : '';
echo beans_open_markup( 'slider_wrapper' . $filter . '', 'div',
	array(
		'class'             => 'tm-slider uk-slidenav-position uk-margin-large',
		'data-uk-slideshow' => '{ animation:\'swipe\',kenburns:true}'
	) ); ?>
	<ul class="uk-slideshow">
		<?php wst_get_layout_items( $layout, 'crb_slides', 'views/slide-view.php' ); ?>
	</ul>
	<a href="#"
	   class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
	   data-uk-slideshow-item="previous"></a>
	<a href="#"
	   class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
	   data-uk-slideshow-item="next"></a>
<?php echo beans_open_markup( 'dotnav' . $filter . '', 'ul', array(
	'class' => 'uk-dotnav uk-dotnav-contrast uk-position-bottom
 uk-flex-center'
) );

wst_display_dotnav_items( $layout );

beans_close_markup( 'dotnav' . $filter . '', 'ul' );

echo beans_close_markup( 'slider_wrapper' . $filter . '', 'div' ); ?>