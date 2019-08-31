@extends('layouts.home')

@section('title', '關於我們 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/about.min.css')}}">

@endsection

@section('content')
<section class="projecttop"></section>
<section class="guaranteeBox">
  <div class="close">
    <div class="stick1"></div>
    <div class="stick2"></div>
  </div>
  <div class="container"><img src="{{url('dist/images/bitmap-copy@2x.png')}}"></div>
</section>
<section class="about_content">
  <div class="aboutcenter">
    <h2 class="member_pagename">關於草菓</h2>
    <h5 class="member_pagetext">草菓簡介</h5>
    <div class="leftBox">
      <h5>About Us</h5>
      <h2 class="project_title">
        <span class="green">“草”</span>莓園內的冬紅，寒冷季節中的珍<span class="green">”菓”</span></h2>
      <p>草菓農場，農夫時代的自有農場，以草莓種植為主，秉持著農夫時代的經營理念，不使用農藥、不添加生長激素。草莓，多年生的草本植物，漿果類的果實，可用於鮮食，或製作甜點。因此，我們將農場定名為
        “草菓”，取其草本植物中珍貴甜美的果實之意。</p>
    </div>
    <div class="rightbox"> <img src="{{url('dist/images/berry-1238295-1920@3x.png')}} "></div>
  </div>
</section>
<section class="no_Pesticide">
  <div class="bg"></div>
  <div class="hand"></div>
  <div class="container">
    <div class="right">
      <h2 class="project_title">
        安心”無農藥” <p>我們會以草莓作為農場主要作物，原因在於，草莓是眾所皆知使用大量農藥種植的水果，每年都可以看到媒體報導草莓農藥超標，農夫時代的創辦群，是勇於挑戰的
          “青農”，我們開創自己的種植方式，提供消費者最安全健康的草莓。
        </p>
      </h2>
    </div>
  </div>
</section>
<section class="guarantee">
  <div class="project_titlebox">
    <h1 class="project_title">“產銷履歷”有保證</h1>
    <h5 class="project_subtitle">
      草菓農場每年除了產銷履歷的抽驗外，我們也自主送驗SGS，除了確認農藥零檢出外，也確認無生長激素添加，同時我們也歡迎大家來農場體驗，陪我們工作一小段時間，種植過程的透明化，是我們的自我要求。</h5>
  </div>
  <div class="aboutcenter">
    <div class="guslider">
      <div class="swiper-container gu_slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide gu"><img src="{{url('dist/images/bitmap-copy@2x.png')}}"></div>
          <div class="swiper-slide gu"><img src="{{url('dist/images/bitmap-copy@2x2.png')}}"></div>
          <div class="swiper-slide gu"><img src="{{url('dist/images/bitmap-copy@2x.png')}}"></div>
          <div class="swiper-slide gu"><img src="{{url('dist/images/bitmap-copy@2x2.png')}}"></div>
          <div class="swiper-slide gu"><img src="{{url('dist/images/bitmap-copy@2x.png')}}"></div>
        </div>
      </div>
      <div class="swiper-pagination"> </div>
      <div class="gu_prevarrow">
        <div class="prevbox">
          <h6>PREV</h6>
        </div>
      </div>
      <div class="gu_nextarrow">
        <div class="nextbox">
          <h6>NEXT</h6>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="farmerAge" id="farmerAge">
  <div class="container">
    <div class="left"><img src="{{url('dist/images/strawberry-3977242-1920@2x.png')}}"></div>
    <div class="right">
      <h5>About Farmertime</h5>
      <h2 class="project_title">關於<span class="green">農夫時代</span></h2>
      <p class="bold">農夫時代成立於2017年7月，由一群在教育界、科技產業已有一定成果的中年大叔、大嬸所創立。</p>
      <p class="lh108">創立的初衷很 “簡單” ，這群中年人有了自己的孩子，越來越在意
        “食安”的問題，也發現自己的孩子離大自然越來越遠，在一次次的聚會聊天中，我們發現追尋餐桌上的食物來源，可以陪伴孩子親近自然，教育孩子尊重、珍惜每一份食物，同時清楚這些食物的生產過程，也能對每一口吃下去的食物放心，遠離食安風暴。
      </p>
    </div>
    <div class="linebox"></div>
    <div class="stepContainer">
      <p class="dis">
        我們利用閒暇時間，歷時3年，參訪並體驗了許多農場的工作過程，瞭解農作物的栽培成長，並參加各地農業改良場的進修課程，學習農糧作物的栽種知識，終於在2017年初草創了農夫時代，並於同年7月正式成立，推派了2位代表，全職投入溫室興建規劃及後續種植。
      </p>
      <div class="stepMain">
        <div class="swiper-container step_slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide step">
              <div class="left" style="background-image:url({{url('dist/images/fruit-3271775-1920@2x.png')}})"></div>
              <div class="right"><span>01</span>
                <p>農夫時代的營運目標只有一項 “簡單”。農夫時代的作物，只需要簡單的沖洗，即可食用。</p>
              </div>
            </div>
            <div class="swiper-slide step">
              <div class="left" style="background-image:url({{url('dist/images/fruit-3271775-1920@2x.png')}})"></div>
              <div class="right"><span>02</span>
                <p>農夫時代的營運目標只有一項 “簡單”。農夫時代的作物，只需要簡單的沖洗，即可食用。</p>
              </div>
            </div>
            <div class="swiper-slide step">
              <div class="left" style="background-image:url({{url('dist/images/fruit-3271775-1920@2x.png')}})"></div>
              <div class="right"><span>02</span>
                <p>農夫時代的營運目標只有一項 “簡單”。農夫時代的作物，只需要簡單的沖洗，即可食用。</p>
              </div>
            </div>
            <div class="swiper-slide step">
              <div class="left" style="background-image:url({{url('dist/images/fruit-3271775-1920@2x.png')}})"></div>
              <div class="right"><span>02</span>
                <p>農夫時代的營運目標只有一項 “簡單”。農夫時代的作物，只需要簡單的沖洗，即可食用。</p>
              </div>
            </div>
          </div>
        </div>
        <div class="be-icon be-icon-next step_next"></div>
        <div class="be-icon be-icon-prev step_prev"> </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{url('dist/js/about.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("footer").addClass('mt0');
    myCertificate = new Swiper('.swiper-container.gu_slider', {
      loop: true,
      slidesPerView: 3,
      spaceBetween: 50,
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets'
      },
      navigation: {
        nextEl: '.gu_nextarrow',
        prevEl: '.gu_prevarrow',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 40
        }
      }
    });
    stepMainSlider = new Swiper('.swiper-container.step_slider', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
      navigation: {
        nextEl: '.step_next',
        prevEl: '.step_prev',
      }
    });
    function GuaranteeLight() {
      var link
      var $closeBtn
      $('.swiper-slide.gu').each(function () {
        $(this).click(function () {
          link = $(this).find('img').attr('src');
          $('.guaranteeBox').addClass('open');
          $('.guaranteeBox .container img').attr('src', link.toString());
          console.log(link);
        });
      });
      $('.close').click(function () {
        $('.guaranteeBox').removeClass('open');

      })

    };
    GuaranteeLight();
  });  
</script>
@endsection
