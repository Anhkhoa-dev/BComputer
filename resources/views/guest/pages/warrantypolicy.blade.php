@extends('guest.elements.master')
@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">Warranty policy</a>
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')
<div class="han-warrantypolicy">
    <div class="col-md-12 form-text-fisrt">
        <img class="banner" src="{{ asset('image/banner/warrantypolicy.png') }}" alt="">
        <div class="col-md-12 info-text">
            <h1 class="form-text-fisrt-content">Warranty Policy</h1>
            <h3 class="form-text-fisrt-content-info">At BComputer<br>
                <p class="form-text-fisrt-content-text">Easy warranty, Customer contact with us</p>
                <p class="form-text-fisrt-content-text">Email: bcomputercskh@gmail.com<br>HotLine: 190018008</p>
            </h3>
        </div>
    </div>
    <div class="col-md-10 form-text-second">
        <div class="col-md-12 form-text-content">
            <div class="row">
                <div class="col-md-6 form-text-content-fame">
                    <p class="form-text-content-content">Change new 100% 30-day period</p>
                    <div class="frame-info">
                        <ul>
                            <li>Change new 100%, product the fault of manufacturers, it also apply for all
                                product.</li>
                            <li>Gaming Gear: keyboard, mouse, hearphone</li>
                            <li>Computer accessories: Cpu, Ram, Ssd, Hdd, Fan, Psu, Nuc,..</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 form-text-content-fame">
                    <p class="form-text-content-content">Change new 100% 7-day period</p>
                    <div class="frame-info">
                        <ul>
                            <li>Change new 100%, product the fault of manufacturers, it also apply for all
                                product.</li>
                            <li>Laptop</li>
                            <li>Computer screen(not apply screen phone)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-12 framer-banner">
            <div class="content-banner">
                <h2 class="content-banner-text">Steps warranty</h2>
            </div>
            <div class="col-md-9 step-warranty">
                <div class="col-md-2 step-name">
                    <h5 class="step-name-content">Steps 1</h5>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 step-info">
                            <a class="step-info-content">When in need of product warranty, Customer contact with
                                BComputer</a><br>
                            <ul>
                                <li>Live chat with BCumputer At Website and Fanpage</li>
                                <li>HotLine: 190018008</li>
                                <li>Direct contact at showroom</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <i class="fa-solid fa-4x fa-id-badge  step-warranty-1-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 framer-banner">
            <div class="col-md-9 step-warranty">
                <div class="col-md-2 step-name">
                    <h5 class="step-name-content">Steps 2</h5>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 step-info">
                            <a class="step-info-content">Customers send goods or bring products to: </a><br>
                            <ul>
                                <li>590 Cach Mang Thang 8, Ward 11, District 3, TP.HCM</li>
                                <li>operating time(08:00 - 22:00)</li>
                                <li>Customer contact with tellers before, avoid loss</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <i class="fa-solid fa-4x fa-boxes-packing step-warranty-1-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 framer-banner">
            <div class="col-md-9 step-warranty-step3">
                <div class="col-md-2 step-name">
                    <h5 class="step-info-content-3">Steps 3</h5>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 step-info-3">
                            <a class="step-info-content">Complete the warranty and hand over the product</a><br>
                        </div>
                        <div class="col-md-3">
                            <i class="fa-sharp fa-4x fa-regular fa-thumbs-up step-warranty-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 background-brand">
        <div class="col-md-10 info-warranty">
            <h2 class="background-brand-info">Info product warranty</h2>
            <div class="col-md-10 img-logo">
                <img class="image" src="{{ asset('image/LOGO/Acer.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/AMD.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Asrock.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Corsair.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Dell.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Fuhlen.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Gigabyte.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Hp.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Hyper.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Intel.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Kimtigo.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/kingston.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/lenovo.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Logitech.png') }}" alt="">
                <img class="image" src="{{ asset('image/LOGO/Msi.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
