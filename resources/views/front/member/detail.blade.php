@extends('layouts.home')

@section('title', '訂單紀錄 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/order.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="projecttop"></section>
<section class="cart_content nonebg click">
  <div class="cartcenter">
    <div class="member_center">
      <div class="guestarea">
        <h3 class="guesttitle number">訂單編號：{{$order->order_number}}</h3><i class="topclosebutton be-icon be-icon-closeicon" onclick="location.href='{{url('record')}}'"></i>
      </div>
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
      @foreach($order->detail as $k => $v)
        <div class="tablebox">
          <div class="tablearticle content">
            <h6 class="mo_title">內容</h6>
            <div class="tablbox"><img class="propic" src="{{$v->cover}}" alt="{{$v->name}}">
              <div class="propic_text">
                <h3 class="pro_name">{{$v->name}}</h3>
                <h4>{{$v->product->size}}</h4>
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
            <h6>{{number_format($order->subtotal)}}</h6>
          </div>
        </div>
        <div class="tablebox auto">
          <div class="end_pricetext">
            <label class="radiobox">
              <h6>{{$order->ship}}</h6>
            </label>
          </div>
          <div class="tablearticle amount">
            <h6>{{number_format($order->freight)}}</h6>
          </div>
        </div>

        @if($order->discount > 0)
        <div class="tablebox auto">
          <div class="end_pricetext">
            <label class="radiobox">
              <h6>折扣代碼</h6>
            </label>
          </div>
          <div class="tablearticle amount">
            <h6> - {{number_format($order->discount)}}</h6>
          </div>
        </div>
        @endif

        <div class="tablebox totlepay">
          <div class="end_pricetext">
            <h6>總計</h6>
          </div>
          <div class="tablearticle amount">
            <h6>{{number_format($order->total)}}</h6>
          </div>
        </div>
        

      <div class="salebar type2">
        <h6 class="saletext">付款方式</h6>
        <div class="salebox">
          <label class="radiobox">
            <h6>{{$order->payment}}</h6>
          </label>
        </div>
      </div>
      <div class="guestarea">
        <h2 class="guesttitle">訂購人資料</h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" value="{{$order->email}}" readonly>
        </div>
        <div class="guest_msg helf">
          <h6 class="msgtitle">姓名 Your Name</h6>
          <input class="msgtext" type="text" value="{{$order->name}}" readonly>
        </div>
        <div class="guest_msg helf right">
          <h6 class="msgtitle">性別 Gender</h6>
          <input class="msgtext" type="text" value="{{$order->gender}}" readonly>
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">手機號碼 Mobile</h6>
          <input class="msgtext" type="text" value="{{$order->phone}}" readonly>
        </div>
        <div class="guest_msg ">
          <h6 class="msgtitle">地址 Address</h6>
          <input class="msgtext" type="text" value="{{$order->address}}" readonly>
        </div>
        
      </div>
      <div class="guestarea">
        <h2 class="guesttitle">收件人資料</h2>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" value="{{$order->to_email}}" readonly>
        </div>
        <div class="guest_msg helf">
          <h6 class="msgtitle">姓名 Your Name</h6>
          <input class="msgtext" type="text" value="{{$order->to_name}}" readonly>
        </div>
        <div class="guest_msg helf right">
          <h6 class="msgtitle">性別 Gender</h6>
          <input class="msgtext" type="text" value="{{$order->to_gender}}" readonly>
          
        </div>
        <div class="guest_msg">
          <h6 class="msgtitle">手機號碼 Mobile</h6>
          <input class="msgtext" type="text" value="{{$order->to_phone}}" readonly>
        </div>
        <div class="guest_msg ">
          <h6 class="msgtitle">地址 Address</h6>
          <input class="msgtext" type="text" value="{{$order->to_address}}" readonly>
        </div>
        
      </div>
      <div class="salebar type2">
        <h6 class="saletext">收件/取貨</h6>
        <div class="salebox">
          <label class="radiobox">
            <h6>{{$order->ship_time}}</h6>
          </label>
        </div>
      </div>
      <div class="guestarea textarea">
        <div class="guest_msg">
          <h6 class="msgtitle">備註 Notice</h6>
          <textarea class="msgtext" name="" cols="30" rows="10">{{$order->remark}}</textarea>
        </div>
      </div>
      <div class="closebutton gotop"><i class="closeicon be-icon be-icon-closeicon" onclick="location.href='{{url('record')}}'"></i></div>
    </div>
  </div>
</section>
@endsection