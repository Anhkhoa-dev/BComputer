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
            <div class="w3-content w3-display-container col-lg-5">
                @foreach ($image as $item)
                    <img class="mySlides" src="{{ asset('image/product/' . $item->image) }}">
                @endforeach
                <button class="button-icon w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="button-icon w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                <div class="w3-row-padding w3-section">
                    <?php $index = 0; ?>
                    @foreach ($image as $item)
                        <div class="w3-col s3">
                            <img class="image-details w3-opacity w3-hover-opacity-off"
                                src="{{ asset('image/product/' . $item->image) }}"
                                onclick="currentDiv({{ $index }})">
                        </div>
                        <?php $index++; ?>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7 form">
                <div class="banner">
                    <div class="col-md-12">
                        <div class="product-name">{{ $prod->name }}</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="">
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                5 review</a>
                        </div>
                        <div class="col-md-4">
                            <div class="likeproduct">
                                <a href="">
                                    <i id="heart" onclick="myFunction()" class="fa-solid fa-heart"></i>
                                    Like Product
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="price">2.000.000<span>₫</span>
                        <span class="discount-percent">-20%</span>
                        <div class="discountprice">2.500.000₫</div>
                        <div class="col-md-12">
                            <div class="button-product">
                                <div class="buynow"><a href="#"><b>BUY NOW</b></a></div>
                                <div class="addtocart"><a href="#"><b>ADD TO CART</b></a></div>
                            </div>
                            <div class="contact">
                                Contact to buy now <span> 0865 677 010 </span> (07:30-22:00)
                                <div class="col-md-12">
                                    <div class="icon">
                                        <div><i class="fa-solid fa-truck-fast"></i></div>
                                        <div><i class="fa-solid fa-gift"></i></div>
                                        <div><i class="fa-solid fa-arrow-rotate-left"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="details">
                                        <div class="col-md-4">
                                            <div class="service-title">FREE SHIPPING</div>
                                            <div class="service-info">On Order Over $99
                                                Lorem Ipsum is simply dummy Text
                                                of the printing
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="service-title">SPECAIL OFFER</div>
                                            <div class="service-info">Get a gift! Lorem Ipsum is simply dummy Text of
                                                the printing</div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="service-title">ORDER RETURN</div>
                                            <div class="service-info">Return within 7 days Lorem Ipsum is simply dummy
                                                Text of the printing
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <b> Configuration {{ $prod->name }}</b>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion" id="accordionExample">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>Product</td>
                                                            <td>Processor CPU</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Manufacturer</td>
                                                            <td>Intel</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>Intel Core™ i5-13400f</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Socket</td>
                                                            <td>FCLGA1700</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Base speed</td>
                                                            <td>3.3 GHz</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cache</td>
                                                            <td>20 MB</td>
                                                        </tr>
                                                        <tr>
                                                            <td>CPU</td>
                                                            <td>10 Core</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Thread CPU</td>
                                                            <td>16 Thread</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Graphics processor</td>
                                                            <td>Not supported</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Memory support</td>
                                                            <td>Maximum 128 GB</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Maximum voltage consumption</td>
                                                            <td>65W</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Maximum temperature</td>
                                                            <td>100 degrees Celsius</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="description col-md-12">
            <div class="name-doc">
                <button class="w3-bar-item w3-button" style="border:none"
                    onclick="openTab('description')">Description</button>
                <button class="w3-bar-item w3-button" style="border:none" onclick="openTab('review')">Review</button>
            </div>
            <div id="description" class="w3-container city">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <p>{{ $prod->description }}</p>
                        </div>
                        <div class="col-md-4">
                            <h1>Cột 4 nằm đây</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="review" class="w3-container city review">
                <h3>Review {{ $prod->name }}</h3>
                <span class="iconstar">4,5</span>
                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                5 review
                <hr>
                <div class="col-md-12">
                    <form action="">
                        <div class="review-info">
                            <span class="review-name">Le Van A</span>
                            <i class="fa fa-check-circle icon-bought" aria-hidden="true"></i><span
                                class="bought-info">
                                bought at Bcomputer</span>
                            <div>
                                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                                <p>Dùng tốt ạ máy rất nhạy đẹp sang tính năng nhiều</p>
                                <div class="col-md-12">
                                    @foreach ($image as $item)
                                        <img src="{{ asset('image/product/' . $item->image) }}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="comment-text">
                                <i class="fa fa-user" aria-hidden="true">Seller Response</i>
                                <div>cảm ơn quý khách đã ủng hộ shop</div>
                            </div>
                            <div class="like-icon col-md-8">
                                <div class="form-likeicon">
                                    <span id="like" onclick="myFunctionlike()">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        <span>Like</span>
                                    </span>
                                    <span data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        <span>Comment</span>
                                    </span>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                                            <label class="form-label" for="form4Example3"></label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
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
        showDivs(slideIndex = n + 1);
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

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function myFunction() {
        document.getElementById("heart").style.color = "red";
    }

    function myFunctionlike() {
        document.getElementById("like").style.color = "#0F3460";
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
