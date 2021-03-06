/* Script on ready

// @codekit-prepend "./slick/js/_slick.min.js";
// @codekit-prepend "./blazy/_blazy.min.js";
// @codekit-prepend "./isotope/_imagesloaded.pkgd.min.js";
// @codekit-prepend "./isotope/_isotope.pkgd.min.js";


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

(function ($, root, undefined) {

    $(window).on('load', function() { 

        var slideWrapper = $('.avb .avb-banners');

        if(slideWrapper.length > 0) {

            var iframes = slideWrapper.find('.embed-player'),
            lazyImages = slideWrapper.find('.avb-banner__medium.image'),
            lazyCounter = 0;
            
            // Initialize
            slideWrapper.on('init', function(slick){
                slick = $(slick.currentTarget);
                setTimeout(function(){
                    playPauseVideo(slick,'play');
                }, 1000);
                resizePlayer(iframes, 16/9);
            });

            slideWrapper.on('beforeChange', function(event, slick) {
                slick = $(slick.$slider);
                playPauseVideo(slick, 'pause');
            });
        
            slideWrapper.on('afterChange', function(event, slick) {
                slick = $(slick.$slider);
                var wWidth = $('.avb .avb-banners').width();
                var action = wWidth >= 800 ? 'play' : 'pause';
                playPauseVideo(slick, action);
            });

            slideWrapper.on('lazyLoaded', function(event, slick, image, imageSource) {
                lazyCounter++;
                if (lazyCounter === lazyImages.length){
                    lazyImages.addClass('show');
                    slideWrapper.slick('slickPlay');
                }
            });

            //start the slider
            slideWrapper.slick({
                autoplaySpeed: 5000,
                lazyLoad: 'progressive',
                speed: 600,
                arrows: false,
                dots: true,
                rows: 0,
                cssEase: 'cubic-bezier(0.87, 0.03, 0.41, 0.9)'
            });

            // Resize event
            $(window).on('resize.slickVideoPlayer', function() { 
                resizePlayer(iframes, 16/9);
            });

        }

        $('.avb__down-arrow figure').on('click', function(evt) {
            var destination = $('.flexible__content').offset().top;

            $("html:not(:animated),body:not(:animated)").animate({
                scrollTop: destination
            }, 800);
        });

    });

    // POST commands to YouTube or Vimeo API
    function postMessageToPlayer(player, command) {
        if (player == null || command == null) return;
        player.contentWindow.postMessage(JSON.stringify(command), '*');
    }

    // When the slide is changing
    function playPauseVideo(slick, control) {
        var currentSlide, slideType, startTime, player, video;

        currentSlide = slick.find('.slick-current');
        slideType = currentSlide.data('type');
        player = currentSlide.find('iframe').get(0);
        startTime = currentSlide.data('video-start');

        if (slideType === 'avb_vimeo') {
            switch (control) {
                case 'play':
                    if ((startTime != null && startTime > 0 ) && !currentSlide.hasClass('started')) {
                        console.log(startTime);
                    currentSlide.addClass('started');
                    postMessageToPlayer(player, {
                        'method': 'setCurrentTime',
                        'value' : startTime
                    });
                    }
                    postMessageToPlayer(player, {
                        'method': 'play',
                        'value' : 1
                    });
                    break;
                case 'pause':
                    postMessageToPlayer(player, {
                        'method': 'pause',
                        'value': 1
                    });
                    break;
            }
        } else if (slideType === 'avb_youtube') {
            switch (control) {
                case 'play':
                    postMessageToPlayer(player, {
                        'event': 'command',
                        'func': 'mute'
                    });
                    postMessageToPlayer(player, {
                        'event': 'command',
                        'func': 'playVideo'
                    });
                    break;
                case 'pause':
                    postMessageToPlayer(player, {
                        'event': 'command',
                        'func': 'pauseVideo'
                    });
                    break;
            }
        } else if (slideType === 'avb_html_video') {
            video = currentSlide.find('video').get(0);
            if (video != null) {
                if (control === 'play'){
                    video.play();
                } else {
                    video.pause();
                }
            }
        }

    }

    // Resize player
    function resizePlayer(iframes, ratio) {
        if (!iframes[0]) return;
        var win = $('.avb .avb-banners'),
            width = win.width(),
            playerWidth,
            height = win.height(),
            playerHeight,
            ratio = ratio || 16/9;

        iframes.each(function(){
            var current = $(this);
            if (width / ratio < height) {
            playerWidth = Math.ceil(height * ratio);
            current.width(playerWidth).height(height).css({
                left: (width - playerWidth) / 2,
                top: 0
                });
            } else {
            playerHeight = Math.ceil(width / ratio);
            current.width(width).height(playerHeight).css({
                left: 0,
                top: (height - playerHeight) / 2
            });
            }
        });
    }


})(jQuery, this);