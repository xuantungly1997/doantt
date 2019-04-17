@extends('admin.master')
@section('title','Home page')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$countuser}}</div>
                                    <div>User</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('customer')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$countpro}}</div>
                                    <div>Product</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('product')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$countorder}}</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('getadminorder')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <style>
                .form-about{
                    width: 600px;
                    padding: 20px;
                    border-radius: 10px;
                    border:1px solid #e6e7e7;
                    margin:50px auto;
                    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
                }
            </style>
            <div class="row">
                <form class="form-about" action="{{route('postabout',$data->id)}}" method="post">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{Session::get('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h3>Cập nhật thông tin liên hệ</h3>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label >Email</label>
                        <input type="text" class="form-control" name="email" value="{{$data->email}}">
                        <span class="text-error">{{$errors->first('email')}}</span>

                    </div>
                    <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                        <label >Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                        <span class="text-error">{{$errors->first('phone')}}</span>

                    </div>
                    <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="{{$data->address}}">
                        <span class="text-error">{{$errors->first('address')}}</span>

                    </div>
                    <div class="update-about">
                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection