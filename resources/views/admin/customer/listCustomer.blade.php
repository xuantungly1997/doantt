@extends('admin.master')
@section('title','danh sách khách hàng')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách Khách hàng</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @if(Session::has('deletesuccess'))
            <div class="alert alert-success" role="alert">
                <strong>{{Session::get('deletesuccess')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <style>
            .customer{
                box-shadow: 0 5px 15px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            }
            .customer:hover{
                box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            }
        </style>
        <ul class="main-content">
            @foreach($data as $item)
                <li class="col-lg-6 col-sm-12">
                <div class="customer">
                    <h3 class="customer_name">{{$item['name']}}</h3>
                    <ul class="row customer_infor">
                        <li class="col-lg-6 col-sm-12">
                            <i class="fa fa-envelope fa-fw"></i>
                            {{$item['email']}}
                        </li>
                        <li class="col-lg-6 col-sm-12">
                            <i class="fa fa-bell fa-fw"></i>
                            {{$item['phone']}}
                        </li>
                        <li class="col-lg-6 col-sm-12">
                            <i class="fa fa-tasks fa-fw"></i>
                            {{$item['birthday']}}
                        </li>
                        <li class="col-lg-6 col-sm-12">
                            <i class="fa fa-warning fa-fw"></i>
                            {{$item['address']}}
                        </li>
                    </ul>
                    <div class="customer_action">
                        <button type="submit" class="btn btn-warning delete_cus" data-toggle="modal" data-target="#myModal<?=$item->id?>">
                            Xóa
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal<?=$item->id?>" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Bạn có chắc muốn xóa bản ghi không???</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('deletecustomer',$item->id)}}" method="post">
                                            <input type="hidden" value="{{$item->id}}" name="id">
                                            <input type="submit" class="btn btn-danger" value="Xóa">
                                            {{csrf_field()}}
                                        </form>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <!-- /.row -->


        <!-- /.row -->
    </div>
    <div class="phantrang" >
        {{ $data->links() }}
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection