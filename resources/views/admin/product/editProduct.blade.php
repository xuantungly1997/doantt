@extends('admin.master')
@section('title','Sửa danh mục sản phẩm')
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
                    <h1 class="page-header">Sửa sản phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('posteditproduct',$data->id)}}" class="form-create form-product" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left {{$errors->has('name') ? 'has-error' : ''}}">
                                <label>Tên sản phẩm</label>
                                <input  type="text" class="form-control" placeholder="Name" name="name" value="{{$data->name}}">
                                <span class="text-error">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group col-md-6 creat-right ">
                                <label>Danh mục sản phẩm</label>
                                <div class="select-custom">
                                    <select  name="cate_id" class="form-control" >
                                        @foreach($cate as $cateitem)
                                                <option value="{{$cateitem['id']}}" @if($data->cate_id==$cateitem['id']) selected @endif;>{{$cateitem['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mô tả sản sản phẩm</label>
                            <textarea class="ckeditor" name="description">{{$data->description}}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left ">
                                <label for="select2-multiple-input-sm1" class="control-label">Màu sản phẩm</label>
                                <select id="select2-multiple-input-sm1" class="form-control input-sm select2-multiple" multiple name="color[]">
                                    @foreach($data->colors as $item)
                                        @foreach($color as $coloritem)
                                            <option value="{{$coloritem->id}}" {{($item->id == $coloritem->id) ? 'selected' : ''}}>{{$coloritem->value}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                <span class="text-error">{{$errors->first('color')}}</span>
                            </div>

                            <div class="form-group col-md-6 creat-right">
                                <label for="select2-multiple-input-sm2" class="control-label">Kích cỡ sản phẩm</label>
                                <select id="select2-multiple-input-sm2" class="form-control input-sm select2-multiple" multiple name="size[]">
                                    @foreach($data->sizes as $item)
                                        @foreach($size as $sizeitem)
                                            <option value="{{$sizeitem->id}}" {{($item->id == $sizeitem->id) ? 'selected' : ''}}>{{$sizeitem->value}}</option>
                                        @endforeach
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
                            <input type="file" name="file[]" multiple value="aaa">
                            <span class="text-error">{{$errors->first('file')}}</span>
                        </div>
                        <style>
                            .img-product ul{
                                display: flex;
                                list-style-type: none;
                                padding-left: 0!important;
                            }
                            .img-product ul li{
                                margin-left: 20px;
                                position: relative;
                            }
                            .img-product ul img{
                                width: 100px;
                            }
                            .img-product li button{
                               position: absolute;
                                top: 0;
                                right:0;
                                display: none;
                                border: none;
                                padding: 1px;
                                font-weight: bold;
                                border-radius: 0;
                            }
                            .img-product li:hover button{
                                display: block;
                            }
                            .img-product li:hover img{
                                opacity: .6;
                                transition: .5s;
                            }
                        </style>
                        <div class="img-product">
                            <ul>
                                @foreach($data->arrimg as $item)
                                    <li>
                                        <img src="../../../../public/uploads/products/{{$item}}" alt="">
                                        {{--<form action="#">--}}
                                            <button class="btn btn-danger"><i class="fa fa-times-circle-o fa-fw"></i></button>
                                        {{--</form>--}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Giá nhập</label>
                            <input  type="text" class="form-control" placeholder="VND" name="default_price" value="{{$data->default_price}}">
                            <span class="text-error">{{$errors->first('default_price')}}</span>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left">
                                <label>Giá niên yết</label>
                                <input  type="text" class="form-control" placeholder="VND" name="unit_price" value="{{$data->unit_price}}">
                                <span class="text-error">{{$errors->first('unit_price')}}</span>

                            </div>
                            <div class="form-group col-md-6 creat-right ">
                                <label>Giá sale</label>
                                <input  type="text" class="form-control" placeholder="%" name="promotion_price" value="{{$data->promotion_price}}">
                                <span class="text-error">{{$errors->first('promotion_price')}}</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tên nhà sản xuất</label>
                            <input  type="text" class="form-control" placeholder="Tên nhà sản xuất..." name="producter" value="{{$data->producter}}">
                            <span class="text-error">{{$errors->first('producter')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            <select name="feauture" class="form-control" >
                                <option value="0" @if($data->feauture==0) selected @endif;>old</option>
                                <option value="1" @if($data->feauture==1) selected @endif;>new</option>
                                <option value="2" @if($data->feauture==2) selected @endif;>hot</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 creat-left">
                                <label>Số lượng</label>
                                <input  type="number" class="form-control" placeholder="Name" name="amount" value="{{$data->amount}}">
                                <span class="text-error">{{$errors->first('amount')}}</span>

                            </div>
                            <div class="form-group col-md-6 creat-right">
                                <label>Trạng thái</label>
                                <select required name="status" class="form-control" name="status">
                                    <option value="0" @if($data->status==0) selected @endif;>Tồn kho</option>
                                    <option value="1" @if($data->status==1) selected @endif;>Bán</option>
                                </select>
                            </div>
                        </div>

                        <div class="div-action">
                            <input type="submit" value="Sửa sản phẩm" class="btn btn-info">
                            <a href="{{route('product')}}"><input type="button" value="Hủy bỏ" class="btn btn-danger"></a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection