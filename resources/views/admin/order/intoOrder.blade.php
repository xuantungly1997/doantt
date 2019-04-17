@extends('admin.master')
@section('title','In hóa đơn')
@section('content')
    {{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">--}}
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">In hóa đơn</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


                <div class="col-lg-12">
                    <div class="print" style="background-color: #DFE5E9; padding: 50px 100px 50px;">
                        <button class="doing" type="button" data-print style="padding: 10px; background: white; margin-bottom: 15px;">
                            <i class="fa fa-print m-r-10"></i>
                            In hóa đơn
                        </button>

                        <div class="detail-order" id="printTable" data-print-content>
                            <style media="all">
                                .detail-order{
                                    background: white;
                                    padding: 20px ;
                                }
                                .title{
                                    color: #9d9d9d;
                                }
                                .detail-order .h-title{
                                    text-align: center;
                                    font-weight: bold;
                                }
                                .detail-order .sent img{
                                    margin-bottom: 10px;
                                    width: 150px;
                                }
                                .detail-order .title{
                                    color: #9d9d9d;
                                }
                                .detail-order .pay-detail{
                                    padding: 20px;
                                    display: flex;
                                    align-items: center;
                                }
                                .detail-order .pay-detail p{
                                    margin-bottom: 5px;
                                }
                                .detail-order .sign-name{
                                    text-align: center;
                                }
                                .detail-order .date-pay{
                                    text-align: right;
                                    margin-right: 100px;
                                }
                                .row{
                                    display: flex;
                                }
                                .row .col-lg-6{
                                    width: 50%;
                                }
                                .thankiu{
                                    margin:30px auto 0;
                                    border: 2px dotted #ddd;
                                    padding: 10px;
                                    text-align:center;
                                    width: 60%;
                                }

                            </style>
                            <h2 class="h-title">Hoá đơn Thanh toán</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="sent">
                                        <h3 class="title">Bên gửi</h3>
                                        <img src="{{asset('frontend/img/venalogo.png')}}" alt="logo">
                                        <p>Địa chỉ: <strong>{{$about['address']}}</strong></p>
                                        <p>Số điện thoại: <strong>{{$about['phone']}}</strong></p>
                                        <p>email: <strong>{{$about['email']}}</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="receive">
                                        <h3 class="title">Bên nhận</h3>
                                        <p>Tên người nhận: <strong>{{$order['name']}}</strong></p>
                                        <p>Địa chỉ: <strong>{{$order['address']}}</strong></p>
                                        <p>Số điện thoại: <strong>{{$order['phone']}}</strong></p>
                                    </div>
                                </div>
                            </div>
                            <h3 class="title">Chi tiết đơn hàng</h3>
                            <p class="date"><strong>Ngày đặt hàng: </strong>{{$order['created_at']}}</p>
                            <p><strong>Sản phẩm:</strong></p>
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
                                    @if($order->id == $detail->order_id)
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
                                <tr>
                                    <td colspan="7">
                                        <div class="row pay-detail">
                                            <div class="col-lg-6 sign-name">
                                                <p>Thuế xuất VAT: 0%</p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>Cộng tiền hàng: {{number_format($total)}} VND</p>
                                                <p>Tiền Thuế VAT : Đã tính trong đơn hàng</p>
                                                <p>Tiền ship: 0 VND</p>
                                                <hr>
                                                <p>Tổng tiền thanh toán : {{number_format($total)}} VND</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>


                            <p class="date-pay"><strong>Ngày ... Tháng ... Năm .....</strong></p>
                            <div class="row">
                                <div class="col-lg-6 sign-name">
                                    <p><strong>Chữ kí người mua</strong></p>
                                    <p>............................................</p>
                                    <p>............................................</p>
                                </div>
                                <div class="col-lg-6 sign-name">
                                    <p><strong>Chữ kí người giao hàng</strong></p>
                                    <p>............................................</p>
                                    <p>............................................</p>
                                </div>
                            </div>

                            <div class="thankiu">
                                    Cảm ơn quý khách đã mua hàng tại VENAshop.Mọi phản hồi xin gửi qua
                                    <strong>{{$about['email']}}</strong>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <script type="text/javascript">
                    jQuery(function($) {
                        // Function available at https://gist.github.com/sixlive/55b9630cc105676f842c
                        $.fn.printDiv = function() {
                            var printContents = $(this).html();
                            var originalContents = $('body').html();
                            $('body').html('<div class="detail-order">'+printContents+'</div>');
                            $('body').addClass('js-print');
                            window.print();
                            $('body').html(originalContents);
                            $('body').removeClass('js-print');
                        };

                        // Print
                        $('[data-print]').click(function() {
                            $('[data-print-content]').printDiv();
                        });
                    });
                </script>
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
@endsection