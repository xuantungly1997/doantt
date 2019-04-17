@extends('client.master')
@section('title','Trang chủ')
@section('content')
<div class="topbarcontent">
	<div class="container topbarcontent-container">
		<div class="topbarcontent-container__left">
			<h3 class="left-title">
				Tin tức-bài viết
			</h3>
		</div>
		<div class="topbarcontent-container__right">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{route('homeclient')}}" class="a-bold">Trang chủ:</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Tin tức-bài viết</span></li>
			  </ol>
			</nav>
		</div>
	</div>
</div>
<!-- ==========start content========= -->
<div class="mainnews">
	<div class="container mainnews-container">
		@include('client.content-left')
		<div class="main-right">
      <ul class="row">
        @foreach($data as $item)
            <li class="col-lg-6 col-sm-12">
              <div class="news-main">
                <div class="div-img">
                  <a href="{{route('getdetailpost',$item->id)}}"><img src="{{$item->thumb}}" alt=""></a>
                </div>
                <div class="div-desc">
                  <div class="desc-title">
                    <h4><a href="{{route('getdetailpost',$item->id)}}">{{$item->title}}</a></h4>
                  </div>
                  <div class="desc-desc">
                      {{$item->description}}
                  </div>
                </div>
              </div>
            </li>
        @endforeach
      </ul>
    </div>
    </div>
  </div>
</div>
@endsection