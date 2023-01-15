{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')
{{-- Hiển thị tile tabweb --}}
@section('title')
    Product | BComputer
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">category</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items">Product</a>
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')

<div class="container-md">
    <div class="row">
        <div class="col-md-12">
            @include('guest.pages.products.sec-locsanpham-laptop')
        </div>
        <div class="col-md-12 mt-5">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div>12 sản phẩm</div>
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
                <div class="card-product">
                    <a href="#">
                        <div class="card-image">
                            <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""
                                class="img-fluid">
                            <div class="hover-icons">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-sosanh" title="So sánh "><i class="fa-solid fa-plus"></i></div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-xemnhanh" title="Xem nhanh"><i
                                            class="fa-brands fa-searchengin"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-viewdetail" title="Chi tiết sản phẩm"><i
                                            class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-addtocart" title="Add to cart"><i
                                            class="fa-solid fa-bag-shopping"></i></div>
                                </a>
                            </div>
                        </div>
                    </a>

                    <div class="card-info">
                        <div class="card-title">
                            <a href="#">Product name</a>
                        </div>
                        <div class="card-price">
                            <div class="old-price">$ 90</div>
                            <div class="new-price">$ 72</div>
                        </div>
                    </div>
                </div>
                <div class="card-product">
                    <a href="#">
                        <div class="card-image">
                            <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""
                                class="img-fluid">
                            <div class="hover-icons">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-sosanh" title="So sánh "><i class="fa-solid fa-plus"></i></div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-xemnhanh" title="Xem nhanh"><i
                                            class="fa-brands fa-searchengin"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-viewdetail" title="Chi tiết sản phẩm"><i
                                            class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-addtocart" title="Add to cart"><i
                                            class="fa-solid fa-bag-shopping"></i></div>
                                </a>
                            </div>
                        </div>
                    </a>

                    <div class="card-info">
                        <div class="card-title">
                            <a href="#">CPU Intel Core i9 12900k Box Chính Hãng </a>
                        </div>
                        <div class="card-price">
                            <div class="old-price">$ 90</div>
                            <div class="new-price">$ 72</div>
                        </div>
                    </div>
                </div>
                <div class="card-product">
                    <a href="#">
                        <div class="card-image">
                            <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""
                                class="img-fluid">
                            <div class="hover-icons">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-sosanh" title="So sánh "><i class="fa-solid fa-plus"></i></div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-xemnhanh" title="Xem nhanh"><i
                                            class="fa-brands fa-searchengin"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-viewdetail" title="Chi tiết sản phẩm"><i
                                            class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-addtocart" title="Add to cart"><i
                                            class="fa-solid fa-bag-shopping"></i></div>
                                </a>
                            </div>
                        </div>
                    </a>

                    <div class="card-info">
                        <div class="card-title">
                            <a href="#">Product name</a>
                        </div>
                        <div class="card-price">
                            <div class="old-price">$ 90</div>
                            <div class="new-price">$ 72</div>
                        </div>
                    </div>
                </div>
                <div class="card-product">
                    <a href="#">
                        <div class="card-image">
                            <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""
                                class="img-fluid">
                            <div class="hover-icons">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-sosanh" title="So sánh "><i class="fa-solid fa-plus"></i></div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-xemnhanh" title="Xem nhanh"><i
                                            class="fa-brands fa-searchengin"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-viewdetail" title="Chi tiết sản phẩm"><i
                                            class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-addtocart" title="Add to cart"><i
                                            class="fa-solid fa-bag-shopping"></i></div>
                                </a>
                            </div>
                        </div>
                    </a>

                    <div class="card-info">
                        <div class="card-title">
                            <a href="#">Product name</a>
                        </div>
                        <div class="card-price">
                            <div class="old-price">$ 90</div>
                            <div class="new-price">$ 72</div>
                        </div>
                    </div>
                </div>
                <div class="card-product">
                    <a href="#">
                        <div class="card-image">
                            <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt=""
                                class="img-fluid">
                            <div class="hover-icons">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-sosanh" title="So sánh "><i class="fa-solid fa-plus"></i></div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-xemnhanh" title="Xem nhanh"><i
                                            class="fa-brands fa-searchengin"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-viewdetail" title="Chi tiết sản phẩm"><i
                                            class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="hover-addtocart" title="Add to cart"><i
                                            class="fa-solid fa-bag-shopping"></i></div>
                                </a>
                            </div>
                        </div>
                    </a>

                    <div class="card-info">
                        <div class="card-title">
                            <a href="#">Product name</a>
                        </div>
                        <div class="card-price">
                            <div class="old-price">$ 90</div>
                            <div class="new-price">$ 72</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- navigation --}}
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

    </div>
</div>
@endsection

@section('myjs')
<script>
    $(document).ready(function() {
        $('.filter-item_title').click(function() {
            $('.filter-item_dropdown').addClass('show');
        });
    });
</script>
@endsection
