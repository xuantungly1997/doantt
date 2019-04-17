@extends('admin.master')
@section('title','Thống kê')
@section('content')
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js"></script>
    <script>
        function changeDate() {
            let date = $('#selectDate').val();
            $.ajax({
                url: '{{url('admin/statistical')}}',
                type: 'POST',
                data: {
                    date: date,
                },
                dataType: 'JSON',
                success: function(data) {
                    var arrayPercent = data.split(',');
                    var arrPercent = [parseFloat(arrayPercent[0]), parseFloat(arrayPercent[1])];
                    console.log(arrPercent);
                    var data = {
                        labels: [
                            "Đơn hàng đã duyệt",
                            "Đơn hàng chưa duyệt"
                        ],
                        datasets: [{
                            data: arrPercent,
                            backgroundColor: [
                                "#FF6384",
                                "#FFCE56"
                            ],
                            hoverBackgroundColor: [
                                "#FF6384",
                                "#FFCE56"
                            ]
                        }],
                    };
                    var ctx = $("#myChart");
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                        }
                    });
                        
                },
            });
        }
    </script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <style>
                    .div-chart{
                        width: 60%;
                        margin: auto;
                        text-align: center;
                    }
                    input{
                        margin: auto;
                    }
                    #chart {
                        height: 400px;
                        width: 400px;
                    }
                    #chart{
                        margin: auto;
                    }
                    .form-date{
                        width: 300px;
                    }
                </style>
                <div class="div-chart">
                    <h2>Thống kê hóa đơn trong ngày</h2>
                    <form action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Chọn ngày:</label>
                            <input type="date" class="form-control form-date" value="{{$date}}" onchange="changeDate()" id="selectDate">
                        </div>
                    </form>
                    <div id="chart">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <script>

                    var strPercent = "<?php echo $data;?>";
                    var arrayPercent = strPercent.split(',');
                    var arrPercent = [parseFloat(arrayPercent[0]), parseFloat(arrayPercent[1])];
                    var data = {
                        labels: [
                            "Đơn hàng đã duyệt",
                            "Đơn hàng chưa duyệt"
                        ],
                        datasets: [{
                            data: arrPercent,
                            backgroundColor: [
                                "#FF6384",
                                "#FFCE56"
                            ],
                            hoverBackgroundColor: [
                                "#FF6384",
                                "#FFCE56"
                            ]
                        }],

                    };
                    var ctx = $("#myChart");
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                        }
                    });
                </script>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
@endsection