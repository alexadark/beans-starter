<?php
// Enqueue uikit assets
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'wst_enqueue_uikit_assets', 5 );

function wst_enqueue_uikit_assets() {

// Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'beans_child', CHILD_URL . '/assets/less/initial-theme' );
//Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', array(

		CHILD_URL . '/assets/less/mymixins.less',

		CHILD_URL . '/assets/less/partials/default.less',
		CHILD_URL . '/assets/less/partials/typo.less',
		CHILD_URL . '/assets/less/layouts/text-area.less',
		CHILD_URL . '/assets/less/layouts/icon-text-boxes.less',
		CHILD_URL . '/assets/less/layouts/parallax.less',
		CHILD_URL . '/assets/less/layouts/lightbox-gallery.less',
		CHILD_URL . '/assets/less/layouts/slider.less',
		CHILD_URL . '/assets/less/layouts/slideshow-panel.less',
		CHILD_URL . '/assets/less/layouts/switcher.less',
		CHILD_URL . '/assets/less/partials/header.less',
		CHILD_URL . '/assets/less/partials/footer.less',
		CHILD_URL . '/assets/less/partials/nav.less',
		CHILD_URL . '/assets/less/partials/sidebar.less',
		CHILD_URL . '/assets/less/partials/widgets.less',
		CHILD_URL . '/assets/less/partials/content.less',
		CHILD_URL . '/assets/less/partials/pages.less',
		CHILD_URL . '/assets/less/style.less',
		

	), 'less' );

	beans_compiler_add_fragment( 'uikit', array(
		CHILD_URL . '/assets/js/animatedtext.js',
		CHILD_URL . '/assets/js/theme.js'
	), 'js' );

//	wst_add_theme_style_as_compiler_fragment();

	beans_uikit_enqueue_components( array(
		'contrast',
		'cover',
		'animation',
		'modal',
		'overlay',
		'column',
		'switcher',
		'scrollspy'
	) );
	beans_uikit_enqueue_components( array(
		'sticky',
		'slideshow',
		'slider',
		'lightbox',
		'grid',
		'parallax',
		'dotnav',
		'slidenav'
	),
		'add-ons' );

}

//google fonts
add_action( 'wp_enqueue_scripts', 'wst_add_google_fonts' );
function wst_add_google_fonts() {

	wp_enqueue_style( 'wst-google-fonts', 'https://fonts.googleapis.com/css?family=Noto+Serif:400,400i
|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i', false );
}

function wst_add_theme_style_as_compiler_fragment() {
	$styles = array(
		array(
			'handle'   => 'uikit',
			'file'     => CHILD_URL . '/assets/less/style.less',
			'language' => 'less'
		),
		array(
			'handle'   => 'uikit',
			'file'     => CHILD_URL . '/assets/less/mymixins.less',
			'language' => 'less'
		),
		array(
			'handle'   => 'uikit',
			'file'     => CHILD_URL . '/assets/js/theme.js',
			'language' => 'less'
		),
		array(
			'handle'   => 'uikit',
			'file'     => CHILD_URL . '/assets/js/animatedtext.js',
			'language' => 'js'
		),
	);
	foreach ( $styles as $style ) {

		beans_compiler_add_fragment(
			$style['name'],
			$style['file'],
			$style['language']
		);

	}
}
