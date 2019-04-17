@extends('admin.master')
@section('title','Thêm danh mục sản phẩm')
@section('content')
    <style>
        .form-product{
            width: 1000px;
            margin: auto;
        }
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add sản phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('postAddProduct')}}" class="form-create form-product" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left {{$errors->has('name') ? 'has-error' : ''}}">
                                <label>Tên sản phẩm</label>
                                <input  type="text" class="form-control" placeholder="Name" name="name">
                                <span class="text-error">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group col-md-6 creat-right ">
                                <label>Danh mục sản phẩm</label>
                                <div class="select-custom">
                                    <select  name="cate_id" class="form-control" >
                                        @foreach($cate as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mô tả sản sản phẩm</label>
                            <textarea class="ckeditor" name="description" ></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left ">
                                <label for="select2-multiple-input-sm1" class="control-label">Màu sản phẩm</label>
                                <select id="select2-multiple-input-sm1" class="form-control input-sm select2-multiple" multiple name="color[]">
                                    @foreach($color as $itemcolor)
                                        <option value="{{$itemcolor['id']}}">{{$itemcolor->value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-error">{{$errors->first('color')}}</span>
                            </div>

                            <div class="form-group col-md-6 creat-right">
                                <label for="select2-multiple-input-sm2" class="control-label">Kích cỡ sản phẩm</label>
                                <select id="select2-multiple-input-sm2" class="form-control input-sm select2-multiple" multiple name="size[]">
                                    @foreach($size as $itemsize)
                                    <option value="{{$itemsize['id']}}">{{$itemsize->value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-error">{{$errors->first('size')}}</span>

                            </div>
                            <script>
                                $( ".select2-multiple" ).select2({
                                    tags: true,
                                    multiple: true,
                                    tokenSeparators: [',', ' '],
                                    theme: "bootstrap",
                                    placeholder: "mời chọn...",
                                    containerCssClass: ':all:'
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" name="file[]" multiple>
                            <span class="text-error">{{$errors->first('file')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Giá nhập</label>
                            <input  type="text" class="form-control" placeholder="VND" name="default_price">
                            <span class="text-error">{{$errors->first('default_price')}}</span>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left">
                                <label>Giá niên yết</label>
                                <input  type="text" class="form-control" placeholder="VND" name="unit_price">
                                <span class="text-error">{{$errors->first('unit_price')}}</span>

                            </div>
                            <div class="form-group col-md-6 creat-right ">
                                <label>Giá sale</label>
                                <input  type="text" class="form-control" placeholder="%" name="promotion_price">
                                <span class="text-error">{{$errors->first('promotion_price')}}</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tên nhà sản xuất</label>
                            <input  type="text" class="form-control" placeholder="Tên nhà sản xuất..." name="producter">
                            <span class="text-error">{{$errors->first('producter')}}</span>

                        </div>
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            <select name="feauture" class="form-control" >
                                <option value="0">old</option>
                                <option value="1">new</option>
                                <option value="2">hot</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left">
                                <label>Số lượng</label>
                                <input  type="number" class="form-control" placeholder="Số lượng " name="amount">
                                <span class="text-error">{{$errors->first('amount')}}</span>

                            </div>
                            <div class="form-group col-md-6 creat-right">
                                <label>Trạng thái</label>
                                <select required name="status" class="form-control" name="status">
                                    <option value="0">Tồn kho</option>
                                    <option value="1">Bán</option>
                                </select>
                            </div>
                        </div>
                        <div class="div-action">
                            <input type="submit" value="Thêm sản phẩm" class="btn btn-info">
                            <a href="{{route('product')}}"><input type="button" value="Hủy bỏ" class="btn btn-danger"></a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection