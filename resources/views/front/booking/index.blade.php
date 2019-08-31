@extends('layouts.home')

@section('title', '預約採果 - ')

@section('css')
<link type="text/css" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.2/themes/material_green.css">
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection

@section('content')
<section class="projecttop book"></section>
<section class="cart_content">
  <div class="cartcenter">
    <h2 class="member_pagename">預約採果</h2>
    <h5 class="member_pagetext">請填寫預約相關資料!!</h5>
    @if (session('error'))
    <div class="alert alert-danger">
        <strong> {{ session('error') }} </strong>
    </div>
    @endif
    <form accept-charset="UTF-8" action="{{url('booking')}}"  method="post">
        {!! csrf_field() !!}
    <div class="member_center marbton">
      <div class="bookingarea">
        <div class="bi_box"><i class="bi_icon be-icon be-icon-pin"></i>
          <select name="location" class="locationSelect" required>
            <option value="">請選擇農場</option>
            @foreach($category as $k => $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
            
          </select>
        </div>
        <div class="bi_box resetDate" id="basicDate"><i class="bi_icon be-icon be-icon-booking"></i>
            <input type="text" placeholder="請選擇日期" data-input id="datetime" name="datetime" required>
        </div>
        <div class="bi_box"><i class="bi_icon be-icon be-icon-clock"></i>
          <select name="session">
            <option value="上午場">上午場 (AM09:00~PM12:00)</option>
            <option value="下午場">下午場 (PM13:00~PM18:00)</option>
          </select>
        </div>
      </div>
    </div>
    <div class="member_center">
      <div class="guestarea">
        <h2 class="guesttitle book">預約資料</h2>
        <div class="guest_msg helf">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="guest_msg helf right">
          <h6 class="msgtitle">姓名 Your Name</h6>
          <input class="msgtext" type="text" name="name" required>
        </div>
        <div class="guest_msg helf">
          <h6 class="msgtitle">手機號碼 Mobile</h6>
          <input class="msgtext" type="text" name="phone" required>
        </div>
        <div class="guest_msg helf right">
          <h6 class="msgtitle">預約人數 Numbers</h6>
          <div class="msgbuttonbox quantity">
            <button class="sub-btn quantity-down" onclick="return false;"><span>－</span></button>
            <button class="add-btn quantity-up" onclick="return false;"><span>＋ </span></button>
            <input class="number" type="number" name="number" value="1" min="1" max="50">
          </div>
        </div>
      </div>
      <div class="guestarea textarea">
        <div class="guest_msg">
          <h6 class="msgtitle">備註 Notice</h6>
          <textarea class="msgtext" name="" cols="30" rows="10" name="remark"></textarea>
        </div>
      </div>
      <div class="cart_buttonbox">
        <input class="linkbutton" type="reset"  value="取消重填"> 
        <input class="linkbutton" type="submit"  value="完成送出">
        <!--
        <a class="linkbutton" href=""><i class="buttonicon be-icon be-icon-closeicon"></i><p>取消重填</p></a>
        <a class="linkbutton" href="booking_step2.html"><p>確定送出</p><i class="buttonicon be-icon be-icon-cartstep4"></i></a>
-->
      </div>
    </div>
    </form>

  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.2/flatpickr.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {

      $('select[name=location]').change(function(){
        if($(this).val()){
          $.get("../api/disable/"+$(this).val(),function(data,status){
            $("#datetime").flatpickr({
              minDate: new Date().fp_incr(2),
              maxDate: new Date().fp_incr(365),
              disable: [data],
            });
          });
        }
      });

      $("#datetime").flatpickr({
        //wrap: true,
        //weekNumbers: true,
        minDate: new Date().fp_incr(2),
			  maxDate: new Date().fp_incr(365),
        disable: ['{{$disable}}'],
        //disable: ["2019-07-30", "2019-07-29", "2019-07-28", new Date(2025, 4, 9) ],
   			dateFormat: "Y-m-d",
      });
      
     // flatpickr("#datetime", { enableTime: false, altInput: true });

      jQuery('.quantity').each(function () {
        var spinner = jQuery(this),
          input = spinner.find('input.number[type="number"]'),
          btnUp = spinner.find('.quantity-up'),
          btnDown = spinner.find('.quantity-down'),
          min = input.attr('min'),
          max = input.attr('max');

        btnUp.click(function () {
          var oldValue = parseFloat(input.val());
          if (oldValue >= max) {
            var newVal = oldValue;
          } else {
            var newVal = oldValue + 1;
          }
          spinner.find("input").val(newVal);
          spinner.find("input").trigger("change");
        });

        btnDown.click(function () {
          var oldValue = parseFloat(input.val());
          if (oldValue <= min) {
            var newVal = oldValue;
          } else {
            var newVal = oldValue - 1;
          }
          spinner.find("input").val(newVal);
          spinner.find("input").trigger("change");
        });
      });
    });
  </script>
@endsection
