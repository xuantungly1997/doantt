@extends('client.master')
@section('title','Về chúng tôi')
@section('content')
<div class="topbarcontent">
    <div class="container topbarcontent-container">
        <div class="topbarcontent-container__left">
            <h3 class="left-title">
                Về chúng tôi
            </h3>
        </div>
        <div class="topbarcontent-container__right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homeclient')}}" class="a-bold">Trang chủ:</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="sp-title">Về chúng tôi</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- =====end topbar====== -->

<!-- ==========start content========= -->
<div class="mainabout">
    <div class="mainabout-container container">
        <p class="p-normal">
            Cơ sở sản quần áo VENAshop được thành lập năm 2017. Chuyên sản xuất các sản phẩm quần áo ... từ các chất liệu trong nước và nhập khẩu. Với phương châm sự hài lòng của khách hàng là thành công của chúng tôi! Mặc dù thành lập chưa lâu nhưng cơ sở chúng tôi đã tạo được tin cậy của khách hàng, đặc biệt là với khách hàng công sở.
        </p>
        <p class="p-normal">
            Hiện nay bán hàng online rất phát triển ở Việt Nam, bên cạnh những gian hàng uy tín thì cũng có khá nhiều những gian hàng hoạt động có nhiều hình thức lừa đảo khách hàng. <a href="#">venashop.com</a>thuộc quyền sở hữu của công ty Neo một công ty hoạt động trong lĩnh vực sản xuất quần áo từ lâu, luôn đưa lợi ích của khách hàng nên hàng đầu.
        </p>
        <p class="p-normal">
            Với các sản phẩm nổi bật như. Áo sơ mi, len nam nữ, quần jeans nam nữ .... Chúng tôi là một trong số ít những doanh nghiệp sản xuất sản phẩm và phân phối trực tiếp đến tận tay người tiêu dùng không thông qua bất kỳ khâu trung gian nào, vì vậy giá thành của chúng tôi luôn là rẻ nhất, có những sản phẩm rẻ đến bất ngờ!
        </p>

        <strong class="address">Hiện hệ thống của chúng tôi có 4 cửa hàng tại Hà Nội.</strong>
        <ul>
            <li>Showroom 1 : 158 Đội Cấn - Ba Đình - Hà Nội . Hotline 0997923887</li>
            <li>Showroom 2 : 198A Nguyễn Trãi  - Thanh Xuân - Hà Nội . Hotline 0994428551</li>
            <li>Showroom 3 : 208 Minh Khai - Hai Bà Trưng - Hà Nội . Hotline 0996570813</li>
            <li>Showroom 4 : 141T Trương Định - Hai Bà Trưng - Hà Nội. Hotline 0994428560</li>
        </ul>
        <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.025124103681!2d105.84681731468166!3d20.991629986018516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac6c6784780d%3A0x9f3369b1574f2!2zMTQxIFRyxrDGoW5nIMSQ4buLbmgsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1523702400504" width="100%" height="500" frameborder="0" allowfullscreen></iframe>

    </div>
</div>
<!-- ==========the end content========= -->
@endsection