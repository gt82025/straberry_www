@extends('layouts.home')

@section('title', '嗨，'.$user->name.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/order.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
<style>
.order_content .ordercenter .member_center .tablebox{
    cursor: initial;
}
</style>
@endsection

@section('content')
<section class="projecttop"></section>
<section class="cart_content nonebg click">
    <div class="cartcenter">
    <div class="member_center">
        <div class="guestarea">
        <h3 class="guesttitle number"> <i class="titleicon be-icon be-icon-booking"></i>採果日期：{{$booking->date}}</h3><i class="topclosebutton be-icon be-icon-closeicon" onclick="location.href='{{url('booking/record')}}'"></i>
        <div class="guest_msg helf">
            <h6 class="msgtitle">採果地點 Address</h6>
            <p class="msgword"> <i class="wordicon be-icon be-icon-pin"></i>{{$booking->location}}
            @if($booking->category->map)<a class="map" href="{{$booking->category->map}}">Google Map</a>@endif
            </p>
        </div>
        <div class="guest_msg helf right">
            <h6 class="msgtitle">採果場次 Time</h6>
            <p class="msgword"> <i class="wordicon be-icon be-icon-clock"></i>{{$booking->session}}</p>
        </div>
        </div>
        <div class="guestarea">
        <h2 class="guesttitle">預約資料</h2>
        <div class="guest_msg helf">
            <h6 class="msgtitle">會員信箱 E-mail</h6>
            <p class="msgword">{{$booking->email}}</p>
        </div>
        <div class="guest_msg helf right">
            <h6 class="msgtitle">姓名 Your Name</h6>
            <p class="msgword">{{$booking->name}}</p>
        </div>
        <div class="guest_msg helf">
            <h6 class="msgtitle">手機號碼 Mobile</h6>
            <p class="msgword">{{$booking->phone}}</p>
        </div>
        <div class="guest_msg helf right">
            <h6 class="msgtitle">預約人數 Numbers</h6>
            <p class="msgword">{{$booking->number}}</p>
        </div>
        </div>
        <div class="guestarea textarea">
        <div class="guest_msg">
            <h6 class="msgtitle">備註 Notice</h6>
            <p class="msgword">{{$booking->remark}}</p>
        </div>
        </div>
        <div class="closebutton gotop"><i class="closeicon be-icon be-icon-closeicon" onclick="location.href='{{url('booking/record')}}'"></i></div>
    </div>
    </div>
</section>
  
@endsection

