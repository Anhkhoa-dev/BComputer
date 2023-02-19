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
        <div class="row frame-fisrt">
            <div class="w3-content w3-display-container col-lg-5">
                @foreach ($image as $item)
                    <img class="mySlides" src="{{ asset('image/product/' . $item->image) }}">
                @endforeach
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
            <div class="col-lg-7 form-product-detail">
                <div class="banner">
                    <div class="col-md-12">
                        <div class="product-name">{{ $prod->name }}</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <a class="from-product-icon" href="">
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                <i class="fa fa-star iconstar" aria-hidden="true"></i>
                                5 review
                            </a>
                        </div>
                        <div class="col-md-5">
                            <div class="likeproduct">
                                <a class="likeproduct-info from-product-icon" href="">
                                    <i id="heart" onclick="myFunction()" class="fa-solid fa-heart"></i>
                                    Like Product
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="price"><span>$</span>{{ $prod->price }}
                        <span class="discount-percent">-20%</span>
                        <div class="discountprice">
                            {{ number_format($prod->price * ((100 - $prod->discount) / 100), 2) }}</div>
                        @if ($prod->quantity > 0)
                            <div class="quantity">
                                Quantity :
                                <span class="buttons_added">
                                    <input class="minus is-form" type="button" value="-">
                                    <input aria-label="quantity" class="input-qty" max="50" min="1"
                                        name="product-quatity" type="text" value="1" pattern="[0-9]*">
                                    <input class="plus is-form" type="button" value="+">
                                </span>
                            </div>

                            <div class="col-md-12">
                                <div class="button-product">
                                    <div class="col-md-6 button-product-frame">
                                        <a class="btn buynow" id="buy-now" data-id="{{ $prod->id }}"
                                            href="#"><b>BUY NOW</b></a>
                                    </div>
                                    <div class="col-md-6 button-product-frame">
                                        <a class="btn addtocart add-to-cart" href="#"
                                            data-id="{{ $prod->id }}"><b>ADD TO CART</b></a>
                                    </div>
                                </div>
                            @else
                                <div class=""><a href=""
                                        class="btn btn-primary btn-lg not-available col-md-8 d-flex justify-content-center">Contact
                                        to order</a>
                                </div>
                        @endif
                        <div class="contact">
                            Contact to buy now <span class="number-hotline"> 0865 677 010 </span> (07:30-22:00)

                            <div class="col-md-12">
                                <div class="icon">
                                    <div><i class="fa-solid fa-truck-fast icon-contact"></i></div>
                                    <div><i class="fa-solid fa-gift icon-contact"></i></div>
                                    <div><i class="fa-solid fa-arrow-rotate-left icon-contact"></i></div>
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
                                        <div class="service-info">Get a gift! Lorem Ipsum is simply dummy
                                            Text of
                                            the printing</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service-title">ORDER RETURN</div>
                                        <div class="service-info">Return within 7 days Lorem Ipsum is simply
                                            dummy
                                            Text of the printing
                                        </div>
                                    </div>
                                </div>
                                <hr class="line">
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
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
                                                        <td>CPU</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_cpu'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>RAM</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_ram'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Storage drive</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_Storage'] : '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Graphics card</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_graphic_card'] : '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Screen display</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_screen'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Keyboard</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_keyboard'] : '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Audio</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_Audio'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wireless Connectivity & bluetooth</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_wireless'] : '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>USB Connect</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_webcam'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maximum voltage consumption</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_usb'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Operating system</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_window'] : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Power</td>
                                                        <td>{{ $cauhinh != '' ? $cauhinh['cauhinh_power'] : '' }}</td>
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

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="description col-12">
                    <div class="name-doc">
                        <button class="w3-bar-item w3-button button-color-decor" style="border:none"
                            onclick="openTab('description')">Description</button>
                        <button class="w3-bar-item w3-button button-color-decor" style="border:none"
                            onclick="openTab('review')">Review</button>
                    </div>
                    <div id="description" class="w3-container city">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 info-product">
                                    <p>{{ $prod->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="review" class="w3-container city review">
                        <div class="first-form">
                            <h3>Review {{ $prod->name }}</h3>
                            <span class="iconstar">4,5</span>
                            <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                            <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                            <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                            <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                            <i class="fa fa-1x fa-star iconstar" aria-hidden="true"></i>
                            5 review
                        </div>
                        <hr class="line-review">
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <img src="{{ asset('image/banner/banner_doc03.png') }}" alt="">
            </div>
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
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
    });

    $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })

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
        if (dots.length > 0) {
            dots[slideIndex - 1].className += " w3-opacity-off";
        }
    }

    function currentDiv1(n) {
        showDivs1(slideIndex1 = n + 1);
    }

    function showDivs1(n) {
        var i;
        var x = document.getElementsByClassName("mySlides1");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
            slideIndex1 = 1
        }
        if (n < 1) {
            slideIndex1 = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex1 - 1].style.display = "block";
        dots[slideIndex1 - 1].className += " w3-opacity-off";
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

    let slideIndex = 1;
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

    var acc = document.getElementById("accordion");
    var i;

    acc.addEventListener("click", function() {
        this.classList.toggle("active");
        let panel = document.querySelector(".panel");
        panel.style.display = "none";
        if (panel.style.display === "none") {
            panel.style.display = "block";
        }
    });
</script>
@endsection
