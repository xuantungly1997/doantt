@extends('admin.master')
@section('title','Thêm danh mục sản phẩm')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{--@include('errors.note')--}}
                    <form class="form-create" method="post" action="{{route('createcategory')}}">
                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <div class="select-custom">
                                <select required name="parent_id" class="form-control" >
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label>Tên danh mục</label>
                            <input  type="text" class="form-control" placeholder="Tên danh mục" name="name">
                            <span class="text-error">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('alias') ? 'has-error' : ''}}">
                            <label>Tên không dấu</label>
                            <input  type="text" class="form-control" placeholder="Tên không dấu" name="alias">
                            <span class="text-error">{{$errors->first('alias')}}</span>
                        </div>
                        <div class="btn-add">
                            <button type="submit" class="btn btn-info" name="submit">Thêm</button>
                            <a href="{{route('category')}}"><button type="button" class="btn btn-danger">Hủy bỏ</button></a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection