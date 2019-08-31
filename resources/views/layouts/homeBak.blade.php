<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0 " />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">
  <title>@yield('title'){{$nav['meta']->title}}</title>
  <meta name="copyright" content="{{$nav['meta']->title}}" />
  <meta name="description" content="{{$nav['meta']->description}}">
  <meta property="og:title" content="@yield('title'){{$nav['meta']->title}}">
  <meta property="og:url" content="{{url('')}}">
  <meta property="og:image" content="{{url($nav['meta']->image)}}">
  <meta property="og:description" content="{{$nav['meta']->description}}">
  <meta property="og:site_name" content="{{$nav['meta']->title}}" />
  <meta itemprop="name" content="@yield('title'){{$nav['meta']->title}}">
  <meta itemprop="image" content="{{url($nav['meta']->image)}}">
  <meta itemprop="description" content="{{$nav['meta']->description}}">

  <link type="image/icon" rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}">
  <link type="text/css" rel="stylesheet" href="{{url('assets/css/slick.min.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('assets/css/flickity.css')}}">
  <link type="text/css" rel="stylesheet" href="{{url('assets/css/style.css?v=1811261123')}}">
  @yield('css')
  {!!$nav['meta']->analytics!!}
</head>
<body>
<header>
  <!-- 主選單-開始 -->
    <div class="top-header">
      <div class="logo">
        <a href="{{url('')}}" title="{{$nav['meta']->title}}">
          <img class="t-logo" src="{{url('assets/images/logo.svg')}}" alt="{{$nav['meta']->title}}">
          <img class="t-logo-text" src="{{url('assets/images/logo-text.svg')}}" alt="{{$nav['meta']->title}}">
        </a>
      </div>
      <div class="r-menu">
          <div class="t-menu">
            <ul class="t-l-menu">
              <li><a href="{{url('')}}" title="回首頁">回首頁</a></li>
              <li><a href="{{url('contact')}}" title="聯繫客服">聯繫客服</a></li>
              <li><a href="{{url('notice')}}" title="購物須知">購物須知</a></li>
            </ul>
            <div class="dropdown">
              <button class="btn btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">語系選擇
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="{{url('')}}">繁體中文</a></li>
                <!--
                <li><a href="{{url('en')}}">English</a></li>
                <li><a href="{{url('jp')}}">日文</a></li>
                -->
              </ul>
            </div>
          </div>
          <div class="b-menu">
            <div class="main-menu">
              <ul>
                <li><a href="{{url('products')}}" title="產品介紹">產品介紹</a></li>
                <li><a href="{{url('member')}}" title="會員中心">會員中心</a></li>
                <li><a href="{{url('about')}}" title="關於尋莓園">關於尋莓園</a></li>
                <li><a href="{{url('news')}}" title="最新消息">最新消息</a></li>
              </ul>
            </div>
            <div class="b-r-menu">
              @if(!Auth::check())
              <ul>
                <li><a href="{{url('login')}}" title="登入">登入</a></li>
                <li><a href="{{url('register')}}" title="註冊">註冊</a></li>
              </ul>
              @else
              <div class="flex-2 logout-btn">
                <span>{{ Auth::user()->name }},</span>
                  <a href="{{url('logout')}}">
                    <p>登出</p><div class="icon-logout"><img src="{{url('assets/images/icon-logout-w.svg')}}" alt=""></div>
                  </a>
              </div>
              @endif
              <div class="icon-members" onclick="location.href='{{url('login')}}'">
                <img src="{{url('assets/images/icon-members-g.svg')}}" alt="">
              </div>
              <div class="icon-cart" onclick="location.href='{{url('cart')}}'">

                <div class="cart-btn @if(count(session('cart'))) active @endif"><img src="{{url('assets/images/icon-bag-g.svg')}}" alt=""></div>
                <span>結帳</span>
              </div>
              <div class="menu-btn" id="myMenu">
                <div class="m-line"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  <!-- 主選單-結束 -->
</header>

@yield('content')

