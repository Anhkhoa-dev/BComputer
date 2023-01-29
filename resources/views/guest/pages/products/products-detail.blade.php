{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
@section('title')
    {{ $prod->name }} | BComputer
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">{{ $collections->name }}</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">{{ $prod->name }}</a>
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')
<div class="han-product-detail pt-2">
    <div class="container">
        <div class="row">
            <div class="banner">
                <div class="col-md-8">
                    <div class="product-name">{{ $prod->name }}</div>
                </div>
                <div class="col-md-4">
                    <div class="likeproduct">
                        <i id="like" onclick="myFunction()" class="fa-solid fa-heart"></i>
                        Like Product
                    </div>
                </div>
            </div>
            <hr style="margin-top:-10px">
        </div>
        <div class="row">
            <div class="w3-content w3-display-container col-lg-5">
                @foreach ($image as $item)
                    <img class="mySlides" src="{{ asset('image/product/' . $item->image) }}"
                        style="width:500 ; height:500">
                @endforeach



                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                <div class="w3-row-padding w3-section">
                    <?php $index = 0; ?>
                    @foreach ($image as $item)
                        <div class="w3-col s3">
                            <img class="demo w3-opacity w3-hover-opacity-off"
                                src="{{ asset('image/product/' . $item->image) }}" style="width:100%;cursor:pointer"
                                onclick="currentDiv({{ $index }})">
                        </div>
                        <?php $index++; ?>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 form">
                <div class="col-md-12">
                    <div class="price" style="color:#d21212">2.000.000 <span>₫</span></div>
                </div>
                <div class="col-md-12">
                    <div class="button-product">
                        <div style="background-color:#fb6e2e"><a href="#">BUY NOW</a></div>
                        <div style="background-color:#2f90ed"><a href="#">ADD TO CART</a>
                        </div>
                    </div>
                    <div class="contact">
                        Contact to buy now 0865 677 010 (07:30-22:00)
                    </div>
                </div>
                <div class="detail">
                    Detailed configuration
                </div>
                <div class="col-md-12">
                    <div class="details">
                        <div class="col-md-7">
                            <ul><strong>Product</strong></ul>
                            <ul><strong>Manufacturer</strong></ul>
                            <ul><strong>Model</strong></ul>
                            <ul><strong>Socket</strong></ul>
                            <ul><strong>Base speed</strong></ul>
                            <ul><strong>Cache</strong></ul>
                            <ul><strong>CPU</strong></ul>
                            <ul><strong>Thread CPU</strong></ul>
                            <ul><strong>Graphics processor</strong></ul>
                            <ul><strong>Memory support</strong></ul>
                            <ul><strong>Maximum voltage consumption</strong></ul>
                            <ul><strong>Maximum temperature</strong></ul>
                        </div>
                        <div class="col-md-5">
                            <ul>Processor CPU</ul>
                            <ul>Intel</ul>
                            <ul>Intel Core™ i5-13400f</ul>
                            <ul>FCLGA1700</ul>
                            <ul>3.3 GHz</ul>
                            <ul>20 MB</ul>
                            <ul>10 Core</ul>
                            <ul>16 Thread</ul>
                            <ul>Not supported</ul>
                            <ul>Maximum 128 GB</ul>
                            <ul>65W</ul>
                            <ul>100 degrees Celsius </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="col-md-12" style="margin-top: 50px">
                    <div>
                        <i class="fa-solid fa-truck-fast"></i>
                        <h6>FREE SHIPPING</h6>
                        <div>On Order Over $99</div>
                        <div>Lorem Ipsum is simply dummy</div>
                        <div>Text of the printing</div>
                        <hr>
                    </div>
                    <div>
                        <i class="fa-solid fa-gift"></i>
                        <h6>SPECAIL OFFER</h6>
                        <div>Get a gift!</div>
                        <div>Lorem Ipsum is simply dummy</div>
                        <div>Text of the printing</div>
                        <hr>
                    </div>
                    <div>
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                        <h6>ORDER RETURN</h6>
                        <div>Return within 7 days</div>
                        <div>Lorem Ipsum is simply dummy</div>
                        <div>Text of the printing</div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="description">
            <div class="name-doc">
                <button class="w3-bar-item w3-button" style="border:none"
                    onclick="openTab('description')">Description</button>
                <button class="w3-bar-item w3-button" style="border:none" onclick="openTab('review')">Review</button>
            </div>

            <div id="description" class="w3-container city">
                <p>{{ $prod->description }}</p>
            </div>

            <div id="review" class="w3-container city review">
                <ul>
                    <td>Name*
                        <input type="text">
                    </td>
                </ul>
                <ul>
                    <td>Email*
                        <input type="text">
                    </td>
                </ul>
                <ul>
                    <td>Reivew
                        <input type="text" style="height:150px">
                    </td>
                </ul>
                <ul>
                    <button type="submit" class="w3-bar-item w3-button" style="border:none">submit</button>
                </ul>
            </div>
        </div>
        {{-- Sản phẩm cùng giá --}}
        <section>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between align-itmes-center">

                    @if (count($listSamePrice) >= 1)
                        <div class="title">
                            <img src="{{ asset('image/icon/002-new.png') }}" alt="" width="30">
                            Same Price Product
                        </div>
                        <div class="view_all">
                            <a href="#">View all</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div id="same-price" class="owl-carousel owl-theme">
                        @foreach ($listSamePrice as $item)
                            <div class="item">
                                <div class="home-card">
                                    <div class="card_image">
                                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}">
                                            <img src="{{ asset('image/product/' . $item->image[0]->image) }}"
                                                class="img-fluid" alt="{{ $item->name }}">
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
                                        <div class="product_rate">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </div>
                                        <div class="product_price">
                                            $ {{ $item->price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        {{-- Sản phẩm liên quan --}}
        <section>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between align-itmes-center">
                    @if (count($listRelated) > 1)
                        <div class="title">
                            <img src="{{ asset('image/icon/002-new.png') }}" alt="" width="30">
                            Related product
                        </div>
                        <div class="view_all">
                            <a href="#">View all</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div id="related-product" class="owl-carousel owl-theme">
                        @foreach ($listRelated as $item)
                            <div class="item">
                                <div class="home-card">
                                    <div class="card_image">
                                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}">
                                            <img src="{{ asset('image/product/' . $item->image[0]->image) }}"
                                                class="img-fluid" alt="{{ $item->name }}">
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
                                        <div class="product_rate">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </div>
                                        <div class="product_price">
                                            $ {{ $item->price }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('myjs')
<script>
    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-opacity-off";
    }

    var owl_carousel_big_discount = $('#same-price');
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
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    var owl_carousel_related = $('#related-product');
    owl_carousel_related.owlCarousel({
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

    function myFunction() {
        document.getElementById("like").style.color = "red";
    }

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }

    function openTab(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
</script>
@endsection
