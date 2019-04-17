@extends('client.master')
@section('title','Trang chủ')
@section('content')
<!-- ==========start slide-============ -->

<div class="slide">
    <div class="slide-left">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <style>
                    .w-100{
                        height: 500px ;
                    }
                </style>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('frontend/img/slide1.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('frontend/img/slide2.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('frontend/img/slide3.jpg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="slide-right">
        <a href="#">
            <img style="height: 500px;" src="{{asset('frontend/img/01.jpg')}}" alt="giới thiệu">
        </a>
    </div>
</div>
<!-- ==========the end slide-============ -->
<!-- ========================================================================= -->
<!-- ==========start content========= -->
<div class="home">
    <div class="container home-container">
        <div class="main-left">
            <ul>
                <li>
                    <div class="sale-off">
                        <h3 class="h-title">20% sale</h3>
                        <p class="p-desc">Select stock</p>
                    </div>
                </li>
                <li>
                    <div class="sale-off">
                        <h3 class="h-title">Jeans nam</h3>
                        <p class="p-desc">catalogue now in</p>
                    </div>
                </li>
                <li>
                    <div class="about">
                        <h3 class="about-title">About us</h3>
                        <p class="desc about-desc">Cơ sở sản quần áo Unishop được thành lập năm 2017. Chuyên sản xuất các sản phẩm quần áo ...được tin cậy của khách hàng, đặc biệt là với khách hàng công sở.</p>
                        <span class="read-more">
              <a href="{{route('about')}}">Xem thêm</a>
            </span>
                    </div>
                </li>
                <li>
                    <div class="new">
                        <h3 class="new-title">Tin tức</h3>
                        @foreach($posts as $post)
                            <div class="new-infor">
                                <div class="new-infor__img">
                                    <img src="{{$post->thumb}}" alt="">
                                </div>
                                <p class="new-infor__title">{{$post->title}}</p>
                                <p class="desc new-infor__desc">
                                    {{$post->description}}
                                </p>
                                <span class="read-more">
		                <a href="#">Xem thêm</a>
		              </span>
                            </div>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="main-right">
            <div class="maincontent">
                <h2 class="main-title maincontent-head">
                    Danh mục sản phẩm
                </h2>
                <ul class="maincontent-infor">
                    <li class="col-lg-4 col-md-4 col-sm-12">
                        <div class="category">
                            <div class="category-img">
                                <a href="{{route('getproduct',['target' => 'new'])}}" class="a-move"></a>
                                <div class="category-img__left">
                                    <img src="{{asset('frontend/img/new3.jpg')}}" alt="">
                                </div>
                                <div class="category-img__right">
                                    <ul>
                                        <li>
                                            <img src="{{asset('frontend/img/new2.jpg')}}" alt="">
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/img/new1.jpg')}}" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="category-infor">
                                <p class="category-infor__head" >Sản phẩm mới</p>
                                <a href="{{route('getproduct',['target' => 'new'])}}" class="btn btn-info">Xem chi tiết</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-12">
                        <div class="category">
                            <div class="category-img">
                                <a href="{{route('getproduct',['target' => 'sale'])}}" class="a-move"></a>
                                <div class="category-img__left">
                                    <img src="{{asset('frontend/img/sale3.jpg')}}" alt="">
                                </div>
                                <div class="category-img__right">
                                    <ul>
                                        <li>
                                            <img src="{{asset('frontend/img/sale1.jpg')}}" alt="">
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/img/sale2.jpg')}}" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="category-infor">
                                <p class="category-infor__head">Sản phẩm sale</p>
                                <a href="{{route('getproduct',['target' => 'sale'])}}" class="btn btn-info">Xem chi tiết</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-12">
                        <div class="category">
                            <div class="category-img">
                                <a href="{{route('getproduct',['target' => 'hot'])}}" class="a-move"></a>
                                <div class="category-img__left">
                                    <img src="{{asset('frontend/img/hot1.jpg')}}" alt="">
                                </div>
                                <div class="category-img__right">
                                    <ul>
                                        <li>
                                            <img src="{{asset('frontend/img/hot2.jpg')}}" alt="">
                                        </li>
                                        <li>
                                            <img src="{{asset('frontend/img/hot3.jpg')}}" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="category-infor">
                                <p class="category-infor__head">Sản phẩm hottime</p>
                                <a href="{{route('getproduct',['target' => 'hot'])}}" class="btn btn-info">Xem chi tiết</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="maincontent-more">
                    <a href="{{route('getproduct',['target' => 'all'])}}" class="btn">XEM TẤT CẢ</a>
                </div>
            </div>
            <!-- ===== -->
            <div class="hotproduct">
                <h2 class="main-title hotproduct-head">
                    Sản phẩm mới nhất
                </h2>
                <ul class="hotproduct-content">
                    @foreach($product as $item)
                            <li class="col-lg-4 col-md-4 col-sm-12">
                                <div class="hotproduct-content__sp">
                                    <div class="ct-img">
                                        <a href="{{route('getdetail',$item->id)}}"><img src="uploads/products/{{$item->thumb}}" alt=""></a>
                                        @if($item->promotion_price != 0)
                                            <span class="saleflag">
                                                Sale: {{$item->promotion_price}}%
                                            </span>
                                        @endif
                                    </div>
                                    <div class="ct-pay">
                                        <p class="ct-pay__title">
                                            <a href="{{route('getdetail',$item->id)}}">{{$item->name}}</a>
                                        </p>
                                        <div class="ct-pay__price">
                                            <div class="price-left">
                                                @if($item->promotion_price != 0)
                                                    <p class="p-ny">{{number_format($item->unit_price,0, ',', '.')}} VND</p>
                                                    <p class="p-sale"> {{number_format($item->sale,0, ',', '.')}} VND</p>
                                                @else
                                                    <p class="p-sale">{{number_format($item->unit_price,0, ',', '.')}} VND</p>
                                                @endif
                                            </div>
                                            <div class="price-right">
                                                <a href="{{route('getdetail',$item->id)}}" class="btn btn-info">more detail</a>
                                            </div>
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
<script src="{{asset('frontend/js/wowjs.js')}}"></script>
<!-- ===========the end content========= -->
<h2 class="main-title hotproduct-head">
    Sản phẩm hot nhất
</h2>
<style>
    .owl-nav{
        display: none!important;
    }
    .more-slide{
        padding: 20px 30px ;
    }
</style>
<div class="more-slide">
    <div id="carousel" class="owl-carousel">
        @foreach($slidepro as $item)
             <div class="item">
                <div class="hotproduct-content__sp" style="border: 1px solid #e6e6e7;border-radius: 5px;padding: 10px;min-height: 440px;">
                    <div class="ct-img">
                        <a href="{{route('getdetail',$item->id)}}"><img src="uploads/products/{{$item->thumb}}" alt=""></a>
                        @if($item->promotion_price != 0)
                            <span class="saleflag">
                                            Sale: {{$item->promotion_price}}%
                                        </span>
                        @endif
                    </div>
                    <div class="ct-pay">
                        <p class="ct-pay__title">
                            <a href="{{route('getdetail',$item->id)}}">{{$item->name}}</a>
                        </p>
                        <div class="ct-pay__price">
                            <div class="price-left">
                                @if($item->promotion_price != 0)
                                    <p class="p-ny">{{number_format($item->unit_price,0, ',', '.')}} VND</p>
                                    <p class="p-sale"> {{$item->sale}} VND</p>
                                @else
                                    <p class="p-sale">{{number_format($item->unit_price,0, ',', '.')}}VND</p>
                                @endif
                            </div>
                            <div class="price-right">
                                <a href="{{route('getdetail',$item->id)}}" class="btn btn-info">more detail</a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        @endforeach
    </div>
</div>

<script>
    $("#carousel").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 20,
        /*
       animateOut: 'fadeOut',
       animateIn: 'fadeIn',
       */
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 2500,
        smartSpeed: 800,
        nav: true,
        responsive: {
            0: {
                items: 1
            },

            600: {
                items: 2
            },

            1024: {
                items: 3
            },

            1366: {
                items: 5
            }
        }
    });

</script>
@endsection