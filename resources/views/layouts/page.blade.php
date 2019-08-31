<!DOCTYPE html>
<html class="no-js" lang="zh-Hant-TW">

<head>
    <!-- 測試站防止被爬蟲搜尋 -->
    <!-- 
        上線後刪除此段Meta與註解
        參考文件：https://developers.google.com/search/reference/robots_meta_tag?hl=zh-tw
     
    <meta name="robots" content="noindex, nofollow,noarchive,nosnippet,noimageindex,noodp">
    <meta name="googlebot" content="noindex, nofollow">
    -->
    <!-- /End 測試站防止被爬蟲搜尋 -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="{{$meta->keywords}}">
    <meta name="author" content="Wade,Linus,金錦町">
    <meta name="copyright" content="{{$meta->title}}" />
    <meta name="URL" content="">

    <!-- for search engine -->
    <meta name="description" content="{{$meta->description}}">
    <link rel="author" href="google plus 個人頁網址/posts">
    <link rel="publisher" href="google plus 個人頁網址">
    <!-- for facebook -->
    <!-- 參考https://developers.facebook.com/docs/reference/opengraph/object-type/business.business/ -->
    <!-- 參考 https://webcode.tools/open-graph-generator/business -->

    <meta property="og:title" content="@yield('title'){{$meta->title}}">
    <meta property="og:url" content="{{url('')}}">
    <meta property="og:image" content="{{url($meta->image)}}">
    <meta property="og:description" content="{{$meta->description}}">
    <meta property="og:site_name" content="{{$meta->title}}" />
    <meta property="og:type" content="business.business" />
    <meta property="business:contact_data:street_address" content="Sample Contact data: Street Address" />
    <meta property="business:contact_data:locality" content="Sample Contact data: Locality" />
    <meta property="business:contact_data:postal_code" content="Sample Contact data: Postal Code" />
    <meta property="business:contact_data:country_name" content="Sample Contact data: Country Name" />
    <meta property="place:location:latitude" content="Sample Location: Latitude" />
    <meta property="place:location:longitude" content="Sample Location: Longitude" />

    <!-- for google plus -->
    <meta itemprop="name" content="@yield('title'){{$meta->title}}">
    <meta itemprop="image" content="{{url($meta->image)}}">
    <meta itemprop="description" content="{{$meta->description}}">
    <title>@yield('title'){{$meta->title}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon" href="images/touch-icon.png" />
    <!-- Css -->
    <!-- <link rel="stylesheet" href="css/loading.min.css"> -->

    
    <!--<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{url('css/_vendor/swiper/swiper.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    @yield('css') 
    {!!$meta->analytics!!}
</head>

<body class="inside">
<div id="pageLoading" class="loading">
    <style>
@keyframes scrollMove {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes introOpc {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
html, body {
  margin: 0;
  padding: 0;
}

#pageLoading {
  width: 100vw;
  height: 100vh;
  background-color: #ba9142;
  position: fixed;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  transition-property: background;
  transition-duration: 0.5s;
  transition-delay: 0.3s;
  z-index: 9999;
  margin-right: 0;
  padding: 0;
}
#pageLoading.remove {
  transform: translateX(-100%);
}
#pageLoading.finish {
  background-color: rgba(186, 145, 66, 0);
}
#pageLoading.finish .logo {
  opacity: 0;
}
#pageLoading.finish .logo .lineContainer #HexagonLine {
  animation: rollFinished 0.6s forwards linear;
}
#pageLoading.finish .logo .lineContainer #HexagonLine path#Line1 {
  transition-property: all;
  transition-duration: 1s;
  transition-delay: 0s;
  stroke: transparent;
  fill: #ba9142;
  stroke-dashoffset: 0;
  stroke-width: 0;
}
#pageLoading.finish .logo .mainContainer #HexagonLogo {
  animation: mainRotateFinished 1s forwards linear;
}
#pageLoading.loading .logo .lineContainer #HexagonLine {
  animation: roll 2s infinite linear;
}
#pageLoading.loading .logo .lineContainer #HexagonLine path#Line1 {
  fill: rgba(186, 145, 66, 0);
  stroke-dasharray: 400 600;
  animation: dash 3s infinite linear;
}
#pageLoading.loading .logo .mainContainer #HexagonLogo {
  transform-origin: center;
  animation: mainRotate 2s infinite linear;
}
#pageLoading .logo {
  width: 100px;
  height: 100px;
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  transition-property: opacity;
  transition-duration: 0.5s;
  transition-delay: 0.6s;
}
#pageLoading .logo .mainContainer {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 556;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  display: flex;
  -ms-flex-align: start;
      align-items: flex-start;
  transform-style: preserve-3d;
  perspective: 500px;
  -webkit-transform-style: preserve-3d;
  -webkit-perspective: 500px;
}
#pageLoading .logo .lineContainer {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 555;
  top: 0;
  left: 0;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
}
#pageLoading .logo .lineContainer #HexagonLine path#Line1 {
  transition-property: all;
  transition-duration: 0.5s;
  transition-delay: 0s;
}
@keyframes mainRotate {
  0% {
    transform: rotateY(0deg);
  }
  85% {
    transform: rotateY(360deg);
  }
  100% {
    transform: rotateY(360deg);
  }
}
@keyframes dash {
  0% {
    stroke-dashoffset: 0;
  }
  100% {
    stroke-dashoffset: 1000;
  }
}
@keyframes roll {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }
}
@keyframes rollFinished {
  to {
    transform: rotate(-180deg);
  }
}
@keyframes mainRotateFinished {
  to {
    transform: rotateY(0deg);
  }
}






    </style>
    <!-- 頁面讀取 -->
    <div class="logo">
        <div class="mainContainer">
            <svg version="1.1" id="HexagonLogo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80%" height="80%" viewBox="0 0 45 45" enable-background="new 0 0 45 45" xml:space="preserve">
                <polygon fill="none" stroke="#fff" stroke-miterlimit="10" points="22.5,5.44 2.812,39.561 42.188,39.561 " />
                <rect x="13.236" y="21.495" fill="none" stroke="#fff" stroke-miterlimit="10" width="18.407" height="18.065" />
                <line fill="none" stroke="#fff" stroke-miterlimit="10" x1="13.236" y1="27.312" x2="31.644" y2="27.312" />
                <polyline fill="none" stroke="#fff" stroke-miterlimit="10" points="13.236,31.328 22.5,36.932 31.644,31.081 " />
                <line fill="none" stroke="#fff" stroke-miterlimit="10" x1="22.5" y1="21.495" x2="22.5" y2="39.561" />
            </svg>
        </div>
        <div class="lineContainer">
            <svg version="1.1" id="HexagonLine" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90%" height="90%" viewBox="0 0 129.45 146.471" enable-background="new 0 0 129.45 146.471" xml:space="preserve">
                <g>
                    <path id="Line1" fill="none" stroke="#fff" stroke-width="3" d="M64.726,6.362L6.813,39.797v66.873l57.912,33.438l57.912-33.438
        V39.797L64.726,6.362L64.726,6.362z" />
                </g>
            </svg>
        </div>
    </div>
</div>
    <header id="header">
        <div class="addCartNotic">
            <p>
                <span class="series">金雀</span>
                <span class="pdName">金箔蜂蜜蛋糕(原味) </span>
                <span class="size">尺寸 : <span class="val">B6</span></span>
                <span class="quantity">數量 : <span class="val">3</span></span>
                <br>已加入購物車
            </p>
        </div>
        <!--  頁面選單區域 -->
        <div class="mainContainer">
            <a class="logo" href="{{url('')}}" title="{{$meta->title}}">
                <picture class="white hide">
                    <source type="{{url('image/svg+xml')}}" srcset="{{url('images/logo_w-01.svg')}}">
                    <img src="{{url('images/logo_03_w.png')}}" alt="{{$meta->title}}">
                </picture>
                <picture class="black">
                    <source type="{{url('image/svg+xml')}}" srcset="{{url('images/logo.svg')}}">
                    <img src="{{url('images/logo_03.png')}}" alt="{{$meta->title}}">
                </picture>
            </a>
            <nav class="close">
                <a href="javascript:;" class="close">
                    <span class="btnBox">
                    </span>
                </a>
                <div class="cartContainerMobile">
                    <a href="javascript:;" class="cart mobile">
                        <span class="quantity">{{ count(Session::get('cart')) }}</span>
                        <i class="data-icon data-icon-jin_cart"></i>
                    </a>
                </div>
                <a href="{{url('products')}}" class="basic">商品資訊</a>
                <a href="{{url('relationship')}}" class="basic" title="幾何關係">幾何關係</a>
                <a href="{{url('reservation')}}" class="basic">預約訂製</a>
                @if(Auth::check())
                <a href="{{url('member')}}" class="basic">會員中心</a>
                <a href="{{url('logout')}}" class="basic" > 登出</a>
                @else
                <a href="javascript:;" class="basic" id="member_Login">登入</a>
                @endif
                
                <a href="javascript:;" class="cart pc">
                    <span class="quantity">{{ count(Session::get('cart')) }}</span>
                    <i class="data-icon data-icon-jin_cart"></i>
                </a>
                
            </nav>
            <a class="buger">
                <span class="line"></span>
            </a>
        </div>
    </header>
    
    <article class="cart close">
        <div class="sideLeft"></div>
        <div class="sideBar">
            <div class="mainContent">
                <a href="javascript:;" class="closeBtn cart"></a>
                <h3><span class="cartIcon"><i class="data-icon data-icon-jin_cart"></i></span>Shopping Bag</h3>
            </div>
            <form action="{{url('cart')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <ul class="cartList">

                    @if(count(Session::get('cart')))
                    @foreach(Session::get('cart') as $k => $v)
                    <li>
                        <a class="delete" title="刪除" href="javascript:;" data-id="{{$v->id}}" data-eq="{{$k}}" data-confirm="您確定要從購物車刪除此商品?">
                            <i class="data-icon data-icon-bin"></i>
                        </a>
                        <div class="pdPhoto">
                            <picture>
                                <img src="{{url($v->product->cover)}}" alt="">
                            </picture>
                        </div>
                        <div class="detial">
                            <h2>{{$v->product->name}}</h2>
                            <h4 class="spec">{{$v->product->category->name}} {{$v->name}}</h4>
                            <h4 class="taste">{{$v->product->taste}}</h4>
                            <div class="quantity">
                                <span class="price">NT${{$v->price}} </span>
                                @if($v->content_detail)
                                <label class="quantity_main">
                                    <input type="number" value="{{$v->qty}}"  name="qty[]" class="Quantity" readonly> 
                                </label>
                                @else
                                <label class="quantity_main">
                                    <a href="javascript:;" class="minus"></a>
                                    <input type="number" value="{{$v->qty}}" class="Quantity" name="qty[]"> <a href="javascript:;" class="plus"></a>
                                </label>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @else
                    @endif
                </ul>
                <div class="totalPrice">
                    <div class="title">
                        Total
                    </div>
                    <div class="result">
                        NT$1,100
                    </div>
                </div>
                <div class="btnContainer">
                    <a href="javscript:;" class="shopping_c btnbox">
                        繼續購買<span class="line1"> </span>
                        <span class="line2"> </span>

                    </a>
                    <button class="checkOut btnbox">開始結帳<span class="line1"> </span>
                        <span class="line2"> </span>
                    </button>
                </div>
            </form>
        </div>
    </article>
    <div class="Check_Register">
        <div class="popup">
            <a class="close closeBtn">

            </a>
            <div class="cf"></div>
            <div class="tabContainer">
                <div class="tabL active">
                    會員登入
                </div>
                <div class="tabR">
                    加入會員
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="container">
                <div class="registerMb ">
                    <h3>我想成為金錦町會員</h3>
                    <p>若您還未註冊金錦町會員 我們將會請您提供必需資訊以便輕鬆購物
                    </p>
                    <a class="send btnbox apply" href="{{url('apply')}}">
                        申請會員
                        <span class="line1"> </span>
                        <span class="line2"> </span>
                    </a>
                    <div class="line">
                        <div class="main"></div>
                        <div class="or">or</div>
                    </div>
                    <div class="share">
                        <a href="{{url('fbRedirect')}}" class="fb_login">
                            <img src="{{url('images/login_social_32.png')}}" alt="">
                        </a>
                        <a class="g_login" href="{{url('gRedirect')}}">
                          <img src="{{url('images/login_social_30.png')}}" alt="">
                            
                        </a>

                    </div>
                </div>
                <div class="forgetPW ">
                    <h3>忘記密碼？</h3>
                    <p>如果您忘記密碼，請提供您的電子郵件地址， 我們將會寄給給您一封電子郵件， 提示您如何恢復恢復密碼。
                    </p>
                    <form  method="post" action="{{url('forget')}}">
                    {!! csrf_field() !!}
                    <label class="emailForm" for="email_1">E-mail
                        <input placeholder="" type="email" name="email" id="email_1" required>
                    </label>
                    <a class="send btnbox" href="javascript:;">
                        確認
                        <span class="line1">  </span>
                        <span class="line2">  </span>
                    </a>
                    </form>
                    <a href="javascript:;" class="cancelForget">
                        取消
                    </a>
                </div>
                <div class="loginPop ">
                    <form  method="post" action="{{ url('login') }}">
                    {!! csrf_field() !!}
                    <label class="emailForm" for="email_2">E-mail
                        <input placeholder="請輸入您註冊的E-mail" type="email" name="email" id="email_2" required>
                    </label>
                    <label class="emailForm" for="password">密碼
                        <input placeholder="請輸入您的密碼" type="password" name="password" id="password" aria-describedby="passwordHelpText" required>
                    </label>
                    <a class="login btnbox" href="javascript:;">
                        
                        
                        <span class="line1"> </span>
                        <span class="line2"> </span>
                        <input type="submit" value="登入">
                    </a>
                    </form>
                    <a href="#" class="forget ">
                        忘記密碼
                    </a>
                    <div class="line">
                        <div class="main"></div>
                        <div class="or">or</div>
                    </div>
                    <div class="share">
                        <a class="g_login" href="{{url('fbRedirect')}}">
                            <img src="{{url('images/login_social_32.png')}}" alt="">
                        </a>
                        <a href="{{url('gRedirect')}}" class="fb_login">
                            <img src="{{url('images/login_social_30.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <footer id="footer" >
        <div class="mainContainer">
            <div class="logo">
                <picture>
                    <source type="{{url('image/svg+xml')}}" srcset="{{url('images/logo-f.svg')}}">
                    <img src="{{url('images/footer_logo_30.png')}}" alt="My default image">
                </picture>
            </div>
            <div class="right">
                <div class="share">
                    <p>Follow us：</p>
                    @foreach($social as $k => $v)
                    <a href="{{$v->url}}" class="btn" title="{{$v->name}}" target="_blank"><i class="data-icon"><img src="{{url($v->icon)}}" alt="{{$v->name}}" /></i></a>
                    @endforeach
                </div>
                <div class="copyright">
                    Copyright © JINJINDING All Rights Reserved
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
    
    <!-- JS -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->
    <!--[if lt IE 9]>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/vendor/html5shiv.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <script src="{{url('js/vendor/modernizr-custom.min.js')}}"></script>
    <script src="{{url('js/vendor/jquery.min.js')}}"></script>
    <script src="{{url('js/vendor/imagesloaded.min.js')}}"></script>
    <script src="{{url('js/vendor/jquery.easeScroll.min.js')}}"></script>
    <!-- <script src="js/vendor/jquery-imagefill.min.js"></script> -->
    <!-- <script src="js/vendor/ScrollMagic.min.js"></script> -->
    <script src="{{url('js/vendor/foundation.min.js')}}"></script>
    <!-- <script src="js/vendor/jquery.easeScroll.min.js"></script> -->
    <script src="{{url('js/vendor/userAgentChecker.min.js')}}"></script>
    <!--     <script src="js/vendor/clamp.min.js"></script> -->
    <script src="{{url('js/vendor/scroll-scope.min.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script>

    <script src="{{url('js/vendor/jquery.easeScroll.min.js')}}"></script>
    <script src="{{url('js/vendor/TweenLite.min.js')}}"></script>
    <script src="{{url('js/vendor/ScrollMagic.min.js')}}"></script>
    <script src="{{url('js/vendor/ScrollMagic.gsap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
    <script src="{{url('js/vendor/swiper.min.js')}}"></script>
    <script src="{{url('js/page/cart_and_register.js')}}"></script>
    
<!--Swiper 參考 http://idangero.us/swiper/  -->
    @yield('script')
</body>

</html>