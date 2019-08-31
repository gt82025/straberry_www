@extends('layouts.home')

@section('title', '會員註冊 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection


@section('content')
<section class="projecttop"></section>

<section class="cart_content small">
  <div class="cartcenter">
    <!--錯誤提示-->
    @if (count($errors) >0)
    <div class="alert alert-danger">
        @if ($errors->has('email'))
        <strong>{{ $errors->first('email') }}</strong>
        @endif
        @if ($errors->has('password'))
        <strong>{{ $errors->first('password') }}</strong>
        @endif
        @if ($errors->has('phone'))
        <strong>{{ $errors->first('phone') }}</strong>
        @endif
        @if ($errors->has('name'))
        <strong>{{ $errors->first('name') }}</strong>
        @endif

        @if ($errors->has('agree'))
        <strong>{{ $errors->first('agree') }}</strong>
        @endif
    </div>
    @endif
    <!--end 錯誤提示 -->

    <div class="member_center">
    <form id="form" method="post" action="{{ url('register') }}">
        {!! csrf_field() !!}
      <div class="guestarea">
        <h2 class="guesttitle">註冊 Register</h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">密碼 Password</h6>
          <input class="msgtext" type="password" name="password" required>
        </div>
        <div class="guest_msg helf">
          <h6 class="msgtitle">姓名 Your Name</h6>
          <input class="msgtext" type="text" name="name" value="{{ old('name') }}" required>
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
          <input class="msgtext" type="text" name="phone" value="{{ old('phone') }}" required>
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">地址 Address</h6>
          <div class="textbox three">
            <input class="msgtext" type="text" name="city">
            <select class="msgtext" name="dist" required>
              <option value="">鄉鎮區</option>
              <option value="東區">東區</option>
            </select>
            <select class="msgtext" name="zip" required>
              <option value="">郵遞區</option>
              <option value="001">001</option>
            </select>
          </div>
        </div>
        <div class="guest_msg">
          <input class="msgtext" type="text" name="address" value="{{ old('address') }}" required>
        </div>
        <div class="guest_msg">
          <label class="radiobox">
            <input type="radio" name="agree" required>
            <h6>我已同意並閱讀「<a href="">會員條款</a>」</h6>
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
@endsection
