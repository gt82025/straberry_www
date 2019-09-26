@extends('layouts.home')

@section('title', '會員註冊 - ')

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
<section class="projecttop"></section>
<section class="cart_content small">
  <div class="cartcenter">
    <div class="member_center">
    <form id="form" method="post" action="{{ url('register') }}">
        {!! csrf_field() !!}
      <div class="guestarea">
        <h2 class="guesttitle">註冊 Register</h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" name="email" value="{{ old('email') }}" required placeholder="請填寫正確的郵件信箱">
        </div>

        <div class="guest_msg">
          <h6 class="msgtitle">密碼 Password</h6>
          <input class="msgtext" type="password" name="password" required>
        </div>

        <div class="guest_msg helf">
          <h6 class="msgtitle">姓名 Your Name</h6>
          <input class="msgtext" type="text" name="name" value="{{ old('name') }}" required placeholder="請填寫正確姓名">
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
          <input class="msgtext" type="text" name="phone" value="{{ old('phone') }}" required placeholder="請填入正確連絡電話">
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">地址 Address</h6>
          <div class="textbox three">
            <div class="textbox three twzipcode">
                <div class="msgtext" data-role="county" data-label="請選擇縣市" data-name="city" data-value="預設值" data-css="msgtext" data-hidden="隱藏的縣市" data-required="1|0"></div>
                <div class="msgtext" data-role="district" data-label="選擇鄉鎮區" data-name="dist" data-value="預設值" data-css="" data-hidden="隱藏的縣市" data-required="1|0"></div>
                <div class="msgtext" data-role="zipcode" data-name="zip" data-value="郵遞區號" data-css="" data-placeholder="郵遞區號" data-type="text|number" data-min="最小值，type=number 時有效" data-max="最大值，type=number 時有效" data-step="步進值，type=number 時有效" data-maxlength="最大長度，type=text 時有效" data-pattern="Regular expression" data-readonly="1|0"></div>
            </div>  
          </div>
        </div>
        <div class="guest_msg">
          <input class="msgtext" type="text" name="address" value="{{ old('address') }}" required placeholder="請填入正確的街道地址"> 
        </div>
        <div class="guest_msg">
          <label class="radiobox">
            <input type="radio" name="agree" required>
            <h6>我已同意並閱讀「<a href="{{url('terms')}}">會員條款</a>」</h6>
          </label>
        </div>
      </div>
      <div class="cart_buttonbox">
        <input class="onlybutton" type="submit" value="確認送出">
      </div>
      </form>

    </div>
    <h6 class="hasaccount">已經有帳號了？<a href="login.html">立即登入<i class="buttonicon be-icon be-icon-buttonarrow"></i></a></h6>
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
    var twzipcode = new TWzipcode('.twzipcode', {});
  }
</script>
@endsection
