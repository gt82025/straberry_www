@extends('layouts.home')

@section('title', '購物須知 - ')


@section('content')
<section class="p-bg">
  <div class="container width-85">
    <div class="pl-title">
      <h2>購物須知</h2>
      <h6>流程說明</h6>
    </div>
    <div class="pl-area">
      <h5>會員購物流程</h5>
      <p>
        尋莓園提供您簡單又安全的購物流程，所有商品皆已含運，透過親切易懂的指引，讓您充分享受便利的購物樂趣。為了讓購物流程更便利，需先加入會員，即可依照流程完成訂購，並可於會員中心查詢訂單喔！
      </p>
      <div class="notice-step">
        <ul>
          <li>
            <div class="n-step">
              <div class="n-step-icon">
                <img src="assets/images/icon-n-step-1.svg" alt="">
              </div>
              <span>Step1.</span>
              <p>加入會員後選購產品</p>
            </div>
          </li>
          <li>
            <div class="n-step">
              <div class="n-step-icon">
                <img src="assets/images/icon-n-step-2.svg" alt="">
              </div>
              <span>Step2.</span>
              <p>將產品加入菜籃</p>
            </div>
          </li>
          <li>
            <div class="n-step">
              <div class="n-step-icon">
                <img src="assets/images/icon-n-step-3.svg" alt="">
              </div>
              <span>Step3.</span>
              <p>填寫寄送資料</p>
            </div>
          </li>
          <li>
            <div class="n-step">
              <div class="n-step-icon">
                <img src="assets/images/icon-n-step-4.svg" alt="">
              </div>
              <span>Step4.</span>
              <p>確認金額及寄送資料</p>
            </div>
          </li>
          <li>
            <div class="n-step">
              <div class="n-step-icon">
                <img src="assets/images/icon-n-step-5.svg" alt="">
              </div>
              <span>Step5.</span>
              <p>完成訂單</p>
            </div>
          </li>
          <li>
            <div class="n-step">
              <div class="n-step-icon">
                <img src="assets/images/icon-n-step-6.svg" alt="">
              </div>
              <span>Step6.</span>
              <p>匯款後即安排出貨</p>
            </div>
          </li>
        </ul>

      </div>
      <h5>付款方式</h5>
      <p>
        我們目前僅提供ATM轉帳此付款方式，請在訂單完成後3天內將費用匯至以下指定銀行帳戶，完成匯款後請加入尋莓園Line@，並提供卡號之末五碼，以方便我們為您進行訂單確認。
      </p>
      <br />
      <table class="table-type-1">
        <thead>
          <tr>
            <th colspan="2">匯款資料</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>行別</td>
            <td>褒忠郵局 700</td>
          </tr>
          <tr>
            <td>戶名</td>
            <td>章碧瓊</td>
          </tr>
          <tr>
            <td>局號</td>
            <td>0301286</td>
          </tr>
          <tr>
            <td>帳號</td>
            <td>0089795</td>
          </tr>
        </tbody>
      </table>
      <br /><br />
      <h5>商品配送須知</h5>
      <ul class="li-type-1">
        <li>
          完成訂購流程後，商品將依訂單順序於1-3個工作天內出貨，出貨後的1-3日工作天可送達指定地址。出貨工作日為週一至週五，週末及國定假日不出貨，若有臨時狀況，會以電話或 email 聯繫。
        </li>
        <li>
          您所訂購的產品，不論是低溫或是常溫宅配，售價皆以包含運送費用，若您同時購買常溫/低溫等產品，我們在寄送時會分開配送，以保持產品為最新鮮的狀態來到您的手中。
        </li>
        <li>
          因特定活動、節慶假日可能導致出貨量增加，我們會另行公告通知，並盡可能於正常配送日完成出貨。如因訂單較多，則可能會延遲 1-2日完成出貨，尚請見諒。
        </li>
        <li>
          若因天候或重大天災而導致無法順利出貨及影響當季產量，我們會往後順延配送日，並且另行公告通知。
        </li>
        <li>
          目前暫無海外地區配送。
        </li>
      </ul>
      <!-- <br /><br /> -->
      <h5 style="display:none;">運費說明 <span>(適用於台灣本島)</span></h5>
      <!-- <br /> -->
      <ul class="notice-box-1" style="display:none;">
        <li>
          <div class="icon-temp"><img src="assets/images/icon-normal.svg" alt="">常溫宅配：</div>
          <ul class="li-type-1">
            <li>購物1000元以下，運費為：150元。</li>
            <li>購物1000~1999元以下，運費為：120元。</li>
            <li>購物滿2000元或以上，免運！</li>
          </ul>
        </li>
        <li>
          <div class="icon-temp"><img src="assets/images/icon-cold.svg" alt="">低溫宅配：</div>
          <ul class="li-type-1">
            <li>購物1000元以下，運費為：210元。</li>
            <li>購物1000~1999元以下，運費為：170元。</li>
            <li>購物滿2000元或以上，免運！</li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</section>


@endsection
