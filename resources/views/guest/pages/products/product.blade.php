{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master') 
{{-- Hiển thị tile tabweb --}}
@section('title')
    {{$title}} | BComputer
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')  
    @section('breadcrumb')
        <a href="#" class="bc-items">category</a>
        <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
        <a href="#" class="bc-items">{{$title}}</a>
    @endsection
    @include('guest.pages.section.sec-thanhdieuhuong')

    <div class="container-md">
       <div class="row">
        <div class="col-md-12 product-filter">
            phần dành cho bộ lọc
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center py-2">
            <div>12 sản phẩm</div>
            <div class="d-flex justify-content-between align-items-center ">
                <div class="me-2">Sắp xếp theo: </div>
                <div class="sort-options">
                    <select name="" id="" class="form-control">
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
                <div class="product-card">
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="">
                            </div>
                            <div class="hover">
                                <div class="hover-sosanh"><i class="fa-solid fa-plus"></i></div>
                                <div class="hover-xemnhanh"><i class="fa-brands fa-searchengin"></i></div>
                                <div class="hover-viewdetail"><i class="fa-solid fa-eye"></i></div>
                                <div class="hover-addtocart"><i class="fa-solid fa-bag-shopping"></i></div>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                product name
                            </div>
                            <div class="card-price">
                                <div class="old-price">$ 90</div>
                                <div class="new-price">$ 72</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>  
    </div>
@endsection

