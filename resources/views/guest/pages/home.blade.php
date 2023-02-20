{{-- kế thừa layout --}}
@extends('guest.elements.master')

{{--  Kế thừa title --}}
@section('title')
    BComputer - Thế Giới Công nghệ
@endsection

{{-- // Nội dung --}}
@section('user-contents')
    <div class="khoa-banner">
        <div class="container-md">
            <div class="row">
                <div class="col-md-3">
                    <div class="col-12">
                        {{-- import trang đã tách ra vào lại trang home --}}
                        @include('guest.pages.sidebar.sidebar')
                    </div>
                </div>
                <div class="col-md-9 pt-4 pb-0">
                    <div class="col-md-12">
                        <div class="row">
                            @include('guest.pages.sidebar.banner')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="flash-delas">
        <div class="container-xl">
            <div class="row">
                <div class="on_sale col-md-12">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="title">
                            <i class="fa-solid fa-bolt"></i>
                            Flash Delas
                        </div>
                    </div>
                    <div class="view_all">
                        <a href="#">View all</a>
                    </div>
                </div>

                <div class="col-md-12 mt-1 py-3">
                    @include('guest.pages.flashDelas')
                </div>
            </div>
        </div>
    </section>

    {{-- // Top catagory --}}
    <section class="mt-5">
        <div class="container-md">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <i class="fa-solid fa-border-all"></i>
                        Top Categories
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <a href="#">
                                    <img src="{{ asset('image/banner/banner_chay_1.jpg') }}" alt=""
                                        class="w-100 h-100">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <a href="#">
                                    <img src="{{ asset('image/banner/banner_chay_4.png') }}" alt=""
                                        class="w-100 h-100">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <a href="#">
                                    <img src="{{ asset('image/banner/banner_chay_6.png') }}" alt=""
                                        class="w-100 h-100"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    {{-- New Product --}}
    <section>
        <div class="container-md">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between align-itmes-center">
                    <div class="title">
                        <img src="{{ asset('image/icon/002-new.png') }}" alt="" width="30">
                        New Product
                    </div>
                    <div class="view_all">
                        <a href="#">View all</a>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div id="new-product" class="new_arrivals owl-carousel owl-theme">
                        @foreach ($newproduct as $item)
                            <div class="item">
                                <div class="home_card">
                                    <div class="card_img">
                                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}">
                                            <img src="{{ asset('image/product/' . $item->image) }}"
                                                alt="{{ $item->name }}" class="img__full cursor-pointer">
                                        </a>
                                    </div>
                                    <div class="card_info">
                                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}"
                                            class="card_info-name" title="{{ $item->name }}">{{ $item->name }}</a>
                                        <div class="card_info-price">$
                                            {{ number_format($item->price * ((100 - $item->discount) / 100), 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- Big Discount --}}
    <section>
        <div class="container-md">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between align-itmes-center">
                    <div class="title">
                        <img src="{{ asset('image/icon/002-new.png') }}" alt="" width="30">
                        Products Featured
                    </div>
                    <div class="view_all">
                        <a href="#">View all</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="big-discount" class="owl-carousel owl-theme">
                        @foreach ($list_Featured as $item)
                            <div class="item">
                                <div class="home-card">
                                    <div class="card_image">
                                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}">
                                            <img src="{{ asset('image/product/' . $item->image) }}" class="img-fluid"
                                                alt="{{ $item->name }}">
                                        </a>
                                        <div class="sale_off">
                                            <p>{{ $item->discount }}% Off</p>
                                        </div>
                                        <div class="p_like">
                                            <a href="#" class="p_like_sosanh" title="product comparison">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                            <a href="#" class="p_like_heart">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card_info">
                                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}"
                                            class="product_name" title="{{ $item->name }}">{{ $item->name }}</a>
                                        <div class="card_info-price-rate">
                                            <div class="product_rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <div class="product_price">
                                                $ {{ number_format($item->price, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </section>

    <section class="mb-3">
        <div class="container-md">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between align-itmes-center">
                    <div class="title">
                        <img src="{{ asset('image/icon/002-new.png') }}" alt="" width="30">
                        Brands
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="logo-brands">
                            @foreach ($logoBrand as $item)
                                <a href="" class="text-decoration-none">
                                    <div class="brand-img">
                                        <img src="{{ asset('image/logo/' . $item->image) }}"
                                            alt="{{ $item->name }}" />
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('myjs')
    <script>
        //slide banner
        var owl_carousel_banner = $('#banner');
        owl_carousel_banner.owlCarousel({
            loop: true,
            margin: 15,
            // nav:true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        // slide flash delas
        var owl_carousel_flashdelas = $('#flash-delas');
        owl_carousel_flashdelas.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            // nav:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

        $('#new-product').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            // nav:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        // slide flash delas
        var owl_carousel_big_discount = $('#big-discount');
        owl_carousel_big_discount.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            // nav:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        });
    </script>
@endsection
