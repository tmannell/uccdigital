(function ($) {
    $(document).ready(function($) {
        var alterClass = function () {
            var ww = document.body.clientWidth;
            if (ww < 768) {
                $('.ucc-navs').removeClass('nav-pills');
            } else if (ww >= 768) {
                $('.ucc-navs').addClass('nav-pills');
            }
            ;
        };
        $(window).resize(function () {
            alterClass();
        });
        //Fire it when the page first loads:
        alterClass();
    })
})(jQuery);
