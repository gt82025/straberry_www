<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Majesty by creative-wp - Responsive HTML5 template">
<meta name="author" content="creative-wp">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title>{{$meta->title}}</title>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="img/favicon/favicon.ico">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png">
<!-- Bootstrap Links
     ============================================= -->
<!-- Bootstrap CSS  -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Plugins
     ============================================= -->
<!-- Owl Carousal -->
<link rel="stylesheet" href="stylesheets/owl.carousel.css">
<link rel="stylesheet" href="stylesheets/owl.theme.css">
<!-- Animate -->
<link rel="stylesheet" href="stylesheets/animate.css">
<!-- Date Picker -->
<link rel="stylesheet" href="stylesheets/jquery.datetimepicker.css">
<!-- Pretty Photo -->
<link rel="stylesheet" href="stylesheets/prettyPhoto.css">
<!-- Font awsome icons -->
<link rel="stylesheet" href="stylesheets/font-awesome.min.css">
<!-- General Stylesheet
    ============================================= -->
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link href="fonts/fonts.css" rel="stylesheet">
<!-- Main Template Styles -->
<link href="stylesheets/main.css" rel="stylesheet">
<!-- Main Template Responsive Styles -->
<link href="stylesheets/main-responsive.css" rel="stylesheet">
<!-- Change your theme color with one edit -->
<link rel="stylesheet" href="stylesheets/themes/bakery.css">

<link rel="stylesheet" href="stylesheets/custom.css">
<!--[if lt IE 9]>
      <script src="javascripts/libs/html5shiv.js"></script>
      <script src="javascripts/libs/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Loader
    ============================================= -->
<div id="loader">
  <div class="loader-item"> <img src="img/logo_intro.png" alt="">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
</div>
<!-- End Loader -->
<!-- Document Wrapper
    ============================================= -->
<div id="wrapper">
  <!-- Zooming Slider
    ============================================= -->
  <section id="home-header" class="zooming-slider dark fullheight">
    <div class="bg-transparent fullheight">
      <!-- Slider content -->
      <div class="slider-content">
        <!-- Text Rotater -->
        <ul id="fade">
          @foreach ($sliders as $v)
          <li>
            <h1>{{$v->title}}</h1>
            <i class="icon-home-ico"></i>
            <p class="text-uppercase">{{$v->subtitle}}</p>
			@if ($v->url && $v->button)
            <a href="{{$v->url}}" class="btn btn-gold white" title="{{$v->title}}">{{$v->button}}</a> 
			@endif
          </li>
          @endforeach
        </ul>
        <!-- End Text Rotater -->
      </div>  
      <!-- End Slider content  -->
    </div>
  </section>
  <!-- End Zooming Slider -->
  <!-- Header
    ============================================= -->
  @extends('front.header')
  <!-- End Header Transparent -->
  <!-- Document Content
    ============================================= -->
  <div id="content">
    <!-- welcome block
    ============================================= -->
    <section  class="padding-100 welcome-block">
      <div class="container">
        <div class="row">
          <!-- Left Img Intro -->
          <div class="col-md-7"> <img class="img-responsive" src="assets/images/index1-5.png" alt="OUR MISSION"> </div>
          <!-- End Left Img Intro -->
          <!-- Intro Text Center -->
          <div class="col-md-5 text-center">
           <!-- Head Title -->
            <div class="head_title">
                <i class="icon-intro"></i>
                <h1>OUR MISSION</h1>
                <span class="welcome">Welcome to Mêler</span>
            </div>
            <!-- End# Head Title -->
            <p>米爾利源自法文「Mêler」，意指萬物完美融合
如同我們為您精心製作的手工塑型蛋糕、精緻甜點
多層次口感、及美妙風味每一樣都驚艷動人
米爾利不只要衝擊你的五覺感官
更要在你生命中最重要的時光、寫下最完美的記憶。</p>
            <a href="about" class="btn btn-gold">READ MORE</a> </div>
          <!-- End intro center -->
        </div>
      </div>
    </section>
    <!-- End welcome block -->
    <!-- Discover
    ============================================= -->
    <section id="slide-2" class="discover dark text-center">
      <!-- Parallax Bg -->
      <div class="bcg background20"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 100px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#slide-2" style="background:url(assets/images/index1-6.png);">
        <!-- Bg Transparent -->
        <div class="bg-transparent padding-100" >
          <div class="container">
            <h1>私版客製化專屬服務</h1>
            <p class="text-uppercase">WE CREATE DELICIOUS MEMORIES</p>
            <a href="custom" class="btn btn-gold white">DISCOVER MORE</a> </div>
        </div>
        <!-- End Bg transparent -->
      </div>
      <!-- End Parallax Bg -->
    </section>
    <!-- End Discover -->
    <!-- Menu Today
    ============================================= -->
    <div class="menu_today dark padding-100">
      <div class="container">
        <div class="row">
          <!-- Menu Item -->
          <div class="menu-item col-md-4 col-sm-4 col-xs-12">
            <figure>
            	<img class="img-responsive" src="assets/images/index1-7.1.jpg" alt="造型變化性超乎想像" />
              		<figcaption class="text-center">
                <div class="fig_container">
                  <h3 class="font-20">造型變化性超乎想像</h3>
                  
                  <p>Creating good mood</p>
                  
                </div>
              </figcaption>
            </figure>
          </div>
          <!-- End Menu Item -->
          <!-- Menu Item -->
          <div class="menu-item col-md-4 col-sm-4 col-xs-12">
            <figure> <img class="img-responsive" src="assets/images/index1-7.2.jpg" alt="可承接五天內慶生之造型蛋糕" />
              <figcaption class="text-center">
                <div class="fig_container">
                  <h3 class="font-20">可承接五天內慶生之造型蛋糕</h3>
                  
                </div>
              </figcaption>
            </figure>
          </div>
          <!-- End Menu Item -->
          <!-- Menu Item -->
          <div class="menu-item col-md-4 col-sm-4 col-xs-12">
            <figure> <img class="img-responsive" src="assets/images/index1-7.3.jpg" alt="配方減糖健康無負擔" />
              <figcaption class="text-center">
                <div class="fig_container">
                  <h3 class="font-20">配方減糖健康無負擔</h3>
                  
                </div>
              </figcaption>
            </figure>
          </div>
          <!-- End Menu Item -->
        </div>
      </div>
    </div>
    <!-- End menu today -->
    <!-- Reservation
    ============================================= -->
    <section id="intro-3" class="reservation dark text-center">
      <!-- Bg Parallax -->
      <div class="bcg background21"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 100px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#intro-3" style="background:url(assets/images/index1-8.jpg);">
    
        <!-- Bg Transparent -->
        <div class="bg-pattern padding-100">
          <div class="container">
            <div class="row"> 
            <!-- Head Title -->
            <div class="head_title">
            	<img class="img-logo" src="assets/images/index1-9.png" alt="線上表單"  width="60"/>
                <h1>線上表單</h1>
                <span class="welcome">訊息送出後，我們將儘快與您聯繫</span>
            </div>
            <!-- End# Head Title -->
            
              <!-- Reservation form -->
               <!-- Reservation form style2-->
              <form class="reserv_form reserv_style2" action="contact" method="post">
                <div class="row mb30">
                  <div class="col-md-6">
                    <div class="row">
                      <!-- Form group -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-sx-12">
                            <input name="name" class="form-control" type="text" placeholder="姓名(必填)" rel="*" title="姓名">
                          </div>
						  <div class="col-md-6 col-sm-6 col-sx-12">
                            <input name="address" class="form-control" type="text" placeholder="居住地(必填)" rel="*" title="居住地">
                          </div>

                          <div class="col-md-6 col-sm-6 col-sx-12">
                            <input name="phone" class="form-control" type="tel" placeholder="聯絡電話(必填)" rel="*" title="聯絡電話">
                          </div>
						  
                          <div class="col-md-6 col-sm-6 col-sx-12">
                            <input name="email" class="form-control" type="email" placeholder="電子信箱(必填)" rel="*" title="電子信箱">
                          </div>
						  
						  <div class="col-md-6 col-sm-6 col-sx-12 datepicker">
                            <input name="demand_date" class="form-control" id="datetimepicker" placeholder="需求日期(必填)" type="text" rel="*" title="需求日期">
                            <i class="fa fa-calendar"></i> </div>
						  
                          <div class="col-md-6 col-sm-6 col-sx-12">
                            <!-- Selct wrap -->
                            <div class="select_wrap">
                              <select class="form-control" name="subject" rel="*" title="問題種類">
                                <option value="">請選擇你的問題種類</option>
                                <option value="行銷活動合作提案">行銷活動合作提案</option>
                                <option value="各式甜點代工洽詢">各式甜點代工洽詢</option>
                                <option value="插畫家周邊商品開發">插畫家周邊商品開發</option>
                                <option value="私版客製化甜點服務">私版客製化甜點服務</option>
                                <option value="婚禮服務">婚禮服務</option>
                              </select>
                            
                            </div>
                            <!-- End select wrap -->
                          </div>
                          
                          
                        </div>
                      </div>
                      <!-- End form group -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- form group -->
                    <div class="form-group">
                      <textarea name="message" placeholder="留言內容" rel="*" title="留言內容"></textarea>
                    </div>
                    <!-- End form group -->
                  </div>
                </div>
                <div class="row element">
                  <div class="loading2"></div>
                  {{csrf_field()}}
                  <button class="btn btn-gold white" type="submit" onclick="common.submitForm(this,'contact');return false;">送出訊息</button>
                </div>
            </form>
            <div class="done2 mt30"> <strong>Thank you!</strong> We have received your message. </div>
              <!-- End reservation form -->
            </div>
          </div>
        </div>
        <!-- End bg transparent -->
      </div>
      <!-- End Bg Parallax -->
    </section>
    <!-- End Reservation -->
    <!-- Our menu
    ============================================= -->
    <section class="padding-100 our_menu">
      <div class="container">
        <div class="row">
          <!-- Menu Intro Center -->
         <!-- Head Title -->
            <div class="head_title">
				<img class="img-logo" src="assets/images/index1-10.png" alt="人氣商品"  width="60"/>
                <h1>人氣商品</h1>
                <span class="welcome">Choose & Taste</span>
            </div>
            <!-- End# Head Title -->
          
          <!-- End Menu Intro center -->
          <!-- Menu Tabs -->
          <div class="menu_tabs">
            <div class="row">
              <!-- Our menu tab container  -->
              <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 our-menu-tab-container">
                <!-- Tab menu -->
                <div class="col-md-2 col-sm-3 col-xs-12 tab-menu">
                	<div class="list-group">
                  		<a href="#" class="list-group-item active text-center"> 香草焦糖烤布蕾(6入)  </a>
						<a href="#" class="list-group-item text-center"> 檸檬蛋糕 </a>
						<a href="#" class="list-group-item text-center"> 焦糖香草生乳捲 </a>
						<a href="#" class="list-group-item text-center"> 杯子蛋糕 </a>
						<a href="#" class="list-group-item text-center"> 造型餅乾 </a>
                	</div>
                 
                </div>
                <!-- Tab menu -->
                <!-- Our Menu Tabs -->
                <div class="col-md-10 col-sm-9 col-xs-12 our-menu-tabs">
                  <!-- Tab content  -->
                  <div class="tab-content active">
                    <!-- Our Menu Slider -->
                    <div class="our-menu-slider">


                      <!-- Item -->
                      <div class="item">
                      	<img class="lazyOwl" src="assets/images/index1-11.1.png" alt="香草焦糖烤布蕾">
                        <!-- Item Description -->

                       <div class="item_desc">
                          <h3>香草焦糖烤布蕾(6入)
                          	<span class="price pull-right">$28.99</span>
                          </h3>
                          <!-- Rating -->
                          <p>蛋奶素、冷藏配送</p>
                          <p>加入大量馬達加斯加香草籽增添浪漫香氣，搭配手工熬製焦糖醬，綿密細緻入口即化</p>

                          <div class="form-group buttons"> <a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a> <a class="btn btn-gold" href="menu_single.html"><i class="fa fa-link"></i></a> </div>
                       </div>
                        <!-- End item description -->
                      </div>
                      <!-- End item -->
                    </div>
                  </div>
                  <!-- Tab content  -->
                  <div class="tab-content">
                    <!-- Our Menu Slider -->
                    <div class="our-menu-slider">
                      <!-- Item -->
                      <div class="item">
                        <img class="lazyOwl" src="assets/images/index1-11.2.png" alt="Food menu">
                        <!-- Item Description -->

                       <div class="item_desc">
                          <h3>檸檬蛋糕
                            <span class="price pull-right">$28.99</span>
                          </h3>
                          <!-- Rating -->
                          <p>蛋奶素、冷藏配送</p>
                          <p>檸檬皮刨絲與砂糖慢火糖漬，鮮榨檸檬汁及檸檬糖液增添味蕾層次</p>

                          <div class="form-group buttons"> <a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a> <a class="btn btn-gold" href="menu_single.html"><i class="fa fa-link"></i></a> </div>
                       </div>
                        <!-- End item description -->
                      </div>
                      <!-- End item -->
                    </div>
                  </div>
                  <!-- Tab content -->
                  <!-- Tab content -->
                  <div class="tab-content">
                    <!-- Our menu slider -->
                    <div class="our-menu-slider">
                       <!-- Item -->
                      <div class="item">
                        <img class="lazyOwl" src="assets/images/index1-11.3.png" alt="Food menu">
                        <!-- Item Description -->

                       <div class="item_desc">
                          <h3>造型餅乾
                            <span class="price pull-right">$28.99</span>
                          </h3>
                          <!-- Rating -->
                          <p>蛋奶素、冷藏配送</p>
                          <p>造型餅乾內文後補造型餅乾內文後補造型餅乾內文後補造型餅乾內文後補</p>

                          <div class="form-group buttons"> <a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a> <a class="btn btn-gold" href="menu_single.html"><i class="fa fa-link"></i></a> </div>
                       </div>
                        <!-- End item description -->
                      </div>
                      <!-- End item -->
                    </div>
                    <!-- End menu slider -->
                  </div>
                  <!-- Tab content -->
                </div>
                <!-- End Our Menu Tabs -->
              </div>
              <!-- End Our menu tab container -->
            </div>
          </div>
          <!-- End Menu Tabs  -->
          
        </div>
      </div>
    </section>
    <!-- End our menu -->
    <!-- Video 
    ============================================= -->
    <section id="slide-04" class="video dark text-center" >
      <!-- BG Parallax -->
      <div class="bcg background22"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 100px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#slide-04" style="background:url(assets/images/index1-12.jpg);">
    
        <!-- Bg transparent -->
        <div class="bg-transparent padding-100">
          <!-- Left bg -->
          <div class="left_bg"> <img  src="img/img.png" alt=""> </div>
          <!-- End left bg -->
          <!-- Right bg -->
          <div class="right_bg"> <img  src="img/right_bg.png" alt=""> </div>
          <!-- End right bg -->
          <!-- Left bg2 -->
          <div class="right_bg2"> <img  src="img/right_bg2.png" alt=""> </div>
          <!-- End right bg2 -->
          <div class="container">
            <div class="row">
              <!-- Video source -->
              <div class="col-md-5">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/23851992"  ></iframe>
                </div>
              </div>
              <!-- End video source -->
              <!-- Text video center -->
              <div class="col-md-7 text-center">
                <h1 class="">MELER IN VIDEO</h1>
                <b>You can watch all about Meler Patisserie videos</b>
                <p class="italic mt40">內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補內文後補</p>
              </div>
              <!-- End Text video center -->
            </div>
          </div>
        </div>
        <!-- End bg transpernt -->
      </div>
      <!-- End bg parallax -->
    </section>
    <!-- End video -->
    <!-- Latest News
    ============================================= -->
    <section class="latest_news">
      <div class="container">
        <div class="row">
          <!-- Head Title -->
            <div class="head_title text-center">
                <img class="img-logo" src="assets/images/index1-13.png" alt="最新消息"  width="60"/>
                <h1>最新消息</h1>
                <span class="welcome">Latest News</span>
            </div>
            <!-- End# Head Title -->
          <!-- News Content -->
          <div class="news-content dark">
            <!-- News Item -->
            <div class="news-item col-md-4 col-sm-4 col-xs-12">
              <figure> <img class="img-responsive" src="assets/images/index1-14.1.jpg" alt="線上型錄" />
                <figcaption class="text-center">
                  <div class="fig_container"> <i class="fa fa-picture-o"></i>
                    <h3><a href="blog_single_image.html">線上型錄</a></h3>
                    <p>EVENTS</p>
                    <div class="fig_content"> <a href="blog_single_image.html">Aenean commodo ligula eget dolor enean massa. Cum sociis natoque penatibus.</a> </div>
                  </div>
                  <span class="btn btn-gold primary-bg white">30 DECEMBER 2015</span> </figcaption>
              </figure>
            </div>
            <!-- End News Item -->
            <!-- News Item -->
            <div class="news-item col-md-4 col-sm-4 col-xs-12">
              <figure> <img class="img-responsive" src="assets/images/index1-14.2.jpg" alt="最新消息" />
                <figcaption class="text-center">
                  <div class="fig_container"> <i class="fa fa-video-camera"></i>
                    <h3><a href="blog_single_video.html">最新消息</a></h3>
                    <p>news</p>
                    <div class="fig_content"> <a href="blog_single_video.html"> Aenean commodo ligula eget dolor enean massa. Cum sociis natoque penatibus.</a> </div>
                  </div>
                  <span class="btn btn-gold primary-bg white">14 FEBURARY 2015</span> </figcaption>
              </figure>
            </div>
            <!-- End News Item -->
            <!-- News Item -->
            <div class="news-item col-md-4 col-sm-4 col-xs-12 ">
              <figure> <img class="img-responsive" src="assets/images/index1-14.3.jpg" alt="購物Q&A" />
                <figcaption class="text-center">
                  <div class="fig_container"> <i class="fa fa-volume-up"></i>
                    <h3><a href="blog_single_soundclouds.html">購物Q&A</a></h3>
                    <p>EVENTS</p>
                    <div class="fig_content"> <a href="blog_single_soundclouds.html">Aenean commodo ligula eget dolor enean massa. Cum sociis natoque penatibus.</a> </div>
                  </div>
                  <span class="btn btn-gold primary-bg white">14 MAR4CH 2015</span> </figcaption>
              </figure>
            </div>
            <!-- End News Item -->
          </div>
          <!-- End News Content -->
        </div>
      </div>
    </section>
    <!-- End latest News-->
  </div>
  <!-- End content !-->
  <!-- Footer
    ============================================= -->
  @extends('front.footer')
  <!-- End footer -->
  <!--  scroll to top of the page-->
  <a href="#" id="scroll_up" ><i class="fa fa-angle-up"></i></a> </div>
