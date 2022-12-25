{{-- kế thừa layout --}}
@extends('guest.elements.master') 

{{--  Kế thừa title --}}
@section('title')
    <title>BComputer - Thế Giới Công nghệ</title>
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
                <div class="title">
                    <i class="fa-solid fa-bolt"></i>
                    Flash Delas
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @include('guest.pages.flashDelas.flashDelas')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
