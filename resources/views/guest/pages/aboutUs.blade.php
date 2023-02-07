{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
@section('title')
    Abouts | BComputer
@endsection


@section('user-contents')
    {{-- @section('breadcrumb')
    <a href="#" class="bc-items">Category</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">{{ $title }}</a>
@endsection --}}
    @include('guest.pages.section.sec-thanhdieuhuong')
    <div class="han-aboutus">
        <div class="container-md">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-6">
                        <br style="width: 100% ; height:5px ; color:blue">
                        <h1>History and Information</h1>
                        <p>Công ty Cổ phần Đầu tư BComputer là nền tảng bán lẻ đa ngành nghề số 1 Việt Nam về
                            doanh thu và lợi nhuận. Với chiến lược omni-channel, Công ty vận hành mạng lưới hàng ngàn cửa
                            hàng
                            trên toàn quốc song song với việc tận dụng hiểu biết sâu rộng về khách hàng thông qua nền tảng
                            dữ liệu lớn, năng lực chủ động
                            triển khai các hoạt động hỗ trợ bán lẻ được xây dựng nội bộ và liên tục đổi mới công nghệ nhằm
                            tạo ra
                            trải nghiệm khách hàng vượt trội và thống nhất ở mọi kênh cũng như nâng cao sự gắn kết của người
                            tiêu
                            dùng với các thương hiệu của BCP.

                        <P> Công ty chuyên cung cấp dịch vụ
                            hậu mãi - bảo trì - lắp đặt, dịch vụ giao hàng chặng cuối, dịch vụ quản lý kho vận
                            logistics
                            thị
                            trường nước ngoài với chuỗi bán tại Campuchia và liên doanh tại Indonesia.</P>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('image/aboutUs/aboutUs.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('image/aboutUs/aboutUs01.png') }}" alt="">
                </div>
                <div class="col-lg-6">
                    <h1>Product</h1>
                    <p>Công ty BCP chuyên cung cấp các sản phẩm thương mại điện tử, phụ kiện dành cho văn phòng công sở,
                        gamer chuyên nghiệp. Sản phẩm đa dạng mẫu mã, mới nhất trên thị trường. Một số sản phẩm như :
                    <p>+ Laptop</p>
                    <p>+ Máy tính bàn</p>
                    <p>+ CPU</p>
                    <p>+ Case</p>
                    <p>+ Chuột Máy Tính</p>
                    <p>+ Bàn phím</p>
                    <p>+ ...</p>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h1>Service and Quality</h1>
                    <p>Chính sách hậu mãi khách hàng bao gồm : Sản phẩm sẽ được đổi mới 100% trong 30 ngày đầu nếu như sản
                        ra bất kỳ lỗi nào từ nhà sản xuất, và gói bảo hành 1 năm từ nhà sản xuất</p>
                    <p>+ Email: bcomputercskh@gmail.com</p>
                    <p>+ Customer support: 190018009</p>
                    <p>+ Order online: 190018008</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('image/aboutUs/aboutUs02.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
