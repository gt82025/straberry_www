@extends('layouts.home')

@section('title', '訂購完成 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="projecttop"></section>
  <section class="cart_content small">
    <div class="cartcenter">
      <h2 class="member_pagename">訂購完成</h2>
      <h5 class="member_pagetext">恭喜您完成訂單!!</h5>
      <div class="typeposition">
        <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep1"></i></div>
        <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep2"></i></div>
        <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep3"></i></div>
        <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep4"></i></div>
      </div>
      <div class="member_center">
        <div class="guestarea">
          <h5 class="numberingtext">訂單編號({{$order->RtnCode}})</h5>
          <!-- <h2 class="numbering" id="myText">{{$order->order_number}}</h2> -->
          <input  class="numbering" type="text" id="myText" value="{{$order->order_number}}">
          <div class="shortLine"></div>
          
          <h6 class="guestsubtitle no_border center">感謝您購買我們的產品。<br>
為了方便您了解訂單狀態，首次訂購後，系統會自動將您升級為會員，密碼預設為您的手機號碼，在下次購物時可立即享有會員價。
          </h6>
          <div class="cart_buttonbox type4">
            <!-- <a href="javascript:void(0)" id="copyBtn">
              <P><i class="buttonicon be-icon be-icon-copy"></i>複製訂單編號</P>
            </a> -->
            <a href="{{url('record')}}">
              <P><i class="buttonicon be-icon be-icon-buttonarrow"></i>訂單查詢</P>
            </a></div>
        </div>
        <div class="guestarea noline">
          <div class="qrbox">
            <div class="qrimg"><img src="{{url('dist/images/qrcode.png')}}" alt=""></div>
            <h2 class="qrid">Line@ : fs_farm</h2>
          </div>
          <h6 class="guestsubtitle no_border center">請掃描QR-Code，或是透過ID加入<br>好友喔，謝謝!!</h6>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
<script>
$(document).ready(function(){
  $('#copyBtn').click(function(){
    var copyText = document.getElementById("myText");
    copyText.select(); 
    copyText.setSelectionRange(0, 99999); 
    document.execCommand("copy");
    alert("已複製訂單編號");

  });


  
});
</script>
@endsection