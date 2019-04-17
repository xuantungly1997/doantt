<!-- ==========start footer========= -->
<div class="service">
    <div class="container service-container">
        <ul>
            <li>
                <div class="service-img">
                    <div class="div-img">
                        <img src="{{asset('frontend/img/01.png')}}" alt="">
                    </div>
                </div>
                <div class="service-infor">
                    <p class="p-title">
                        Giao hàng
                    </p>
                    <p class="p-desc">
                        Giao hàng nhanh chóng
                    </p>
                </div>
            </li>
            <li>
                <div class="service-img">
                    <div class="div-img">
                        <img src="{{asset('frontend/img/02.png')}}" alt="">
                    </div>
                </div>
                <div class="service-infor">
                    <p class="p-title">
                        Đổi trả
                    </p>
                    <p class="p-desc">
                        Đổi trả sản phẩm trong vòng 30 ngày
                    </p>
                </div>
            </li>
            <li>
                <div class="service-img">
                    <div class="div-img">
                        <img src="{{asset('frontend/img/03.png')}}" alt="">
                    </div>
                </div>
                <div class="service-infor">
                    <p class="p-title">
                        24/7 Hỗ trợ
                    </p>
                    <p class="p-desc">
                        Nhân viên hỗ trợ nhiệt tình 24/7
                    </p>
                </div>
            </li>
            <li>
                <div class="service-img">
                    <div class="div-img">
                        <img src="{{asset('frontend/img/04.png')}}" alt="">
                    </div>
                </div>
                <div class="service-infor">
                    <p class="p-title">
                        Thanh toán nhanh gọn
                    </p>
                    <p class="p-desc">
                        Hỗ trợ thanh toán nhanh gọn
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- ========== -->
<div class="footer">
    <div class="container footer-container">
        <ul class="footer-container__main">
            <li class="col-lg-3 col-md-3 col-sm-12 li-main">
                <h4 class="h-title">LIÊN HỆ VỚI CHÚNG TÔI</h4>
                <ul class="ul-contact">
                    <li>
                        <a href="#">
                            <span> Điện thoại: {{$about->phone}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Địa chỉ: {{$about->address}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Liên hệ: {{$about->email}}</span>
                        </a>
                    </li>
                </ul>
                <ul class="ul-apps">
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
            </li>

            <li class="col-lg-3 col-md-3 col-sm-12 li-main">
                <h4 class="h-title">DANH MỤC</h4>
                <ul class="ul-menu">
                    <li><a href="{{route('homeclient')}}">Trang chủ</a></li>
                    <li><a href="{{route('getproduct',['target' => 'all'])}}">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="{{route('getcontact')}}">Liên hệ</a></li>
                </ul>
            </li>

            <li class="col-lg-3 col-md-3 col-sm-12 li-main">
                <h4 class="h-title">THÔNG TIN</h4>
                <ul class="ul-infor">
                    <li><a href="{{route('about')}}">Về chúng tôi</a></li>
                    <li><a href="{{route('support')}}">Hình thức thanh toán</a></li>
                    <li><a href="{{route('getcontact')}}">Liên hệ</a></li>
                </ul>
            </li>

            <li class="col-lg-3 col-md-3 col-sm-12 li-main">
                <h4 class="h-title">KHÁCH HÀNG</h4>
                <ul class="ul-user">
                    @if(Session::get('customerInfo'))
                    <li><a href="{{route('updateinfor')}}">Thông tin</a></li>
                    @endif
                    <li><a href="{{ route('getshowcart') }}">Đơn hàng</a></li>
                </ul>
            </li>
        </ul>
        <div class="footer-subscribe">
            <div class="row">
                <div class="footer-subscribe__left col-lg-7 col-md-7 col-sm-12">
                    <img src="{{asset('frontend/img/pay.png')}}" alt="">
                </div>
                <div class="footer-subscribe__right col-lg-5 col-md-5 col-sm-12">
                    <div class="form-group form-scb">
                        <input type="text" class="form-control" id="input" placeholder="Email">
                        <button class="btn btn-info">subscribe</button>
                    </div>
                    <p class="p-desc">Đăng ký nhận thông tin về các sản phẩm mới.</p>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p class="coppy-right">
                © All rights reserved. Made with by XuanTung-KTPM5-k10
            </p>
        </div>
    </div>
</div>
<!-- ====== -->

<!-- ===========the end footer========= -->