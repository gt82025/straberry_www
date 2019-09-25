@extends('layouts.home')

@section('title', '嗨，'.$user->name.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
<style>

.cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext select{
display: block;
width: 100%;
position: relative;
height: 100%;
padding-right: 0;
padding-left: 0;
background-color: #f0f0f0;
border: 1px solid #f0f0f0;
font-size: 14px;
}
.cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext input{
 display: block;
width: 100%;
position: relative;
height: 100%;
padding-right: 0;
padding-left: 0;
background-color: #f0f0f0;
border: 1px solid #f0f0f0;
font-size: 14px;

}
.cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext{
  position: relative;
}
.cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext::after{
width: 0;
height: 0;
border-style: solid;
border-width: 6px 6px 0 6px;
border-color: #2b963d transparent transparent transparent; 
display: block;
content: '';
position: absolute;
top: 50%;
right: 5px;
}
.cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext[data-role=zipcode]::after{
  display: none;
}
.cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext::-webkit-input-placeholder{color:#848484;}
.cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext:-moz-placeholder{color:#848484;}
.cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext::-moz-placeholder{color:#848484;}
.cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext:-ms-input-placeholder{color:#848484;}

    </style>
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
        <a class="swiper-slide" href="{{url('reset')}}"><p>重設密碼</p></a>
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
          <div class="textbox three">
            <div class="textbox three twzipcode">
                <div class="msgtext" data-role="county" data-label="請選擇縣市" data-name="表單名稱" data-value="{{$user->city}}" data-css="msgtext" data-hidden="隱藏的縣市" data-required="1|0"></div>
                <div class="msgtext" data-role="district" data-label="選擇鄉鎮區" data-name="表單名稱" data-value="{{$user->dist}}" data-css="" data-hidden="隱藏的縣市" data-required="1|0"></div>
                <div class="msgtext" data-role="zipcode" data-name="表單名稱" data-value="{{$user->zip}}" data-css="" data-placeholder="郵遞區號" data-type="text|number" data-min="最小值，type=number 時有效" data-max="最大值，type=number 時有效" data-step="步進值，type=number 時有效" data-maxlength="最大長度，type=text 時有效" data-pattern="Regular expression" data-readonly="1|0"></div>
            </div>  
          </div>
          
        </div>
        <div class="guest_msg">
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
<script type="text/javascript" src="{{url('dist/js/vendor/twzipcode.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    TWzipCode();
  });
  function TWzipCode(){
    var twzipcode = new TWzipcode('.twzipcode', {
  });
}
</script>
@endsection