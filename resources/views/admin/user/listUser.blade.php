@extends('admin.master')
@section('title','Danh sách nhân viên')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý nhân viên</h1>
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
                            @if(Auth::user()->role == 1)
                                <a href="{{route('adduser')}}"><button class="btn btn-info"><i class="fa fa-plus-circle fa-fw"></i>Thêm mới</button></a>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên nhân viên</th>
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày thêm</th>
{{--                                        @if(Auth::user()->role == 1)--}}
                                        <th>Thao tác</th>
                                        {{--@endif--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr class="gradeU">
                                            <td>{{$item['id']}}</td>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['email']}}</td>
                                            <td>{{$item['phone']}}</td>
                                            <td>{{$item['address']}}</td>
                                            <td>{{$item['created_at']}}</td>
{{--                                            @if(Auth::user()->role == 1)--}}
                                                <td >
                                                    @if((Auth::user()->id == $item->id)||(Auth::user()->role == 1))
                                                        <a href="{{route('edituser',$item->id)}}"><div class="btn btn-info"><i class="fa fa-edit fa-fw"></i></div></a>
                                                    @endif
                                                    @if((Auth::user()->id != $item->id)&&(Auth::user()->role == 1))
                                                        {{--//&& (Auth::user()->role != $item->role)--}}
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?=$item->id?>"><i class="fa fa-trash-o fa-fw"></i></button>
                                                    @endif
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal<?=$item->id?>" role="dialog">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <p>Bạn có chắc muốn xóa bản ghi không???</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route('deleteuser',$item->id)}}" method="post">
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
                                            {{--@endif--}}
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
    {{--<script>--}}
        {{--function  deleteUser(id) {--}}
            {{--$('.modal-body').append("cccc"+id);--}}
            {{--$('.modal').modal("show");--}}
            {{--aaa = '<a href="+{{route('deleteuser',id)}}+"></a>';--}}
                    {{--aaa = "<a href='http://localhost:8080/page/public/admin/user/delete/"+id+"'>Xoa</a>"--}}
            {{--// $('.modal-footer').remove();--}}
            {{--$('.modal-footer').append(aaa);--}}
        {{--}--}}

    {{--</script>--}}
@endsection