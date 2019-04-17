@extends('client.master')
@section('title','Hình thức thanh toán')
@section('content')
    <div class="topbarcontent">
        <div class="container topbarcontent-container">
            <div class="topbarcontent-container__left">
                <h3 class="left-title">
                    Hỗ trợ khách hàng
                </h3>
            </div>
            <div class="topbarcontent-container__right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="a-bold">Trang chủ:</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Hỗ trợ khách hàng</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- =====end topbar====== -->
    <!-- ==========start content========= -->
    <div class="support">
        <div class="container support-container">
            <div class="main-left">
                <ul>
                    <li class="active"><a href="#">Hỗ trợ</a></li>
                    <li><a href="#">Thanh toán tra trước</a></li>
                    <li><a href="#">Thanh toán tra trước(COD)</a></li>
                    <li><a href="#">Hoàn tiền</a></li>
                </ul>
            </div>
            <div class="main-right">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Thanh toán trả trước
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Thẻ ATM (thẻ ngân hàng, thẻ thanh toán nội địa), thẻ tín dụng và thẻ thanh toán quốc tế (Visa, Master, JCB, Amex…</p>
                                <p>Quý khách thanh toán trực tiếp tại hệ thống thanh toán trên website sau khi hoàn tất đơn hàng. Hệ thống thanh toán điện tử của CANIFA được kết nối với cổng thanh toán điện tử NAPAS. Theo đó, các tiêu chuẩn bảo mật thanh toán của CANIFA đảm bảo tuân thủ theo các tiêu chuẩn bảo mật của NAPAS, đã được Ngân hàng nhà nước Việt Nam thẩm định về độ an toàn bảo mật và cấp phép hoạt động chính thức.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Thanh toán trả sau (COD)
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Là hình thức khách hàng thanh toán tiền mặt trực tiếp cho nhân viên vận chuyển khi nhận hàng. Khi hàng được chuyển giao đến bạn có thể kiểm tra tình trang gói hàng còn nguyên vẹn và mở gói hàng kiểm tra sản phẩm trước khi thanh toán. Nếu sản phẩm có bất kỳ lỗi hay khiếm khuyết nào không đúng ý muốn, bạn có thể trả lại nhân viên vận chuyển ngay tại thời điểm đó.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Hoàn tiền
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Là hình thức khách hàng thanh toán tiền mặt trực tiếp cho nhân viên vận chuyển khi nhận hàng. Khi hàng được chuyển giao đến bạn có thể kiểm tra tình trang gói hàng còn nguyên vẹn và mở gói hàng kiểm tra sản phẩm trước khi thanh toán. Nếu sản phẩm có bất kỳ lỗi hay khiếm khuyết nào không đúng ý muốn, bạn có thể trả lại nhân viên vận chuyển ngay tại thời điểm đó.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========the end content========= -->
    @endsection