@extends('guest.elements.master')

@section('title')
    Checkout process | BComputer
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
                            <div class="select_radio d-flex nav nav-pills mb-3" id="pills-tab" role="tablist">
                                @if ($userAddress != null)
                                    <div class="d-flex me-4">
                                        <input type="radio" class="cus-checked" name="check_radio"
                                            data-id="{{ $userAddress->id }}" id="delivery-check" checked>
                                        <label for="radio_2">Delivery</label>
                                    </div>
                                @else
                                    <div class="d-flex me-4">
                                        <input type="radio" class="cus-checked" name="check_radio" id="delivery-check"
                                            checked>
                                        <label for="radio_2">Delivery</label>
                                    </div>
                                @endif

                                <div class="d-flex">
                                    <input type="radio" class="cus-checked" name="check_radio"
                                        id="pick-up-at-the-store" data-id="store">
                                    <label for="radio_2">Pick up at the store</label>
                                </div>
                            </div>
                            @if ($userAddress != null)
                                <div class="delivery-check">
                                    <div class="address">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="receiver-name" data-id="{{ $userAddress->id }}">
                                                {{ $userAddress->fullname }}</div>
                                            <div id="choose-address-orther" class="cursor-pointer">Choose address
                                                orther
                                            </div>
                                        </div>
                                        <div class="receiver-address">
                                            Address: {{ $userAddress->address }}, {{ $userAddress->wards }},
                                            {{ $userAddress->district }}, {{ $userAddress->province }}
                                        </div>
                                        <div class="receiver-phone">Phone number: {{ $userAddress->phone }}</div>
                                    </div>
                                </div>
                            @else
                                <div class="delivery-check">
                                    <div class="address">
                                        <div class="add-new-address">Add new Address</div>
                                    </div>
                                </div>
                            @endif


                            <div class="pick-up-at-the-store d-none">
                                <div class="address">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="receiver-name">BCOMPUTER SHOP</div>
                                    </div>
                                    <div class="receiver-address">
                                        Address: 590, CMT8, DISTRICT 3, HCMC
                                    </div>
                                    <div class="receiver-phone">Phone number: 0865677010</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @include('guest.pages.modal.add-diachi-modal')

                <div class="checkout-proccess">
                    <div class="col-12 checkout-header">
                        <div>Products currently selected</div>
                    </div>
                    @foreach ($productList as $item)
                        @php
                            $product = $item['product'];
                            $image = $item['image'];
                        @endphp
                        <div class="col-md-12">
                            <div class="checkout-product checkout-select" data-id="{{ $product->id }}">
                                <div class="checkout-product-image"><img
                                        src="{{ asset('image/product/' . $image[0]->image) }}" alt=""></div>
                                <div class="checkout-product-name">{{ $product->name }}</div>
                                <div class="checkout-product-price">$
                                    {{ $product->price * ((100 - $product->discount) / 100) }}</div>

                                <div class="checkout-product-quanity ml-2">Qty: <span
                                        class="qty-checkout">{{ $item->quanity }}</span></div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
        <div class="col-md-3 process-to-payment ">
            <div class="process-box">
                <div class="title">Select Payment Method</div>
                <div class="select-method mb-5">
                    <div class="pay-method">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center" for="check_delivery">
                                <i class="fa-solid fa-money-bill-wave me-2 text-blue"></i>
                                Cash On Delivery
                            </div>
                            <input type="radio" name="check_pay_delivery" id="check_delivery" data-id="pay_delivery"
                                class="cus-checked" checked>
                        </div>
                        <p class="mt-1">Pay when you receive</p>
                    </div>
                    <div class="pay-method">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center" for="check_paypal" id="paypal-button">
                                <i class="fa-brands fa-cc-paypal me-2 text-blue"></i>
                                Cash On Paypal
                            </div>
                            <input type="radio" name="check_pay_delivery" id="check_paypal" data-id="paypal"
                                class="cus-checked">
                        </div>
                        <p class="mt-1">Connect to Account PayPal</p>
                    </div>

                </div>
                @php
                    $total = ltrim($total, '$');
                @endphp
                <div class="title">Order Summary</div>
                <div class="col-12 mb-3">
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-8">Subtotal</div>
                            <div class="col-4 d-flex justify-content-between align-items-center"><i
                                    class="fa-solid fa-dollar-sign me-2"></i><span
                                    class="total-checkout-sub">{{ $total }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-8">Shiping fee </div>
                            <div class="col-4 d-flex justify-content-between align-items-center"><i
                                    class="fa-solid fa-dollar-sign me-2"></i>0</div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 mt-2 mb-5">

                        <div class="row">
                            <div class="col-8">Total </div>
                            <div class="col-4 text-danger d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-dollar-sign me-2"></i><span
                                    class="total-checkout">{{ $total }} </span>
                            </div>
                        </div>
                    </div>
                    <p class="text_remind">(Please double check your order before ordering)</p>
                    <button class="btnSubmitProcess">
                        <a href="{{ route('user/checkout-success') }}"
                            class="text-decoration-none text-white cursor-pointer" id="process-to-payment">Proceed to
                            payment</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('myjs')
<script>
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '0.01',
                        currency: 'USD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thank you for your purchase!');
            });
        }
    }, '#paypal-button');
</script>
@endsection
