@extends('admin.master')
@section('title','Danh mục sản phẩm')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách ý kiến khách hàng</h1>
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
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Mục</th>
                                        <th>Nội dung</th>
                                        <th>Ngày gửi</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr class="gradeU">
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['email']}}</td>
                                            <td>
                                                @if($item['cate_feedback']==1)
                                                    <span>Phản hồi dịch vụ giao hàng</span>
                                                @elseif($item['cate_feedback']==2)
                                                    <span>Phản hồi chất luợng sản phẩm</span>
                                                @else
                                                    <span>Góp ý kiến riêng</span>
                                                @endif
                                            </td>
                                            <td>{{$item['content']}}</td>
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
                                                                <form action="{{route('deletefeedback',$item->id)}}" method="post">
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