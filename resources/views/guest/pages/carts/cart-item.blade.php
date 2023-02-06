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
                @if ($cart != null)
                    <p class="cart-terms-purchase">(*) Số lượng mua cho 1 sản phẩm tối đa là 5</p>
                @else
                    <p class="cart-terms-purchase"></p>
                @endif
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="cart-items mb-1">
                                <div class="cart-header bg-white mb-2">    
                                    <div class="select-item-cart">
                                        <input type="checkbox" id="select_all"
                                            class="select-item-cart cus-checkbox" data-id="all" />
                                    </div>
                                    <div class="cart-header-name">Select all <span
                                            id="qty-cart-total">{{ $cart['qty'] }}</span>
                                        product</div>
                                    <div class="cart-header-price">Price</div>
                                    <div class="cart-header-qty">Quanity</div>
                                    <div class="cart-header-total">Total</div>
                                    <div class="cart-header-trash"><i class="fa-solid fa-trash-can"></i></div>
                                </div>
                                @if ($cart != null)
                                    <div id="list-cart-item" class="list-cart-item mb-2">
                                        @foreach ($cart['cart'] as $item)
                                            <?php $product = $item['product'];
                                            $image = $item['image'];
                                            $id = $item['id'];
                                            ?>
                                            <div class="cart-body">
                                                <div class="select-item-cart">
                                                    @if ($product['status'] == 0 || $item['hethang'])
                                                        <input type="checkbox" name="check[]"
                                                            data-id="{{ $id}}"
                                                            class="select-item-cart cus-checkbox">
                                                    @else
                                                        <input type="checkbox" name="check[]"
                                                            data-id="{{ $id }}"
                                                            class="select-item-cart cus-checkbox cus-checkbox-checked"
                                                            checked>
                                                    @endif
                                                </div>
                                                <div class="cart-body-name">
                                                    <div class="cart-image">
                                                        <img src="{{ asset('image/product/' . $image[0]->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="name-info">
                                                        {{ $product->name }}
                                                    </div>
                                                </div>
                                                @if ($product['status'] == 0)
                                                    <div class="out-of-stock w-50 text-center"
                                                        data-id="{{ $product->id }}">
                                                        <p>NGỪNG KINH DOANH</p>
                                                    </div>
                                                @else
                                                    <div class="cart-body-price">$
                                                        {{ number_format($product->price * ((100 - $product->discount) / 100), 2) }}
                                                    </div>

                                                    @if ($item['hethang'])
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="out-of-stock text-center" style="width: 280px"
                                                                data-id="{{ $product->id }}">
                                                                <p>TẠM HẾT HÀNG</p>
                                                            </div>
                                                            <div class="cart-body-trash">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="cart-body-qty">
                                                            <div class="qty-quanity">
                                                                <div class="update-qty minus" data-id="{{$id}}">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </div>
                                                                <div id="qty" data-id="{{$id}}" class="qty-quanity-sl qty-item_{{$id}}">
                                                                    {{ $item['sl'] }}
                                                                </div>
                                                                <div class="update-qty plus" data-id="{{$id}}">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cart-body-total">$
                                                            <span class="thanhtien" data-id="{{$id}}">{{ number_format($item['thanhtien'], 2) }}</span>
                                                        </div>
                                                        <div class="cart-body-trash" id="delete-item-cart" data-id="{{ $id }}" data-name="{{$product->name}}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                                    <a href="{{ route('user/index') }}" class="btn btn-primary mt-4"><i
                                            class="fa-solid fa-chevron-left"></i> Tiếp tục mua sắm</a>
                                 </div>
                            @endif

                            @if ($cart['qty'] == 0)
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
                            @if ($cart['address'] != null)
                                @foreach ($cart['address'] as $item)
                                    @if ($item->status == 1)
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-location-dot me-2"></i>
                                            {{ $item->address }}, {{ $item->wards }}, {{ $item->district }},
                                            {{ $item->province }}
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <p>Chưa có địa chỉ</p>
                            @endif

                        </div>
                        <div class="cart-total bg-white col-12 p-4">
                            <h5>Order Summary</h5>
                            <hr>
                            <div class="d-flex mb-2">
                                <div class="col-9">Subtotal </div>
                                <div class="col-3 text-end" id="total-provisional"> </div>
                            </div>
                            {{-- <div class="d-flex mb-4">
                                <div class="col-9">Shipping Fee </div>
                                <div class="col-3 text-end">$ 0</div>
                            </div> --}}
                            <div class="d-inline mb-5">
                                <label for="">Voucher</label>
                                <div class="d-flex mt-2">
                                    <input type="text" name="voucher-inp" class="form-control me-1">
                                    <button class="btn btn-success">Apply</button>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="d-flex mt-2">
                                <div class="col-9">Total </div>
                                <div class="col-3 text-end" id="totalOrder"></div>
                            </div>
                        </div>
                        <a href="{{ route('checkout/checkout-process') }}" class="btnSubmitCart">Confirm cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>

<div class="modal" id="delete-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="delete-content"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="delete-body"></p>
        </div>
        <div class="modal-footer">
          <div  class="btn btn-secondary" data-bs-dismiss="modal">Close</div>
          <div  class="btn btn-danger" id="delete-btn">Delete</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('myjs')
<script>
    // $(document).ready(function() {

    //     $("#select_all").change(function() {
    //         $(".cus-checkbox").prop('checked', $(this).prop("checked"));
    //     });

    // });
</script>
@endsection
