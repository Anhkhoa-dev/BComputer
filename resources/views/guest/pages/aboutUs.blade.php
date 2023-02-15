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
                <div class="row layout-about-us">
                    <div class="col-lg-6 layout-col-about-us">
                        <br style="width: 100% ; height:5px ; color:blue">
                        <h1 class="name-text-h1">History and Information</h1>
                        <p class="layout-col-about-us-text">BComputer Investment Joint Stock Company is the number 1
                            multi-industry retail platform in
                            Vietnam in terms of revenue and profit. With the omni-channel strategy, the Company operates a
                            network of thousands of stores nationwide while taking advantage of deep customer insights
                            through a big data platform, the ability to proactively deploy activities. retail support is
                            built in-house and continuously innovates technology to create a superior and consistent
                            customer experience across all channels and enhance consumer engagement with BCP's brands.
                        <p class="layout-col-about-us-text"> The company specializes in providing after-sales - maintenance -
                            installation services,
                            last-mile delivery services, logistics management services in foreign markets with sales chains
                            in Cambodia and joint ventures in Indonesia.</p>
                        </p>
                    </div>
                    <div class="col-lg-6 layout-col-about-us">
                        <img class="img-aboutus" src="{{ asset('image/aboutUs/aboutUs.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row layout-about-us">
                <div class="col-lg-6 layout-col-about-us">
                    <img class="img-aboutus" src="{{ asset('image/aboutUs/aboutUs01.png') }}" alt="">
                </div>
                <div class="col-lg-6 layout-col-about-us">
                    <h1 class="name-text-h1">Product</h1>
                    <p class="layout-col-about-us-text">BCP Company specializes in providing e-commerce products,
                        accessories for offices, professional
                        gamers. The latest products on the market are diverse. Some products like:
                    <p class="layout-col-about-us-text">+ Laptop</p>
                    <p class="layout-col-about-us-text">+ Computer</p>
                    <p class="layout-col-about-us-text">+ CPU</p>
                    <p class="layout-col-about-us-text">+ Case</p>
                    <p class="layout-col-about-us-text">+ Computer mouse</p>
                    <p class="layout-col-about-us-text">+ Keyboard</p>
                    <p class="layout-col-about-us-text">+ ...</p>
                    </p>
                </div>
            </div>
            <div class="row layout-about-us">
                <div class="col-lg-6 layout-col-about-us">
                    <h1 class="name-text-h1">Service and Quality</h1>
                    <p class="layout-col-about-us-text">Customer after-sales policy includes: The product will be renewed
                        100% in the first 30 days if there
                        is any defect from the manufacturer, and a 1-year warranty from the manufacturer.</p>
                    <p class="layout-col-about-us-text">+ Email: bcomputercskh@gmail.com</p>
                    <p class="layout-col-about-us-text">+ Customer support: 190018009</p>
                    <p class="layout-col-about-us-text">+ Order online: 190018008</p>
                </div>
                <div class="col-lg-6 layout-col-about-us">
                    <img class="img-aboutus" src="{{ asset('image/aboutUs/aboutUs02.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
