@extends('layouts.home')

@section('title', '忘記密碼 - ')

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
      <form  method="post" action="{{url('forget')}}">
        {!! csrf_field() !!}
      <div class="guestarea noline">
        <h2 class="guesttitle">忘記密碼了嗎？</h2>
        <h6 class="guestsubtitle">別擔心，您只要輸入當初申請會員時所填寫的信箱，至信箱收取密碼重設連結...</h6>
        <div class="guest_msg">
          <h6 class="msgtitle">信箱 E-mail</h6>
          <input class="msgtext" type="text" name="email">
        </div>
      </div>
      <div class="cart_buttonbox left">
        <input class="onlybutton" type="submit" value="確認送出">
      </div>
      </form>
    </div>
    <h6 class="hasaccount back"> <a href="{{url('login')}}"> <i class="buttonicon be-icon be-icon-buttonarrow"></i>返回上一頁</a>
    </h6>
  </div>
</section>
@endsection


