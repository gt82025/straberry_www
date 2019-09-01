@extends('layouts.home')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/index.min.css')}}">
@endsection

@section('content')
<section class="banner">
  @foreach($banner as $k => $v)
  <div class="banner_img img{{$k+1}} @if($k == 0)click @endif" data-click="click{{$k+1}}" style="background-image: url({{url($v->image)}});"> 
    <div class="banner_content">
      <h1 class="banner_title">{{$v->title}}</h1>
      <h4 class="banner_word">{!!nl2br($v->intro)!!}</h4>
      @if($v->btn)
      <div class="linkbutton">
        <a href="{{$v->url}}" title="{{$v->title}}">
          <p>{{$v->btn}}</p><i class="buttonicon be-icon be-icon-buttonarrow"></i>
        </a>
      </div>
      @endif
    </div>
  </div>
  @endforeach
  <!--START PREV-->
  @foreach($banner as $k => $v)
  <div class="prevarrow img{{$k+1}} @if($k == 0)click @endif" data-click="click{{$k+1}}">
    <div class="prevbox">
      @if($k == 0)
      <h6>0{{count($banner)}}</h6>
      @else
      <h6>0{{$k}}</h6>
      @endif
    </div>
  </div>
  @endforeach
  <!--END PREV-->
  <!--START NEXT-->
  @foreach($banner as $k => $v)
  @if($k == 0)
  <div class="nextarrow img{{count($banner)}}" data-click="click{{$k+1}}">
  @else
  <div class="nextarrow img{{$k}} @if($k == 1)click @endif" data-click="click{{$k+1}}">
  @endif
    <div class="nextbox">
      <h6>0{{$k+1}}</h6>
    </div>
  </div>
  @endforeach  
  <!--END NEXT-->
  <!--
  <div class="sharebox">
    <h6>Share to</h6><a class="shareiconbox" href=""><i class="shareicon be-icon be-icon-fb"></i></a><a class="shareiconbox" href=""><i class="shareicon be-icon be-icon-line"></i></a><a class="shareiconbox" href=""><i class="shareicon be-icon be-icon-ig"></i></a>
  </div>
-->

