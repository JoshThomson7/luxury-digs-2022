function StickyFooter(){var e=$("footer").outerHeight();$("#wrapper").css({"margin-bottom":-e,"padding-bottom":e})}$=jQuery,jQuery(document).ready((function(){$(".blog-slider").slick({dots:!1,arrows:!0,infinite:!0,slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3,infinite:!0}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".testimonials-slider").slick({dots:!1,arrows:!0,infinite:!0,slidesToShow:1,slidesToScroll:1}),$("#menu12").mmenu({extensions:["effect-slide-menu","pageshadow"],searchfield:!1,counters:!1,offCanvas:{position:"right"}});var e=jQuery("#menu12").data("mmenu");jQuery("#nav-icon1").click((function(){e.close()}))})),jQuery(window).on("load",(function(){StickyFooter(),equalheight(".wre-items.grid-view li .inner-container .image"),equalheight(".wre-items.grid-view li"),equalheight(".blog-block .blog-content"),equalheight(".testimonials-block .testimonials-info"),jQuery(".property-main .wre-content .wre-ordering, .property-main .wre-content .wre-view-switcher").wrapAll('<div class="pr-filter"></div>'),setTimeout((function(){jQuery(".property-main .wre-content .page-title, .pr-filter").wrapAll('<div class="list-header"></div>')}))})),jQuery(window).scroll((function(){})),jQuery(window).resize((function(){equalheight(".wre-items.grid-view li .inner-container .image"),equalheight(".wre-items.grid-view li"),equalheight(".blog-block .blog-content"),equalheight(".testimonials-block .testimonials-info"),setTimeout((function(){StickyFooter()}),50)})),equalheight=function(e){var i,t=0,o=0,n=new Array;$(e).each((function(){if(i=$(this),$(i).height("auto"),topPostion=i.position().top,o!=topPostion){for(currentDiv=0;currentDiv<n.length;currentDiv++)n[currentDiv].height(t);n.length=0,o=topPostion,t=i.height(),n.push(i)}else n.push(i),t=t<i.height()?i.height():t;for(currentDiv=0;currentDiv<n.length;currentDiv++)n[currentDiv].height(t)}))};