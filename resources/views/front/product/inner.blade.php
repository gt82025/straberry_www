@extends('layouts.home')

@section('title', $result->name.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/product.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
          <a class="swiper-slide" href="{{url('products/sale')}}" title="促銷商品"><p>促銷商品</p></a>
          @foreach($category as $k =>$v)
          <a class="swiper-slide @if($v->id == $result->category_id)active @endif" href="{{url('products',$v->id)}}" title="{{$v->name}}"><p>{{$v->name}}</p></a>
          @endforeach
      </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="product_content">
  <div class="productcenter view">
    <div class="pro_detail mo">
      <div class="product_article">
        <h1 class="pro_name">{{$result->name}}@if($result->on_sale)<img src="{{url('dist/images/sale.png')}}" alt="促銷商品">@endif</h1>
        <h2 class="subtitle">{{$result->size}}</h2>
      </div>
    </div>
    <div class="swiper-container pro_imgslider">
      <div class="swiper-wrapper">
        <!-- 商品照片尺存為w280px x h320px-->
        @foreach($result->album as $k => $v)
        <div class="swiper-slide"><img src="{{$v}}" alt="{{$result->name}}-{{$result->size}}"></div>
        @endforeach
      
      </div>
      <div class="swiper-pagination"></div>
      <div class="arrow next"><i class="arrowicon be-icon be-icon-next"></i></div>
      <div class="arrow prev"><i class="arrowicon be-icon be-icon-prev"></i></div>
    </div>
    <div class="pro_detail">
      <div class="product_article">
        <h1 class="pro_name">{{$result->name}}@if($result->on_sale)<img src="{{url('dist/images/sale.png')}}" alt="促銷商品">@endif</h1>
        <h2 class="subtitle">{{$result->size}}</h2>
        <div class="pricebox">
          <p class="price cost">原價 ${{number_format($result->price)}}</p>
          <p class="price offer"> 會員價 <span>${{number_format($result->vip_price?$result->vip_price:$result->price)}}</span></p>
        </div>
        @if($result->intro)
        <p class="describe title">商品描述：</p>
        <p class="describe word">
          {!!nl2br($result->intro)!!}
        </p>
        @endif
        <div class="addcar">
          <div class="amount">
            <div class="selectbox">
              <select name="qty">
                @for ($i = 1; $i <= $result->max; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select><i class="selectarrow be-icon be-icon-next"></i>
            </div>
          </div>
          {!! csrf_field() !!}
          <a class="interchangeable_button"  href="javascript:void(0)" onclick="common.submitForm(this,{{$result->id}})"><i class="intericon be-icon be-icon-cart"></i>
            <div class="intername">加入購物車</div></a>
          
        </div>
      </div>
    </div>
  </div>
</section>
@if(count($result->picks))
<section class="recommend_pro">
  <div class="project_titlebox">
    <h1 class="project_title">推薦商品</h1>
    <h2 class="project_subtitle">Recommend Products</h2>
  </div>
  <div class="productcenter">
    <div class="swiper-container recommend_slider">
      <div class="swiper-wrapper">
        <!-- 商品照片尺存為w280px x h320px-->
        @foreach($result->picks as $k => $v)
        <div class="swiper-slide">
          <div class="pro_box">
            <a class="proimg" href="{{url('product/info',$v->id)}}" title="{{$v->name}}">
              <div class="saleicon">@if($v->on_sale)<img src="{{url('dist/images/sale.png')}}" alt="促銷商品">@endif</div>
              <div class="coverbox"></div><i class="addicon be-icon be-icon-hovericon"></i><img src="{{url($v->cover)}}" alt="{{$v->name}}">
            </a>
            <div class="pro_article">
              <h2 class="pro_name">{{$v->name}}</h2>
              <h4 class="subtitle">{{$v->size}}</h4>
              <div class="pricebox">
                <p class="price cost">原價 ${{number_format($v->price)}}</p>
                <p class="price offer"> 會員價 <span>${{number_format($v->vip_price?$v->vip_price:$v->price)}}</span></p>
              </div>
              <div class="addcar">
                <div class="amount">
                  <select name="qty">
                    @for ($i = 1; $i <= $v->max; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select><i class="selectarrow be-icon be-icon-next"></i>
                </div><a class="addcar_btn" href="javascript:void(0)" onclick="common.submitForm(this,{{$v->id}})">
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
        <h6>NEXT</h6>
      </div>
    </div>
  </div>
</section>
@endif
@endsection

@section('script')
<script type="text/javascript" src="{{url('dist/js/product.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    //最新消息輪播
    var swiper_news1 = new Swiper('.swiper-container.pro_imgslider', {
      speed: 1200,
      autoplay: false,
      slidesPerView: 'auto',
      centeredSlides: false,
      loop: true, //循環撥放
      spaceBetween: 0,
      slidesPerView : 1,
      slidesPerGroup: 1,
      autoHeight: true,
      watchOverflow: true,
      simulateTouch: true,
      effect: "fade", //Could be "slide", "fade", "cube", "coverflow" or "flip"
      pagination: {
        el: '.pro_imgslider .swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.pro_imgslider .arrow.next',
        prevEl: '.pro_imgslider .arrow.prev',
      }
    });
  });
</script>
@endsection
