<!-- ========start Header ============ -->
<div class="thanhbarhead">
    <div class="container thanhbarhead-container">
        <div class="row">
            <div class="thanhbarhead-container__left col-lg-8 col-md-8 col-sm-12">
                <ul class="left-contact">
                    <li>
                        <a href="#">
                            <i class="fas fa-envelope-square"></i>
                            <span>{{$about->email}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-phone-volume"></i>
                            <span>{{$about->phone}}</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"> <i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-skype"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
            <div class="thanhbarhead-container__right col-lg-4 col-md-4 col-sm-12">
                <ul>
                    @if(Session::get('customerInfo')== null)
                        <li>
                            <a href="{{route('getlogin')}}">
                                <i class="far fa-user"></i>
                                Đăng nhập
                            </a>
                        </li>
                        <li>
                            <a href="{{route('getlogin')}}">
                                <i class="far fa-user"></i>
                                Đăng kí
                            </a>
                        </li>
                    @else
                        <li><a href="{{route('updateinfor')}}"><i class="far fa-user" style="margin-right: 3px;"></i> {{Session::get('customerInfo')->name}}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ================ -->
<div class="mainhead" id="Mainhead">
    <div class="container mainhead-container">
        <div class="mainhead-container__logo">
            <a href="{{route('homeclient')}}">
                <img src="{{asset('frontend/img/venalogo.png')}}" alt="logo">
            </a>
        </div>
        <div class="mainhead-container__menu">
            <ul>
                <li class="active">
                    <a href="{{route('homeclient')}}">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li id="product" class="menuc2">
                    <a href="{{route('getproduct',['target' => 'all'])}}">
                        <span>Sản phẩm</span>
                    </a>
                    <ul id="showproduct" class="showmenuc2">
                        <li>
                            <h4 class="catename">Danh mục nam</h4>
                            <ul class="cate">
                                @foreach($cate as $item)
                                    @if($item->parent_id==1)
                                        <li><a href="{{ route('getcateproduct',$item->id.'&'.$item->slug)}}">{{$item->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <h4 class="catename">Danh mục nữ</h4>
                            <ul class="cate">
                                @foreach($cate as $item)
                                    @if($item->parent_id==0)
                                        <li><a href="{{route('getcateproduct',$item->id).'&'.$item->slug}}">{{$item->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('getpost')}}">
                        <span>Tin tức</span>
                    </a>
                </li>
                <li id="infor" class="menuc2">
                    <a href="#">
                        <span>Giới thiệu</span>
                    </a>
                    <ul id="showinfor" class="showmenuc2">
                        <li>
                            <a href="{{route('about')}}">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="{{route('support')}}"> Hình thức thanh toán</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('getcontact')}}">
                        <span>Liên hệ</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mainhead-container__cart">
            <ul>
                <li>
                    <div class="search">
                        <form action="{{route('getsearch')}}" method="get">
                            <input type="text" placeholder="Search..." name="result">
                            <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
                            {{--<i class="fas fa-search" type="submit" style="background: white;border: none;cursor:pointer;"></i>--}}
                        </form>
                    </div>
                </li>
                <li style="position: relative;">
                    <div class="user" id="User">
                        <i class="far fa-user"></i>
                    </div>
                    @if(Session::get('customerInfo'))
                        <div class="infor-user" id="Logout">
                            <ul>
                                <li>
                                    <span> Xin chào: {{Session::get('customerInfo')->name}}</span>
                                </li>
                                <li>
                                    <a href="{{route('updateinfor')}}">Thông tin</a>
                                </li>
                            </ul>
                            <p class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <a href="{{route('getlogout')}}"> Đăng xuất </a>
                            </p>
                        </div>
                    @else
                        <div class="infor-user" id="Logout">
                            <p class="logout">Bạn chưa đăng nhập</p>
                        </div>
                    @endif

                </li>
                <li>
                    <div class="cart">
                        <a href="{{ route('getshowcart') }}">
                            <i class="fas fa-cart-plus"></i>
                            Cart(<span>{{Cart::count()}}</span>)
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- =====fix menu top ======= -->
<script>
    window.onscroll = function() {myFunction()};
    var header = document.getElementById("Mainhead");
    var sticky = header.offsetTop;
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<!-- ========the end Header ============ -->