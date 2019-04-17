@extends('admin.master')
@section('title','Thêm nhân viên')
@section('content')
    <style>

    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
{{--                    @include('errors.note')--}}
                    <form class="form-create" method="post" action="{{route('createuser')}}">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label>Họ tên</label>
                            <input  type="text" class="form-control" placeholder="Name" name="name">
                            <span class="text-error">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left {{$errors->has('email') ? 'has-error' : ''}}">
                                <label>Email</label>
                                <input  type="email" class="form-control" placeholder="Email" name="email">
                                <span class="text-error">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group col-md-6 creat-right {{$errors->has('password') ? 'has-error' : ''}}">
                                <label>Mật khẩu</label>
                                <input  type="password" class="form-control" placeholder="Password" name="password">
                                <span class="text-error">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                            <label>Số điện thoại</label>
                            <input  type="text" class="form-control" placeholder="Phone" name="phone">
                            <span class="text-error">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            <label>Địa chỉ</label>
                            <input  type="text" class="form-control" placeholder="Address" name="address">
                            <span class="text-error">{{$errors->first('address')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <div class="select-custom">
                                <select required name="role" class="form-control" >
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn-add">
                            <button type="submit" class="btn btn-info" name="submit">Thêm</button>
                            <a href="{{route('user')}}">
                                <button type="button" class="btn btn-danger" name="submit">Hủy bỏ</button>
                            </a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection