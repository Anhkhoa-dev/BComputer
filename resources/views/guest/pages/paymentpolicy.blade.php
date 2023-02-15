@extends('guest.elements.master')
@section('user-contents')
    @include('guest.pages.section.sec-thanhdieuhuong')
    <div class="han-payment-policy">
        <div class="col-md-12">
            <div class="col-md-12 banner-first">
                <div class="row col-payment-policy">
                    <img class="image-big" src="{{ asset('image/banner/payment1.png') }}" alt="">
                    <div class="col-md-6 guide-pay">
                        <h1>Infomation instruct</h1>
                        <h5>The page gives customers information on how to pay when making a purchase</h5>
                    </div>
                    <div class="col-md-6">
                        <img class="icon-image" src="{{ asset('image/banner/payment2.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center row col-payment-policy">
                <div class="col-lg-3 form-info-paymentpolicy">
                    <div class="col-md-12 row col-payment-policy">
                        <div class="col-md-8">
                            <h3 class="service">Transfer of money</h3>
                            <p class="br-0"></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa-regular fa-credit-card icon-trasfer"></i>
                        </div>
                        <div class="col-md-12">
                            <p>Customer can transfer money through the company account</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 form-info-paymentpolicy">
                    <div class="col-md-12 row col-payment-policy">
                        <div class="col-md-8">
                            <h3 class="service">Pay directly</h3>
                            <p class="br-1"></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa-solid fa-money-bill-transfer icon-cash"></i>
                        </div>
                        <div class="col-md-12">
                            <p>Customer can pay at showroom</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 form-info-paymentpolicy">
                    <div class="col-md-12 row col-payment-policy">
                        <div class="col-md-8">
                            <h3 class="service">Customer can pay on delivery</h3>
                            <p class="br-2"></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa-solid fa-hand-holding-dollar icon-receive"></i>
                        </div>
                        <div class="col-md-12">
                            <p>Paid when you receive goods</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 justify-content-center color-info">
                <div class="row bank-info-payment col-payment-policy d-flex justify-content-center">
                    <div class="col-lg-7 info-transfer-payment">
                        <div class="row col-payment-policy form-color">
                            <h1 class="info-transfer-payment-text">Payment by bank transfer</h1>
                            <div class="col-md-3">
                                <img class="img-mb-bank" src="{{ asset('image/banner/logo-MB-bank.png') }}" alt="">
                            </div>
                            <div class="col-md-9 bank-text">
                                Bank Thuong mai co phan Quan Doi
                                <br>
                                Branch: Dong Sai Gon - Quan 10
                                <br>
                                Account number: 111.112.68.68.888
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 img-qr">
                        <img src="{{ asset('image/banner/QR.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-10 pay-direct">
                <div class="col-md-12 pay-direct-col">
                    <h1 class="pay-direct-col-content">Direct payment at Showroom</h1>
                    <h4 class="pay-direct-col-info">Pay directly in cash, Credit card payment at Showroom</h4>
                </div>
                <div class="pay-direct">
                    <div class="row col-payment-policy form-color">
                        <div class="col-md-5 map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.324072089453!2d106.66402411465285!3d10.78647246195806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCA3MDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1675848989931!5m2!1svi!2s"
                                width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-lg-5 address-showroom">
                            <img class="image-direct" src="{{ asset('image/banner/payment3.png') }}" alt="">
                            <div>
                                <h5 class="address-showroom-payment-policy">Showroom CMT8 - HCM</h5>
                                <h6 class="address-showroom-payment-policy-info">590 Cach Mang Thang Tam Discrit 3, TP.HCM
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12 pay-ondelivery">
                <div class="pay-ondelivery-form">
                    <div class="col-md-8 pay-ondelivery-content">
                        <h1 class="pay-ondelivery-text">Pay on delivery</h1>
                    </div>
                    <div class="row col-payment-policy col-md-8 pay-ondelivery-info">
                        <div class="col-md-5">
                            <h4 class="pay-ondelivery-text">Pay directly in cash, credit card payment on delivery.</h4>
                            <h4 class="pay-ondelivery-text">Customer pay all bill or pay the rest.</h4><br>
                            <h4 class="pay-ondelivery-text">Examination of goods prior to delivery, Warranty certificate,
                                instructions for use</h4>
                        </div>
                        <div class="col-md-5">
                            <img class="image-direct" src="{{ asset('image/banner/payment.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
