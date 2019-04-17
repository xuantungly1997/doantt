@extends('client.master')
@section('title','Kết quả tìm kiếm')
@section('content')

<div class="topbarcontent">
    <div class="container topbarcontent-container">
        <div class="topbarcontent-container__left">
            <h3 class="left-title">
                Danh sách các sản phẩm
            </h3>
        </div>
        <div class="topbarcontent-container__right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="a-bold">Trang chủ:</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Kết quả tìm kiếm</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- ==========start content========= -->
<div class="product">
    <div class="container product-container">
       @include('client.content-left')
        <div class="main-right">
            <h5 style="margin-bottom: 20px;"> {{count($product)}} sản phẩm được tìm thấy theo "<span style="color:deeppink;">{{$result}}</span>"</h5>
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
                                            <p class="p-ny">{{$item->unit_price}} VND</p>
                                            <p class="p-sale"> {{$item->sale}} VND</p>
                                        @else
                                            <p class="p-sale">{{$item->unit_price}} VND</p>
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
            <div class="div-more">
                <ul>
                    {{ $product->appends($_GET)->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection