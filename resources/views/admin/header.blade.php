<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('homeadmin')}}">VENAshop</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{route('homeadmin')}}"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">dropdown-toggle
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{Auth::user()->email}}
                 <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{route('logoutadmin')}}">
                        Logout
                    </a>

                    <form id="logout-form" action="#" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a  href="{{route('homeadmin')}}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                </li>
                <li>
                    <a href="javascrip:void(0)"><i class="fa fa-suitcase fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('category')}}">Danh mục sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{route('product')}}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{route('comment')}}">Bình luận sản phẩm</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{route('getadminorder')}}"><i class="fa fa-cart-plus fa-fw active"></i>Đơn hàng</a>
                </li>
                <li>
                    <a href="{{route('post')}}"><i class="fa fa-files-o fa-fw"></i>Tin tức</a>
                </li>
                <li>
                    <a href="{{route('feedback')}}"><i class="fa fa-edit fa-fw"></i>feedback</a>
                </li>
                <li>
                    <a href="javascrip:void(0)"><i class="fa fa-user fa-fw"></i>Người dùng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('user')}}">Nhân viên</a>
                        </li>
                        <li>
                            <a href="{{route('customer')}}" >Khách hàng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @if((Auth::user()->role == 1))
                    <li>
                        <a href="javascrip:void(0)"><i class="fa fa-tasks fa-fw"></i>Thống kê<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('statistical')}}">Hóa đơn</a>
                        </li>
                        <li>
                            <a href="{{route('revenue')}}">Doanh thu</a>
                        </li>
                    </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>