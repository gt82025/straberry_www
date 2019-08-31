@extends('layouts.home')

@section('title', $title.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/product.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
          <a class="swiper-slide @if($id == 'sale')active @endif" href="{{url('products/sale')}}" title="促銷商品"><p>促銷商品</p></a>
          @foreach($category as $k =>$v)
          <a class="swiper-slide @if($v->id == $id)active @endif" href="{{url('products',$v->id)}}" title="{{$v->name}}"><p>{{$v->name}}</p></a>
          @endforeach
          
      </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="product_content">
  <div class="productcenter">
    <!-- 商品照片尺存為w280px x h320px-->
    {!! csrf_field() !!}
    @foreach($products as $k => $v)
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
          </div>
          <a class="addcar_btn"  href="javascript:void(0)" onclick="common.submitForm(this,{{$v->id}})">
            <div class="intername">加入購物車</div></a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{url('dist/js/product.min.js')}}"></script>
@endsection
