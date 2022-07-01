/* Script on ready
---------------------------------*/
$=jQuery;
jQuery(document).ready(function () {

    $(".blog-slider").slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
    },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]
    });

    $(".testimonials-slider").slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    //  The menu
    $('#menu12').mmenu({
        extensions: ['effect-slide-menu', 'pageshadow'],
        searchfield: false,
        counters: false,
        offCanvas: {
            position: 'right',
        }
    });
    var API = jQuery('#menu12').data('mmenu');
    jQuery('#nav-icon1').click(function () {
        API.close();
    });
    //  The menu End

});

/* Script on load
----------------------------------*/
jQuery(window).on('load', function () {
    /* sticky footer function */
    StickyFooter();
    
     equalheight('.wre-items.grid-view li .inner-container .image');
       equalheight('.wre-items.grid-view li');
    equalheight('.blog-block .blog-content');
    equalheight('.testimonials-block .testimonials-info');

    jQuery('.property-main .wre-content .wre-ordering, .property-main .wre-content .wre-view-switcher').wrapAll('<div class="pr-filter"></div>');
    setTimeout(function () {
        jQuery('.property-main .wre-content .page-title, .pr-filter').wrapAll('<div class="list-header"></div>') 
    });

});

/* Script on scroll
---------------------------------*/
jQuery(window).scroll(function () {

});

/* Script on resize
---------------------------------*/
jQuery(window).resize(function () {

     equalheight('.wre-items.grid-view li .inner-container .image');
       equalheight('.wre-items.grid-view li');
    equalheight('.blog-block .blog-content');
    equalheight('.testimonials-block .testimonials-info');

    /* sticky footer function */
    setTimeout(function () {
        StickyFooter();
    }, 50);

});


/* Script all functions
----------------------------------*/

/* sticky footer function */
function StickyFooter() {
    var st = $('footer').outerHeight();
    $('#wrapper').css({
        'margin-bottom': -st,
        'padding-bottom': st
    });
}

// equal height testimonials block
equalheight = function (container) {

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function () {

        $el = $(this);
        $($el).height('auto');
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
};