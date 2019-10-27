@extends('layouts.home')

@section('title', '訂購資料 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
<style>
  .cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext select {
    display: block;
    width: 100%;
    position: relative;
    height: 100%;
    padding-right: 0;
    padding-left: 0;
    background-color: #f0f0f0;
    border: 1px solid #f0f0f0;
    font-size: 14px;
    position: relative;
  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext input {
    display: block;
    width: 100%;
    position: relative;
    height: 100%;
    padding-right: 0;
    padding-left: 0;
    background-color: #f0f0f0;
    border: 1px solid #f0f0f0;
    font-size: 14px;
    position: relative;

  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext {
    position: relative;
  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext::after {
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

  .cart_content .cartcenter .member_center .guestarea .guest_msg .textbox .msgtext[data-role=zipcode]::after {
    display: none;
  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext::-webkit-input-placeholder {
    color: #848484;
  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext:-moz-placeholder {
    color: #848484;
  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext::-moz-placeholder {
    color: #848484;
  }

  .cart_content .cartcenter .member_center .guestarea .guest_msg .msgtext:-ms-input-placeholder {
    color: #848484;
  }
</style>
@endsection

@section('content')
<section class="projecttop"></section>
<section class="cart_content">
  <div class="cartcenter">
    <h2 class="member_pagename">訂購資料</h2>
    <h5 class="member_pagetext">請確認付款、訂購及收件人資訊!!</h5>
    <div class="typeposition">
      <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep1"></i></div>
      <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep2"></i></div>
      <div class="typebox"><i class="typeicon be-icon be-icon-cartstep3"></i></div>
      <div class="typebox"><i class="typeicon be-icon be-icon-cartstep4"></i></div>
    </div>
    <div class="member_center">
      <form method="post" action="{{ url('checkDelivery') }}">
        {!! csrf_field() !!}
        <div class="salebar type2">
          <h6 class="saletext">付款方式</h6>
          <div class="salebox">
            <label class="radiobox">
              <input type="radio" name="payment" value="信用卡" checked>
              <h6>線上刷卡</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="payment" value="虛擬ATM付款">
              <h6>虛擬ATM付款</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="payment" value="台灣PAY">
              <h6>台灣PAY</h6>
            </label>
            <!--
              <label class="radiobox">
                <input type="radio" name="payment" value="信用卡" >
                <h6>台灣pay</h6>
              </label>
              -->
          </div>
        </div>
        <div class="guestarea">
          <h2 class="guesttitle">訂購人資料</h2>
          <div class="guest_msg">
            <h6 class="msgtitle">信箱 E-mail</h6>
            <input class="msgtext" type="text" name="email" value="{{ $user?$user->email:'' }}" required
              placeholder="請填寫正確的郵件信箱">
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">姓名 Your Name</h6>
            <input class="msgtext" type="text" name="name" value="{{ $user?$user->name:'' }}" required
              placeholder="請填寫正確姓名">
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">性別 Gender</h6>
            <label class="radiobox">
              <input type="radio" name="gender" value="男性" checked>
              <h6>男性</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="gender" value="女性">
              <h6>女性</h6>
            </label>
          </div>
          <div class="guest_msg">
            <h6 class="msgtitle">手機號碼 Mobile</h6>
            <input class="msgtext" type="text" name="phone" value="{{ $user?$user->phone:'' }}" required placeholder="請填入正確連絡電話">
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">地址 Address</h6>
            <div class="textbox three twzipcode">
              <div class="msgtext" data-role="county" data-label="請選擇縣市" data-name="city" data-value="{{ $user?$user->city:'' }}"
                data-css="msgtext" data-hidden="隱藏的縣市" data-required="1|0"></div>
              <div class="msgtext" data-role="district" data-label="選擇鄉鎮區" data-name="dist" data-value="{{ $user?$user->dist:'' }}"
                data-css="" data-hidden="隱藏的縣市" data-required="1|0"></div>
              <div class="msgtext" data-role="zipcode" data-name="zip" data-value="郵遞區號" data-css=""
                data-placeholder="欄位說明" data-type="text|number" data-min="最小值，type=number 時有效"
                data-max="最大值，type=number 時有效" data-step="步進值，type=number 時有效" data-maxlength="最大長度，type=text 時有效"
                data-pattern="Regular expression" data-readonly="1|0"></div>
            </div>
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle"> </h6>
            <input class="msgtext" type="text" name="address" value="{{ $user?$user->address:''}}" required placeholder="請填入正確的街道地址">
          </div>
        </div>
        <div class="guestarea">
          <h2 class="guesttitle">收件人資料
            <label class="container">
              <input type="checkbox" class="copyform" id="PayInfo"><span class="checkmark"></span><span
                class="marktext copyform">同訂購人</span>
            </label>
          </h2>
          <div class="guest_msg">
            <h6 class="msgtitle">信箱 E-mail</h6>
            <input class="msgtext" type="text" name="to_email" placeholder="請填寫正確的郵件信箱" required>
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">姓名 Your Name</h6>
            <input class="msgtext" type="text" name="to_name" placeholder="請填寫正確姓名" required>
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">性別 Gender</h6>
            <label class="radiobox">
              <input type="radio" name="to_gender" value="男性" checked>
              <h6>男性</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="to_gender" value="女性">
              <h6>女性</h6>
            </label>
          </div>
          <div class="guest_msg">
            <h6 class="msgtitle">手機號碼 Mobile</h6>
            <input class="msgtext" type="text" name="to_phone" placeholder="請填入正確連絡電話" required>
          </div>
          
          <div class="guest_msg helf">
            <h6 class="msgtitle">地址 Address</h6>
            <div class="textbox three twzipcode">
              <div class="msgtext" data-role="county" data-label="請選擇縣市" data-name="to_city" data-value="預設值"
                data-css="msgtext" data-hidden="隱藏的縣市" data-required="1|0"></div>
              <div class="msgtext" data-role="district" data-label="選擇鄉鎮區" data-name="to_dist" data-value="預設值"
                data-css="" data-hidden="隱藏的縣市" data-required="1|0"></div>
              <div class="msgtext" data-role="zipcode" data-name="to_zip" data-value="郵遞區號" data-css=""
                data-placeholder="欄位說明" data-type="text|number" data-min="最小值，type=number 時有效"
                data-max="最大值，type=number 時有效" data-step="步進值，type=number 時有效" data-maxlength="最大長度，type=text 時有效"
                data-pattern="Regular expression" data-readonly="1|0"></div>
            </div>
          </div>

          <div class="guest_msg helf right">
            <h6 class="msgtitle"> </h6>
            <input class="msgtext" type="text" name="to_address" placeholder="請填入正確的街道地址" required>
          </div>
        </div>
        <div class="salebar type2">
          <h6 class="saletext">收件/取貨</h6>
          <div class="salebox">
            <label class="radiobox">
              <input type="radio" name="ship_time" value="不指定" checked>
              <h6>不指定</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="ship_time" value="下午13:00前">
              <h6>下午13:00前</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="ship_time" value="14時~18時(最晚配送時段)">
              <h6>14時~18時(最晚配送時段)</h6>
            </label>
          </div>
        </div>
        <div class="guestarea textarea">
          <div class="guest_msg">
            <h6 class="msgtitle">備註 Notice</h6>
            <textarea class="msgtext" name="remark" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="cart_buttonbox"><a class="linkbutton" href="{{url('cart')}}"><i
              class="buttonicon be-icon be-icon-buttonarrow"></i>
            <p>上一步</p>
          </a>
          <div class="linkbuttonCon">
        <i class="buttonicon be-icon be-icon-buttonarrow next"></i>
<input class="linkbutton next" type="submit"  value="下一步">

        </div>
          <!--
          <a class="linkbutton" href="cart_step3.html">
            <p>下一步</p><i class="buttonicon be-icon be-icon-buttonarrow"></i>
          </a>
          -->
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
    
    
    var twzipcode2 = new TWzipcode('.twzipcode', {});
    

    $('.copyform').click(function(){
        console.log();
        if($('#PayInfo').prop("checked")){
            $('input[name="to_email"]').val($('input[name="email"]').val());
            $('input[name="to_name"]').val($('input[name="name"]').val());
            $('input[name="to_phone"]').val($('input[name="phone"]').val());
            $('input[name="to_address"]').val($('input[name="address"]').val());
            $('select[name="to_city"]').val($('select[name="city"]').val());
            $('select[name="to_dist"]').html('<option value="'+$('select[name="dist"]').val()+'" checked>'+$('select[name="dist"]').val()+'</option>');
            $('input[name="to_zip"]').val($('input[name="zip"]').val());
            

        }else{
            $('input[name="to_email"]').val('');
            $('input[name="to_name"]').val('');
            $('input[name="to_phone"]').val('');
            $('input[name="to_address"]').val('');

        }
       
    })



  });


  
</script>

@endsection