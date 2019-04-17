@extends('client.master')
@section('title','Đặt hàng')
@section('content')
    <div class="topbarcontent">
        <div class="container topbarcontent-container">
            <div class="topbarcontent-container__left">
                <h3 class="left-title">
                    Đặt hàng
                </h3>
            </div>
            <div class="topbarcontent-container__right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="a-bold">Trang chủ:</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Đặt hàng</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="order">
        <div class="container">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert" style="margin: 10px 0!important;">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="main-left col-lg-8 col-sm-12">
                    <form action="{{route('postorder')}}" method="post">
                        <div class="checkout-steps">
                            <span class="active" href="">1. Thông tin khách hàng</span>
                            <span class="angle"></span>
                            <span class="active" href="">2. Hình thức thanh toán</span>
                        </div>
                        <hr>
                        <div class="main-infor">
                            <div class="form-row">
                                <div class="form-group col col-md-6 col-sm-6 cl-left ">
                                    <div class="icon-date-normal">
                                        <label>Họ tên<span class="sp-red">(*)</span>: </label>
                                        <input required name="name" type="text" class="form-control" value="{{Session::get('customerInfo')['name']}}">
                                    </div>
                                </div>
                                <div class="form-group col col-md-6 col-sm-6 cl-right">
                                    <div class="form-check form-custom">
                                        <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Thanh toán sau khi nhận hàng
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-6 col-sm-6 cl-left ">
                                    <div class="icon-date-normal">
                                        <label>email<span class="sp-red">(*)</span>: </label>
                                        <input required name="email" type="text" class="form-control" value="{{Session::get('customerInfo')['email']}}" >
                                        <span class="text-error">{{$errors->first('email')}}</span>
                                    </div>
                                </div>
                                <div class="form-group col col-md-6 col-sm-6 cl-right">
                                    <div class="form-check form-custom">
                                        <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Thanh toán qua paypal
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-6 col-sm-6 cl-left ">
                                    <div class="icon-date-normal">
                                        <label>Địa chỉ<span class="sp-red">(*)</span>: </label>
                                        <input required type="text" name="address" class="form-control" value="{{Session::get('customerInfo')['address']}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-6 col-sm-6 cl-left ">
                                    <div class="icon-date-normal">
                                        <label>Số địên thoại<span class="sp-red">(*)</span>: </label>
                                        <input required type="text" name="phone" class="form-control" value="{{Session::get('customerInfo')['phone']}}" >
                                        <span class="text-error">{{$errors->first('phone')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="note" rows="3" style="resize: none"></textarea>
                            </div>
                            <hr>
                            <div class="btn-login" style="display: flex;justify-content: space-around; margin-top: 20px;">
                                <a href="{{route('getshowcart')}}" class="btn btn-outline-secondary" type="button"><i class="fas fa-arrow-left"></i>Trở lại giỏ hàng</a>
                                @if(Cart::count()==0)
                                    <button Disabled class="btn btn-info">Đặt hàng<i class="fas fa-arrow-right"></i></button>
                                @else
                                    <button class="btn btn-info">Đặt hàng<i class="fas fa-arrow-right"></i></button>
                                @endif
                            </div>
                            <hr>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="main-right col-lg-4 col-sm-12">
                    <div class="order-product">
                        <h3 class="order-title">SẢN PHẨM ĐẶT MUA</h3>
                        <hr>
                        <ul>
                            @if(Cart::count()>0)
                            @foreach($data as $item)
                            <li>
                                <img src="uploads/products/{{$item->options->img}}" alt="">
                                <div class="pro-infor">
                                    <p class="pro-title">{{$item->name}}</p>
                                    <p class="pro-count">{{$item->qty}} x {{number_format($item->price)}}VND</p>
                                    <p class="pro-element">
                                        <span>Màu sắc: {{$item->options->color}}</span>
                                        <span>Kích thước: {{$item->options->size}}</span>
                                    </p>
                                </div>
                            </li>
                            @endforeach
                            @else
                            <li >
                                <p style="width:100%;text-align: center; color: red">Giỏ hàng trống</p>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="order-pay">
                        <h3 class="order-title">Chi tiến đơn hàng</h3>
                        <hr>
                        <table class="table">
                            <tr>
                                <td width="30%">Tổng tiền</td>
                                <td width="70%" class="df">{{$total}}VND</td>
                            </tr>
                            <tr>
                                <td width="30%">Phí ship</td>
                                <td width="70%" class="df">0VND</td>
                            </tr>
                            <tr>
                                <td width="30%">Thuế</td>
                                <td width="70%" class="df">0VND</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;border: none!important">{{$total}}VND</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection