/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        // ==========================================================================
        // Mobil menu
        // ==========================================================================

        $('#nav-icon').click(function () {
            $(this).toggleClass('open');
            if($('#nav-icon').hasClass('open')){
                $(".mobil-menu").slideDown("slow");
            } else {
                $(".mobil-menu").slideUp("slow");
            }
        });
        $('.menu-item a').click(function () {
            if($('#nav-icon').hasClass('open')){
                $(".mobil-menu").slideUp("slow");
                $('#nav-icon').removeClass('open');
            }
        });

        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
            if (scroll >= 100) {
                $(".banner").addClass("small-banner");
            } else {
                $(".banner").removeClass("small-banner");
            }
        });

        // ==========================================================================
        // SMOOTH SCROLL TO ANCHOR
        // ==========================================================================
        $('a[href*=\\#]:not([href=\\#])').click(function() {
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $(this.hash + '_toggle').delay(1000).attr('checked', 'checked');
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
          });
        // ==========================================================================
        // Fancybox
        // ==========================================================================

        $('[data-fancybox="gallery"]').fancybox({
            loop: true,
            btnTpl: {
                arrowLeft:
                    '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}">' +
                    '<div><i class="fa fa-chevron-left" aria-hidden="true"></i></div>' +
                    "</button>",

                arrowRight:
                    '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}">' +
                    '<div><i class="fa fa-chevron-right" aria-hidden="true"></i></div>' +
                    "</button>",
            }
        });

        // ==========================================================================
        // Carousel
        // ==========================================================================

        $(".owl-banner").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            lazyLoad: true,
            dots: false,
            navigation: false,
        });

        $(".owl-slider").owlCarousel({
            center: true,
            items:1,
            loop:true,
            margin:0,
            autoplay: true,
            navigation: false,
            responsive: {
                768: {
                    items:2,
                    margin:10,
                }
            }
        });

        // ==========================================================================
        // Masonry gallery
        // ==========================================================================
        var albumContainer = $('.album-container').masonry({
            // options
            itemSelector: '.album-box',
            columnWidth: '.album-box',
            percentPosition: true
        });
        albumContainer.imagesLoaded().progress( function() {
            albumContainer.masonry('layout');
        });

        var gallery =  $('.gallery').masonry({
            // options
            itemSelector: '.image-gallery',
            columnWidth: '.image-gallery',
            percentPosition: true
        });
        gallery.imagesLoaded().progress( function() {
            gallery.masonry('layout');
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
