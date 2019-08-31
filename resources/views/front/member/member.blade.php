@extends('layouts.home')

@section('title', '嗨，'.$user->name.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
        <a class="swiper-slide active"><p>編輯會員資料</p></a>
        <a class="swiper-slide" href="{{url('record')}}"><p>訂單紀錄</p></a>
          <a class="swiper-slide" href="{{url('booking/record')}}"><p>預約紀錄</p></a>
          <a class="swiper-slide" href="{{url('logout')}}"><p>登出</p></a>
      </div>
      <i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="cart_content small">
  <div class="cartcenter">
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }} 
    </div>
    @endif
    <h2 class="member_pagename">嗨，{{$user->name}}</h2>
    <h5 class="member_pagetext">歡迎您的蒞臨!!</h5>
    <div class="member_center">
      <form accept-charset="UTF-8" action="{{url('member')}}"  method="post">
      {!! csrf_field() !!}
      <div class="guestarea">
        <h2 class="guesttitle">編輯會員資料</h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" value="{{$user->email}}" readonly>
        </div>
        <div class="guest_msg helf">
          <h6 class="msgtitle">姓名 Your Name</h6>
          <input class="msgtext" type="text" name="name" value="{{$user->name}}" required>
        </div>
        <div class="guest_msg helf right">
          <h6 class="msgtitle">性別 Gender</h6>
          <label class="radiobox">
            <input type="radio" name="gender" value="男性" @if($user->gender == '男性')checked @endif >
            <h6>男性</h6>
          </label>
          <label class="radiobox">
            <input type="radio" name="gender" value="女性" @if($user->gender == '女性')checked @endif>
            <h6>女性</h6>
          </label>
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">手機號碼 Mobile</h6>
          <input class="msgtext" type="text" name="phone" value="{{$user->phone}}" required>
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">地址 Address</h6>
          <input class="msgtext" type="text" name="address" value="{{$user->address}}" required>
        </div>
        
      </div>
      <div class="cart_buttonbox">
        <input class="onlybutton" type="submit" value="確認送出">
      </div>
</form>
    </div>
  </div>
</section>
@endsection

@section('script')

@endsection