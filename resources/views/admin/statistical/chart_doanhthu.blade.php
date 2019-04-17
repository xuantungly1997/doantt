@extends('admin.master')
@section('title','Thống kê')
@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
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
                        width: 100%;
                        margin: auto;
                    }
                    #chart {
                        height: 400px;
                        width: 400px;
                    }
                    .form-date{
                        width: 300px;
                    }
                    .choose{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-bottom: 30px;
                    }
                    .choose select{
                        height: 30px;
                        margin-left: 15px;
                    }
                    .choose .btn{
                        margin-left: 20px;
                    }
                </style>
                <div class="div-chart">
                    <h2>Thống kê doanh thu theo ngày/Tháng</h2>
                    <div class="row">
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <script>
                        let data = "{{$dataMoney}}";
                        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
                        console.log(dataChart);
                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Biểu đồ doanh thu'
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Doanh thu ngày tháng hiện tại'
                                }

                            },
                            legend: {
                                enabled: false
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.y:.1f}VND'
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}VNĐ</b><br/>'
                            },

                            series: [
                                {
                                    name: "Cột",
                                    colorByPoint: true,
                                    data: dataChart
                                }
                            ]
                        });
                    </script>
                    <style>
                        .doanhthu{
                            margin-top: 50px;
                        }
                        .doanhthu ul{
                            list-style-type: none;
                            width: 50%;
                            margin: auto;
                            text-align: center;
                        }
                        .doanhthu ul li{
                            font-size: 18px;
                            font-weight: bold;
                            padding: 20px 0;
                            color:white;
                        }
                        .doanhthu ul li:first-child{
                            background: rgb(124, 181, 236);
                        }
                        .doanhthu ul li:last-child{
                            background: rgb(67, 67, 72);
                        }
                    </style>
                    <div class="doanhthu">
                        <ul>
                            <li>
                                Tổng doanh thu theo ngày: {{$moneyDay}}VNĐ
                            </li>
                            <li>
                                Tổng doanh thu theo tháng: {{$moneyMonth}}VNĐ
                            </li>
                        </ul>
                    </div>
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