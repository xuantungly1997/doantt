@extends('admin.master')
@section('title','danh sách tin tức')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách danh mục sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{Session::get('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                            <a href="{{route('getaddpost')}}"><button class=  "btn btn-info"><i class="fa fa-plus-circle fa-fw"></i>Thêm mới</button></a>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tiêu đề</th>
                                        <th>Tóm tắt</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($post as $item)
                                        <tr class="gradeU">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <a href="{{route('geteditpost',$item->id)}}"><div class="btn btn-info"><i class="fa fa-edit fa-fw"></i></div></a>
                                                <div class="btn btn-warning" data-toggle="modal" data-target="#myModal<?=$item->id?>"><i class="fa fa-trash-o fa-fw"></i></div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal<?=$item->id?>" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc muốn xóa bản ghi không???</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{route('deletepost',$item->id)}}" method="post">
                                                                    <input type="hidden" value="{{$item->id}}" name="id">
                                                                    <input type="submit" class="btn btn-danger" value="Xóa">
                                                                    {{csrf_field()}}
                                                                </form>
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
@endsection