<!-- End wrapper -->
<!-- Core JS Libraries -->
<script src="javascripts/libs/jquery.min.js" type="text/javascript"></script>
<script src="javascripts/libs/plugins.js"></script>
<!-- JS Plugins -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="javascripts/libs/modernizr.js"></script>
<!-- JS Custom Codes -->
<script src="javascripts/custom/main.js" ></script>
<script src="javascripts/custom/common.js" ></script>
<!-- For This Pgae Only Zooming slider -->
<!-- for this page only, Just change the images -->
<script>
$(function ($) {
    //BG SLIDESHOW WITH ZOOM EFFECT
    $.mbBgndGallery.buildGallery({
                containment:"body",
                timer:4000,
                effTimer:2000,
                controls:"#controls",
                grayScale:false,
                shuffle:true,
                preserveWidth:false,
                preserveTop: true,
                effect:"fade",
    //effect:{enter:{transform:"scale("+(1+ Math.random()*2)+")",opacity:0},exit:{transform:"scale("+(Math.random()*2)+")",opacity:0}},

                // If your server allow directory listing you can use:
                // (however this doesn't work locally on your computer)

                //folderPath:"testImage/",
                // else:
                 images:[
                @foreach ($sliders as $slider)
                "{{$slider->image_file}}",
                @endforeach
                 
                 ],       
            });
});

</script>
</body>
</html>