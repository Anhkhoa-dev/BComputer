@extends('guest.elements.master')

@section('title')
    Cart Items | BComputer
@endsection

@section('user-contents')
@section('breadcrumb')
    <a href="{{ route('user/cart-items') }}" class="bc-items">Giỏ Hàng</a>
    {{-- <div class="bc-divider"><i class="fas fa-chevron-right"></i></div> --}}
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')

<div class="container mt-5 mb-2" id="khoa-view-cart">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3 class="cart-title">Cart items</h3>
            </div>
            <div class="col-md-12">
                @if ($listCart != null)
                    <p class="cart-terms-purchase">(*) Số lượng mua cho 1 sản phẩm tối đa là 5</p>
                @else
                    <p class="cart-terms-purchase"></p>
                @endif
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="cart-items mb-1">
                                <div class="cart-header bg-white mb-2">
                                    @if ($cart['qty'] != null)
                                        <div class="select-item-cart"><input type="checkbox" id="select_all"
                                                class="cus-checkbox"></div>
                                        <div class="cart-header-name">Select all (<span id="qty-cart-total">1</span>
                                            product)</div>
                                        <div class="cart-header-price">Price</div>
                                        <div class="cart-header-qty">Quanity</div>
                                        <div class="cart-header-total">Total</div>
                                        <div class="cart-header-trash"><i class="fa-solid fa-trash-can"></i></div>
                                    @endif
                                </div>
                                @if ($cart != null)
                                    @foreach ($cart['cart'] as $item)
                                        <?php $product = $item['product']; ?>
                                        <div class="list-cart-item mb-2">
                                            <div class="cart-body">
                                                <div class="select-item-cart">
                                                    @if ($product['status'] == 0 || $item['hethang'])
                                                        <input type="checkbox" name="check[]"
                                                            data-id="{{ $product->id }}" class="cus-checkbox">
                                                    @else
                                                        <input type="checkbox" name="check[]"
                                                            data-id="{{ $product->id }}" class="cus-checkbox" checked>
                                                    @endif
                                                </div>
                                                <div class="cart-body-name">
                                                    <div class="cart-image">
                                                        <img src="{{ asset('image/product/' . $item->image[0]->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="name-info">
                                                        {{ $product->name }}
                                                    </div>
                                                </div>
                                                <div class="cart-body-price">$
                                                    {{ number_format($product->price * ((100 - $product->discount) / 100), 2) }}
                                                </div>
                                                <div class="cart-body-qty">
                                                    <div class="qty-quanity">
                                                        <div class="qty-minus"><i class="fa-solid fa-minus"></i></div>
                                                        <div class="quanity" id="qty">{{ $item->quanity }}</div>
                                                        <div class="qty-plus"><i class="fa-solid fa-plus"></i></div>
                                                    </div>

                                                </div>
                                                <div class="cart-body-total">$
                                                    {{ number_format($item->price * ((100 - $item->discount) / 100), 2) * $item->quanity }}
                                                </div>
                                                <div class="cart-body-trash">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                                    <a href="{{ route('user/index') }}" class="btn btn-primary mt-4"><i
                                            class="fa-solid fa-chevron-left"></i> Tiếp tục mua sắm</a>
                            </div>
                            @endif

                            @if ($listCart != null)
                                <div class="col-md-12">
                                    <a href="{{ route('user/index') }}" class="btn btn-primary"><i
                                            class="fa-solid fa-chevron-left"></i> Tiếp tục mua sắm</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- phần tổng tiền giỏ hàng --}}
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-12 bg-white p-4 mb-1">
                            <p class="col-12 font-bold">Location</p>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-location-dot me-2"></i>
                                Phường Tân Quy, Quận 7, TP.HCM
                            </div>
                        </div>
                        <div class="cart-total bg-white col-12 p-4">
                            <h5>Order Summary</h5>
                            <hr>
                            <div class="d-flex mb-2">
                                <div class="col-9">Subtotal (<span id="qty-provisional"></span> items) </div>
                                <div class="col-3 text-end">$ 72</div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="col-9">Shipping Fee </div>
                                <div class="col-3 text-end">$ 0</div>
                            </div>
                            <div class="d-flex mb-5">
                                <input type="text" name="voucher-inp" class="form-control me-1">
                                <button class="btn btn-success">Apply</button>
                            </div>
                            <hr>
                            <div class="d-flex mt-2">
                                <div class="col-9">Total </div>
                                <div class="col-3 text-end">$ 72</div>
                            </div>
                        </div>
                        <a href="{{ route('checkout/checkout-process') }}" class="btnSubmitCart">Confirm cart (2)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>
@endsection

@section('myjs')
<script>
    $(document).ready(function() {

        $("#select_all").change(function() {
            $(".cus-checkbox").prop('checked', $(this).prop("checked"));
        });

    });
</script>
@endsection
