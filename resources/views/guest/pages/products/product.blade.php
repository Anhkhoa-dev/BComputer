{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')
{{-- Hiển thị tile tabweb --}}
@section('title')
    {{ $title }} | BComputer
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">Category</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">{{ $title }}</a>
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')

<div class="container-md">
    <div class="row">
        <div class="col-md-12">
            @include('guest.pages.products.sec-locsanpham-laptop')
        </div>
        <div class="col-md-12 mt-5">
            <div class="d-flex justify-content-between align-items-center py-2">
                @if (count($listProductByCategory) == 0)
                    <div> There are no products in the selected category</div>
                @else
                    <div> {{ count($listProductByCategory) }} product</div>
                @endif

                <div class="d-flex justify-content-between align-items-center ">
                    <div class="me-2">Sắp xếp theo: </div>
                    <div class="sort-options">
                        <select name="" id="" class="form-select">
                            <option value="">Price: Ascending</option>
                            <option value="">Price: Decrease</option>
                            <option value="">Name: A-Z</option>
                            <option value="">Name: Z-A</option>
                            <option value="">Items: Oldest</option>
                            <option value="">Items: Lastest</option>
                            <option value="">Best seller</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-12">
            <div class="products">
                @foreach ($listProductByCategory as $item)
                    <div class="card-product">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="{{ asset('image/product/' . $item->image[0]->image) }}"
                                    alt="{{ $item->name }}" class="img-fluid">
                                <div class="hover-icons">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="hover-sosanh" title="Product comparison"><i
                                                class="fa-solid fa-plus"></i>
                                        </div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="hover-xemnhanh" title="Quick view"><i
                                                class="fa-brands fa-searchengin"></i>
                                        </div>
                                    </a>
                                    <a href="{{ route('user/detail', ['name' => $item['slug']]) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="hover-viewdetail" title="Product detail"><i
                                                class="fa-solid fa-eye"></i>
                                        </div>
                                    </a>
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}"
                                            class="card_product_id_{{ $item->id }}">
                                        <input type="hidden" value="1"
                                            class="card_product_qty_{{ $item->id }}">

                                        <button type="button" class="add-cart btn-add-cart"
                                            data-id="{{ $item->id }}">
                                            <div class="hover-addtocart" title="Add to cart">
                                                <i class="fa-solid fa-bag-shopping"></i>
                                            </div>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a
                                    href="{{ route('user/detail', ['name' => $item['slug']]) }}">{{ $item->name }}</a>
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ {{ $item->price }}</div>
                                <div class="new-price">$ {{ number_format($item->price * ((100 - $item->discount) / 100), 2) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @if (count($listProductByCategory) > 0)
            <div class="col-md-12 mt-3">
                <nav aria-label="Page navigation example ml-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
        {{-- navigation --}}
    </div>
</div>
@endsection

@section('myjs')
<script>
    $(document).ready(function() {
        $('.filter-item_title').click(function() {
            $('.filter-item_dropdown').addClass('show');
        });

        // Hàm add to cart
        $(".btn-add-cart").click(function() {
            var $url = "{{ url('/add-to-cart') }}";
            var id = $(this).data("id");
            var card_product_id = $('.card_product_id_' + id).val();
            var card_product_qty = $('.card_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: $url,
                type: "POST",
                data: {
                    card_product_id: card_product_id,
                    card_product_qty: card_product_qty,
                    _token: _token,
                },
                success: function(data) {
                    if(data['status'] == 1){
                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonClass: "btn-primary",
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "http://127.0.0.1:8000/cart-items";
                        });
                    }else{
                        window.location.href = "http://127.0.0.1:8000/login";
                    }
                },
            });
        });
    });
</script>
@endsection
