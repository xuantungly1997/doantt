@extends('admin.master')
@section('title','Thống kê doanh thu')
@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê doanh thu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="row m-b-40 m-t-10">
                    <div class="col-md-12 ">
                        <form action="{{route('filters')}}" method="get" style="margin-bottom: 25px;">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    Từ ngày:<input type="date" name="date_start" value="<?php echo isset($_GET['date_start'])? ($_GET['date_start']) : $date ?>">
                                </div>
                                <div class="col-md-6 text-center">
                                    Đến ngày:<input type="date" name="date_end" value="<?php echo isset($_GET['date_end'])? ($_GET['date_end']) : $date ?>">
                                </div>
                            </div>
                            <div class="row text-center">
                                <button class="btn btn-info" type="submit">Enter</button>
                            </div>
                        </form>

                        <div class="row">
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                        <script>
                            let data = "{{$sumtotal}}";
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

                        <div class="doanhthu">
                            <h3>Doanh thu từ ngày
                                <strong><?php echo isset($_GET['date_start'])? ($_GET['date_start']) : $date ?></strong>
                                đến ngày <strong><?php echo isset($_GET['date_start'])? ($_GET['date_end']) : $date ?></strong>:
                                <span style="color: red">{{$total}} VNĐ</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection