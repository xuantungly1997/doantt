@extends('client.master')
@section('title','danh sách Sản phẩm')
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
			    <li class="breadcrumb-item"><a href="{{route('homeclient')}}" class="a-bold">Trang chủ:</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Danh sách sản phẩm</span></li>
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
			<div class="cout-product" style="margin-bottom: 10px;">
				<strong>Tìm thấy : {{count($catepro)}} sản phẩm.</strong>
			</div>
			<ul class="hotproduct-content">
				@foreach($catepro as $item)
	          		<li class="col-lg-4 col-md-4 col-sm-12">
		            <div class="hotproduct-content__sp">
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
	        <div class="div-more">
				<div class="phantrang" >
					{{ $catepro->links() }}
				</div>
	        </div>
		</div>
	</div>
</div>
@endsection