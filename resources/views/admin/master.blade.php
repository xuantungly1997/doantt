<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--set ajax--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <base href="{{asset('public')}}/">--}}

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/startmin.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/main-style.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap.css')}}">

    <script src="{{asset('js/jquery.min2.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
    @include('admin.header')

    @yield('content')
</div>
{{--//select 2--}}

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
<!-- change text -->
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>

<!-- DataTables JavaScript -->
<script src="{{asset('js/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('editor/ckeditor/ckeditor/ckeditor.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('js/startmin.js')}}"></script>


<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/utils.js')}}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#dataTables-example').DataTable({
            "language": {
                "decimal":        "",
                "emptyTable":     "Không có dữ liệu trong bảng",
                "info":           "Hiển thị _START_ đến _END_ trên _TOTAL_ thư mục",
                "infoEmpty":      "hiển thị 0 đến 0 trên 0 thư mục",
                "infoFiltered":   "(Được lọc từ 5 tổng số mục)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Hiển thị _MENU_ thư mục",
                "loadingRecords": "Loading...",
                "processing":     "Processing...",
                "search":         "Tìm kiếm:",
                "zeroRecords":    "Không tìm thấy dữ liệu",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Tiếp",
                    "previous":   "Trước"
                },
                "aria": {
                    "sortAscending":  ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
        $(document).on('click', '.deletecomment', function () {
            if(confirm('Bạn có muốn xóa???')) {
                var url = $(this).attr('url');
                $this = $(this);
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        _method: 'post',
                    },
                    success: function (result) {
                        console.log(result)
                        if(result.success !== 'undefine') {
                            var res = $this.parent().parent().remove();
                            if(res) {
                                setTimeout(function () {
                                    alert(result.success)
                                }, 150);
                            }
                        } else {
                            alert(result.error)
                        }
                    },
                    error: function (err) {
                        console.log(err)
                    },
                })
            }
        })
    });
</script>
</body>
</html>