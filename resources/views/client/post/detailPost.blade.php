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
                <h2>{{$detailpost->title}}</h2>
                <p>{{$detailpost->description}}</p>
                <div class="content-post">
                    {!! $detailpost['main_content'] !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection