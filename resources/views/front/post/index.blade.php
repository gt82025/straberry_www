@extends('layouts.home')

@section('title', $title.' - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/news.min.css')}}">
@endsection

@section('content')
<section class="project_tab">
  <div class="project_center">
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <!-- 標籤分類文字不超過六個字-->
        @foreach($category as $k =>$v)
        <a class="swiper-slide @if($v->id == $id)active @endif" href="{{url('news',$v->id)}}" title="{{$v->name}}"><p>{{$v->name}}</p></a>
        @endforeach
      </div><i class="arrowicon be-icon be-icon-prev"></i><i class="arrowicon be-icon be-icon-next"></i>
    </div>
  </div>
</section>
<section class="news_content">
  <div class="newscenter">
    <!-- 商品照片尺存為w280px x h320px-->
    @foreach($posts as $k =>$v)
    <a class="swiper-slide" href="{{url('news/info',$v->id)}}" title="{{$v->title}}">
      <div class="slidercenter">
        <!--照片尺寸為w500px x h600px-->
        <div class="newsimg"><img src="{{url($v->cover)}}" alt="{{$v->title}}">
          <div class="coverbox"></div><i class="addicon be-icon be-icon-hovericon"></i>
        </div>
        <h6 class="sortname">{{$v->category->name}}</h6>
        <h6 class="newstext">{{$v->title}}</h6>
        <h6 class="newstime">{{date('Y-m-d', strtotime($v->publish_at))}}</h6>
      </div>
    </a>
    @endforeach
  </div>
  @if($posts->lastPage() > 1)
  <div class="pageLinks">
    <div class="center_links">
   
      @if($posts->previousPageUrl())
      <span class="prev"><a href="{{url($posts->previousPageUrl())}}"><</a></span>
      @endif
      @if($posts->currentPage()+1 >= $posts->lastPage() && $posts->previousPageUrl())
      <a href="{{url($posts->previousPageUrl())}}">{{$posts->currentPage()-1}}</a>
      @endif
      <strong>{{$posts->currentPage()}}</strong>
      @if($posts->nextPageUrl())
      <a href="{{url($posts->nextPageUrl())}}">{{$posts->currentPage()+1}}</a>
      @endif
      @if($posts->currentPage()+1 < $posts->lastPage())
      <a href="javascript:void(0)">...</a>
      <a href="{{url('news',$id)}}?page={{$posts->lastPage()}}">{{$posts->lastPage()}}</a>
      @endif
      @if($posts->nextPageUrl())
      <span class="next"><a href="{{url($posts->nextPageUrl())}}">></a>	</span>
      @endif
    </div>
  </div>
  @endif
</section>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function () {
  
    //頁碼置中
    var pagelinksh_width = 0 ;
    $('.pageLinks .center_links a, .pageLinks .center_links strong').each(function(key, value){
      pagelinksh_width += ( $(this).width() + 2 + 10 );
    });
    $('.pageLinks').width(pagelinksh_width);
  });
</script>
@endsection
