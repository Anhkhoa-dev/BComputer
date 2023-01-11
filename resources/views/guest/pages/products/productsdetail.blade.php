{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
@section('title')
    PRODUCT
@endsection

{{-- Hiễn thị nội dung --}}
@section('user-contents')
    <div class="han-product-detail">
        <div class="container-md">
            <div class="row">
                <div class="w3-content w3-display-container col-5">
                    <img class="mySlides" src="image/Case_1st_Player_XF_White_(4_fan_RGB)_01.png">
                    <img class="mySlides" src="image/Case_1st_Player_XF_White_(4_fan_RGB)_02.png">
                    <img class="mySlides" src="image/Case_1st_Player_XF_White_(4_fan_RGB)_03.png">
                    <img class="mySlides" src="image/Case_1st_Player_XF_White_(4_fan_RGB)_04.png">

                    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="col-5">
                    <div class="col-md-12">
                        <div class="price" style="color:#333333">
                            <h2> Case 1st Player XF White 4 fan RBG</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="price" style="color:#d21212">$5.000.000VND</div>
                    </div>
                    <div class="col-md-12">
                        <div class="button-product">
                            <div class="buynow">Mua Ngay</div>
                            <div class="addproduct">Them vao gio hang</div>
                        </div>
                    </div>
                    <div class="info">
                        CẤU HÌNH CHI TIẾT
                    </div>
                    <div class="col-md-12">
                        <div class="detail">
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
                <div class="col-2 searching">
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
                DESCRIPTION
            </div>
            <div class="description-info">
                <h6>
                    Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, a t everti
                    meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei
                    sonet choro facilisis, labores officiis torquatos cum ei.

                    Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut
                    eos.
                    In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota
                    nostrum
                    eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te eam iisque
                    deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit,
                    modus taria .

                    experian soleat maluisset per. Has eu idque similique, et blandit scriptorem tatibus mea. Vis
                    quaeque ocurreret ea.cu bus scripserit, modus voluptaria ex per.
                </h6>
            </div>
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
    </script>
@endsection
