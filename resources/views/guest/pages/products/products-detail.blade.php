{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
@section('title')
    PRODUCT
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')

    <body>
        <div class="han-product-detail">
            <div class="container">
                <div class="row">
                    <div class="w3-content w3-display-container col-lg-5">
                        <img class="mySlides" src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}"
                            style="width:500 ; height:500">
                        <img class="mySlides" src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_02.png') }}"
                            style="width:500 ; height:500">
                        <img class="mySlides" src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}"
                            style="width:500 ; height:500">
                        <img class="mySlides" src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_02.png') }}"
                            style="width:500 ; height:500">

                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                    <div class="col-lg-5 form">
                        <div class="col-md-12">
                            <div class="product-name">
                                <div> Case 1st Player XF White 4 fan RBG</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="price" style="color:#d21212">$999.USD</div>
                        </div>
                        <div class="col-md-12">
                            <div class="button-product">
                                <div style="background-color:#fb6e2e"><a href="">BUY NOW</a></div>
                                <div style="background-color:#2f90ed"><a href="">ADD TO CART</a>
                                </div>
                            </div>
                            <div class="contact">
                                Contact to buynow 0865 677 010 (07:30-22:00)
                            </div>
                        </div>
                        <div class="detail">
                            CẤU HÌNH CHI TIẾT
                        </div>
                        <div class="col-md-12">
                            <div class="details">
                                <div class="col-md-5">
                                    <ul><strong>Sản phẩm</strong></ul>
                                    <ul><strong>Hãng sản xuất</strong></ul>
                                    <ul><strong>Model</strong></ul>
                                    <ul><strong>Socket</strong></ul>
                                    <ul><strong>Tốc độ cơ bản</strong></ul>
                                    <ul><strong>Cache</strong></ul>
                                    <ul><strong>Nhân CPU</strong></ul>
                                    <ul><strong>Luồng CPU</strong></ul>
                                    <ul><strong>Vi xử lý đồ họa</strong></ul>
                                    <ul><strong>Bộ nhớ hỗ trợ</strong></ul>
                                    <ul><strong>Điện áp tiêu thụ tối đa </strong></ul>
                                    <ul><strong>Nhiệt độ tối đa</strong></ul>

                                </div>
                                <div class="col-md-7">
                                    <ul>Bộ vi xử lý CPU</ul>
                                    <ul>Intel</ul>
                                    <ul>Intel Core™ i5-13400f</ul>
                                    <ul>FCLGA1700</ul>
                                    <ul>3.3 GHz</ul>
                                    <ul>20 MB</ul>
                                    <ul>10 Nhân</ul>
                                    <ul>16 Luồng</ul>
                                    <ul>Không hỗ trợ</ul>
                                    <ul>Tối đa 128 GB</ul>
                                    <ul>65W</ul>
                                    <ul>100 độ C/td>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <div class="col-md-12">
                            <div>
                                <h6>FREE SHIPPING</h6>
                                <div>On Order Over $99</div>
                                <div>Lorem Ipsum is simply dummy</div>
                                <div>Text of the printing</div>
                                <hr>
                            </div>
                            <div>
                                <h6>SPECAIL OFFER</h6>
                                <div>Get a gift!</div>
                                <div>Lorem Ipsum is simply dummy</div>
                                <div>Text of the printing</div>
                                <hr>
                            </div>
                            <div>
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
                        <button class="w3-bar-item w3-button" onclick="openTab('description')">Description</button>
                        <button class="w3-bar-item w3-button" onclick="openTab('review')">Review</button>
                    </div>

                    <div id="description" class="w3-container city">
                        <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, a t
                            everti
                            meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua,
                            duo ei
                            sonet choro facilisis, labores officiis torquatos cum ei.

                            Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda
                            ut
                            eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam
                            tota nostrum eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te
                            eam
                            iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus
                            scripserit, modus taria .

                            experian soleat maluisset per. Has eu idque similique, et blandit scriptorem tatibus mea.
                            Vis
                            quaeque ocurreret ea.cu bus scripserit, modus voluptaria ex per.</p>
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
                            <button type="submit">submit</button>
                        </ul>
                    </div>
                </div>
                <div class="name-doc container">
                    ✮✮Parity Product✮✮
                    <div class="parity-product row">
                        <div class="col-lg-2">
                            <a href="#">
                                <span class="discount-off">Discount 8%</span>
                                <img src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}">
                                <div class="discount-link-product">
                                    <a class="product-discount-name">CPU 4 fan best</a>
                                    <h6>$120</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a href="#">
                                <span class="discount-off">Discount 8%</span>
                                <img src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}">
                                <div class="discount-link-product">
                                    <a class="product-discount-name">CPU 4 fan best</a>
                                    <h6>$120</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a href="#">
                                <span class="discount-off">Discount 8%</span>
                                <img src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}">
                                <div class="discount-link-product">
                                    <a class="product-discount-name">CPU 4 fan best</a>
                                    <h6>$120</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a href="#">
                                <span class="discount-off">Discount 8%</span>
                                <img src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}">
                                <div class="discount-link-product">
                                    <a class="product-discount-name">CPU 4 fan best</a>
                                    <h6>$120</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a href="#">
                                <span class="discount-off">Discount 8%</span>
                                <img src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}">
                                <div class="discount-link-product">
                                    <a class="product-discount-name">CPU 4 fan best</a>
                                    <h6>$120</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a href="#">
                                <span class="discount-off">Discount 8%</span>
                                <img src="{{ asset('image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png') }}">
                                <div class="discount-link-product">
                                    <a class="product-discount-name">CPU 4 fan best</a>
                                    <h6>$120</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <img class="discount-banner" src="{{ asset('image/banner_product_home_1.png') }}">
            </div>
        </div>
        </div>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script>
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
    </body>
@endsection
