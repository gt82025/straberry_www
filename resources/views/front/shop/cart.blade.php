@extends('layouts.home')

@section('title', '購物車 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">
@endsection


@section('content')
<section class="projecttop"></section>
<section class="cart_content">
  <div class="cartcenter">
    <h2 class="member_pagename">購物車</h2>
    <h5 class="member_pagetext">請確認您購買的商品!!</h5>
    <div class="typeposition">
      <div class="typebox typehere"> <i class="typeicon be-icon be-icon-cartstep1"></i></div>
      <div class="typebox"><i class="typeicon be-icon be-icon-cartstep2"></i></div>
      <div class="typebox"><i class="typeicon be-icon be-icon-cartstep3"></i></div>
      <div class="typebox"><i class="typeicon be-icon be-icon-cartstep4"></i></div>
    </div>
    <div class="member_center">
    <form method="post" action="{{ url('checkCart') }}">
      {!! csrf_field() !!}
      <div class="tablebox title">
        <div class="tablearticle content">
          <h6>內容</h6>
        </div>
        <div class="tablearticle price">
          <h6>單價</h6>
        </div>
        <div class="tablearticle quantity">
          <h6>數量</h6>
        </div>
        <div class="tablearticle amount">
          <h6>小計</h6>
        </div>
      </div>
      @foreach($cart as $k => $v)
      <div class="tablebox pdContent">
        <div class="tablearticle content">
          <h6 class="mo_title">內容</h6>
          <div class="tablbox"><img class="propic" src="{{$v->cover}}" alt="{{$v->name}}">
            <div class="propic_text">
              <h3 class="pro_name">{{$v->name}}</h3>
              <h4>{{$v->size}}</h4>
            </div><i class="icondelete be-icon be-icon-icondelete" onclick="common.destroyItem(this,{{$v->id}})" data-confirm="您確定要從購物車刪除此商品?"></i>
          </div>
        </div>
        <div class="tablearticle price">
          <h6 class="mo_title">單價</h6>
          <div class="tablbox">
            <h6 class="singlePriceVal">{{number_format($v->selling)}}</h6>
          </div>
        </div>
        <div class="tablearticle quantity">
          <h6 class="mo_title">數量</h6>
          <div class="tablbox">
            <div class="buttonbox">
              <button onclick="return false;" class="sub-btn quantity-down"><span>－</span></button>
              <input type="number" name="qty[]" value="{{$v->qty}}" min="1" max="{{$v->max}}">
              <button onclick="return false;" class="add-btn quantity-up"><span>＋</span></button>
            </div>
          </div>
        </div>
        <div class="tablearticle amount">
          <h6 class="mo_title">小計</h6>
          <div class="tablbox">
            <h6 class="totalPriceVal">{{number_format($v->total)}}</h6>
          </div>
        </div>
      </div>
      @endforeach
      <div class="tablebox auto">
        <div class="end_pricetext"> 
          <h6>合計</h6>
        </div>
        <div class="tablearticle amount">
          <h6 class="allPdTotalPrice">{{number_format($bill['subtotal'])}}</h6>
        </div>
      </div>
      <div class="tablebox auto">
        <div class="end_pricetext"> 
          @foreach($bill['delivery'] as $k => $v)
          <label class="radiobox">
            <input type="radio" name="ship" value="{{$v->id}}" data-price="{{$v->freight}}" @if($k == 0)checked @endif>
            @if(count($v->ships))
            <h6>{{$v->name}} <span>(@foreach($v->ships as $k2 => $v2){{$v2->name}} @endforeach)</span></h6>
            @else
            <h6>{{$v->name}}</h6>
            @endif


          </label>
          @endforeach

        </div>
        <div class="tablearticle amount">
          <h6 class="deliveryPrice">0</h6>
        </div>
      </div>
      @if($order['discount'])
      <div class="tablebox totlepay">
        <div class="end_pricetext"> 
          <h6>折扣</h6>
        </div>
        <div class="tablearticle amount">
          <h6 class="disPrice">-{{$bill['discount']}}</h6>
        </div>
      </div>
      @endif

      <div class="tablebox totlepay">
        <div class="end_pricetext"> 
          <h6>總計</h6>
        </div>
        <div class="tablearticle amount">
          <h6 class="finalPrice">599</h6>
        </div>
      </div>

      <div class="salebar">
        <h6 class="saletext">折扣代碼</h6>
        <div class="salebox"> 
          @if ($order['discount'])
          <input class="typing" type="text" name="coupon" value="{{ $order['discount']['code'] }}">
          @else
          <input class="typing" type="text" name="coupon">
          @endif

          <input class="send" type="submit" name="discount" value="送出">
        </div>
      </div>

      @if ($order['discount'])
        <div class="alert alert-success">
          已使用{{ $order['discount']['name'] }} 
        </div>
        @endif

      <div class="cart_buttonbox">
        <a class="linkbutton" href="{{url('products')}}" title="繼續購物">
          <i class="buttonicon be-icon be-icon-buttonarrow"></i><p>繼續購物</p>
        </a>
        <div class="linkbuttonCon">
        <i class="buttonicon be-icon be-icon-buttonarrow next"></i>
<input class="linkbutton next" type="submit"  value="下一步">

        </div>
        
        <!--
        <a class="linkbutton" href="cart_step2.html">
          <p>下一步</p><i class="buttonicon be-icon be-icon-buttonarrow"></i>
        </a>
        -->
      </div>
    </form>
    </div>
  </div>
</section>
<section class="recommend_pro">
  <div class="project_titlebox">
    <h1 class="project_title">推薦商品</h1>
    <h2 class="project_subtitle">Recommend Products</h2>
  </div>
  <div class="productcenter">
    <div class="swiper-container recommend_slider">
      <div class="swiper-wrapper">
   
        <!-- 商品照片尺存為w280px x h320px-->
        @foreach($products as $k => $v)
        <div class="swiper-slide">
          <div class="pro_box"><a class="proimg" href="{{url('product/info',$v->id)}}" title="{{$v->name}}">
              <div class="saleicon">@if($v->on_sale)<img src="{{url('dist/images/sale.png')}}" alt="促銷商品">@endif</div>
              <div class="coverbox"></div><i class="addicon be-icon be-icon-hovericon"></i><img src="{{url($v->cover)}}" alt="{{$v->name}}"></a>
            <div class="pro_article">
              <h2 class="pro_name">{{$v->name}}</h2>
              <h4 class="subtitle">{{$v->size}}</h4>
              <div class="pricebox">
                <p class="price cost">原價 ${{number_format($v->price)}}</p>
                <p class="price offer">會員價 <span>${{number_format($v->vip_price?$v->vip_price:$v->price)}}</span></p>
              </div>
              <div class="addcar">
                <div class="amount">
                  <select name="qty">
                    @for ($i = 1; $i <= $v->max; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                    
                  </select><i class="selectarrow be-icon be-icon-next"></i>
                </div><a class="addcar_btn" href="javascript:void(0)" onclick="common.submitForm(this,{{$v->id}},'reload')">
                  <div class="intername">加入購物車</div></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="reco_prevarrow">
      <div class="prevbox">
        <h6>PREV</h6>
      </div>
    </div>
    <div class="reco_nextarrow">
      <div class="nextbox">
        <h6>NEXT      </h6>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');
  
      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
        cartCalc();
      });
  
      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
        cartCalc();
      });
      cartCalc();
    });

    $('input[type=radio][name=ship]').change(function(){
      cartCalc();
    })

    function cartCalc() {
      let pdTotalPriceArray = [];
      let $pdTotalPrice = 0;
      let $deliveryPrice
      let $finalPrice
      if ($('section.cart_content').length > 0) {
          //計算單品
          $('.tablebox.pdContent').each(function() {
              let sp = parseInt($(this).find('.singlePriceVal').html());
              let qu = $(this).find('input[value]').val();
              let total = sp * qu;
              $(this).find('.totalPriceVal').html(total);
              pdTotalPriceArray.push(total);
          })
          //計算商品總值
          $('h6.allPdTotalPrice').html(function() {
              let $length = pdTotalPriceArray.length;
              for (var i = 0; i < $length; i++) {
                  $pdTotalPrice = $pdTotalPrice + pdTotalPriceArray[i];
              }
              //console.log($length)
              //console.log($pdTotalPrice)
              return $pdTotalPrice
          });
          //計算運費
          //if ($pdTotalPrice >= 1500) {
              //$deliveryPrice = 0;
             $deliveryPrice = parseInt($('input[name=ship]:checked').data('price'));
          //} else {
          //    $deliveryPrice = parseInt($('input[name=shio]:checked').data('price'));
          //}
          //$deliveryPrice = parseInt($('input[name=ship]:checked').data('price'));
          $('.deliveryPrice').html($deliveryPrice);

          let $disPrice = $('.disPrice').html()?parseInt($('.disPrice').html()):0;

          $finalPrice = $pdTotalPrice + $deliveryPrice + $disPrice;
          $('.finalPrice').html($finalPrice);
          console.log($finalPrice);
          //console.log($deliveryPrice);
      }
  }
   
  });
</script>
@endsection