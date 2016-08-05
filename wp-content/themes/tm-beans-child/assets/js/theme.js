
// Slideshow panel
(function ($) {
    $(document).ready(function () {
        $('.slideshow-panel-animate').on('beforeshow.uk.slideshow', function (e, next) {
            $(this)
                .find('[data-uk-slideshow]')
                .not(next.closest('[data-uk-slideshow]')[0])
                .data('slideshow')
                .show(next.index());
        });
    });
})(jQuery);