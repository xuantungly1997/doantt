@extends('admin.master')
@section('title','danh sách đơn hàng')
@section('content')
    <script>

        function changeActive(id, paramsDetail) {
            if(confirm('Bạn có xác nhận thanh toán không???')) {
                $.ajax({
                    url: '{{url('admin/order')}}',
                    type: 'POST',
                    data: {
                            id:id,
                            paramsDetail:paramsDetail
                        },
                    dataType: 'JSON',
                    success: function(data) {
                        if(data && data.success) {
                            alert(data.success);
                            var appendTd = '#status-'+id;
                            var btnActive = '#btn-active-'+id;
                            var statusReport = '#status-report-'+id;
                            var removedelete = '#btn-delete-'+id;
                            var appendPrint = '#btn-print-'+id;
                            $(appendTd).html('<span class="status status-done">Đã xử lý</span>');
                            $(statusReport).html('<span style="color: blue;font-weight: bold">Đã xử lý</span>');
                            $(appendPrint).show();
                            $(removedelete).remove();
                            $(btnActive).remove();
                        } else {
                            alert(data.error);
                        }
                    }
                    }
                )
            }
        }

        function DeleteOrder(id) {
            if(confirm('Bạn có xác nhận xóa không???')) {
                $.ajax({
                        url: '{{url('admin/order/delete')}}',
                        type: 'POST',
                        data: {
                            id:id
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if(data && data.success) {
                                alert(data.success);
                                var TdActive = '#td-active-'+id;
                                $(TdActive).remove();
                            } else {
                                alert(data.error);
                            }
                        }
                    }
                )
            }
        }
    </script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lí đơn hàng</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
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
                                        <th>ID</th>
                                        <th>Người mua</th>
                                        <th>Email</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>

                                    </tr>
                                    </thead>
                                    <style>
                                        .td-action{
                                            display: flex;
                                        }
                                        .btn-action{
                                            margin: 2px;
                                        }
                                        .status{
                                            padding: 5px;
                                            color: white;
                                            display: block;
                                            text-align: center;
                                            border-radius: 5px;
                                        }
                                        .status-cancel{
                                            background-color:red;
                                        }
                                        .status-doing{
                                            background-color:green;
                                        }
                                        .status-done{
                                            background-color:blue;
                                        }
                                    </style>
                                    <tbody>
                                    @foreach ($order as $item)
                                        <tr class="gradeU" id="td-active-<?=$item->id?>">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->date_order}}</td>
                                            <td id="status-<?=$item->id?>">
                                                @if($item->status==0)
                                                    <span class="status status-cancel">Chưa xử lý</span>
                                                @else
                                                    <span class="status status-done">đã xử lý</span>
                                                @endif
                                            </td>
                                            <td class="td-action">
                                                <button class="btn btn-primary btn-action" data-toggle="modal" data-target="#ModalDetail<?=$item->id?>" title="Xem chi tiết"><i class="fa fa-eye fa-fw"></i></button>
                                                {{--//modal--}}
                                                <div class="modal fade" id="ModalDetail<?=$item->id?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3>
                                                                    CHI TIẾT ĐƠN HÀNG
                                                                </h3>
                                                            </div>
                                                            <div class="modal-body modal-custom">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="active"><a data-toggle="tab" href="#home<?=$item->id?>">Đơn hàng</a></li>
                                                                    <li><a data-toggle="tab" href="#menu1<?=$item->id?>">Chi tiết</a></li>
                                                                    <li><a data-toggle="tab" href="#menu2<?=$item->id?>">Thông tin khách hàng</a></li>
                                                                </ul>

                                                                <div class="tab-content">
                                                                    <div id="home<?=$item->id?>" class="tab-pane fade in active">
                                                                        <table class="infor-product">
                                                                            <tr>
                                                                                <td colspan="2" style="text-align: center; padding: 10px 0; background: #ddd">ĐƠN HÀNG</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Order id</td>
                                                                                <td width="70%" class="infor-left"><strong>{{$item->id}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Tên khách</td>
                                                                                <td width="70%" class="infor-left"><strong>{{$item->name}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Ngày thêm</td>
                                                                                <td width="70%" class="infor-left"><strong>{{$item->created_at}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Số lượng bán</td>
                                                                                <td width="70%" class="infor-left">
                                                                                    @php
                                                                                        $s=0;
                                                                                        foreach ($orderDetail as  $value) {
                                                                                            if($item->id == $value->order_id){
                                                                                                $s+=$value->pro_amount;
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                    {{$s}}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Tổng tiền</td>
                                                                                <td width="70%" class="infor-left">{{number_format($item->total)}} VND</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Trạng thái</td>
                                                                                <td width="70%" class="infor-left" style="padding-right: 20px;" id="status-report-<?=$item->id?>">
                                                                                    @if($item->status==0)
                                                                                        <span style="color: red;font-weight: bold">Chưa xử lý</span>
                                                                                    @else
                                                                                        <span style="color: blue;font-weight: bold">Đã xử lý</span>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" style="text-align: center; padding: 10px 0; background: #ddd">THÔNG TIN KHÁC</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Địa chỉ nhận</td>
                                                                                <td width="70%" class="infor-left"><strong>{{$item->address}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Ghi chú</td>
                                                                                <td width="70%" class="infor-left"><strong>{{$item->note}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Hình thức giao hàng</td>
                                                                                <td width="70%" class="infor-left">
                                                                                    @if($item->payment==1)
                                                                                        <strong>Ship</strong>
                                                                                    @else
                                                                                        <strong>Online</strong>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                    <div id="menu1<?=$item->id?>" class="tab-pane fade" style="padding: 15px">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Tên</th>
                                                                                <th>Màu sắc</th>
                                                                                <th>Kích thước</th>
                                                                                <th>Số lượng</th>
                                                                                <th>Giá tiền</th>
                                                                                <th>Tổng</th>
                                                                            </tr>
                                                                            <?php
                                                                                $count = 0;
                                                                                $total = 0;
                                                                            ?>
                                                                            @foreach($orderDetail as $detail)
                                                                                @if($item->id == $detail->order_id)
                                                                                    <?php
                                                                                    $count++;
                                                                                    $total+= $detail->pro_price*$detail->pro_amount;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td>{{$detail->product_id}}</td>
                                                                                        <td>{{$detail->pro_name}}</td>
                                                                                        <td>{{$detail->pro_color}}</td>
                                                                                        <td>{{$detail->pro_size}}</td>
                                                                                        <td>{{$detail->pro_amount}}</td>
                                                                                        <td>{{number_format($detail->pro_price)}} VND</td>
                                                                                        <td>{{number_format($detail->pro_price*$detail->pro_amount)}} VND</td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </table>
                                                                        <style>
                                                                            .main-total{
                                                                                display: flex;
                                                                                width: 400px;
                                                                                margin: 50px auto 0;
                                                                                padding: 20px;
                                                                                background-color: #ddd;
                                                                                border-radius: 10px;
                                                                                box-shadow: 0 5px 15px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                                                                            }
                                                                            .main-total ul{
                                                                                margin-top: 20px;
                                                                            }
                                                                            .main-total i{
                                                                                font-size: 80px;
                                                                            }
                                                                        </style>
                                                                        <div class="main-total">
                                                                            <i class="fa fa-cart-plus fa-fw active"></i>
                                                                            <div class="total-detail">
                                                                                <ul>
                                                                                    <li>
                                                                                        Số lượng: {{$count}}
                                                                                    </li>
                                                                                    <li>
                                                                                        Tổng tiền: {{number_format($total)}} VND
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="menu2<?=$item->id?>" class="tab-pane fade">
                                                                        <table class="infor-product">
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Họ tên</td>
                                                                                <td width="70%" class="infor-left">
                                                                                    {{$item->name}}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Email</td>
                                                                                <td width="70%" class="infor-left">
                                                                                    {{$item->email}}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Địa chỉ</td>
                                                                                <td width="70%" class="infor-left">{{$item->address}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Số điện thoại</td>
                                                                                <td width="70%" class="infor-left">{{$item->phone}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center" width="30%">Ghi chú:</td>
                                                                                <td width="70%" class="infor-left">{{$item->note}}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <a id="btn-print-<?=$item->id?>" @if($item->status==0) style="display: none" @endif; href="{{route('getintoorder',$item->id)}}"><button  style="width: auto" class="btn btn-info">In hóa đơn</button></a>
                                                                <button style="width: auto;" type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $paramsDetail =[];
                                                    foreach ($orderDetail as  $value) {
                                                        if($item->id == $value->order_id){

                                                            $paramsDetail[] =[
                                                                'product_id' => $value->product_id,
                                                                'pro_amount' => $value->pro_amount,
                                                            ];
                                                        }

                                                    }
                                                    $paramsDetailToString = json_encode($paramsDetail, true);

                                                @endphp
                                                @if($item->status==0&&Auth::user()->role == 1)
                                                    <button
                                                            id="btn-delete-<?=$item->id?>"
                                                            onclick="DeleteOrder({{$item->id}})" @if($item->status==1) style="display: none" @endif; class="btn btn-danger btn-action" title="Xóa sản phẩm"><i class="fa fa-trash-o fa-fw"></i></button>
                                                <?php //dd($paramsDetail);?>
                                                    <button class="btn btn-action btn-success" id="btn-active-<?=$item->id?>"
                                                            onclick="changeActive({{ $item->id }}, {{$paramsDetailToString }})"><i class="fa fa-check"></i></button>
                                                @endif
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

