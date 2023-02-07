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
                <div>Your code order</div>
                <div class="box-order-success">
                    #10
                </div>
                <div>You can watch it again</div>
                <a href="#" class="order-my">My Order</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('user/index') }}" class="btn-continue">Continue shopping</a>
            </div>
        </div>

    </div>
</div>

@include('guest.elements.footer-link')
