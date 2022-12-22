(function ($) { 
    "use strict"

    $(window).on('load', function () {
        /* 1. Preloader */
        $('#preloader').delay(450).fadeOut('slow');
        $('body').delay(450).css({
            'overflow': 'visible'
        });

        /* 2. Header scroll */
        $(document).on('scroll', function() {
            let selectHeader = $('#header');
            if (selectHeader) {
                if (window.scrollY > 100) {
                    selectHeader.addClass('header-scrolled');
                }
                else {
                    selectHeader.removeClass('header-scrolled');
                }
            }
        });
    });

})(jQuery);