<!-- 頁尾-開始 -->
<footer>
  @if(!Auth::check())
  <div class="join-area container">
    <img class="join-img-l" src="{{url('assets/images/in-join-bg.svg')}}" alt="獲取最新優惠">
    <div class="join-text">
      <span>Get new Bonus!!</span>
      <h4>獲取最新消息</h4>
      <h6>成為尋莓園會員，將能收到最新的產品資訊喔!!</h6>
      <button class="white-btn" onclick="location.href='{{url('register')}}'">加入會員</button>
    </div>
    <img class="join-img-r" src="{{url('assets/images/in-join-bg.svg')}}" alt="">
  </div>
  @endif
  <div class="contain f-sitemap">
    <div class="f-s-l">
      <div class="f-s-list">
        <span>產品介紹</span>
        <ul>
          @foreach($nav['product'] as $k => $v)
          <li onclick="location.href='{{url('products',$v->id)}}'">{{$v->name}}</li>
          @endforeach

        </ul>
      </div>
      <div class="f-s-list">
        <span>關於尋莓園</span>
        <ul>
          <li onclick="location.href='{{url('about')}}'">農場簡介</li>
          <li onclick="location.href='{{url('about#part02')}}'">農產認證</li>
          <li onclick="location.href='{{url('about#part03')}}'">蟲害防治</li>
        </ul>
      </div>
      <div class="f-s-list">
        <span>最新消息</span>
        <ul>
          @foreach($nav['post'] as $k => $v)
          <li onclick="location.href='{{url('news',$v->id)}}'">{{$v->name}}</li>
          @endforeach

        </ul>
      </div>
      <div class="f-s-list">
        <span>聯繫客服</span>
        <ul>
          <li onclick="location.href='{{url('contact')}}'">聯絡我們</li>
          <li onclick="location.href='{{url('contact')}}'">園區位置</li>
        </ul>
      </div>
      <div class="f-s-list">
        <span>網站服務</span>
        <ul>
          <li onclick="location.href='{{url('notice')}}'">購物須知</li>
          <li onclick="location.href='{{url('policy')}}'">隱私權政策</li>
          <li onclick="location.href='{{url('contract')}}'">服務條款</li>
        </ul>
      </div>
    </div>
    <div class="f-s-r">
      <ul class="f-social">
        <li>
          <p>加入尋莓園社群</p>
          <span>Follow Us</span>
        </li>
        @foreach($nav['social'] as $k => $v)
        <li><a href="{{$v->url}}" target="_blank" title="{{$v->name}}"><img src="{{url($v->icon)}}" alt="{{$v->name}}"></a></li>
        @endforeach
      </ul>
      <ul class="f-contact">
        <li>
          <button class="yellow-btn" onclick="location.href='{{url('contact#googlemap')}}'"><img class="icon-bag" src="{{url('assets/images/icon-address-g.svg')}}" alt=""><i>園區位置</i></button>
        </li>
        <li>
          <img src="{{url('assets/images/icon-phone-g.svg')}}" alt=""><span><a href="tel:0958399916">0958-399 916</a></span>
        </li>
      </ul>
    </div>
  </div>
  <div class="f-copyright">
    © 尋莓園有機農場 版權所有 All rights reserved.<br />
    Designed by Fong.
  </div>
</footer>
<!-- 頁尾-結束 -->
<!-- dialog主選單-開始 -->
<div id="myModal" class="menu-modal" aria-hidden="true" data-backdrop="static">
  <span class="btn-close">
    <img src="{{url('assets/images/icon-close.svg')}}" alt="">
  </span>
  <div class="modal-content">
    <div class="modal-body">
      <div class="dropdown">
        <button class="btn btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">語系選擇
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="{{url('')}}">繁體中文</a></li>
          <!--
          <li><a href="{{url('en')}}">English</a></li>
          <li><a href="{{url('jp')}}">日文</a></li>
          -->
        </ul>
      </div>
      <div class="main-menu">
        <ul>
          <li><a href="{{url('products')}}" title="產品介紹">產品介紹</a></li>
          <li><a href="{{url('member')}}" title="會員中心">會員中心</a></li>
          <li><a href="{{url('about')}}" title="關於尋莓園">關於尋莓園</a></li>
          <li><a href="{{url('news')}}" title="最新消息">最新消息</a></li>
        </ul>
      </div>
      <ul class="t-l-menu">
        <li><a href="{{url('')}}" title="回首頁">回首頁</a></li>
        <li><a href="{{url('contact')}}" title="聯繫客服">聯繫客服</a></li>
        <li><a href="{{url('notice')}}" title="購物須知">購物須知</a></li>
      </ul>
    </div>
    <div class="modal-footer">
      <ul class="f-social">
        <li>
          <p>加入尋莓園社群</p>
          <span>Follow Us</span>
        </li>
        @foreach($nav['social'] as $k => $v)
        <li><a href="{{$v->url}}" target="_blank" title="{{$v->name}}"><img src="{{url($v->icon)}}" alt="{{$v->name}}"></a></li>
        @endforeach
      </ul>
      <ul class="f-contact">
        <li>
          <button class="yellow-btn" onclick="location.href='{{url('contact#googlemap')}}'"><img class="icon-bag" src="{{url('assets/images/icon-address-g.svg')}}" alt=""><i>園區位置</i></button>
        </li>
        <li>
          <img src="{{url('assets/images/icon-phone-g.svg')}}" alt=""><span><a href="tel:0958399916">0958-399 916</a></span>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- dialog主選單-結束 -->


</body>
<script src="{{url('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<script src="{{url('assets/js/SmoothScroll.js')}}"></script>
<script src="{{url('assets/js/slick.min.js')}}"></script>
<script src="{{url('assets/js/tw-city-selector.js')}}"></script>
<script src="{{url('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{url('assets/js/masonry.pkgd.min.js')}}"></script>
<script src="{{url('assets/js/main.js')}}"></script>
<script src="{{url('assets/js/header.js')}}"></script>
<script src="{{url('assets/js/slider.js')}}"></script>
<script src="{{url('assets/js/twcity.js')}}"></script>
<script src="{{url('assets/js/news-masonry.js')}}"></script>
<script src="{{url('assets/js/InputSpinner.js')}}"></script>
<script src="{{url('assets/js/input-num.js')}}"></script>
<script src="{{url('assets/js/flickity.pkgd.js')}}"></script>
@yield('script')
</html>
