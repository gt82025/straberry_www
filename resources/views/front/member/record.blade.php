@extends('layouts.home')

@section('title', '訂單紀錄 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/order.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字--><a class="swiper-slide" href="{{url('member')}}">
          <p>編輯會員資料</p>
        </a><a class="swiper-slide active">
          <p>訂單紀錄</p>
        </a><a class="swiper-slide" href="{{url('booking/record')}}">
          <p>預約紀錄</p>
        </a><a class="swiper-slide" href="{{url('logout')}}">
          <p>登出</p>
        </a>
      </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="order_content">
  <div class="ordercenter">
    <h2 class="member_pagename">嗨，{{$user->name}}</h2>
    <h5 class="member_pagetext">歡迎您的蒞臨!!</h5>
    <div class="member_center">
      <h3 class="tabletitle">訂單紀錄</h3>
      <div class="tablebox title">
        <h6 class="number">訂單編號</h6>
        <h6 class="much">交易金額</h6>
        <h6 class="date">訂購日期</h6>
        <h6 class="pay">付款狀態</h6>
        <h6 class="status">訂單狀態</h6>
      </div>
      @foreach($orders as $k => $v)
      <a href="{{url('record',$v->id)}}" title="{{$v->order_number}}">
      <div class="tablebox @if($v->RtnCode == '待付款')unpay @endif">
        
        <h6 class="number"> <span class="motitle">訂單編號</span><span>{{$v->order_number}}</span></h6>
        <h6 class="much"> <span class="motitle">交易金額</span><span>{{number_format($v->total)}}</span></h6>
        <h6 class="date"> <span class="motitle">訂購日期</span><span>{{$v->order_date}}</span></h6>
        <h6 class="pay"><span class="motitle">付款狀態</span><span>{{$v->RtnCode}}</span></h6>
        <h6 class="status"> <span class="motitle">訂單狀態</span><span>{{$v->category->name}}</span></h6>
        
      </div>
      </a>
      @endforeach
      
    </div>
  </div>
  
  <!--
  <div class="pageLinks">
    <div class="center_links"><span class="prev"><a href="">
          </a> </span> <strong>1</strong><a href="">2</a><a href="">...</a><a href="">10</a><span class="next"><a
                href="">></a> </span></div>
  </div>
  -->
</section>


@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    //頁碼置中
    var pagelinksh_width = 0;
    $('.pageLinks .center_links a, .pageLinks .center_links strong').each(function (key, value) {
      pagelinksh_width += ($(this).width() + 2 + 10);
    });
    $('.pageLinks').width(pagelinksh_width);

    //- tablebox
    
  });
</script>
@endsection