@extends('layouts.home')

@section('title', '如何購買 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/service.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
<div class="project_center">
    <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
        <a class="swiper-slide active"><p>如何購買</p></a>
        <a class="swiper-slide" href="{{url('pay')}}" title="付款與配送"><p>付款與配送</p></a>
        <a class="swiper-slide" href="{{url('return')}}" title="退換貨方式"><p>退換貨方式</p></a>
        <a class="swiper-slide" href="{{url('qa')}}" title="常見問題"><p>常見問題</p></a>
    </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
</div>
</section>
<section class="service_content">
<div class="servicecenter">
    <h2 class="member_pagename">如何購買</h2>
    <h5 class="member_pagetext">流程說明</h5>
    <div class="member_center">
    <h3 class="centertitle">購物流程說明</h3>
    <h5 class="member_pagetext">草菓農場提供您簡單又安全的購物流程，親切易懂的指引，讓您充分享受便利的購物樂趣。
        另外為了讓您享有更優惠的價格，建議您加入會員，即可享有銷售產品之會員價，讓您買的安心又付款輕鬆！</h5>
    <div class="process">
        <div class="probox type1">
        <div class="tribox"></div>
        <div class="typenumber">01</div><i class="proicon be-icon be-icon-cartstep1"></i>
        <p class="protext">將商品加入菜籃後進行結帳流程。</p>
        </div>
        <div class="probox type2">
        <div class="tribox"></div>
        <div class="typenumber">02</div><i class="proicon be-icon be-icon-cartstep2"></i>
        <p class="protext">填寫訂購資料及付款方式。</p>
        </div>
        <div class="probox type3">
        <div class="tribox"></div>
        <div class="typenumber">03</div><i class="proicon be-icon be-icon-cartstep3"></i>
        <p class="protext">確認訂購資料是否有誤。</p>
        </div>
    </div>
    <div class="process last">
        <div class="probox type4">
        <div class="tribox"></div>
        <div class="typenumber">04</div><i class="proicon be-icon be-icon-cartstep4"></i>
        <p class="protext">完成訂購。</p>
        </div>
        <div class="probox type5">
        <div class="tribox"></div>
        <div class="typenumber">05</div><i class="proicon be-icon be-icon-car"></i>
        <p class="protext">按照訂單順序安排出貨時程。</p>
        </div>
        <div class="probox" style="opacity:0;"></div>
    </div>
    <div class="ser_line"></div>
    <h3 class="centertitle">購物注意事項</h3>
    <div class="member_pagetext">
        <ul>
        <li>非會員也可進行購物，但加入會員可享有會員價。</li>
        <li>在刷卡或付款流程時，請務必填寫正確資料，在扣款成功後，即會導回官網，等待過程約30~50秒，請耐心等待，在等待過程中請勿關閉或切換至其他頁面。</li>
        <li>完成訂購後，系統會自動寄發訂單清單至您的信箱，您可透過訂單編號來查詢訂單狀態。</li>
        <li>若有任何問題都可加入我們的line@官方帳號。</li>
        </ul>
    </div>
    </div>
</div>
</section>
@endsection


