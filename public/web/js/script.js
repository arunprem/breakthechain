$(document).ready(function () {

    "use strict";


    /* Global Variables */

    var window_w = $(window).width(); // Window Width
    var window_h = $(window).height(); // Window Height
    var window_s = $(window).scrollTop(); // Window Scroll Top

    var $html = $('html'); // HTML
    var $body = $('body'); // Body 
    var $header = $('#header');	// Header 
    var $footer = $('#footer');	// Footer


    // On Resize
    $(window).resize(function () {

        window_w = $(window).width();
        window_h = $(window).height();
        window_s = $(window).scrollTop();

    });

    // On Scroll
    $(window).scroll(function () {

        window_s = $(window).scrollTop();

    });


    /* Modernizr Fix */

    var supportPerspective = Modernizr.testAllProps('perspective');
    if (supportPerspective)
        $html.addClass('csstransforms3d');
    else
        $html.addClass('notcsstransforms3d');





    /* Main Functions */


    /* Layout Options */

    // enableStickyHeader(); // Sticky Header 

    // enableFullWidth(); // Full Width Section

    //enableTooltips(); // Tooltips



    enableBackToTop(); // Back to top button

    enableMobileNav(); // Mobile Navigation
















    /* ============================== */
    /* 			FUNCTIONS		      */
    /* ============================== */



    /* Sticky Header */
    function enableStickyHeader() {

        var stickyHeader = $body.hasClass('sticky-header-on');

        var resolution = 991;
        if ($body.hasClass('tablet-sticky-header'))
            resolution = 767

        if (stickyHeader && window_w > resolution) {
            $header.addClass('sticky-header');
            var header_height = $header.innerHeight();
            $body.css('padding-top', header_height + 'px');
        }

        $(window).scroll(function () {
            animateHeader();
        });

        $(window).resize(function () {

            animateHeader();

            if (window_w < resolution) {

                $header.removeClass('sticky-header').removeClass('animate-header');
                $body.css('padding-top', 0 + 'px');

            } else {

                $header.addClass('sticky-header');
                var header_height = $header.innerHeight();
                $body.css('padding-top', header_height + 'px');

            }

        });

        function animateHeader() {

            if (window_s > 100) {

                $('#header.sticky-header').addClass('animate-header');

            } else {

                $('#header.sticky-header').removeClass('animate-header');

            }

        }

    }










    function enableFullWidth() {

        // Full Width Elements
        var $fullwidth_el = $('.full-width, .full-width-slider');


        // Set Full Width on resize
        $(window).resize(function () {

            setFullWidth();

        });

        // Fix Full Width at Window Load
        $(window).load(function () {

            setFullWidth();

        });

        // Set Full Width Function
        function setFullWidth() {

            $fullwidth_el.each(function () {

                var element = $(this);

                // Reset Styles
                element.css('margin-left', '');
                element.css('width', '');


                if (!$body.hasClass('boxed-layout')) {

                    var element_x = element.offset().left;

                    // Set New Styles
                    element.css('margin-left', -element_x + 'px');
                    element.css('width', window_w + 'px');

                }

            });

        }

    }




    /* Tooltips */
    /*
     function enableTooltips() {
     
     // Tooltip on TOP
     $('.tooltip-ontop').tooltip({
     placement: 'top'
     });
     
     // Tooltip on BOTTOM
     $('.tooltip-onbottom').tooltip({
     placement: 'bottom'
     });
     
     // Tooltip on LEFT
     $('.tooltip-onleft').tooltip({
     placement: 'left'
     });
     
     // Tooltip on RIGHT
     $('.tooltip-onright').tooltip({
     placement: 'right'
     });
     
     }
     
     */
    /* Back To Top Button */
    function enableBackToTop() {

        $('#button-to-top').hide();

        /* Show/Hide button */
        $(window).scroll(function () {

            if (window_s > 100 && window_w > 991) {
                $('#button-to-top').fadeIn(300);
            } else {
                $('#button-to-top').fadeOut(300);
            }

        });

        $('#button-to-top').click(function (e) {

            e.preventDefault();
            $('body,html').animate({scrollTop: 0}, 600);

        });

    }


    /* Mobile Navigation */
    function enableMobileNav() {

        /* Menu Button */
        $('#menu-button').click(function () {

            if (!$('#navigation').hasClass('navigation-opened')) {

                $('#navigation').slideDown(500).addClass('navigation-opened');

            } else {

                $('#navigation').slideUp(500).removeClass('navigation-opened');

            }

        });


        /* On Resize */
        $(window).resize(function () {

            if (window_w > 991) {

                $('#navigation').show().attr('style', '').removeClass('navigation-opened');

            }

        });


        /* Dropdowns */
        $('#navigation li').each(function () {

            if ($(this).find('ul').length > 0) {
                $(this).append('<div class="dropdown-button"></div>');
            }

        });

        $('#navigation .dropdown-button').click(function () {

            $(this).parent().toggleClass('dropdown-opened').find('>ul').slideToggle(300);

        });


    }


























});
