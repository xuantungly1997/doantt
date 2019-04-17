@extends('client.master')
@section('title','Cập nhật thông tin cá nhân')
@section('content')
<div class="topbarcontent">
    <div class="container topbarcontent-container">
        <div class="topbarcontent-container__left">
            <h3 class="left-title">
                Thông tin khách hàng
            </h3>
        </div>
        <div class="topbarcontent-container__right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homeclient')}}" class="a-bold">Trang chủ:</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Thông tin khách hàng</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- =====end topbar====== -->
<!-- ==========start content========= -->
<div class="updateinfor">
    <div class="container updateinfor-container">
        <div class="main-left">
            <ul>
                <li>
                    <p class="p-user"><strong>{{Session::get('customerInfo')->name}}</strong></p>
                    <p class="p-create">Đăng kí: {{Session::get('customerInfo')->created_at}}</p>
                </li>
                <li>
                    <p>Thông tin cá nhân</p>
                </li>
            </ul>
        </div>
        <style>
            .close {
                font-size: 20px;
                margin: 0 5px;
            }
        </style>
        <div class="main-right">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{Session::get('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">No</span>
                    </button>
                    <button type="button" class="close">
                        <a href="{{route('getlogout')}}"><span aria-hidden="true">Yes</span></a>
                    </button>
                </div>
            @endif
            <form action="{{route('postupdate',(Session::get('customerInfo')->id))}}" class="form-update" method="post">
                <div class="form-row">
                    <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('name') ? 'has-error' : ''}}">
                        <div class="icon-date-normal">
                            <label>Họ tên<span class="sp-red">(*)</span>: </label>
                            <input type="text" class="form-control" name="name" value="{{Session::get('customerInfo')->name}}">
                            <span class="text-error">{{$errors->first('name')}}</span>
                        </div>
                    </div>
                    <div class="form-group col col-md-6 col-sm-6 cl-right {{$errors->has('email') ? 'has-error' : ''}}">
                        <div class="icon-date-normal">
                            <label>Email<span class="sp-red">(*)</span>:</label>
                            <input type="text" class="form-control" name="email" value="{{Session::get('customerInfo')->email}}">
                            <span class="text-error">{{$errors->first('email')}}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('birthday') ? 'has-error' : ''}}">
                        <div class="icon-date-normal">
                            <label>Ngày sinh<span class="sp-red">(*)</span>: </label>
                            <input type="date" class="form-control" name="birthday" value="{{Session::get('customerInfo')->birthday}}">
                            <span class="text-error">{{$errors->first('birthday')}}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('phone') ? 'has-error' : ''}}">
                        <div class="icon-date-normal">
                            <label>Số điện thoại<span class="sp-red">(*)</span>: </label>
                            <input type="text" class="form-control" name="phone" value="{{Session::get('customerInfo')->phone}}">
                            <span class="text-error">{{$errors->first('phone')}}</span>
                        </div>
                    </div>
                    <div class="form-group col col-md-6 col-sm-6 cl-right {{$errors->has('address') ? 'has-error' : ''}}">
                        <div class="icon-date-normal">
                            <label>Địa chỉ<span class="sp-red">(*)</span>:</label>
                            <input type="text" class="form-control" name="address" value="{{Session::get('customerInfo')->address}}">
                            <span class="text-error">{{$errors->first('address')}}</span>
                        </div>
                    </div>
                </div>

                <div class="change-pass">
                    <p>Bạn có muốn thay đổi mật khẩu???</p>
                    <button class="btn btn-info" type="button" id="show">Yes</button>
                    <button class="btn btn-warning" type="button" id="hidden">No</button>
                </div>
                <div id="ChangePass">
                    <div class="form-row">
                        <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('password') ? 'has-error' : ''}}">
                            <div class="icon-date-normal">
                                <label>Mật khẩu<span class="sp-red">(*)</span>: </label>
                                <input type="password" class="form-control" name="password">
                                <span class="text-error">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                        <div class="form-group col col-md-6 col-sm-6 cl-right {{$errors->has('confirmpass') ? 'has-error' : ''}}">
                            <div class="icon-date-normal">
                                <label>Nhập lại mật khẩu<span class="sp-red">(*)</span>:</label>
                                <input type="password" class="form-control" name="confirmpass">
                                <span class="text-error">{{$errors->first('confirmpass')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-login">
                    <button class="btn btn-info">Cập nhật thông tin</button>
                </div>
                {{csrf_field()}}
            </form>
            <script>
                $(document).ready(function () {
                   $('#show').click(function () {
                      $('#ChangePass').show(200);
                   });
                    $('#hidden').click(function () {
                        $('#ChangePass').hide(200);
                    });
                });
            </script>
        </div>
    </div>
</div>
<!-- ==========the end content========= -->
@endsection