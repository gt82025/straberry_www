@extends('layouts.home')

@section('title', '付款與配送 - ')

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
            <a class="swiper-slide active" title="付款與配送" ><p>付款與配送</p></a>
            <a class="swiper-slide" href="{{url('return')}}" title="退換貨方式"><p>退換貨方式</p></a>
            <a class="swiper-slide" href="{{url('qa')}}" title="常見問題"><p>常見問題</p></a>
        </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
        </div>
    </div>
</section>
<section class="service_content">
    <div class="servicecenter">
      <h2 class="member_pagename">付款與配送</h2>
      <h5 class="member_pagetext">流程說明</h5>
      <div class="member_center">
        <h3 class="centertitle">付款說明</h3>
        <h5 class="member_pagetext">目前有提供線上刷卡跟虛擬ATM轉帳！</h5>
        <p class="payname">信用卡</p>
        <div class="member_pagetext">
          <ul>
            <li>網站目前僅接受台灣各大銀行所發行的Visa、MasterCard信用卡。</li>
            <li>訂單若交易成功，您所註冊會員的E-mail將會收到系統所自動發送的「付款成功通知信」。</li>
            <li>在資料傳輸的過程或填寫卡號的頁面時，請勿重新整理或回到上一頁，否則將導致交易、 訂單無法正常成立。</li>
          </ul>
        </div>
        <p class="payname">虛擬ATM轉帳</p>
        <div class="member_pagetext">
          <ul>
            <li>請務必於訂購下單後三日內完成付款，否則訂單水果不予以保留。</li>
            <li>轉帳付款期限不受假日影響，例假日、國定假日，均可進行付款。</li>
            <li>付款逾期、帳號或金額輸入錯誤等因素，導致款項無法順利入帳完成，訂單也會失效。</li>
            <li>一旦付款成功後，系統會再發出「付款成功通知信」，若您是使用免費信箱，通知信可能會落到垃圾信匣內。還請您留意。</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">宅配的方式</h3>
        <div class="member_pagetext">
          <ul>
            <li>為了確保水果運送的品質，我們選擇以大榮或黑貓宅配來幫大家做服務，會依照水果特性選擇不同的溫層寄送，也可以選擇到現場"自取" 以節省運費喔（需前兩天電話確認）。</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">運費計算</h3>
        <div class="member_pagetext">
          <ul>
            <li>我們都是依照貨運公司冷藏宅配計算哦。</li>
            <li>離島部分需另外詢問。 (澎湖、綠島、金門、馬祖)</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">果物大約幾天內會到?</h3>
        <div class="member_pagetext">
          <ul>
            <li>只要果粉們在下單的當天下午14:00點前匯款或付款完畢，我們查核資料無誤，當天確認有貨後盡速會寄出。</li>
            <li>14:00後才匯款的訂單都會移到隔天寄出，最快寄出隔天到貨，最慢2-3天依宅配狀況而定。</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">如何查詢配送狀況?</h3>
        <div class="member_pagetext">
          <ul>
            <li>非會員請點選”訂單查詢”，若會員請登入至會員中心，點選"訂單紀錄”進入查看。</li>
            <li>有任何到貨問題都歡迎來電詢問或洽Line@小幫手詢問。</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">如何要更改收件人地址?</h3>
        <div class="member_pagetext">
          <ul>
            <li>"還沒寄出"的情況下麻煩請來電通知或者是Line@小幫手，我們會盡速幫您處理更新。</li>
            <li>"已經出貨"的情況下，即無法更改。</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">如果要現場自取要怎麼去呢?</h3>
        <div class="member_pagetext">
          <ul>
            <li>地址：桃園市觀音區坑尾里金橋路育仁段122巷118弄75號，或是可以直接地圖輸入"草菓農場"就找的到。</li>
          </ul>
        </div>
        <div class="ser_line"></div>
        <h3 class="centertitle">我們的營業時間</h3>
        <div class="member_pagetext">
          <ul>
            <li>週一到週五(國定假日例假休息) 早上09:30到下午18:30，年節期間時間會延長，歡迎來電訊問，平台資訊每日更新，資訊最速流通，Line@線上小幫手隨時在線，服務最即時。</li>
          </ul>
        </div>
      </div>
    </div>
</section>
@endsection


