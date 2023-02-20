{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')
{{-- Hiển thị tile tabweb --}}
@section('title')
    Searh product | BComputer
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">Result search</a>
    {{-- <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">{{ $title }}</a> --}}
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')

<div class="container-md">
    <div class="row">
        <div class="col-md-12">
            @include('guest.pages.products.sec-locsanpham-laptop')
        </div>
        <div class="col-md-12 mt-5">
            <div class="d-flex justify-content-between align-items-center py-2">
                @if (count($data) == 0)
                    <div> There are no products in the selected category</div>
                @else
                    <div>Result: {{ count($data) }} product</div>
                @endif

                <div class="d-flex justify-content-between align-items-center ">
                    <div class="me-2">Sorted by: </div>
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
            <div id="resutl-product">

            </div>
            {{-- @if (count($data) > 0)
                <div class="products">
                    @foreach ($data as $item)
                        <div class="card-product">
                            <div class="card-body">
                                <div class="card-image">
                                    <img src="{{ asset('image/product/' . $item->image) }}" alt="{{ $item->name }}"
                                        class="img-fluid">
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
                                    <a href="{{ route('user/detail', ['name' => $item['slug']]) }}"
                                        title="{{ $item->name }}">{{ $item->name }}</a>
                                </div>
                                <div class="card-price">
                                    <div class="old-price">$ {{ $item->price }}</div>
                                    <div class="new-price">$
                                        {{ number_format($item->price * ((100 - $item->discount) / 100), 2) }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Không tìm tấy kết quả phù hợp. Vui lòng tìm kiếm với từ khóa khác.</p>
            @endif --}}

        </div>
        {{-- navigation --}}
    </div>
</div>
@endsection
