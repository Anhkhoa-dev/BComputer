{{-- @extends('guest.elements.master') --}}
@include('guest.elements.head')
@section('title')
    Order placed successfully | BComputer
@endsection

    <div class="checkout-success">
            <div class="box-success">
                <div class="box-success-check">
                    <i class="fa-regular fa-circle-check"></i>
                    <div class="thankyou">
                        Thank you for shopping at BComputer
                    </div>
                </div>
                <div class="success-nextpage">
                    <div class="">
                        <div>Mã đơn hàng của bạn</div>
                        <div class="box-order-success">
                            #10
                        </div>
                        <div>Bạn có thể xem lại</div>
                        <a href="#" class="order-my">Đơn hàng của tôi</a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('user/index')}}" class="btn-continue">Tiếp tục mua sắm</a>
                    </div>
                </div>

            </div>
    </div>
    
@include('guest.elements.footer-link')
    

