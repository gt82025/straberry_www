@extends('layouts.home')

@section('title', '嗨，'.$user->name.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/order.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
<style>
.order_content .ordercenter .member_center .tablebox{
    cursor: initial;
}
</style>
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
        <a class="swiper-slide " href="{{url('member')}}"><p>編輯會員資料</p></a>
        <a class="swiper-slide" href="{{url('record')}}"><p>訂單紀錄</p></a>
          <a class="swiper-slide active"><p>預約紀錄</p></a>
          <a class="swiper-slide" href="{{url('reset')}}"><p>重設密碼</p></a>
          <a class="swiper-slide" href="{{url('logout')}}"><p>登出</p></a>
      </div>
      <i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="order_content">
    <div class="ordercenter">
      <h2 class="member_pagename">嗨，{{$user->name}}</h2>
      <h5 class="member_pagetext">歡迎您的蒞臨!!</h5>
      <div class="member_center reservation">
        <h3 class="tabletitle">預約紀錄</h3>
        <div class="tablebox title">
          <h6 class="date">預約日期</h6>
          <h6 class="site">場地</h6>
          <h6 class="session">場次</h6>
          <h6 class="number">人數</h6>
          <!--
          <h6 class="status">預約狀態</h6>
-->
        </div>
        @foreach($booking as $k => $v)
        <div class="tablebox ">
          <h6 class="date"> <span class="motitle">預約日期</span><span>{{$v->date}}</span></h6>
          <h6 class="site"> <a href="{{url('booking/record',$v->id)}}"><span class="motitle">場地</span><span>{{$v->location}}<i
                  class="pinicon be-icon be-icon-pin"></i></span></a></h6>
          <h6 class="session"> <span class="motitle">場次</span><span>{{$v->session}}</span></h6>
          <h6 class="number"><span class="motitle">人數</span><span>{{$v->number}}</span></h6>
          <!--
          <h6 class="status"> <span class="motitle">預約狀態</span><span>待付款</span></h6>
            -->
        </div>
        @endforeach
        
      </div>
    </div>
    <!--
    <div class="pageLinks">
      <div class="center_links"><span class="prev"><a href="">
            <</a> </span> <strong>1</strong><a href="">2</a><a href="">...</a><a href="">10</a><span class="next"><a
                  href="">></a> </span></div>
    </div>
        -->
  </section>
  
@endsection

