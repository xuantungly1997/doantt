@extends('admin.master')
@section('title','Thêm tin tức')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm Tin tức</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{--@include('errors.note')--}}
                    <form class="form-create" method="post" action="{{route('addpost')}}" enctype="multipart/form-data">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label>Tiêu đề bài viết</label>
                            <input  type="text" class="form-control" placeholder="Tên danh mục" name="title">
                            <span class="text-error">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('alias') ? 'has-error' : ''}}">
                            <label>Mô tả bài viết</label>
                            <input  type="text" class="form-control" placeholder="Tên không dấu" name="description">
                            <span class="text-error">{{$errors->first('alias')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Ảnh bài viết</label>
                            <input type="file" name="thumb">
                        </div>
                        <div class="form-group">
                            <label>Nội dung bài viết</label>
                            <textarea class="ckeditor" name="main_content" ></textarea>
                            <script src="{{asset('editor/ckeditor/ckeditor/ckeditor.js')}}"></script>
                            <script type="text/javascript">
                                CKEDITOR.replace( 'main_content', {
                                    filebrowserBrowseUrl: '{{ asset('editor/ckfinder/ckfinder/ckfinder.html') }}',
                                    filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder/ckfinder.html?type=Images') }}',
                                    filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder/ckfinder.html?type=Flash') }}',
                                    filebrowserUploadUrl: '{{ asset('editor/ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                    filebrowserImageUploadUrl: '{{ asset('editor/ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                    filebrowserFlashUploadUrl: '{{ asset('editor/ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                } );
                            </script>
                        </div>
                        <div class="btn-add">
                            <button type="submit" class="btn btn-info">Thêm</button>
                            <a href="{{route('post')}}"><button type="button" class="btn btn-danger">Hủy bỏ</button></a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection