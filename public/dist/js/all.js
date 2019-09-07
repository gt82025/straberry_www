"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

// init foundarion 
$(document).foundation(); //IE old version tip

var userAgent = window.navigator.userAgent;
var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;

if (userAgent.indexOf("MSIE 7.0") > 0 || userAgent.indexOf("MSIE 8.0") > 0 || userAgent.indexOf("MSIE 9.0") > 0 || navigator.appVersion.indexOf("MSIE 10") !== -1) {
  var url = "browser.html";
  setTimeout(function () {
    $(location).attr('href', url);
  }, 0);
}

var u = window.navigator.userAgent.toLocaleLowerCase(),
    ie11 = /(trident)\/([\d.]+)/,
    b = u.match(ie11);

if (b) {
  $(".footer_bar , .wrap , .search").addClass('ie');
} // doc ready


(function ($, window, document) {
  // Window 相關設定
  var w = window,
      win = $(window),
      ww,
      wh,
      ws; // 取得Window設定值

  var windowSetting = function windowSetting() {
    ww = win.innerWidth();
    wh = win.innerHeight();
    ws = win.scrollTop();
  };

  windowSetting(); // ----------------------------------- Window 相關監測
  // window on scroll use javascript
  // Reference: https://stackoverflow.com/a/10915048
  // http://dev.w3.org/2006/webapi/DOM-Level-3-Events/html/DOM3-Events.html#event-type-scroll

  function onScrollEventHandler(ev) {}

  function onResizeEventHandler(ev) {
    windowSetting();
  }

  if (w.addEventListener) {
    w.addEventListener('scroll', onScrollEventHandler, false);
    w.addEventListener('resize', onResizeEventHandler, false); // w.addEventListener('load', onLoadEventHandler, false);   
  } else if (w.attachEvent) {
    w.attachEvent('onscroll', onScrollEventHandler);
    w.attachEvent('onresize', onScrollEventHandler);
    w.attachEvent('load', onLoadEventHandler);
  } // -----------------------------------
  // =================================================
  //init ease scroll
  // ----------------------------------- 
  // $("html").easeScroll({
  // 	frameRate: 20,
  // 	animationTime: 1000,
  // 	stepSize: 35,
  // 	pulseAlgorithm: !0,
  // 	pulseScale: 8,
  // 	pulseNormalize: 1,
  // 	accelerationDelta: 20,
  // 	accelerationMax: 1,
  // 	keyboardSupport: !0,
  // 	arrowScroll: 50
  // }); 
  // -----------------------------------
  // Loader 
  // var loaderRemove = function(){
  // 	$('.loader').fadeOut('1000',function(){
  // 		$(this).remove();
  // 	});
  // }
  // ----------------------------------- Start : Loader
  // Loader 


  var loaderRemove = function loaderRemove() {
    $('.loader').addClass('loaded');
    $('html').addClass('loaded');
    setTimeout(function () {
      $('.loader').remove();
    }, 3000);
    $('.loader').fadeOut('2000', function () {
      $(this).remove();
    });
  };

  setTimeout(function () {
    // $('.loader').remove();
    $('.loader').fadeOut('3000', function () {
      $(this).remove();
    });
  }, 1000); // ----------------------------------- End : Loader
  // window load 

  $(window).on("load", function (e) {});
  $(document).ready(function () {
    var _ref;

    // easeScroll
    var position = $(window).scrollTop();
    var buildEaseScrollWaitTime = 0;

    var _buildEaseScroll2 = function buildEaseScroll() {
      if (typeof $().easeScroll != 'function') {
        // 如果讀取不到easeScroll => 等待 => 十秒後放棄[試寫，目前測不到]
        if (buildEaseScrollWaitTime < 10) {
          setTimeout(function () {
            buildEaseScrollWaitTime++;
            console.log(buildEaseScrollWaitTime);

            _buildEaseScroll2();
          }, 1000);
        }
      } else {
        $("html").easeScroll({
          frameRate: 60,
          animationTime: 1000,
          stepSize: 100,
          pulseAlgorithm: 1,
          pulseScale: 6,
          pulseNormalize: 1,
          accelerationDelta: 20,
          accelerationMax: 1,
          keyboardSupport: true,
          arrowScroll: 30,
          touchpadSupport: true,
          fixedBackground: true
        });
      }
    };

    _buildEaseScroll2();

    var scroll_top = $(document).scrollTop();

    if (scroll_top == 0) {
      $('header , .menu_button , .carcontent , .mo_logo').addClass('top');
      $('header , .menu_button , .carcontent , .mo_logo').removeClass('scroll');
    } else {
      $('header , .menu_button , .carcontent , .mo_logo').removeClass('top');
      $('header , .menu_button , .carcontent , .mo_logo').addClass('scroll');
    } // var scroll_top=0,t=0; 


    $(document).on("scroll", function () {
      var scroll = $(window).scrollTop();
      scroll_top = $(document).scrollTop();
      var header_bar_height = $('header').height(); // p = $(this).scrollTop();

      if (scroll_top > 0) {
        $('header , .menu_button , .carcontent , .mo_logo').removeClass('top');
        $('header , .menu_button , .carcontent , .mo_logo').addClass('scroll'); // if(t<=scroll_top){//下滚  
        // 	$('header , .mo_logo , .carcontent').addClass('scrolling');
        // }else if(t>scroll_top){//上滚  
        // 	$('header , .mo_logo , .carcontent').removeClass('scrolling');
        // }  
        // setTimeout(function(){t = scroll_top;},0); 

        if (scroll > position) {
          console.log("向下滾");
          $('header , .mo_logo , .carcontent').addClass('scrolling'); //把當前的滾動位置賦值給起始滾動位置
        } else {
          console.log("向上滾"); //把當前的滾動位置賦值給起始滾動位置

          $('header , .mo_logo , .carcontent').removeClass('scrolling');
        }
      } else if (scroll_top <= header_bar_height) {
        $('header , .menu_button , .carcontent , .mo_logo').addClass('top');
        $('header , .menu_button , .carcontent , .mo_logo').removeClass('scroll');
      }

      position = scroll; // $(document).on("scroll",function(){
      // })
    });
    $(document).on('click', '.menu_button', function () {
      $('.menu').addClass('click');
    });
    $(document).on('click', '.menu_button.click', function () {
      $('.menu').removeClass('click');
    }); // easeScroll

    var buildEaseScrollWaitTime = 0;

    var _buildEaseScroll2 = function _buildEaseScroll() {
      if (typeof $().easeScroll != 'function') {
        // 如果讀取不到easeScroll => 等待 => 十秒後放棄[試寫，目前測不到]
        if (buildEaseScrollWaitTime < 10) {
          setTimeout(function () {
            buildEaseScrollWaitTime++;
            console.log(buildEaseScrollWaitTime);

            _buildEaseScroll2();
          }, 1000);
        }
      } else {
        $("html").easeScroll({
          frameRate: 60,
          animationTime: 1000,
          stepSize: 100,
          pulseAlgorithm: 1,
          pulseScale: 6,
          pulseNormalize: 1,
          accelerationDelta: 20,
          accelerationMax: 1,
          keyboardSupport: true,
          arrowScroll: 30,
          touchpadSupport: true,
          fixedBackground: true
        });
      }
    };

    _buildEaseScroll2();

    var swiper_project = new Swiper(".gallery-thumbs", {
      spaceBetween: 0,
      slidesPerView: "auto",
      centeredSlides: false,
      touchRatio: 0.2,
      on: {},
      breakpoints: {
        480: {
          //- slidesPerView: 2,
          loop: false // slidesOffsetBefore : 30,
          // slidesOffsetAfter : 30,

        },
        960: {
          //- slidesPerView: 3,
          loop: false //循環撥放
          // slidesOffsetBefore : 30,
          // slidesOffsetAfter : 30,

        },
        5000: {
          loop: false //循環撥放

        }
      },
      navigation: {
        nextEl: ".be-icon-next",
        prevEl: ".be-icon-prev"
      }
    }); // if($('.gallery-thumbs .swiper-wrapper .swiper-slide').length == 5){
    //   $('.gallery-thumbs').addClass('five');
    // }else if($('.gallery-thumbs .swiper-wrapper .swiper-slide').length == 4){
    //   $('.gallery-thumbs').addClass('four');
    // }else if($('.gallery-thumbs .swiper-wrapper .swiper-slide').length == 3){
    //   $('.gallery-thumbs').addClass('three');
    // }else if($('.gallery-thumbs .swiper-wrapper .swiper-slide').length == 2){
    //   $('.gallery-thumbs').addClass('two');
    // }else if($('.gallery-thumbs .swiper-wrapper .swiper-slide').length == 1){
    //   $('.gallery-thumbs').addClass('one');
    // }else if($('.gallery-thumbs .swiper-wrapper .swiper-slide').length > 5){
    //   $('.gallery-thumbs .arrowicon').addClass('full');
    // }

    var windows_w = $(window).width();
    var gallery_w = 0;

    if (windows_w <= 1024) {
      $('.gallery-thumbs .swiper-wrapper .swiper-slide').each(function (index) {
        gallery_w += $(this).width() + 30;
      });
    } else if (windows_w <= 960) {
      $('.gallery-thumbs .swiper-wrapper .swiper-slide').each(function (index) {
        gallery_w += $(this).width() + 30;
      });
    } else {
      $('.gallery-thumbs .swiper-wrapper .swiper-slide').each(function (index) {
        gallery_w += $(this).width() + 0;
      });
    }

    $('.gallery-thumbs').width(gallery_w);

    if (windows_w <= gallery_w) {
      $('.gallery-thumbs').addClass('full');
      $('.gallery-thumbs .arrowicon').addClass('full');
      $('.gallery-thumbs').width(windows_w);
      var swiper_project = new Swiper(".gallery-thumbs", {
        spaceBetween: 0,
        slidesPerView: "auto",
        centeredSlides: false,
        touchRatio: 0.2,
        on: {},
        breakpoints: {
          480: {
            //- slidesPerView: 2,
            loop: false,
            slidesOffsetBefore: 30,
            slidesOffsetAfter: 30
          },
          960: {
            //- slidesPerView: 3,
            loop: false,
            //循環撥放
            slidesOffsetBefore: 30,
            slidesOffsetAfter: 30
          },
          5000: {
            loop: false //循環撥放

          }
        },
        navigation: {
          nextEl: ".be-icon-next",
          prevEl: ".be-icon-prev"
        }
      });
    } else {} //推薦商品


    var recommend_slider = new Swiper('.productcenter .swiper-container.recommend_slider', (_ref = {
      speed: 1200,
      autoplay: false,
      slidesPerView: 'auto',
      centeredSlides: false,
      loop: true,
      //循環撥放
      spaceBetween: 0
    }, _defineProperty(_ref, "slidesPerView", 3), _defineProperty(_ref, "slidesPerGroup", 1), _defineProperty(_ref, "autoHeight", true), _defineProperty(_ref, "watchOverflow", true), _defineProperty(_ref, "simulateTouch", true), _defineProperty(_ref, "effect", "slide"), _defineProperty(_ref, "navigation", {
      nextEl: '.reco_nextarrow',
      prevEl: '.reco_prevarrow'
    }), _defineProperty(_ref, "breakpoints", {
      640: {
        slidesPerView: 1,
        offsetPxAfter: 50,
        loop: false
      },
      960: {
        slidesPerView: 2,
        loop: true //循環撥放

      },
      1920: {
        slidesPerView: 3
      },
      5000: {
        slidesPerView: 3
      }
    }), _ref));
  }); // end doc ready
})(jQuery, window, document);

$(document).ready(function () {
  //go top
  var $gotop = $(".gotop");
  $gotop.on("click touchstart", function () {
    $('html, body').animate({
      scrollTop: 0
    }, 400, "swing");
  }).focus(function () {
    $(this).blur();
  });
});

function onLoadEventHandler(ev) {
  loaderRemove();
} // loaderRemove();
// if (w.addEventListener) {
// 	w.addEventListener('scroll', onScrollEventHandler, false);
// 	w.addEventListener('resize', onResizeEventHandler, false);
// 	w.addEventListener('load', onLoadEventHandler, false);
// } else if (w.attachEvent) {
// 	w.attachEvent('onscroll', onScrollEventHandler);
// 	w.attachEvent('onresize', onResizeEventHandler);
// 	w.attachEvent('load', onLoadEventHandler);
// }