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
    @if (session('status'))
    <div class="alert alert-success">
        <strong> {{ session('status') }} </strong>
    </div>
    @endif
    
    <div class="member_center">
      <form id="form" method="post" action="{{ url('login') }}">
      {!! csrf_field() !!}
      <div class="guestarea noline">
        <h2 class="guesttitle">登入 Login<a href="{{url('fbRedirect')}}"><i class="fbicon be-icon be-icon-fb"></i></a></h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" name="email" type="text" value="{{ old('email') }}">
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">密碼 Password</h6>
          <input class="msgtext" name="password" type="password">
          <input name="back" type="hidden" value="{{$back?$back:old('back')}}">
        </div>
      </div>
      <div class="cart_buttonbox left">
        <input class="onlybutton" type="submit" value="確認送出"><a class="forget_psw" href="{{url('forget')}}"><i class="shapeicon be-icon be-icon-shape"></i>忘記密碼了嗎？</a>
      </div>
      </form>
      
    </div>
    
    @if(Session::get('cart') && !Session::get('later') && $back != 'payment')
    <div class="member_center" style="margin-top:10px;">
      <div class="cart_buttonbox" style="margin-top:0px;">
        <a class="forget_psw" href="{{url('later')}}" style="width:100%;text-align:center;width: 200px;
    padding: 15px 0;display:block;float: initial;border-radius: 30px;background-color: #3d3d3d;color:#fff;margin:auto;
    margin-bottom:10px;">首次購物,結帳去!</a>
      </div>
      <p style="text-align:center;">在您首次購物完成後，系統將自動升級為會員，密碼預設為您的手機號碼，下次購物時立即享有會員價</p>
    </div>
     @endif



    <h6 class="hasaccount">還沒有帳號嗎？<a href="{{url('register')}}" title="立即註冊">立即註冊<i class="buttonicon be-icon be-icon-buttonarrow"></i></a></h6>
  </div>
</section>
@endsection

@section('script')
@endsection
