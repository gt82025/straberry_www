@extends('layouts.home')

@section('title', '退換貨方式 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/service.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
    <div class="project_center">
        <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <!-- 標籤分類文字不超過六個字-->
            <a class="swiper-slide "  href="{{url('how')}}" title="如何購買"><p>如何購買</p></a>
            <a class="swiper-slide " href="{{url('pay')}}" title="付款與配送" ><p>付款與配送</p></a>
            <a class="swiper-slide active" title="退換貨方式"><p>退換貨方式</p></a>
            <a class="swiper-slide" href="{{url('qa')}}" title="常見問題"><p>常見問題</p></a>
        </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
        </div>
    </div>
</section>
<section class="service_content">
  <div class="servicecenter">
    <h2 class="member_pagename">退換貨方式</h2>
    <h5 class="member_pagetext">流程說明</h5>
    <div class="member_center">
      <h3 class="centertitle">退換貨/退款政策</h3>
      <div class="member_pagetext"> 
        <ul>
          <li>如訂購之商品已出貨，恕無法取消訂單。</li>
          <li>商品若於送達時有損壞狀況，請立即拍照存證，並立即與客服人員聯絡。</li>
          <li>商品可能因每個人顯示器設定不同而略有色差，圖片僅供參考，商品依實際供貨樣式為準。</li>
          <li>水果為生鮮食品，非適用7日鑑賞期，為保障您的權益，敬請詳閱以下事項：
            <p><span class="title">如遇下列問題發生均可提出退貨或換貨：</span>1. 	本店出貨品項與訂購項目有所出入。<br>2. 	收到貨品時外盒包裝嚴重擠壓變形，並導致水果受損達總面積三分之一。<br>3. 	其他非消費者所造成之大面積損傷。<span class="bg">收到商品後如有以上情況發生，請務必拍照並在24小時內與客服人員聯繫。</span></p>
          </li>
          <li>鑑賞並非試用，食品類商品除特別載明為試用品或得試用一定數量外，因涉及食品衛生，除瑕疵品或規格不符之範圍內可接受退換貨。</li>
          <li>如有下列情況，不接受退換貨：
            <p>1.	消費者人為因素毀損。<br>2.	個人主觀因素（香氣、大小、甜度、色澤、口感、不喜歡、口味）恕無法構成退換貨之成立。<br>3.	到貨後未依店家建議方式、環境、溫度存放，所造成的商品變質。<br>4.	消費者購買時錯誤下訂(錯誤下訂可於訂單成立後，立即洽客服人員)。<br>5.	產品一經使用，如洗過、削切、食用，恕無法提供退換貨。<br>6.	出貨時，皆以您所填寫的收件人/地址作寄送。不得以資料勘誤為由，否認訂購行為或拒絕付款。<br>7.	為了不造成果物鮮度流失，水果如需冷藏請依冷藏保管，外箱也請完整的保存才可以辦理退貨手續，以免影響您的退貨權益。退換貨請在收到商品後的24小時以內和客服人員聯絡，若非符合上述退換貨條件，售出後一概不接受退換貨。<br><br></p>
          </li>
          <li>若您原付款方式為信用卡，刷退作業時間仍須以銀行作業時間為主，一般可於當期或下期信用卡帳單看到退款(依信用卡結帳週期而定)。</li>
          <li>若您付款方式為ATM，退款將為匯款退回，處理天數大約3-5天，再麻煩您查核帳戶是否有收到退款。</li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection




