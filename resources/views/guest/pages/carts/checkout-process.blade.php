@extends('guest.elements.master')

@section('title')
    Cart Items | BComputer
@endsection

@section('user-contents')
    @section('breadcrumb')
        <a href="#" class="bc-items">Check out to process</a>
    @endsection
    @include('guest.pages.section.sec-thanhdieuhuong')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="checkout-proccess">
                        <div class="col-12 checkout-header">
                            <div>Purchase information</div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-address">
                               <div class="select_radio d-flex">
                                <div class="d-flex me-5">
                                    <input type="radio" class="cus-checked" name="check_radio" id="radio_1" checked>
                                    <label for="radio_1">Giao hàng tận nơi</label>
                                </div>
                                <div class="d-flex">
                                    <input type="radio" class="cus-checked" name="check_radio" id="radio_2">
                                    <label for="radio_2">Nhận tại cửa hàng</label>
                                </div>
                               </div>
                               <div class="checkout-address-info mt-3">
                                    <div class="address">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="receiver-name">Lê Ngọc Nhật An</div>
                                            <div>Select address orther</div>
                                        </div>
                                        <div>
                                            Địa chỉ: Hẻm 64, Đường 79, Phương tân Quy, Quận 7, Thành phố Hồ Chí Minh.
                                        </div>
                                        <div>Số điện thoại: 0865677010</div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-proccess">
                        <div class="col-12 checkout-header">
                            <div>Sản phẩm đang được chọn</div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-product">
                                <div class="checkout-product-image"><img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""></div>
                                <div class="checkout-product-name">Asus ROG Gladius II</div>
                                <div class="checkout-product-price">$ 72</div>
                                <div class="checkout-product-quanity">Qty: 2</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-product">
                                <div class="checkout-product-image"><img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""></div>
                                <div class="checkout-product-name">Asus ROG Gladius II</div>
                                <div class="checkout-product-price">$ 72</div>
                                <div class="checkout-product-quanity">Qty: 2</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-product">
                                <div class="checkout-product-image"><img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""></div>
                                <div class="checkout-product-name">Asus ROG Gladius II</div>
                                <div class="checkout-product-price">$ 72</div>
                                <div class="checkout-product-quanity">Qty: 2</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-product">
                                <div class="checkout-product-image"><img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""></div>
                                <div class="checkout-product-name">Asus ROG Gladius II</div>
                                <div class="checkout-product-price">$ 72</div>
                                <div class="checkout-product-quanity">Qty: 2</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-3 process-to-payment ">
                <div class="process-box">
                    <div class="title">Select Payment Method</div>
                    <div class="select-method mb-5">
                        <div class="pay-method">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-money-bill-wave me-2 text-blue"></i>
                                    Cash On Delivery
                                </div>
                                <input type="radio" name="check_pay_delivery" id="" class="cus-checked" checked>
                            </div>
                            <p class="mt-2">Pay when you receive</p>
                        </div>
                        <div class="pay-method">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fa-brands fa-cc-paypal me-2 text-blue"></i>
                                    Cash On Paypal
                                </div>
                                <input type="radio" name="check_pay_delivery" id="" class="cus-checked">
                            </div>
                            <p class="mt-2">Pay when you receive</p>
                        </div>

                    </div>
                    <div class="title">Order Summary</div>
                    <div class="col-12 mb-3">
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8">Subtotal (8 Items)</div>
                                <div class="col-4 d-flex justify-content-between align-items-center"><i class="fa-solid fa-dollar-sign me-2"></i>576</div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8">Shiping fee </div>
                                <div class="col-4 d-flex justify-content-between align-items-center"><i class="fa-solid fa-dollar-sign me-2"></i>5</div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 mt-2 mb-5">
                            <div class="row">
                                <div class="col-8">Total </div>
                                <div class="col-4 text-danger d-flex justify-content-between align-items-center"><i class="fa-solid fa-dollar-sign me-2"></i>581</div>
                            </div>
                        </div>
                        <p class="text_remind">(Please double check your order before ordering)</p>
                        <button type="submit" class="btnSubmitProcess"><a href="{{ route('user/checkout-success') }}" class="text-decoration-none">Proceed to payment</a></button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection