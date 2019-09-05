@extends('layouts.home')

@section('title', '嗨，'.$user->name.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="projecttop"></section>
<section class="cart_content small">
    <div class="cartcenter">
        @if (count($errors) >0)
        <div class="alert alert-danger">
          @if ($errors->has('password'))
          <strong>{{ $errors->first('password') }}</strong>
          @endif
        </div>
        @endif
        <form accept-charset="UTF-8" action="{{url('reset')}}" class="main-form" id="new_spree_user" method="post">
        {!! csrf_field() !!}
        <div class="member_center">
            <div class="guestarea noline">
                <h2 class="guesttitle">重設密碼</h2>
                <div class="guest_msg">
                    <h6 class="msgtitle">新密碼 Password</h6>
                    <input class="msgtext" type="password" name="password">
                </div>
                <div class="guest_msg">
                    <h6 class="msgtitle">確認密碼 Confirm Password</h6>
                    <input class="msgtext" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="cart_buttonbox left">
                <input class="onlybutton" type="submit" value="確認送出">
            </div>
        </div>
        </form>
        <h6 class="hasaccount back">
            <a href="{{url('member')}}"> <i class="buttonicon be-icon be-icon-buttonarrow"></i>返回上一頁</a>
        </h6>
    </div>
</section>
@endsection
