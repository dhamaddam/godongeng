(function($) {
  'use strict';
  $(document).ready(function() {
    /* Microsoft Smooth Scroll Disabler */
    var url;
    // if (navigator.userAgent.match(/Trident\/7\./)) {
    //   $('body').on('mousewheel', function() {
    //     event.preventDefault();
    //     window.scrollTo(0, window.pageYOffset - event.wheelDelta / 1.5);
    //   });
    // }

    /* Browsers */
    if ($.browser.mozilla) {
      el_html.addClass('browser-mozilla');
    }
    if ($.browser.msie) {
      el_html.addClass('browser-msie');
    }
    if ($.browser.webkit) {
      el_html.addClass('browser-webkit');
    }
    if ($.browser.safari) {
      el_html.addClass('browser-safari');
    }

    /* Text Color */
    set_text_color();

    /* Font Size */
    set_font_size();

    /* Background Color */
    set_background();

    /* Height */
    set_height();

    /* Page Scroll */
    $('[data-scroll]').on('click', function(e) {
      var scroll;
      e.preventDefault();
      scroll = $(this).attr('data-scroll');
      if (scroll === 'up') {
        $('html, body').animate({
          scrollTop: 0
        }, 900, 'swing');
      } else if (scroll.charAt(0) === '#') {
        if (device.mobile()) {
          $('html, body').animate({
            scrollTop: $(scroll).offset().top - 55
          }, 900, 'swing');
        } else {
          $('html, body').animate({
            scrollTop: $(scroll).offset().top - 45
          }, 900, 'swing');
        }
      }
      return false;
    });

    /*Scrollspy*/
      // $('body').scrollspy({
      //   target: '#navigation-vertical',
      //   offset: 100
      //  })

    /* Skrollr Parallax */
    $('[data-parallax]').each(function() {
      var $this, attr;
      $this = $(this);
      attr = $this.attr('data-parallax');
      $this.attr('data-top-bottom', 'background-position: 50% -' + attr + 'px');
      $this.attr('data-bottom-top', 'background-position: 50% ' + attr + 'px');
      $this.attr('data-center', 'background-position: 50% 0px');
    });

    /* Selectize */
    if ($().selectize) {
      $('select').each(function() {
        $(this).selectize({
          create: true
        });
      });
    }

    /*Share*/
    if($().ShareLink){
      // console.log('share');
      $('.ct-js-share').each(function(){
        $(this).ShareLink();
      })
      // $('.ct-js-share').ShareLink();
    }

    if($().ShareCounter){
      $('.ct-js-share-counter').each(function(){
        $(this).ShareCounter();
      })
      // $('.ct-js-share-counter').ShareCounter();
      // console.log('counter');
    }

    if((navigator.userAgent.match(/iPad/i)) && (navigator.userAgent.match(/iPad/i)!= null)){
        $('.ct-media-container video').prop("controls",true);
    }

    /* Light Gallery */
    if ($().lightGallery) {
      $('.lightGallery').each(function() {
        $(this).lightGallery({
          thumbnail:true
        });
      });
    }

    /* Countdown */
    if ($().countdown) {
      $('.ct-js-countdown').each(function() {
        $(this).countdown('2016/4/1', function(event) {
           var $this = $(this).html(event.strftime(''
             + '<span class="ct-countdown-days">%D</span> '
             + '<span class="ct-countdown-hours">%H</span> '
             + '<span class="ct-countdown-min">%M</span> '
             + '<span class="ct-countdown-sec">%S</span> '
             + '<div class="clearfix"></div>'));
        });
      });
    }

    /*CountTo */
    if ($().countTo) {
      $('.ct-js-counter').each(function() {
        $(this).countTo();
      });
    }

    /*Chartist */

    if ($(".ct-charts-skills").length!==0) {
      new Chartist.Pie('.ct-chart-1', {
        series: [75, 25]
      }, {
        donut: true,
        donutWidth: 4,
        startAngle: 0,
        showLabel: false,
        chartPadding: 4,
      });
      new Chartist.Pie('.ct-chart-2', {
        series: [100]
      }, {
        donut: true,
        donutWidth: 4,
        startAngle: 0,
        chartPadding: 4,
        showLabel: false
      });
      new Chartist.Pie('.ct-chart-3', {
        series: [90, 10]
      }, {
        donut: true,
        donutWidth: 4,
        startAngle: 0,
        chartPadding: 4,
        showLabel: false
      });
    }

if ($(".ct-chart-animated").length !== 0) {
    var chart = new Chartist.Line('.ct-chart-animated', {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
      series: [
        [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
        [4,  5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
        [5,  3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
        [3,  4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
      ]
    }, {
      low: 0
    });

    // Let's put a sequence number aside so we can use it in the event callbacks
    var seq = 0,
      delays = 80,
      durations = 500;

    // Once the chart is fully created we reset the sequence
    chart.on('created', function() {
      seq = 0;
    });

    // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
    chart.on('draw', function(data) {
      seq++;

      if(data.type === 'line') {
        // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
        data.element.animate({
          opacity: {
            // The delay when we like to start the animation
            begin: seq * delays + 1000,
            // Duration of the animation
            dur: durations,
            // The value where the animation should start
            from: 0,
            // The value where it should end
            to: 1
          }
        });
      } else if(data.type === 'label' && data.axis === 'x') {
        data.element.animate({
          y: {
            begin: seq * delays,
            dur: durations,
            from: data.y + 100,
            to: data.y,
            // We can specify an easing function from Chartist.Svg.Easing
            easing: 'easeOutQuart'
          }
        });
      } else if(data.type === 'label' && data.axis === 'y') {
        data.element.animate({
          x: {
            begin: seq * delays,
            dur: durations,
            from: data.x - 100,
            to: data.x,
            easing: 'easeOutQuart'
          }
        });
      } else if(data.type === 'point') {
        data.element.animate({
          x1: {
            begin: seq * delays,
            dur: durations,
            from: data.x - 10,
            to: data.x,
            easing: 'easeOutQuart'
          },
          x2: {
            begin: seq * delays,
            dur: durations,
            from: data.x - 10,
            to: data.x,
            easing: 'easeOutQuart'
          },
          opacity: {
            begin: seq * delays,
            dur: durations,
            from: 0,
            to: 1,
            easing: 'easeOutQuart'
          }
        });
      } else if(data.type === 'grid') {
        // Using data.axis we get x or y which we can use to construct our animation definition objects
        var pos1Animation = {
          begin: seq * delays,
          dur: durations,
          from: data[data.axis.units.pos + '1'] - 30,
          to: data[data.axis.units.pos + '1'],
          easing: 'easeOutQuart'
        };

        var pos2Animation = {
          begin: seq * delays,
          dur: durations,
          from: data[data.axis.units.pos + '2'] - 100,
          to: data[data.axis.units.pos + '2'],
          easing: 'easeOutQuart'
        };

        var animations = {};
        animations[data.axis.units.pos + '1'] = pos1Animation;
        animations[data.axis.units.pos + '2'] = pos2Animation;
        animations['opacity'] = {
          begin: seq * delays,
          dur: durations,
          from: 0,
          to: 1,
          easing: 'easeOutQuart'
        };

        data.element.animate(animations);
      }
    });
  }


  /*Menu mobile*/

  $('.ct-js-menu-button').on('click', function(){
    $('.ct-menu-mobile').toggleClass('ct-menu-mobile-open');
  })

  $('.ct-js-menu-mobile-nav .dropdown').on('click', function(){
    $(this).toggleClass('ct-menu-mobile-nav-open').siblings().removeClass('ct-menu-mobile-nav-open')
  })

  $('#ct-js-wrapper').on('click', function(){
    var mobile_menu = $('.ct-menu-mobile');
    if(mobile_menu.hasClass('ct-menu-mobile-open')){
      mobile_menu.removeClass('ct-menu-mobile-open');
    }
  })

  $('.ct-js-open-map').on('click', function(){
    $('.ct-map-toggle').toggleClass('ct-map-open')
  })

    /*Navbar Search Simple*/

    $('.ct-js-search.ct-search-simple .ct-search-icon').on("click", function(){
      var parent = $(this).parent();
      parent.addClass("ct-search-open");
      parent.find('input').focus().focusout(function(){
        parent.removeClass("ct-search-open");
      });
    })

    /*Navbar Search */

    $('.ct-js-search .ct-search-icon').on("click", function(){
      var parent = $(this).parent();
      var input = parent.find('.ct-search-fluid');
      input.stop( true, true ).fadeIn();
    })

    /* Navbar Active Class */
    url = window.location;
    $('.navbar').find('a').filter(function() {
      this.href === url.href;
    }).closest('.nav-item').addClass('active');
  });

  $(document).mouseup(function (e) {
          var searchform = $(".ct-search-fluid");

          if(!searchform.is(e.target)){
              if (!searchform.is(e.target) // if the target of the click isn't the container...
                  && searchform.has(e.target).length === 0) // ... nor a descendant of the container
              {
                searchform.fadeOut();
              }
          }
      });

  $(window).on('scroll', function() {
    var scroll;
    scroll = $(window).scrollTop();

    /* Navbar Class */
    if (scroll > 75) {
      el_body.addClass('navbar-scrolled');
    } else {
      el_body.removeClass('navbar-scrolled');
    }
  });
  
  // $(window).on('load', function() {

  //   /* Skrollr */
  //   var skroll;
  //   if (!device.mobile() && !device.tablet() && !el_html.hasClass('ie8')) {
  //     skroll = skrollr.init({
  //       forceHeight: false
  //     });
  //   }
  // });
})(jQuery);
