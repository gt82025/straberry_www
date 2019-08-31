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
<link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico') }}">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('img/favicon/apple-touch-icon-57x57.png') }}">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('img/favicon/apple-touch-icon-114x114.png') }}">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('img/favicon/apple-touch-icon-72x72.png') }}">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('img/favicon/apple-touch-icon-144x144.png') }}">
<!-- Bootstrap Links
     ============================================= -->
<!-- Bootstrap CSS  -->
<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" >
<!-- Plugins
     ============================================= -->
<!-- Owl Carousal -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ URL::asset('stylesheets/owl.theme.css') }}">
<!-- Animate -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/animate.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/jquery.datetimepicker.css') }}">
<!-- Pretty Photo -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/prettyPhoto.css') }}">
<!-- Font awsome icons -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/font-awesome.min.css') }}">
<!-- General Stylesheet
    ============================================= -->
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link rel="stylesheet" href="{{ URL::asset('fonts/fonts.css') }}" >
<!-- Main Template Styles -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/main.css') }}" >
<!-- Main Template Responsive Styles -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/main-responsive.css') }}" >
<!-- Change your theme color with one edit -->
<link rel="stylesheet" href="{{ URL::asset('stylesheets/themes/bakery.css') }}">
<link rel="stylesheet" href="{{ URL::asset('stylesheets/custom.css') }}">
<!--[if lt IE 9]>
      <script src="javascripts/libs/html5shiv.js"></script>
      <script src="javascripts/libs/respond.min.js"></script>
    <![endif]-->
</head>
<body >
<!-- Loader
    ============================================= -->
<div id="loader">
  <div class="loader-item"> <img src="{{ URL::asset('images/logo.svg') }}" width="150" alt="">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
</div>
<!-- Document Wrapper
    ============================================= -->
<div id="wrapper">
  <!-- banner 
    ============================================= -->
  <section class="banner dark" >
    <div id="contact-parallax">
      <div class="bcg background39"
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#contact-parallax"
                style="background:url({{ URL::to('images/member-top.jpg') }});"
              >
        <div class="bg-transparent">
          <div class="banner-content">
            <div class="container" >
              <div class="slider-content"> <i class="icon-home-ico"></i>
                <h1>會員註冊</h1>
                <p>Apply your information in few mintues</p>
                <ol class="breadcrumb">
                  <li><a href="index01.html">Home</a></li>
                  <li>Register</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- End Banner content -->
        </div>
        <!-- End bg trnsparent -->
      </div>
    </div>
    <!-- Service parallax -->
  </section>
  <!-- End Banner -->
  <!-- Header
    ============================================= -->
	@extends('front.header')
  <!-- End header -->
  <div id="content">
    <!-- Our Register
    ============================================= -->
    <section class="contact text-center padding-b-100">
      <div class="container">
        <div class="row"> 
        <!-- Head Title -->
            <div class="head_title">
                <i class="icon-intro"></i>
                <h1>Register</h1>
                <span class="welcome">Apply your information</span>
            </div>
            <!-- End# Head Title -->
          <!-- Contact form -->
          <div class="contact-form">
            @if (!session('status'))
            <form method="post" action="{{ url('/register') }}">
				      {!! csrf_field() !!}
              <!-- Form Group -->
				
              <div class="form-group">
                <div class="row">
                   @if (count($errors) >0)
                  <div class="col-md-12 col-sm-12 col-sx-12 error">
                  @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                  @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                  @endif
                  @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
                  @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                  </div>
                  @endif

                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="name" class="form-control text{{ $errors->has('name') ? ' error' : '' }}" placeholder="姓名 Name *" value="{{ old('name') }}" />
                    </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="email" class="form-control text{{ $errors->has('email') ? ' error' : '' }}" placeholder="帳號 E-mail *" value="{{ old('email') }}"/>
                    </div>
                    <!-- End Element -->
                  </div>
				  
				  
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="datepicker">
                      <input name="birthday" class="form-control" id="datetimepicker" placeholder="出生日期" type="text" value="{{ old('birthday') }}">
                            <i class="fa fa-calendar"></i> </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="phone" class="form-control text{{ $errors->has('phone') ? ' error' : '' }}" placeholder="行動電話 *" value="{{ old('phone') }}"/>
                    </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                            <!-- Selct wrap -->
                            <div class="select_wrap">
                              <select class="form-control" name="gender">
                                <option value="男生" {{ old('gender')== '男生' ? ' selected' : '' }}>男生</option>
                                <option value="女生" {{ old('gender')== '女生' ? ' selected' : '' }}>女生</option>
                              </select>
                            </div>
                            <!-- End select wrap -->
                    <!-- End Element -->
                  </div>
				  
				          <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="address" class="form-control text{{ $errors->has('address') ? ' error' : '' }}" placeholder="收件地址" value="{{ old('address') }}"/>
                    </div>
                    <!-- End Element -->
                  </div>
				  
				          <div class="col-md-6 col-sm-6 col-sx-12">
                    <!-- Element -->
                    <div class="element">
      								<input type="password" class="form-control{{ $errors->has('password') ? ' error' : '' }}" name="password" placeholder="密碼*">
      							</div>
                    <!-- End Element -->
                  </div>
				  
      				    <div class="col-md-6 col-sm-6 col-sx-12">
                          <!-- Element -->
                    <div class="element">
      								<input type="password" class="form-control" name="password_confirmation" placeholder="確認密碼*">
      							</div>
                          <!-- End Element -->
                  </div>
				        
                  
                  
                  <!-- Element -->
                  <div class="col-md-12 col-sm-12">
                    <div class="member_listbox">
						<h2>客戶服務條款</h2>
						<p>
							歡迎您使用momo服務，momo是由「富邦媒體科技股份有限公司(FubonMultimedia Technology Co., Ltd.)」（以下稱本公司）所建置之『物美價廉』的虛擬購物平台，為盡可能保護您的權益及確認契約關係，所有申請momo服務(以下稱「本服務」)之使用者，都應該詳細閱讀下列服務條款：
