@extends('admin.master')
@section('title','Danh mục sản phẩm')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách đánh giá sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->
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
                            <p class="p-title">BẢNG DỮ LIỆU</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>tên người đánh giá</th>
                                        <th>Điểm đánh giá</th>
                                        <th>Chất lượng</th>
                                        <th>Nội dung đánh giá</th>
                                        <th>ID sản phẩm được đánh giá</th>
                                        <th>Ngày gửi</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr class="gradeU">
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['star']}}</td>
                                            <td>
                                                @if($item->star <= 3)
                                                    <span>Không hài lòng</span>
                                                @else
                                                    <span>Hài lòng</span>
                                                @endif
                                            </td>
                                            <td>{{$item['content']}}</td>
                                            <td>{{$item['com_product']}}</td>
                                            <td>{{$item['updated_at']}}</td>
                                            <td >
                                                <div class="btn btn-warning" data-toggle="modal" data-target="#myModal<?=$item->id?>"><i class="fa fa-trash-o fa-fw"></i></div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal<?=$item->id?>" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc muốn xóa bản ghi không???</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{route('deletecomment',$item->id)}}" method="post">
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
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
@endsection