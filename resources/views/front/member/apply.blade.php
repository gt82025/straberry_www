@extends('layouts.home')

@section('title', '會員註冊 - ')

@section('css')



@endsection


@section('content')


<section class="p-bg">
  <div class="container width-54">

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

    <div class="m-list">
      <ul>
        <li><a href="{{url('login')}}">登入 Login</a></li>
        <li class="active"><a href="{{url('register')}}">註冊 Register</a></li>
      </ul>
    </div>
    <div class="m-title">
      <h3>註冊 <span>Register</span></h3>
    </div>
    <div class="m-input-box">
        <form id="form" method="post" action="{{ url('register') }}">
        {!! csrf_field() !!}
      <ul>
        <li>
          <label for=""><div class="box-20-20"><img src="{{ url('assets/images/icon-mail-g.svg') }}" alt="信箱 E-mail"></div>信箱 E-mail</label>
          <input class="input-type-1" type="email" name="email" value="{{ old('email') }}" required>
        </li>
        <li>
          <label for=""><div class="box-20-20"><img src="{{ url('assets/images/icon-key-g.svg') }}" alt="密碼 Password"></div>密碼 Password</label>
          <input class="input-type-1" type="password" name="password" required>
        </li>
        <li class="flex-1">
          <div class="width-49">
            <label for=""><div class="box-20-20"><img src="{{ url('assets/images/icon-members-g2.svg') }}" alt="姓名 Your Name"></div>姓名 Your Name</label>
            <input class="input-type-1" type="text" name="name" value="{{ old('name') }}" required>
          </div>
          <div class="width-50">
            <label for=""><div class="box-20-20"><img src="{{ url('assets/images/icon-gender-g.svg') }}" alt="性別 Gender"></div>性別 Gender</label>
            <div class="flex-2">
              <div class="radio flex-2">
                <label><input type="radio" name="gender" checked value="先生">先生</label>
              </div>
              <div class="radio flex-2">
                <label><input type="radio" name="gender" value="小姐">小姐</label>
              </div>
            </div>
          </div>
        </li>
        <li>
          <label for=""><div class="box-20-20"><img src="{{ url('assets/images/icon-mobile-g.svg') }}" alt="手機號碼 Mobile"></div>手機號碼 Mobile</label>
          <input class="input-type-1" type="tel" name="phone" value="{{ old('phone') }}" required>
        </li>
        <li>
          <div>
            <label for=""><div class="box-20-20"><img src="{{ url('assets/images/icon-address-g2.svg') }}" alt="地址 Address"></div>地址 Address</label>
            <div class="tw-selector" role="tw-city-selector" data-bootstrap-style data-has-zipcode>
              <div class="form-group">
                <!-- 縣市選單 -->
                <select class="form-control county" required></select>
              </div>
              <div class="form-group">
                <!-- 區域選單 -->
                <select class="form-control district" required></select>
              </div>
              <div class="form-group">
                <!-- 郵遞區號欄位 (建議加入 readonly 屬性，防止修改) -->
                <input class="form-control zipcode" type="text" name="zipcode" size="3" readonly placeholder="郵遞區號">
              </div>
            </div>

            <input class="input-type-1" placeholder="街道巷弄" type="text" name="address" value="{{ old('address') }}" required>
          </div>
        </li>
        <li>
          <div class="radio flex-2">
            <label><input type="radio" name="optradio" required>我已同意並閱讀「<a class="red-color-1" href="contract">會員條款</a>」</label>
          </div>
        </li>
        <li>
          <div class="m-btn-area">
            <button class="red-btn">確認送出</button>
          </div>
        </li>
      </ul>
      </form>
    </div>
    <div class="note-tip" style="display: none;">
      <div class="note-box">
        <img src="{{url('assets/images/icon-note-r.svg')}}" alt="">
        <p>填寫送出後請至信箱收取會員啟用認證信，謝謝。</p>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')

@endsection
