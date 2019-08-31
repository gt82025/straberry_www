"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

// es5 area
$(document).ready(function () {
  // ===============================================================================================
  console.log('index js. here test test');
  setTimeout(function () {
    console.log('index es5 js.');
  }, 3000); // ===============================================================================================
});
/* end document */

$(document).ready(function () {
  var _ref, _ref2;

  $('.avgalllogo , .menu_button').addClass('index');
  var scroll_top = $(document).scrollTop();

  if (scroll_top > 0) {
    $('.carcontent').removeClass('index');
  } else if (scroll_top == 0) {
    $('.carcontent').addClass('index');
  }

  $(document).scroll(function () {
    var scroll_top = $(document).scrollTop();

    if (scroll_top > 0) {
      $('.carcontent').removeClass('index');
    } else if (scroll_top == 0) {
      $('.carcontent').addClass('index');
    }
  });

  if ($('.banner_img.img1').hasClass('click') == true) {
    $('.prevarrow').removeClass('click');
    $('.nextarrow').removeClass('click');
    $('.nextarrow.img1').addClass('click');
  } else if ($('.banner_img.img2').hasClass('click') == true) {
    $('.prevarrow').removeClass('click');
    $('.nextarrow.').removeClass('click');
    $('.prevarrow.img2').addClass('click');
    $('.nextarrow.img2').addClass('click');
  } else if ($('.banner_img.img3').hasClass('click') == true) {
    $('.prevarrow').removeClass('click');
    $('.nextarrow.').removeClass('click');
    $('.prevarrow.img3').addClass('click');
    $('.nextarrow.img3').addClass('click');
  } else if ($('.banner_img.img4').hasClass('click') == true) {
    $('.prevarrow').removeClass('click');
    $('.nextarrow.').removeClass('click');
    $('.prevarrow.img4').addClass('click');
    $('.nextarrow.img4').addClass('click');
  } else if ($('.banner_img.img5').hasClass('click') == true) {
    $('.prevarrow').removeClass('click');
    $('.nextarrow.').removeClass('click');
    $('.prevarrow.img5').addClass('click');
  }

  $(document).on('click', '.prevarrow', function () {
    var click = $(this).data('click');
    $('.prevarrow').removeClass('click');
    $('.nextarrow').removeClass('click');
    $('.banner_img').removeClass('click');
    $(this).prev().addClass('click');
    $('.nextarrow[data-click=' + click + ']').addClass('click');
    $('.banner_img[data-click=' + click + ']').prev().addClass('click');
  });
  $(document).on('click', '.nextarrow', function () {
    var click = $(this).data('click');
    $('.prevarrow').removeClass('click');
    $('.nextarrow').removeClass('click');
    $('.banner_img').removeClass('click');
    $(this).next().addClass('click');
    $('.prevarrow[data-click=' + click + ']').addClass('click');
    $('.banner_img[data-click=' + click + ']').addClass('click');
  }); //商品輪播1

  var swiper = new Swiper('.product_center .swiper-container.index-product-slider1', {
    speed: 1200,
    autoplay: 2000,
    slidesPerView: 'auto',
    centeredSlides: false,
    loop: true,
    //循環撥放
    spaceBetween: 0,
    slidesPerGroup: 1,
    autoHeight: true,
    watchOverflow: true,
    simulateTouch: true,
    effect: "fade",
    //Could be "slide", "fade", "cube", "coverflow" or "flip"
    navigation: {
      nextEl: '.product_center .arrowarea.pro_arrow1 .arrow.prev',
      prevEl: '.product_center .arrowarea.pro_arrow1 .arrow.next'
    }
  }); //商品輪播2

  var swiper2 = new Swiper('.product_center .swiper-container.index-product-slider2', {
    speed: 1200,
    autoplay: 2000,
    slidesPerView: 'auto',
    centeredSlides: false,
    loop: true,
    //循環撥放
    spaceBetween: 0,
    slidesPerGroup: 1,
    autoHeight: true,
    watchOverflow: true,
    simulateTouch: true,
    effect: "fade",
    //Could be "slide", "fade", "cube", "coverflow" or "flip"
    navigation: {
      nextEl: '.product_center .arrowarea.pro_arrow2 .arrow.prev',
      prevEl: '.product_center .arrowarea.pro_arrow2 .arrow.next'
    }
  }); //商品輪播3

  var swiper3 = new Swiper('.product_center .swiper-container.index-product-slider3', {
    speed: 1200,
    autoplay: 2000,
    slidesPerView: 'auto',
    centeredSlides: false,
    loop: true,
    //循環撥放
    spaceBetween: 0,
    slidesPerGroup: 1,
    autoHeight: true,
    watchOverflow: true,
    simulateTouch: true,
    effect: "fade",
    //Could be "slide", "fade", "cube", "coverflow" or "flip"
    navigation: {
      nextEl: '.product_center .arrowarea.pro_arrow3 .arrow.prev',
      prevEl: '.product_center .arrowarea.pro_arrow3 .arrow.next'
    }
  }); //最新消息輪播

  var swiper_news1 = new Swiper('.news_center .newsslider.news_slider1 .swiper-container', (_ref = {
    speed: 1200,
    autoplay: false,
    slidesPerView: 'auto',
    centeredSlides: false,
    loop: true,
    //循環撥放
    spaceBetween: 0
  }, _defineProperty(_ref, "slidesPerView", 3), _defineProperty(_ref, "slidesPerGroup", 1), _defineProperty(_ref, "autoHeight", true), _defineProperty(_ref, "watchOverflow", true), _defineProperty(_ref, "simulateTouch", true), _defineProperty(_ref, "effect", "slide"), _defineProperty(_ref, "navigation", {
    nextEl: '.newsslider.news_slider1 .news_nextarrow',
    prevEl: '.newsslider.news_slider1 .news_prevarrow'
  }), _defineProperty(_ref, "breakpoints", {
    480: {
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
  }), _ref)); //最新消息輪播

  var swiper_news2 = new Swiper('.news_center .newsslider.news_slider2 .swiper-container', (_ref2 = {
    speed: 1200,
    autoplay: false,
    slidesPerView: 'auto',
    centeredSlides: false,
    loop: true,
    //循環撥放
    spaceBetween: 0
  }, _defineProperty(_ref2, "slidesPerView", 3), _defineProperty(_ref2, "slidesPerGroup", 1), _defineProperty(_ref2, "autoHeight", true), _defineProperty(_ref2, "watchOverflow", true), _defineProperty(_ref2, "simulateTouch", true), _defineProperty(_ref2, "effect", "slide"), _defineProperty(_ref2, "navigation", {
    nextEl: '.newsslider.news_slider2 .news_nextarrow',
    prevEl: '.newsslider.news_slider2 .news_prevarrow'
  }), _defineProperty(_ref2, "breakpoints", {
    480: {
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
  }), _ref2));
  $(document).on('click', '.product_center .sort .sorttab', function () {
    var product = $(this).data('product');
    $('.product_center .sort .sorttab').removeClass('click');
    $('.product_center .swiper-container').removeClass('click');
    $('.product_center .arrowarea').removeClass('click');
    $(this).addClass('click');
    $('.product_center .swiper-container[data-product=' + product + ']').addClass('click');
    $('.product_center .arrowarea[data-product=' + product + ']').addClass('click');
  });
  $(document).on('click', '.newscontent .sort .sorttab', function () {
    var news = $(this).data('news');
    $('.newscontent .sort .sorttab').removeClass('click');
    $('.newsslider').removeClass('click');
    $(this).addClass('click');
    $('.newsslider[data-news=' + news + ']').addClass('click');
  });
});