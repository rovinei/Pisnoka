var PISNOKA;
if (!PISNOKA) PISNOKA = {};
if (!PISNOKA.main) PISNOKA.main = {};

(function(){

    var func = PISNOKA.main;

    /** Banner slide **/
    /*************/
    func.animateSlide = function() {
        var current, next;
        // Time for opacity to appear the image in milisecond
        var fadeinTime = 3000;
        // Time to show the image in milisecond
        var appearTime = 6000;
        // Time to disappear the image with opacity in milisecond
        var fadeoutTime = 900;
        // atfer 1s removed the loading gif image.
        setTimeout(function() {
            $(".site_banner .load_banner").removeClass("loading");
        }, 1000);

        // funtion to swicth the banner image.
        (function switchImg() {

            // Query the document to get the first,next image
            current = $(".site_banner .banner_item.active");
            next = current.next();

            // check whether it's the last image.
            if (!next.length) {
                next = $(".site_banner .banner_item:first");
                current.find(".item_img").addClass("img_scale");
                current.css({"z-index":"1"});
                current.animate({
                    opacity: 1.0
                }, 1000, function() {
                    current.animate({
                        opacity: 0.99
                    }, 9000, function() {
                        next.addClass("active");
                        current.removeClass("active");
                        current.css("z-index", "0");
                        current.find(".item_img").removeClass("img_scale");

                        switchImg();
                    });
                });

            } else {
                // if it's not the last imgae, execute the following
                current.find(".item_img").addClass("img_scale");
                current.css("z-index", "1");
                current.animate({
                    opacity: 1.0
                }, 1000, function() {
                    current.animate({
                        opacity: 0.99
                    }, 9000, function() {
                        next.addClass("active");
                        current.removeClass("active");
                        current.css("z-index", "0");
                        current.find(".item_img").removeClass("img_scale");

                        switchImg();
                    });
                });
            }
        })();
    }


    /** initialized the slide banner when page first loaded **/
    /****************************************************/

    func.bannerInitialize = function() {
        $('.site_banner .load_banner').addClass('loading');
    }

    /** Synchronize mouse scroll with moving object **/
    /***********************************************/

    func.windowScroll = function() {

        /**/
        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop();
            var Winheight = $(window).height;

        });
    }

    /** Resize the height of banner slide, when window width get resize smaller **/
    /***********************************************************************/

    func.resizeBannerHeight = function() {
        var siteBanner, banner, bannerWidth, bannerHeight, bannerRatio, winWidth;

        banner = $('.banner_inner');
        siteBanner = $('.site_banner');
        /* Function to resize the height of banner to the right aspect ratio */
        // (function() {

        //     // bannerWidth = banner.width();
        //     // bannerRatio = 1600 / 800;

        //     // if(bannerWidth <= 767){  //753 === 768 in actual

        //     //     banner.css({
        //     //         "height": "300px",
        //     //         "min-height": "300px",
        //     //     });

        //     // }else{
        //     //     banner.css({
        //     //         "height": "100%",
        //     //     });
        //     // }

        //     $(window).resize(function() {
        //         winWidth = $(window).width();
        //         winHeight = $(window).height();
        //         console.log("height: "+winHeight);
        //         bannerWidth = banner.width();

        //         if(winWidth <= 767){  //753 === 768 in actual

        //             banner.css({
        //                 "height": "300px",
        //                 "min-height": "300px",
        //             });

        //         }/*else if(winWidth > 768 < 1300){
        //             banner.css({
        //                 "height": "600px",
        //             });
        //         }*/else{
        //             banner.css({
        //                 "height": "100%",
        //             });
        //         }

        //         /** when window resize => always slideup the mobile navigation **/
        //         if (winWidth > 768) {  //753 === 768 in actual

        //             $('.mobile_global_nav').fadeOut(300);
        //             $('.dropdown_ul').fadeOut(300);
        //         }

        //     });
        // })();
    }

    /** Animation for overlay hover **/
    /****************************/

    func.overlayAnimation = function() {
        $('.business_domain .frosted_glass').mouseenter(function() {
            $(this).find('.overlay_caption').fadeIn(180);
            $(this).find('.inner').addClass('img_scale');
        })

        .mouseleave(function() {
            $(this).find('.overlay_caption').fadeOut(180);
            $(this).find('.inner').removeClass('img_scale');
        });

        $('.works .canvas_box').mouseenter(function() {
            $(this).find('.overlay_caption').fadeIn(180);
            $(this).find('figure').addClass('img_scale');
        })

        .mouseleave(function() {
            $(this).find('.overlay_caption').fadeOut(180);
            $(this).find('figure').removeClass('img_scale');
        });
    }

    /** Check user-agent : mobile or computer **/
    /**************************************/

    func.checkUserAgent = function() {
        if (navigator.userAgent.match(/Mobi/)) {
            $('head').append('<link rel="stylesheet" type="text/css" href="public_html/css/mobile.css">');
            return ('ontouchstart' in document.documentElement);
        }
    }

    /** Smooth scroll to anchor in page **/
      /********************************/
    /*
        #usage : calling function =>
        PISNOKA.useful.SmoothScrollTo("element id");
        use with event onClick(), onMouseover() etc.
    */

    func.SmoothScrollTo = function(id){
        var element = $(id);
        if(element.length){
            var top = element.offset().top;
            $('.mobile_global_nav').slideUp() || true;
            $('html,body').stop().animate({ scrollTop: (top-60) },900,'swing');
        }
        return false;
    }

    /** Toggle navigation bar in mobile or smaller screen **/
      /**************************************************/
    /*
        #usage : calling function =>
        PISNOKA.useful.toggleMenu("class/id name with . or #");
        use with event onClick(), onMouseover() etc.
    */
    func.toggleMenu = function(target, extra){
        var extra = typeof extra !== 'undefined' ? extra : false;
        if(extra !== false){
            if(extra=='noscroll'){
                $('body').toggleClass('mobile_nav_open');
                $('.button_outer .bar').toggleClass('rotate');

            }else{
                $(extra).fadeOut(100);
                $('body').toggleClass('mobile_nav_open');
                $('.button_outer .bar').toggleClass('rotate');
            }
        }

        $(target).slideToggle(500);
    }


})();


$(document).ready(function() {
    PISNOKA.main.checkUserAgent();
    PISNOKA.main.bannerInitialize();
    PISNOKA.main.animateSlide();
    PISNOKA.main.resizeBannerHeight();
});

