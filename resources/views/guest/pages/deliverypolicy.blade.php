@extends('guest.elements.master')

@section('user-contents')
    @include('guest.pages.section.sec-thanhdieuhuong')
    <div class="han-delivery-policy col-md-12">
        <div class="col-md-12">
            <img class="banner-img" src="{{ asset('image/banner/delivery.jpg') }}" alt="">
            <div class="col-md-12 row form-service">
                <div class="col-md-10 row table">
                    <i class="fa-solid fa-3x fa-location-dot">
                        <a>Urban and suburban areas</a>
                        <p class="text-form">In HO CHI MINH CITY AND HA NOI CITY</p>
                    </i>
                    <div class="col-md-8 table-info">
                        <h3>TP.HO CHI MINH</h3>
                        <p>+ Inner district 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, Thu Duc, Tan Phu, Tan Binh, Phu Nhuan, Go
                            Vap, Binh Thanh, Binh Tan.</p>
                        <p>+Suburban district Huyen Cu Chi, Huyen Hoc Mon, Huyen Binh Chanh, Huyen Nha Be.</p>
                    </div>
                </div>
                <div class="col-sm-12 row form-service">
                    <div class="col-sm-4 form-info">
                        <img src="{{ asset('image/banner/delivery1.png') }}" alt="">
                        <h4>Fast Delivery</h4>
                    </div>
                    <div class="col-sm-4 form-info-text">
                        <p>+ Quick delivery, successfully ordered</p>
                        <p>+ Free in inner Ho Chi Minh city, Ha Noi city</p>
                        <p>+ Deliver of the day</p>
                    </div>
                </div>

                <div class="col-sm-12 row form-service">
                    <div class="col-sm-4 form-info">
                        <img src="{{ asset('image/banner/delivery2.png') }}" alt="">
                        <h4>Instant feedback</h4>
                    </div>
                    <div class="col-sm-4 form-info-text">
                        <p>+ Support operator(free call) </p>
                        <p>+ Software technology</p>
                        <p>+ Complain</p>
                    </div>
                </div>

                <div class="col-sm-12 row form-service">
                    <div class="col-sm-4 form-info">
                        <img src="{{ asset('image/banner/delivery3.png') }}" alt="">
                        <h4>Careful packing</h4>
                    </div>
                    <div class="col-sm-4 form-info-text">
                        <p>+ Always ensure the quality of these goods.</p>
                        <p>+ Offer support and guidance product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
