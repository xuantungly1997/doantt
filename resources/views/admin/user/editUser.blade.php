@extends('admin.master')
@section('title','Thêm nhân viên')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">`
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
{{--                    @include('errors.note')--}}
                    <form class="form-create" method="post" action="{{route('editpostuser',$data->id)}}">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label>Họ tên</label>
                            <input required type="text" class="form-control" placeholder="Name" name="name" value="{{$data->name}}">
                            <span class="text-error">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label>Email</label>
                            <input required type="email" class="form-control" placeholder="Email" name="email" value="{{$data->email}}">
                            <span class="text-error">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                            <label>Số điện thoại</label>
                            <input required type="text" class="form-control" placeholder="Phone" name="phone" value="{{$data->phone}}">
                            <span class="text-error">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            <label>Địa chỉ</label>
                            <input required type="text" class="form-control" placeholder="Address" name="address" value="{{$data->address}}">
                            <span class="text-error">{{$errors->first('address')}}</span>
                        </div>
                        @if(Auth::user()->role == 1)
                            <div class="form-group">
                                <label>Role</label>
                                <div class="select-custom">
                                    <select required name="role" class="form-control" >
                                        <option value="0" @if($data->role == 0){ selected }@endif;>User</option>
                                        <option value="1" @if($data->role == 1){ selected }@endif;>Admin</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="btn-add">
                            <button type="submit" class="btn btn-info" name="submit">Sửa</button>
                            <a href="{{route('user')}}"><button type="button" class="btn btn-danger" name="submit">Hủy bỏ</button></a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection