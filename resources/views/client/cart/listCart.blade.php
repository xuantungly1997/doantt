@extends('client.master')
@section('title','Trang chủ')
@section('content')
    <script>
        function updateCart(qty,rowId,price) {
            $.get(
                '{{asset('cart/update')}}',
                {qty:qty,rowId:rowId},
                function () {
                    location.reload();
                }
            );
            {{--$.ajax({--}}
                {{--'url' : '{{asset('cart/update')}}',--}}
                {{--'type' : 'GET',--}}
                {{--'data' : {--}}
                    {{--qty:qty,--}}
                    {{--rowId:rowId,--}}
                    {{--price:price--}}
                {{--},--}}
                {{--dataType: 'JSON',--}}
                {{--'success' : function(data) {--}}
                    {{--if (data.success) {--}}
                        {{--var new_price = qty * price;--}}
                        {{--$('.price_'+rowId).html(new_price+'VND');--}}
                    {{--} else {--}}
                        {{--alert('false')--}}
                    {{--}--}}
                {{--},--}}
                {{--'error' : function(request,error)--}}
                {{--{--}}
                    {{--alert("Request: "+JSON.stringify(request));--}}
                {{--}--}}
            {{--});--}}
        }
    </script>
<div class="topbarcontent">
	<div class="container topbarcontent-container">
		<div class="topbarcontent-container__left">
			<h3 class="left-title">
				Về chúng tôi
			</h3>
		</div>
		<div class="topbarcontent-container__right">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="#" class="a-bold">Trang chủ:</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Về chúng tôi</span></li>
			  </ol>
			</nav>
		</div>
	</div>
</div>
<!-- =====end topbar====== -->
<!-- ======content======= -->
<div class="maincart">
  <div class="container maincart-container">
    <div class="maincart-container__content">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert" style="margin: 10px 0!important;">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <table class="table table-hover">
        <thead>
          <tr>
            <th width="36%">Tên sản phẩm</th>
            <th width="10%">Số lượng</th>
            <th width="22%">Đơn giá</th>
            <th width="22%">Thành tiền</th>
            <th width="10%"><a onclick="return confirm('Bạn có muốn xóa hết giỏ hàng???')" href="{{route('getdeletecart', ['target' => 'all'])}}" class="btn btn-sm btn-outline-danger" >xóa tất cả</a></th>
          </tr>
        </thead>
        <tbody>
        @if(Cart::count()>0)
            @foreach($data as $item)
                <tr>
                    <td>
                        <div class="product-items">
                            <a href="#">
                                <img src="../uploads/products/{{$item->options->img}}" alt="" style="object-fit: cover;">
                            </a>
                            <div class="product-items__detail">
                                <p class="detail-title">
                                    {{$item->name}}
                                </p>
                                <p>Size: <span class="sp-size">
                                        {{$item->options->size}}
                                    </span></p>
                                <p>Màu sắc:  {{$item->options->color}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-count">
                            <input type="number" min="1" value="{{$item->qty}}" onclick="updateCart(this.value,'{{$item->rowId}}','{{$item->price}}')">
                        </div>
                    </td>
                    <td><p>{{number_format($item->price)}}VND</p></td>
                    <td><p class="price_{{$item->rowId}}" >{{number_format($item->price * $item->qty)}}VND</p></td>
                    <td><a href="{{route('getdeletecart',['target' => $item->rowId])}}" class="product-delete"><i class="fas fa-times"></i></a></td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <h4>Giỏ hàng trống</h4>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
    <div class="maincart-container__total">
      <p class="p-total">Tổng tiền: <span>{{$total}}VND</span></p>
    </div>
    <div class="maincart-container__pay">
      <div class="row">
        <div class="pay-left col-lg-6 col-sm-12">
          <a class="btn btn-outline-secondary" href="{{route('getproduct',['target' => 'all'])}}"><i class="fas fa-arrow-left"></i>&nbsp;Tiếp tục mua hàng</a>
        </div>
        <div class="pay-right col-lg-6 col-sm-12">
          <a href="{{route('getorder')}}" class="btn btn-info">Đặt hàng</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection