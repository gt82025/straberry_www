@extends('layouts.home')

@section('title', '訂購資料 - ')


@section('content')
<section class="p-bg">
  <div class="container">
    <div class="pl-title">
      <h2>訂購資料</h2>
      <h6>請確認訂購及收件人資訊!!</h6>
    </div>
    <div class="cart-setp width-33">
      <ul>
        <li class="active" alt="step1"></li>
        <li class="active" alt="step2"></li>
        <li class="active" alt="step3"></li>
        <li alt="step4"></li>
      </ul>
    </div>
   
    
    <div class="payment-info">
      <div class="border-bottom-1">
        <h3>信用卡資訊</h3>
        <ul class="payment-info-list">
          <li>
            <label class="flex-2" for=""><div class="box-20-20"><img src="{{url('assets/images/icon-mail-g.svg')}}" alt=""></div>信用卡號</label>
            <input class="input-type-1" type="email" name="email" value="0006147854124258" readonly>
          </li>
          <li class="flex-1">
            <div class="width-49">
              <label class="flex-2" for=""><div class="box-20-20"><img src="{{url('assets/images/icon-members-g2.svg')}}" alt=""></div>後三碼</label>
              <input class="input-type-1" type="text" name="name" value="168" readonly>
            </div>
            <div class="width-50">
              <label class="flex-2" for=""><div class="box-20-20"><img src="{{url('assets/images/icon-mobile-g.svg')}}" alt=""></div>卡片效期</label>
              <input class="input-type-1" type="tel" name="phone" value="08/25" readonly>
            </div>
          </li>
          
        </ul>
      </div>
      
    </div>
    
    <div class="cart-btn-box">
      <ul>
        <li><a href="{{url('cart')}}" class="gray-btn width-168"><img src="{{url('assets/images/icon-c-back-w.svg')}}" alt=""><span>上一步</span></a></li>
        <li><button class="red-btn width-168" onclick="location.href='{{url('showTPayCheckForm')}}'"><span>下一步</span><img src="{{url('assets/images/icon-c-next-w.svg')}}" alt=""></button></li>
      </ul>
    </div>
   
</div>
</section>
@endsection

@section('script')

<script>

    $('.copyform').click(function(){
        console.log();
        if($('#PayInfo').prop("checked")){
            $('input[name="to_email"]').val($('input[name="email"]').val());
            $('input[name="to_name"]').val($('input[name="name"]').val());
            $('input[name="to_phone"]').val($('input[name="phone"]').val());
            $('input[name="to_address"]').val($('input[name="address"]').val());
        }else{
            $('input[name="to_email"]').val('');
            $('input[name="to_name"]').val('');
            $('input[name="to_phone"]').val('');
            $('input[name="to_address"]').val('');
        }
       
    })

 </script>

@endsection