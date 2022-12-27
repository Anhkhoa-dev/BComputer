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
                <div class="col-md-9">
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
        <div class="container-md">
            <div class="row">
                <div class="on_sale">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="title">
                            <i class="fa-solid fa-bolt"></i>
                            Flash Delas
                        </div>
                        <div class="time_sale">
                            <div class="box_time">
                                <span id="h">02</span> :
                                <span id="m">30</span> :
                                <span id="s">30</span>
                            </div>
                        </div>
                    </div>
                    <div class="view_all">
                        <a href="#">View all</a>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="row">
                        @include('guest.pages.flashDelas.flashDelas')
                    </div>
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
                            <a href="#">
                                <img src="{{ asset('image/top/category-1.png') }}" alt="" class="img__full">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#">
                                <img src="{{ asset('image/top/category-2.png') }}" alt="" class="img__full">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#">
                                <img src="{{ asset('image/top/category-3.png') }}" alt="" class="img__full">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    {{-- New Arrivals --}}
    <section>
        <div class="container-md">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <img src="{{ asset('image/icon/002-new.png') }}" alt="" width="30">
                        New Arrivals
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="new_arrivals">
                        <div class="card">
                            <div class="card_img">
                                <a href="">
                                    <img src="{{ asset('image/flash/flash-1.png') }}" alt="" class="img__full cursor-pointer">
                                </a>
                            </div>
                            <div class="card_info">
                                <a href="#" class="name">Product 01</a>
                                <div class="price">$ 100</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card_img">
                                <a href="">
                                    <img src="{{ asset('image/flash/flash-1.png') }}" alt="" class="img__full cursor-pointer">
                                </a>
                            </div>
                            <div class="card_info">
                                <a href="#" class="name">Product 01</a>
                                <div class="price">$ 100</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card_img">
                                <a href="">
                                    <img src="{{ asset('image/flash/flash-1.png') }}" alt="" class="img__full cursor-pointer">
                                </a>
                            </div>
                            <div class="card_info">
                                <a href="#" class="name">Product 01</a>
                                <div class="price">$ 100</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card_img">
                                <a href="">
                                    <img src="{{ asset('image/flash/flash-1.png') }}" alt="" class="img__full cursor-pointer">
                                </a>
                            </div>
                            <div class="card_info">
                                <a href="#" class="name">Product 01</a>
                                <div class="price">$ 100</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card_img">
                                <a href="">
                                    <img src="{{ asset('image/flash/flash-1.png') }}" alt="" class="img__full cursor-pointer">
                                </a>
                            </div>
                            <div class="card_info">
                                <a href="#" class="name">Product 01</a>
                                <div class="price">$ 100</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card_img">
                                <a href="">
                                    <img src="{{ asset('image/flash/flash-1.png') }}" alt="" class="img__full cursor-pointer">
                                </a>
                            </div>
                            <div class="card_info">
                                <a href="#" class="name">Product 01</a>
                                <div class="price">$ 100</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
