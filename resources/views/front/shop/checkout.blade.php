@extends('layouts.home')

@section('title', '訂購資料 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
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
        <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep3"></i></div>
        <div class="typebox"><i class="typeicon be-icon be-icon-cartstep4"></i></div>
      </div>
      <div class="member_center">
        <div class="tablebox title">
          <div class="tablearticle content">
            <h6>內容</h6>
          </div>
          <div class="tablearticle price">
            <h6>單價</h6>
          </div>
          <div class="tablearticle quantity">
            <h6>數量</h6>
          </div>
          <div class="tablearticle amount">
            <h6>小計</h6>
          </div>
        </div>
        @foreach($cart as $k => $v)
        <div class="tablebox">
          <div class="tablearticle content">
            <h6 class="mo_title">內容</h6>
            <div class="tablbox"><img class="propic" src="{{$v->cover}}" alt="{{$v->name}}">
              <div class="propic_text">
                <h3 class="pro_name">{{$v->name}}</h3>
                <h4>{{$v->size}}</h4>
              </div>
            </div>
          </div>
          <div class="tablearticle price">
            <h6 class="mo_title">單價</h6>
            <div class="tablbox">
              <h6>{{number_format($v->selling)}}</h6>
            </div>
          </div>
          <div class="tablearticle quantity">
            <h6 class="mo_title">數量</h6>
            <div class="tablbox">
              <h6>{{$v->qty}}</h6>
            </div>
          </div>
          <div class="tablearticle amount">
            <h6 class="mo_title">小計</h6>
            <div class="tablbox">
              <h6>{{number_format($v->total)}}</h6>
            </div>
          </div>
        </div>
        @endforeach


        <div class="tablebox auto">
          <div class="end_pricetext">
            <h6>合計</h6>
          </div>
          <div class="tablearticle amount">
            <h6>{{number_format($order['bill']['subtotal'])}}</h6>
          </div>
        </div>
        <div class="tablebox auto">
          <div class="end_pricetext">
            <label class="radiobox">
              <h6>{{$order['ship']['name']}}</h6>
            </label>
          </div>
          <div class="tablearticle amount">
            <h6>{{number_format($order['bill']['freight'])}}</h6>
          </div>
        </div>

        @if($order['bill']['discount'] > 0)
        <div class="tablebox auto">
          <div class="end_pricetext">
            <label class="radiobox">
              <h6>折扣代碼<span>({{$order['discount']['name']}})</span></h6>
            </label>
          </div>
          <div class="tablearticle amount">
            <h6> - {{number_format($order['bill']['discount'])}}</h6>
          </div>
        </div>
        @endif

        <div class="tablebox totlepay">
          <div class="end_pricetext">
            <h6>總計</h6>
          </div>
          <div class="tablearticle amount">
            <h6>{{number_format($order['bill']['total'])}}</h6>
          </div>
        </div>
        <div class="salebar type2">
          <h6 class="saletext">付款方式</h6>
          <div class="salebox">
            <label class="radiobox">
              <h6>{{$order['payment']}}</h6>
            </label>
          </div>
        </div>
        <div class="guestarea">
          <h2 class="guesttitle">訂購人資料</h2>
          <div class="guest_msg">
            <h6 class="msgtitle">信箱 E-mail</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['email']}}">
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">姓名 Your Name</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['name']}}">
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">性別 Gender</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['gender']}}">
            
          </div>
          <div class="guest_msg">
            <h6 class="msgtitle">手機號碼 Mobile</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['phone']}}">
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">地址 Address</h6>
            <div class="textbox three">
              <input class="msgtext" type="text" readonly="readonly" value="{{$order['city']}}">
              <input class="msgtext" type="text" readonly="readonly" value="{{$order['dist']}}">
              <input class="msgtext" type="text" readonly="readonly" value="{{$order['zip']}}">

            </div>
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle"> </h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['address']}}">
          </div>
        </div>
        <div class="guestarea">
          <h2 class="guesttitle">收件人資料</h2>
          <div class="guest_msg">
            <h6 class="msgtitle">信箱 E-mail</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_email']}}">
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">姓名 Your Name</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_name']}}">
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">性別 Gender</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_gender']}}">
          </div>
          <div class="guest_msg">
            <h6 class="msgtitle">手機號碼 Mobile</h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_phone']}}">
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">地址 Address</h6>
            <div class="textbox three">
              <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_city']}}">
              <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_dist']}}">
              <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_zip']}}">
            </div>
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle"> </h6>
            <input class="msgtext" type="text" readonly="readonly" value="{{$order['to_address']}}">
          </div>
        </div>
        <div class="salebar type2">
          <h6 class="saletext">收件/取貨</h6>
          <div class="salebox">
            <label class="radiobox">
              <h6>{{$order['ship_time']}}</h6>
            </label>
          </div>
        </div>
        <div class="guestarea textarea">
          <div class="guest_msg">
            <h6 class="msgtitle">備註 Notice</h6>
            <textarea class="msgtext" name="" cols="30" rows="10" readonly="readonly" >{{$order['remark']}}</textarea>
          </div>
        </div>
        <div class="cart_buttonbox"><a class="linkbutton" href="{{url('payment')}}"><i
              class="buttonicon be-icon be-icon-buttonarrow"></i>
            <p>上一步</p>
          </a><a class="linkbutton" href="{{url('checkcheckout')}}">
            <p>下一步</p><i class="buttonicon be-icon be-icon-buttonarrow"></i>
          </a></div>
      </div>
    </div>
  </section>
@endsection

@section('script')

@endsection