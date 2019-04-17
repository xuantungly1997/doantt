@extends('client.master')
@section('title','Đăng nhập/Đăng kí')
@section('content')
    <div class="logsign">
        <div class="container logsign-container">
            {{--<div class="row">--}}
                {{--@if(Session::has('success'))--}}
                    {{--<div class="alert alert-success">{{Session::get('success')}}</div>--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <form action="{{route('postlogin')}}" class="form-login" method="post">
                        @if(Session::has('flag'))
                            <div class="alert {{Session::get('flag')}}" role="alert">
                                {{Session::get('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h3 style="font-family: -webkit-body;">ĐĂNG NHẬP</h3>
                        <div class="form-group">
                            <label for="inputAddress">Email <span class="sp-red">(*)</span>:</label>
                            <input type="text" class="form-control" name="email_lg" placeholder="Email">
                            <span class="text-error">{{$errors->first('email_lg')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Password <span class="sp-red">(*)</span>:</label>
                            <input type="password" class="form-control" name="password_lg" placeholder="passworld">
                            <span class="text-error">{{$errors->first('password_lg')}}</span>

                        </div>
                        <p class="forget"><a href="#">Quên mật khẩu?</a></p>
                        <div class="custom__check">
                            <label class="custom__check-df">Ghi nhớ
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="btn-login">
                            <button class="btn btn-info">Login</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <form action="{{route('postcustomer')}}" class="form-signin" method="post">
                        <h3 style="font-family: -webkit-body;">Chưa có tài khoản / đăng kí</h3>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('name') ? 'has-error' : ''}}">
                                <div class="icon-date-normal">
                                    <label>Họ tên<span class="sp-red">(*)</span>: </label>
                                    <input type="text" class="form-control" name="name">
                                    <span class="text-error">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="form-group col col-md-6 col-sm-6 cl-right {{$errors->has('email') ? 'has-error' : ''}}">
                                <div class="icon-date-normal">
                                    <label>Email<span class="sp-red">(*)</span>:</label>
                                    <input type="email" class="form-control" name="email">
                                    <span class="text-error">{{$errors->first('email')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('phone') ? 'has-error' : ''}}">
                                <div class="icon-date-normal">
                                    <label>Số điện thoại<span class="sp-red">(*)</span>: </label>
                                    <input type="text" class="form-control" name="phone">
                                    <span class="text-error">{{$errors->first('phone')}}</span>
                                </div>
                            </div>
                            <div class="form-group col col-md-6 col-sm-6 cl-right {{$errors->has('address') ? 'has-error' : ''}}">
                                <div class="icon-date-normal">
                                    <label>Địa chỉ<span class="sp-red">(*)</span>:</label>
                                    <input type="text" class="form-control" name="address">
                                    <span class="text-error">{{$errors->first('address')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col col-md-6 col-sm-6 cl-left {{$errors->has('birthday') ? 'has-error' : ''}}">
                                <div class="icon-date-normal">
                                    <label>Ngày sinh<span class="sp-red">(*)</span>: </label>
                                    <input type="date" class="form-control" name="birthday">
                                    <span class="text-error">{{$errors->first('birthday')}}</span>
                                </div>
                            </div>
                        </div>
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
                        <div class="btn-login">
                            <button class="btn btn-info" type="submit">Đăng kí</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection