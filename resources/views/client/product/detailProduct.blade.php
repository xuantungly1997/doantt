@extends('client.master')
@section('title','Chi tiết Sản phẩm')
@section('content')
<div class="topbarcontent">
    <div class="container topbarcontent-container">
        <div class="topbarcontent-container__left">
            <h3 class="left-title">
                Chi tiết sản phẩm
            </h3>
        </div>
        <div class="topbarcontent-container__right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="a-bold">Trang chủ:</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Chi tiết sản phẩm</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- ==========start content========= -->
<div class="productdetail">
    <div class="container productdetail-container">
            <div class="row">
                <div class="productdetail-container__left col-lg-5 col-sm-12">
                    <div class="img-big">
                        <img style="height: 600px;object-fit: cover;" src="../uploads/products/{{$detailpro['thumb']}}" alt="" id="img-big">
                    </div>
                    <div class="img-small">
                        <ul>
                            @foreach($detailpro['arrimg'] as $img)
                                <li><img src="../uploads/products/{{$img}}" id="<?=$img?>" alt="" onclick="change_img('<?=$img?>');"></li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                            function change_img(id){
                                //lấy giá trị scr
                                var strImg = document.getElementById(id).getAttribute("src");
                                // alert(strImg);
                                // thay đổi thuộc tính scr của thẻ html có id = img_big
                                document.getElementById("img-big").setAttribute("src",strImg);
                                // === thêm đường viền khi click cho các thẻ id
                                document.getElementById(id).setAttribute("style","border:1px solid #0da9ef;");
                            }
                    </script>
                </div>
                <div class="productdetail-container__right col-lg-7 col-sm-12">
                    <h3 class="right-title">
                        {{$detailpro['name']}}
                    </h3>
                   @if($detailpro['promotion_price']!=0)
                        <p class="right-price">Giá Khuyến mại: {{number_format($detailpro['sale'],0, ',', '.')}} VND <span style="color: red;">( sale:{{$detailpro['promotion_price']}}% )</span></p>
                        <p class="right-sale" style="text-decoration: line-through;">Giá gốc:  {{number_format($detailpro['unit_price'],0, ',', '.')}} VND</p>
                    @else
                        <p class="right-price">Giá gốc: {{number_format($detailpro['unit_price'],0, ',', '.')}} VND</p>
                    @endif
                    {!! $detailpro['description'] !!}
                    <form action="{{route('getadd',$detailpro->id)}}" method="get">

                        <div class="row margin-top-1x">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Size</label>
                                    <select class="form-control" id="" name="size">
                                        @foreach($detailpro['sizes'] as $item)
                                            <option>{{$item->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="">Màu sắc</label>
                                    <select class="form-control" name="color">
                                        @foreach($detailpro['colors'] as $itema)
                                            <option>{{$itema->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Số lượng</label>
                                    <select class="form-control" name="acount">
                                        @for($i=1 ; $i<=10 ; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between ">
                        <div class="entry-share mt-2 mb-2">
                            <span class="text-muted">Chia sẻ:</span>
                            <ul class="ul-apps">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-skype"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="sp-buttons mt-2 mb-2">
                            <button class="btn btn-primary"><i class="fas fa-shopping-bag" style="color: white;"></i> Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>
<!-- ===== -->
<div class="productfeedback">
    <div class="productfeedback-container container">
        <div class="row padding-top-3x mb-3">
            <div class="col-lg-10 offset-lg-1">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link" href="#description" data-toggle="tab" role="tab" aria-expanded="false">Nhận xét ({{count($comment)}}) </a></li>
                    <li class="nav-item"><a class="nav-link active" href="#reviews" data-toggle="tab" role="tab" aria-expanded="true">Đánh giá</a></li>
                </ul>
                <style>
                    .list-cmt{
                        list-style-type: none;
                    }
                    .list-cmt li{
                        padding: 20px;
                        border-bottom: 1px solid #e6e7e7;
                    }
                    .star:hover i{
                        color: yellow;
                    }
                    .list-cmt p{
                        margin-bottom: 0;
                    }
                    .p-name{
                        font-size: 19px;
                        font-weight: bold;
                    }
                    .p-create{
                        font-size: 12px;
                        color: #9d9d9d;
                    }
                    .p-content{
                        margin-top: 10px;
                        font-size: 14px;
                    }
                </style>
                <div class="tab-content">
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-expanded="false">
                        <ul class="list-cmt">
                            @foreach($comment as $item)
                                <li>
                                    <div class="infor">
                                        <p class="p-name">{{$item->name}} <span class="star">( {{$item->star}} <i class="fas fa-star"></i>) </span></p>
                                        <p class="p-create">{{$item->created_at}}</p>
                                        <p class="p-content">{{$item->content}}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade active show" id="reviews" role="tabpanel" aria-expanded="true">
                        <!-- Review Form-->
                        <h5 class="mb-30 padding-top-1x">Đánh giá và nhận xét sản phẩm</h5>
                        <form class="row" method="post">
                            <input type="hidden" value="1" name="user_id">
                            <input type="hidden" value="2" name="product_id">
                            <input type="hidden" name="_token" value="BaFKsGeYutZ10hELSHvvllG5el7bCaJedcwZ6TvN">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review_rating">Đánh giá</label>
                                    <select class="form-control form-control-rounded" name="star" id="review_rating">
                                        <option value="5">5 Sao</option>
                                        <option value="4">4 Sao</option>
                                        <option value="3">3 Sao</option>
                                        <option value="2">2 Sao</option>
                                        <option value="1">1 Sao</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="review_text">Tên</label>
                                    <input required type="text" name="name" class="form-control" value="{{Session::get('customerInfo')['name']}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="review_text">Nhận xét </label>
                                    <textarea class="form-control form-control-rounded" id="review_text" name="com_content" rows="8" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-outline-primary" type="submit">Gửi nhận xét</button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==== -->
<h2 class="main-title hotproduct-head">
    Sản phẩm cùng loại
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
        @foreach($prosame as $item)
            <div class="item">
                <div class="hotproduct-content__sp" style="border: 1px solid #e6e6e7;border-radius: 5px;padding: 10px;min-height: 440px;">
                    <div class="ct-img">
                        <a href="{{route('getdetail',$item->id)}}"><img src="../uploads/products/{{$item->thumb}}" alt=""></a>
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