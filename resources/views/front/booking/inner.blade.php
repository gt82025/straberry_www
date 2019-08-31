@extends('layouts.home')

@section('title', '預約結果 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="projecttop"></section>
<section class="cart_content small">
  <div class="cartcenter">
    <h2 class="member_pagename">預約成功</h2>
    <h5 class="member_pagetext">感謝您的預約!!</h5>
    <div class="member_center">
      <div class="guestarea noline">
        <h5 class="numberingtext">以下為您預約採果之相關資訊，更多詳情請於會員中心/預約記錄中查看：</h5>
        <h2 class="numbering"> </h2>
      </div>
      <div class="guestarea">
        <div class="guest_msg map">
          <p class="msgword"><i class="wordicon be-icon be-icon-pin"></i>{{$booking->location}}</p>
          @if($map)<a class="map" href="{$map}}">Google Map</a>@endif
        </div>
        <div class="guest_msg">
          <p class="msgword"> <i class="wordicon be-icon be-icon-booking"></i>{{$booking->date}}</p>
        </div>
        <div class="guest_msg">
          <p class="msgword"> <i class="wordicon be-icon be-icon-clock"></i>{{$booking->session}}</p>
        </div>
        <div class="guest_msg">
          <p class="msgword"> <i class="wordicon be-icon be-icon-preson"></i>{{$booking->number}} 人</p>
        </div>
        <div class="cart_buttonbox type4"><a class="only" href="{{url('booking/record',$booking->id)}}l">
            <P><i class="buttonicon be-icon be-icon-booking"></i>預約紀錄</P>
          </a></div>
      </div>
      <div class="guestarea noline">
        <div class="qrbox">
          <div class="qrimg"><img src="images/qrcode.png" alt=""></div>
          <h2 class="qrid">Line@ : fs_farm</h2>
        </div>
        <h6 class="guestsubtitle no_border center">請掃描QR-Code，或是透過ID加入<br>好友喔，謝謝!!</h6>
      </div>
    </div>
  </div>
</section>
@endsection


