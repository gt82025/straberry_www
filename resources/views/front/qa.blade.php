@extends('layouts.home')

@section('title', '退換貨方式 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/service.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
    <div class="project_center">
        <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <!-- 標籤分類文字不超過六個字-->
            <a class="swiper-slide "  href="{{url('how')}}" title="如何購買"><p>如何購買</p></a>
            <a class="swiper-slide " href="{{url('pay')}}" title="付款與配送" ><p>付款與配送</p></a>
            <a class="swiper-slide " href="{{url('return')}}" title="退換貨方式"><p>退換貨方式</p></a>
            <a class="swiper-slide active"  title="常見問題"><p>常見問題</p></a>
        </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
        </div>
    </div>
</section>
<section class="service_content">
    <div class="servicecenter">
      <h2 class="member_pagename">常見問題</h2>
      <h5 class="member_pagetext">問題錦集</h5>
      <div class="member_center">
        <h3 class="centertitle">解決問題．方便快速</h3>
        <h5 class="member_pagetext">有什麼問題，歡迎利用Q&A的問答集，快速找到您要的答案。</h5>
        <div class="qalist click">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">怎樣的情形是不接受退換貨呢？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text"> 1. 消費者人為因素毀損。<br>2. 個人主觀因素（香氣、大小、甜度、色澤、口感、不喜歡、口味）恕無法構成退換貨之成立。<br>3.
              到貨後未依店家建議方式、環境、溫度存放，所造成的商品變質。<br>4. 消費者購買時錯誤下訂(錯誤下訂可於訂單成立後，立即洽客服人員)。<br>5.
              產品一經使用，如洗過、削切、食用，恕無法提供退換貨。<br>6. 出貨時，皆以您所填寫的收件人/地址作寄送。不得以資料勘誤為由，否認訂購行為或拒絕付款。<br>7.
              為了不造成果物鮮度流失，水果如需冷藏請依冷藏保管，外箱也請完整的保存才可以辦理退貨手續，以免影響您的退貨權益。退換貨請在收到商品後的24小時以內和客服人員聯絡，若非符合上述退換貨條件，售出後一概不接受退換貨。
            </p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">宅配的方式有哪些？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">自己來拿</p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">請問運費如何計算，是否可自取？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">不用運費因為你要自己來拿</p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">果物大約幾天內會到呢？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">看你幾天內來拿</p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">果物大約幾天內會到呢？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">看你幾天內來拿</p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">宅配的方式有哪些？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">自己來拿</p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">請問運費如何計算，是否可自取？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">不用運費因為你要自己來拿</p>
          </div>
        </div>
        <div class="qalist">
          <div class="qbox">
            <p class="icon">Q</p>
            <p class="q_text">果物大約幾天內會到呢？</p>
          </div>
          <div class="abox">
            <p class="icon">A</p>
            <p class="a_text">看你幾天內來拿</p>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function () {
    $(document).on('click', '.qalist', function () {
    if ($(this).hasClass('click') == false) {
        $('.qalist').removeClass('click');
        $(this).addClass('click');
    } else {
        $('.qalist').removeClass('click');
    }
    });
});
</script>
@endsection