壹、客戶服務及權利義務
一、momo購物平台，係由本公司所屬momo購物台、momo購物網(www.momoshop.com.tw)、momo摩天商城(www.momomall.com.tw)、momo購物型錄、子公司富昇旅行社股份有限公司所屬富邦樂遊網(www.mofun.com.tw)等使用本公司所提供金流、物流與資訊流之各項通路結合之平台。
二、momo主要提供您以下服務：
1.商品銷售及配送服務。包含：
● 24小時客服人員線上諮詢。
● 虛擬通路商品配貨及免費退貨服務。
● 虛擬通路商品十天猶豫期/momo摩天商城商品七天猶豫期(請注意猶豫期非試用期)。
● 多重付款機制/信用卡分期免息。
● 購物優惠回饋。
2.我們的商品頁面會提供單一商品可選購數量上限供客戶參考，原則上我們僅在該數量上限內進行出貨。
3.商品運費計價方式將明載於網頁中，如未有記載將由本公司或商家負擔。
4.各類型行銷資訊提供。
5.客戶相關權益通知，包含但不限商品試用、抽獎活動、服務滿意度調查或其他未來新增之會員服務。
6.本公司得依實際情形，增加、修改或是終止上述相關服務。
三、當您於momo購物平台任一管道完成註冊手續、或繼續使用momo購物平台所提供之任一服務時，即視為已知悉並完全同意本服務條款的所有約定服務項目。另外，當您使用momo平台特定服務時，可能會依據該特定服務之性質，而須遵守momo所另行公告之服務條款或相關規定，此另行公告之服務條款或相關規定亦併入屬於本服務條款之一部分。
四、若您未滿二十歲，應於您的法定代理人閱讀、瞭解並同意本服務條款之所有內容及其後修改變更後，方得註冊使用或繼續使用。當您使用或繼續使用momo購物平台所提供之任一服務時，即表示您的法定代理人已閱讀、瞭解並同意接受本服務條款之所有內容及其後修改變更。
五、客戶及momo均同意以電子文件作為意思表示之方法。
六、本公司針對任一違反法律規定、未遵循雙方約定、惡意濫用服務權益之客戶，保有終止該客戶帳戶服務之權利。
七、本公司有權於未來任何時間基於需要修改本條款內容，並得將修改內容以電子郵件、電話、型錄、通信網路、網路公告或其他適當方式通知客戶。
八、本公司為提供服務之必要通知客戶相關訊息時，得以客戶所留存之任一聯繫方式為之，客戶之聯繫資料如有異動應隨時以登錄網站、電話通知等方式進行資料更新，維持資料之正確性、即時性及完整性，若因您資料錯誤、過期或其他非可歸責本公司的原因，致本公司送達的訊息無法接受，仍視為本公司業已完成該通知的送達。
貳、客戶帳號、密碼與安全
一、如客戶透過本公司及所屬子公司各通路註冊為momo會員，會員帳號為身分證字號或電子郵件，必須詳實填寫，前述註冊帳號及密碼，不能重複登錄。客戶註冊時必須填寫確實之個人資料，若發現有不實登錄時，本公司得暫停或終止您的客戶資格，若有違反中華民國相關法律，亦將依法追究。
二、客戶應該妥善保管密碼，不可以將密碼洩露或提供給他人知道或使用；以同一個客戶帳號和密碼使用本服務所進行的所有行為，都將被認為是該客戶本人的行為，應由該客戶依法負責。
三、客戶如果發現或懷疑有第三人使用其客戶帳號或密碼，應該立即通知本公司，本公司於知悉後將立即暫停該帳號所生交易之處理及後續利用。但客戶於通知前依法應負之法律上責任並不因此通知而免除。
參、客戶交易
一、商品交易頁面呈現之商品名稱、價格、內容、規格、型號及其他相關資訊，皆為您與本公司締結契約之一部分。
二、您同意依據本公司所提供之確認商品數量及價格機制進行下單。本公司對於下單內容，得於下單後二個工作日內附正當理由拒絕，但客戶已付款者，視為契約成立。
三、依據消費者保護法第19條第1、2、3項規定：「Ⅰ．通訊交易或訪問交易之消費者，得於收受商品或接受服務後七日內，以退回商品或書面通知方式解除契約，無須說明理由及負擔任何費用或對價。Ⅱ．但通訊交易有合理例外情事者，不在此限。Ⅲ．前項但書合理例外情事，由行政院定之。」因此契約成立並於您收受商品後，除非政府另有公告優先適用其他法令，原則上您享有前述消費者保護法第19條第1項解除契約之權利，如有退貨需求，請參閱本公司網站我的帳戶內購物小幫手中之「退貨/退款程序說明」。
四、請注意如您是透過momo摩天商城之服務所產生之交易行為，買賣或其他合約均僅存在您與各該商家兩造之間。各該商家將就其商品、服務或其他交易標的物之品質、內容、運送、保證事項與瑕疵擔保責任等，向您事先詳細闡釋與說明並履行。您因前述買賣、服務或其他交易行為所產生之爭執，應向各該商家尋求救濟或解決之道。本公司僅提供momo摩天商城之平台供您與商家間進行交易，本公司並非交易之當事人，故絕不介入您與商家間的任何買賣、服務或其他交易行為，對於您所獲得的商品、服務或其他交易標的物亦不負任何擔保責任。
肆、付款相關權益
本公司提供多種的付款方式供您選擇，詳細內容請參考本公司網站會員中心之「付款方式說明」。
伍、客戶隱私權保障
一、隱私權聲明政策
關於您註冊或使用本服務時所提供之個人資料，本公司將依「隱私權聲明政策 」為利用與保護。
二、資料記錄有效性
客戶使用本服務時，其使用過程中所有的資料記錄，以本服務資料庫所記錄之資料為準，如有任何糾紛，以本服務資料庫所記錄之電子資料為認定標準，但客戶如能提出其他資料並證明為真實者則不在此限。
陸、智慧財產權
本公司或所屬子公司之網站及相關通路所使用之軟體或程式、網站上所有內容，包括但不限於著作、圖片、檔案、資訊、資料、網站架構、網站畫面的安排、網頁設計，均由本公司或其他權利人依法擁有其智慧財產權，包括但不限於商標權、專利權、著作權、營業秘密與專有技術等。任何人不得逕自使用、修改、重製、公開播送、改作、散布、發行、公開發表、進行還原工程、解編或反向組譯。若您欲引用或轉載前述軟體、程式或網站內容，必須依法取得本公司或其他權利人的事前書面同意。尊重智慧財產權是您應盡的義務，如有違反，您應對本公司負損害賠償責任（包括但不限於訴訟費用及律師費用等）。
柒、暫停服務
本公司以目前一般認為合理之方式及技術，維護本服務之正常運作。但於下述情況，本公司將暫停或中斷本服務之全部或一部份：
一、對本服務相關軟硬體設備進行搬遷、更換、升級、保養或維修並已向客戶預先通知者；
二、使用者有任何違反政府法令或本使用條款情形；
三、天災或其他不可抗力之因素所導致之服務停止或中斷；
四、其他不可歸責於本公司之事由所致之服務停止或中斷；
五、非本公司所得控制之事由而致本服務資訊顯示不正確、或遭偽造、竄改、刪除或擷取、或致系統中斷或不能正常運作時。
捌、本條款之效力、解釋、問題諮詢、準據法
一、本契約條款中，任何條款之全部或一部分無效時，不影響其他約定之效力。
二、本契約條款如有疑義，將為有利於客戶之解釋。
三、客戶如對服務有相關問題，可透過客服信箱進行諮詢。
四、客戶與本公司之權利義務關係，應依網路規範及中華民國法令解釋及規章、慣例為依據處理。本公司的任何聲明、條款如有未盡完善之處，將以最大誠意，依誠實信用、平等互惠原則，共商解決之道。
						</p>
						
					</div>
                  </div>
                  <!-- End Element -->
				  <div class="col-md-12 col-sm-12">
                    <div class="member_listbox">
						<h2>客戶隱私權政策</h2>
						<p>
							
