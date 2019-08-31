@extends('layouts.home')

@section('title', '會員登入 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection


@section('content')
<section class="projecttop"></section>
<section class="cart_content small">
  <div class="cartcenter">
    @if (session('error'))
    <div class="alert alert-danger">
        <strong> {{ session('error') }} </strong>
    </div>
    @endif
    <div class="member_center">
      <form id="form" method="post" action="{{ url('login') }}">
      {!! csrf_field() !!}
      <div class="guestarea noline">
        <h2 class="guesttitle">登入 Login<a href="{{url('fbRedirect')}}"><i class="fbicon be-icon be-icon-fb"></i></a></h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" name="email" type="text">
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">密碼 Password</h6>
          <input class="msgtext" name="password" type="password">
        </div>
      </div>
      <div class="cart_buttonbox left">
        <input class="onlybutton" type="submit" value="確認送出"><a class="forget_psw" href="{{url('forget')}}"><i class="shapeicon be-icon be-icon-shape"></i>忘記密碼了嗎？</a>
      </div>
      </form>
      @if(Session::get('cart'))
      <div class="cart_buttonbox left">
        <a class="forget_psw" href="{{url('later')}}" style="width:100%;text-align:center;">不註冊,繼續購物!</a>
      </div>
      @endif
    </div>
    <h6 class="hasaccount">還沒有帳號嗎？<a href="{{url('register')}}" title="立即註冊">立即註冊<i class="buttonicon be-icon be-icon-buttonarrow"></i></a></h6>
  </div>
</section>
@endsection

@section('script')
@endsection
