@extends('client.master')
@section('title','Liên hệ')
@section('content')
<div class="topbarcontent">
    <div class="container topbarcontent-container">
        <div class="topbarcontent-container__left">
            <h3 class="left-title">
                Liên hệ - phản hồi
            </h3>
        </div>
        <div class="topbarcontent-container__right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homeclient')}}" class="a-bold">Trang chủ:</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Liên hệ - phản hồi</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- =====end topbar====== -->
<!-- ====content===== -->
<div class="contact">
    <div class="container contact-container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4 class="h-title">
                    Mọi ý kiến đóng góp xin gửi về:
                </h4>
            </div>
            <div class="col-md-6 col-sm-12">
                <ul class="ul-address">
                    <li><i class="far fa-envelope"></i><span><a href="#">{{$about->email}}</a></span></li>
                    <li><i class="fas fa-phone-volume"></i><span>{{$about->phone}}</span></li>
                    <li><i class="fas fa-clock"></i>Trực tuyến 24/24</li>
                </ul>
            </div>
        </div>
        <form action="{{route('postcontact')}}" method="post" class="form-content">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert" style="margin: 10px 0!important;">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="form-row">
                <div class="form-group col col-md-6 col-sm-6 cl-left ">
                    <div class="icon-date-normal">
                        <label>Họ tên<span class="sp-red">(*)</span>: </label>
                        <input required type="text" class="form-control" name="name" value="{{Session::get('customerInfo')['name']}}">
                    </div>
                </div>
                <div class="form-group col col-md-6 col-sm-6 cl-right">
                    <div class="icon-date-normal">
                        <label>Email<span class="sp-red">(*)</span>:</label>
                        <input required type="email" class="form-control" name="email" value="{{Session::get('customerInfo')['email']}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col col-md-6 col-sm-12 cl-left selectdiv1">
                    <label>Danh mục</label>
                    <div class="select-custom">
                        <select name="cate_feedback" class="form-control " >
                            <option value="1">Phản hồi dịch vụ giao hàng</option>
                            <option value="2">Phản hồi chất lượng sản phẩm</option>
                            <option value="3">Góp ý</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Phản hồi</label>
                <textarea required class="form-control" rows="4" id="desc" name="feed_content"></textarea>
            </div>

            <div class="btn-contact">
                <button class="btn btn-info" type="submit">Gửi phản hồi</button>
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
<!-- ====content===== -->
@endsection