</section>
<section class="product_index">
  <div class="product_center">
    <div class="sort">
      <a class="sorttab click" data-product="product0"><p class="tabname">促銷商品</p></a>
      @foreach($category as $k => $v)
      <a class="sorttab " data-product="product{{$v->id}}"><p class="tabname">{{$v->name}}</p></a>
      @endforeach
      <a class="sorttab" href="{{url('products')}}"><p class="tabname">+More</p></a>
    </div>
    <div class="swiper-container index-product-slider1 click" data-product="product0">
      <div class="swiper-wrapper">
        {!! csrf_field() !!}
        @foreach($sales as $k => $v)
        <!-- 商品照片尺存為w280px x h320px-->
        <div class="swiper-slide">
          <div class="pr_left">
            <div class="product_article">
              <h1 class="pro_name">{{$v->name}}<img src="{{url('dist/images/sale.png')}}" alt="促銷商品"></h1>
              <h2 class="subtitle">{{$v->size}}</h2>
              <div class="priceAndPic">
              <div class="pdPic" style="background-image: url{{('dist/images/sale.png')}}"></div>
              <div class="pricebox">
                <p class="price cost">原價 ${{number_format($v->price)}}</p>
                <p class="price offer"> 會員價 <span>${{number_format($v->vip_price?$v->vip_price:$v->price)}}</span></p>
              </div>
              </div>
              <p class="describe title">商品描述：</p>
              <p class="describe word">{!!nl2br($v->intro)!!}</p>
              <div class="addcar">
                <div class="amount">
                  <select name="qty">
                    @for ($i = 1; $i <= $v->max; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select><i class="selectarrow be-icon be-icon-next"></i>
                </div>
                <a class="interchangeable_button" href="javascript:void(0)" onclick="common.submitForm(this,{{$v->id}})">
                  <i class="intericon be-icon be-icon-cart"></i>
                  <div class="intername">加入購物車</div>
                </a>
              </div>
            </div>
          </div>
          <div class="pr_right">
            <div class="primg" style="background-image:url({{url($v->cover)}});"></div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    @foreach($category as $k => $v)
    <div class="swiper-container index-product-slider{{$k+2}} " data-product="product{{$v->id}}">
      <div class="swiper-wrapper">
        @foreach($v->product as $k2 => $v2)
        <!-- 商品照片尺存為w280px x h320px-->
        <div class="swiper-slide">
          <div class="pr_left">
            <div class="product_article">
              <h1 class="pro_name">{{$v2->name}}@if($v2->on_sale)<img src="{{url('dist/images/sale.png')}}" alt="促銷商品">@endif</h1>
              <h2 class="subtitle">{{$v2->size}}</h2>
              <div class="pricebox">
                <p class="price cost">原價 ${{number_format($v2->price)}}</p>
                <p class="price offer"> 會員價 <span>${{number_format($v2->vip_price?$v2->vip_price:$v2->price)}}</span></p>
              </div>
              <p class="describe title">商品描述：</p>
              <p class="describe word">{!!nl2br($v2->intro)!!}</p>
              <div class="addcar">
                <div class="amount">
                  <select name="qty">
                    @for ($i = 1; $i <= $v2->max; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                    
                  </select><i class="selectarrow be-icon be-icon-next"></i>
                </div>
                <a class="interchangeable_button" href="javascript:void(0)" onclick="common.submitForm(this,{{$v2->id}})">
                  <i class="intericon be-icon be-icon-cart"></i>
                  <div class="intername">加入購物車</div>
                </a>
              </div>
            </div>
          </div>
          <div class="pr_right">
            <div class="primg" style="background-image:url({{url($v2->cover)}});"></div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endforeach

    <h4 class="producttext">Popular Products</h4>
    <div class="arrowarea pro_arrow1 click" data-product="product0">
      <div class="arrow next"><i class="arrowicon be-icon be-icon-next"></i></div>
      <div class="arrow prev"><i class="arrowicon be-icon be-icon-prev"></i></div>
    </div>
    @foreach($category as $k => $v)
    <div class="arrowarea pro_arrow{{$k+1}}" data-product="product{{$k+1}}">
      <div class="arrow next"><i class="arrowicon be-icon be-icon-next"></i></div>
      <div class="arrow prev"><i class="arrowicon be-icon be-icon-prev"></i></div>
    </div>
    @endforeach
    
  </div>
</section>
<section class="news_index">
  <div class="news_center">
    <div class="newscontent">
      <h3 class="newstitle">草菓提供豐富的有機蔬果新知、新訊，讓您天天享有好心情</h3>
      <a class="morenews" href="{{url('news')}}"> 
        <div class="moreicon be-icon be-icon-buttonarrow"></div>
        <h6 class="moretext">了解更多  Learn More</h6>
      </a>
      <div class="sort">
      @foreach($posts as $k => $v)
        <a class="sorttab @if($k == 0)click @endif" data-news="news{{$k+1}}"><p class="tabname">{{$v->name}}</p></a>
      @endforeach
      </div>
    </div>
    @foreach($posts as $k => $v)
    <div class="newsslider news_slider{{$k+1}} @if($k == 0)click @endif" data-news="news{{$k+1}}">
      <div class="swiper-container news_slider">
        <div class="swiper-wrapper">
          @foreach($v->post as $k2 => $v2)
          <a class="swiper-slide" href="{{url('news/info',$v2->id)}}" title="{{$v2->title}}">
            <div class="slidercenter">
              <!--照片尺寸為w500px x h600px-->
              <div class="newsimg"><img src="{{url($v2->cover)}}" alt="{{$v2->title}}">
                <div class="coverbox"></div><i class="addicon be-icon be-icon-hovericon"></i>
              </div>
              <h6 class="sortname">{{$v->name}}</h6>
              <h6 class="newstext">{{$v2->title}}</h6>
              <h6 class="newstime">{{date('Y-m-d', strtotime($v2->publish_at))}}</h6>
            </div>
          </a>
          @endforeach  
        </div>
      </div>
      <div class="news_prevarrow">
        <div class="prevbox">
          <h6>PREV</h6>
        </div>
      </div>
      <div class="news_nextarrow">
        <div class="nextbox">
          <h6>NEXT</h6>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{url('dist/js/index.min.js')}}"></script>
@endsection