•  「富邦媒體科技股份有限公司」非常尊重客戶的隱私權，對於客戶資料的蒐集、處理及利用均遵守中華民國政府之「個人資料保護法」及相關法令規範，您可以參照以下隱私權政策，了解我們的具體措施。
一、客戶資料蒐集方式
我們擁有客戶的個人資料，是由向momo購物平台(包含本公司所屬momo購物台、momo購物網(www.momoshop.com.tw)、momo摩天商城(www.momomall.com.tw)、momo購物型錄等銷售通路、子公司富昇旅行社股份有限公司所屬富邦樂遊網(www.mofun.com.tw)等使用我們所提供金流、物流與資訊流之各項通路結合之平台)的註冊會員或消費之客戶所提供，或是由我們在其他行銷或異業結盟活動中另行合法取得(包括但不限於自業務合作廠商處取得)。
二、客戶資料蒐集種類
1.	1.我們會依據momo平台各通路提供之服務，請客戶提供必要之作業資料：
1.	(1).momo平台各通路之會員或客戶，我們會請您提供基本資料：包含您提供之姓名、性別、身分證統一編號、出生年月日、聯絡電話、聯絡地址、電子郵件信箱及其他您主動提供之資料。
2.	(2).當您指定商品配送服務時，我們會請您提供配送資料：包含收件人之姓名、聯絡電話、聯絡地址及其他必要配送聯絡資料。
3.	(3).當您有實際消費行為時，我們會留存您的帳務資料。
4.	(4).我們基於提供市場分析、贈獎活動、會員及客戶權益通知等相關服務，將會為必要作業將請您提供其他資料。
2.	2.依據法務部頒佈之「個人資料保護法之特定目的及個人資料之類別」，本公司蒐集、處理、利用及保有您個人資料之種類列示如下：
1.	Ｃ○○一 辨識個人者。(姓名、職稱、住址、工作地址、以前地址、住家電話號碼、行動電話、網路平臺申請之帳號、通訊及戶籍地址、電子郵遞地址及其他任何可辨識資料本人者等。)
2.	Ｃ○○二 辨識財務者。(例如：金融機構帳戶之號碼與姓名、信用卡或簽帳卡之號碼、保險單號碼、個人之其他號碼或帳戶等。)
3.	Ｃ○○三 政府資料中之辨識者。(例如：身分證統一編號、護照號碼等。)
4.	Ｃ○一一 個人描述。(例如：年齡、性別、出生年月日、出生地、國籍、聲音等。)
5.	Ｃ○一二 身體描述。(例如：身高、體重、血型等。)
6.	Ｃ○二一 家庭情形。(例如：結婚有無、配偶或同居人之姓名、前配偶或同居人之姓名、結婚之日期、子女之人數等。)
7.	Ｃ○二三 家庭其他成員之細節。(例如：子女、受扶養人、家庭其他成員或親屬、父母等。)
8.	Ｃ○三一 住家及設施。(如：住所地址)
9.	Ｃ○三三 移民情形。(例如：護照)
10.	Ｃ○三四 旅行及其他遷徙細節。(例如：旅行細節)
11.	Ｃ○三六 生活格調。(例如：使用消費品之種類及服務之細節、個人或家庭之消費模式等。)
12.	Ｃ○三八 職業。(例如：學校校長、民意代表或其他各種職業等。)
13.	Ｃ○八一 收入、所得、資產與投資。
14.	Ｃ○九三 財務交易。(例如：收付金額、信用額度、保證人、支付方式、往來紀錄、保證金或其他擔保等。)
15.	Ｃ一○二 約定或契約。(例如：關於交易、商業、法律或其他契約、代理等。)
16.	Ｃ一三二 未分類之資料。(例如：無法歸類之信件、檔案、報告或電子郵件等。)
三、客戶資料蒐集目的
1.	1.我們僅會在提供商品銷售、金融交易授權、物流配送、廣告行銷、保險行銷、市場分析、贈獎活動、會員權益通知及相關服務時，為作業之必要運用您的個人資料：
1.	(1).物流寄送：我們會於提供客戶商品銷售、物流配送等履行訂單之服務，提供配送資料予合作廠商(含摩天商城商家)及物流商。
2.	(2).金融交易授權：您所提供之帳務資料，將於金融交易過程(包含信用卡授權、風控照會)中，提供予金融機構以完成金融交易及相關業務。
3.	(3).廣告行銷：為提供您更多優質商品及活動資訊，本公司、所屬子公司或透過委外廠商，在您同意之前提下，分享相關訊息，如您後續不願接收相關訊息，均可隨時通知我們。
4.	(4).市場分析：依據您瀏覽廣告之內容、消費之紀錄及所提供之資料，本公司會進行市場分析，包含透過第三方使用cookie或類似技術，以開發及提供日後更優質之客戶服務。
※ cookie是網站伺服器用來和使用者瀏覽器進行溝通的一種技術，它可能在使用者的電腦中儲存某些資訊。使用者可以經由瀏覽器的設定，取消或限制此項功能。
5.	(5).其他業務附隨事項：依據以上所述服務目的，及其他您在使用momo平台其他服務，有同意之前提下，於必要範圍內進行相關運用。
2.	2.依據法務部頒佈之「個人資料保護法之特定目的及個人資料之類別」，本公司蒐集、處理、利用及保有您個人資料之特定目的列示如下：
1.	001人身保險
2.	040行銷
3.	063非公務機關依法定義務所進行個人資料之蒐集處理及利用
4.	067信用卡、現金卡、轉帳卡或電子票證業務
5.	069契約、類似契約或其他法律關係事務
6.	090消費者、客戶管理與服務
7.	091消費者保護
8.	093財產保險
9.	098商業與技術資訊
10.	107採購與供應管理
11.	111票券業務
12.	118智慧財產權、光碟管理及其他相關行政
13.	125傳播行政與管理
14.	127募款 (包含公益勸募)
15.	129會計與相關服務
16.	132經營傳播業務
17.	136資(通)訊與資料庫管理
18.	148網路購物及其他電子商務服務
19.	152廣告或商業行為管理
20.	157調查、統計與研究分析
21.	181其他經營合於營業登記項目或組織章程所定之業務
四、客戶資料利用期間、地區
•  除法令另有規定外，原則上我們僅會基於您授權的範圍，於本公司營業存續期間及服務所能到達地區內，依照前述服務目的範圍為作業之必要運用客戶資料。
五、客戶資料揭露對象及方式
•  (一)我們僅會在本公司、子公司(如富昇旅行社股份有限公司、富立人身保險代理人股份有限公司及富立財產保險代理人股份有限公司)、摩天商城商家及我們所委任處理營業相關事務之第三人(例如：金融機構、合作廠商、物流商等服務提供者)，依照前述服務目的範圍為作業之必要運用或揭露客戶個人資料。除非另有法令規範，或另行取得您的同意，否則我們不會向前述以外之第三人揭露您的個人資料。
•  (二)我們提供資料予其他第三人的情形，除經過客戶本人同意，尚可能有以下情形：
1.	1.於上開特定目的範圍作業利用之必要。
2.	2.合於個人資料保護法第20條但書規定為特定目的外之利用。
3.	3.基於法律之規定或受司法機關與其他有權機關基於法定程序之要求。
4.	4.在緊急情況下為維護其他會員或第三人之合法權益。
5.	5.為維護會員服務系統的正常運作。
6.	6.會員透過本服務購物、兌換贈品、參加抽獎活動等因而產生的金/物流之必要資訊。
六、客戶資料儲存及保管
•  關於您提供的個人資料，我們將就資訊系統及公司作業規則制定嚴格規範，任何人均須在我們明定的授權規範下才能處理及利用必要之資料。我們針對資料安全設備投注之保護措施如下：
1.	•  1.我們採用最佳的科技來保障您的個人資料安全。目前以 Secure Sockets Layer(SSL) 機制(128bit)進行資料傳輸加密，並以加裝防火牆防止不法入侵 ，避免您的個人資料遭到非法存取。
2.	2.我們於2009年11月通過瑞士SGS國際認證公司驗證取得 ISO/IEC 27001資訊安全驗證，以確保您的資料在多層的資訊安全控管下，做到最高規格的防護。
3.	3.此外，為了提供更適合您需要的服務，我們會使用Cookie的技術，接收並且記錄您瀏覽器上的伺服器數值，包括IP Address、Cookies，以進行提供與產品更新及網路服務優化有關的工作時使用。
七、客戶資料權利行使
1.	1.依個人資料保護法第 3 條規定，除非有其他法令限制，您就您所提供之個人資料享有查詢或請求閱覽、請求製給複製本、請求補充或更正、請求停止蒐集處理或利用、請求刪除的權利。
2.	2.如果您欲行使上述權利或是有其他諮詢事項，可以至momo購物網或富邦樂遊網之會員中心「我的帳戶」中完成相關操作，或逕由客服中心聯絡客服提出意見，我們將盡快回覆您的問題。
八、資料正確性之權益影響
當事人得自由提供資料時，不提供對其權益之影響：若會員資料有填寫未盡正確缺漏之處，可能影響服務提供或商品寄送，會員得隨時停止以載具索取電子發票而改索取紙本電子發票，停用不影響用戶既有權益，若有遺失或毀損情事時，請洽本公司服務窗口辦理。
九、關於此份隱私權聲明，我們得隨時因應社會環境及法令規定的變遷與科技的進步進行修改，並將修改內容以電子郵件、電話、型錄、通信網路、網路公告或其他適當方式通知客戶。
■電子發票作業個資保護告知條款
客戶於momo平台進行消費時，得自由選擇收取傳統實體發票或電子發票，如客戶係於momomall摩天商城進行消費時，商家亦將委由富邦媒體科技股份有限公司代為開立發票。客戶如選擇開立電子發票請知悉下述聲明：
1.	一、個資蒐集主體：富邦媒體科技股份有限公司
2.	二、核准使用電子發票之字號及日期：
本公司奉核自民國97年5月1起開始適用電子發票
核准文號：財北國稅中正營業字第0950023667號函
3.	三、本公司個資蒐集目的：
Ｏ六三 非公務機關依法定義務所進行個人資料之蒐集處理及利用
Ｏ六九 契約、類似契約或其他法律關係事務
Ｏ九Ｏ 消費者、客戶管理與服務
Ｏ九五 財稅行政、調查、統計與研究分析
一三六 資（通）訊與資料庫管理
一四八 網路及其他電子商務服務
一七九 其他財政服務及配合財政部電子發票整合服務
4.	四、個資之類別：姓名、電子郵件信箱、聯絡地址、電子發票號碼、消費時間、消費明細、店點等發票資料。
5.	五、個人資料利用之期間、地區：本公司營運地區及依法保存會計憑證期限內。
6.	六、個人資料利用之對象、方式：
本公司基於配合財政部電子發票整合服務之特定目的內，將電子發票相關資料上傳至財政部電子發票整合服務平台（網址http://www.einvoice.nat.gov.tw/），供其於「Ｏ九五財稅行政」、「一五七調查、統計與研究分析」、「一三六資（通）訊與資料庫管理」、「一四八網路購物及其他電子商務服務」、「一七九其他財政服務」及提供電子發票加值服務目的內處理利用。
7.	七、電子發票相關資訊：
會員就查詢、捐贈、兌獎及電子發票有關之資訊，可至本公司官網：http://www.momoshop.com.tw/「客服中心」或至整合服務平台查詢。
8.	八、當事人得自由提供資料時，不提供對其權益之影響：若會員資料有填寫未盡正確缺漏之處，可能影響服務提供或商品寄送，會員得隨時停止以載具索取電子發票而改索取紙本電子發票，停用不影響用戶既有權益，若有遺失或毀損情事時，請洽本公司服務窗口辦理。
104年12月10日 修訂五版

						</p>
						
					</div>
                  </div>
				  
				  
				  
                </div>
              </div>
              <!-- End form group -->
              <!-- Element -->
              <div class="element">
                <button type="submit" id="submit" value="Send" class="btn btn-black">Submit</button>
                <div class="loading"></div>
              </div>
              <!-- End Element -->
            </form>
           
            @else
            <div class="contact-form">
              <div class="done mt30" style="display:block;"> 
                <strong>感謝您!</strong> {{ session('status') }} 
              </div>
              
            </div>
            @endif
          </div>

          <!-- End contact form -->
        </div>
      </div>
    </section>
    <!-- End Register -->
  </div>
  <!-- end of #content -->
  <!-- Footer
    ============================================= -->
  @extends('front.footer')
  <!-- End footer -->
  <!--  scroll to top of the page-->
  <a href="#" id="scroll_up" ><i class="fa fa-angle-up"></i></a> </div>
<!-- End wrapper -->
<!-- Core JS Libraries -->
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/jquery.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/plugins.js') }}"></script>
<!-- JS Plugins -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/libs/modernizr.js') }}"></script>
<!-- JS Custom Codes -->

<script type="text/javascript" src="{{ URL::asset('javascripts/custom/main.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/custom/instafeed.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('javascripts/custom/common.js') }}" ></script>
</body>
</html>