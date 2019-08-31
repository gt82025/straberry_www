@extends('layouts.home')

@section('title', $post->title.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/news.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{url('dist/css/deitor.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
        @foreach($category as $k =>$v)
        <a class="swiper-slide @if($v->id == $post->category->id)active @endif" href="{{url('news',$v->id)}}" title="{{$v->name}}"><p>{{$v->name}}</p></a>
        @endforeach
      </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="news_content">
  <div class="newscenter view">
    <div class="newstitle">
      <p class="sort">{{$post->category->name}}</p>
      <h2 class="name">{{$post->title}}</h2>
      <div class="line"></div>
      <div class="date"><i class="dateicon be-icon be-icon-booking"></i>
        <p class="datetext">{{date('Y-m-d', strtotime($post->publish_at))}}</p>
      </div><a class="backarrow" href="{{url('news',$post->category->id)}}" title="{{$post->category->name}}"><i class="backicon be-icon be-icon-buttonarrow"></i></a>
    </div>
    <div class="newsimg"><img src="{{url($post->cover)}}" alt="{{$post->title}}"></div>
  </div>
</section>
<section class="news_htmlbox">
  <div class="newscenter">
    <div class="deitorbox">
    {!!$post->content!!}
    </div>
    <a class="backlist" href="{{url('news',$post->category->id)}}" title="{{$post->category->name}}">
      <div class="backarrow"><i class="backicon be-icon be-icon-buttonarrow"></i></div>
      <div class="backtext">返回上一頁</div></a>
  </div>
</section>
@endsection
