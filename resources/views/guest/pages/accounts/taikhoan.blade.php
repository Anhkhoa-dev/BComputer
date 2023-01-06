@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp
@endif

@extends('guest.elements.master')

@section('user-contents')
    @section('breadcrumb')
        <a href="{{route('user/taikhoan')}}" class="bc-items">Acount</a>
        <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
        @switch($page)
            @case('sec-thongbao')
                @section("title")Notify | BComputer @stop
                <a href="#" class="bc-item active">Notify</a>
                @break
            @case('sec-chitietdonhang')
                @section("title")Order | BComputer @stop
                <a href="#" class="bc-item active">Order</a>
                @break
            @case('sec-diachi')
                @section("title")Address | BComputer @stop
                <a href="#" class="bc-item active">Address</a>
                @break
            @case('sec-yeuthich')
                @section("title")Like | BComputer @stop
                <a href="#" class="bc-item active">Product like</a>
                @break
            @case('sec-voucher')
                @section("title")Voucher | BComputer @stop
                <a href="#" class="bc-item active">Voucher</a>
                @break
            @default
                @section('title')
                   {{$user->fullname}} | BComputer
                @endsection
                <a href="#" class="bc-item active">Account information</a>
        @endswitch   
    @endsection

    @include('guest.pages.section.sec-thanhdieuhuong')
    
    <div class="bg-white">
        <div class="container-md">
            <div class="row">
                @include('guest.pages.accounts.'.$page)
            </div>
        </div>
    </div>
    

@endsection

@section('myjs')
    
@endsection

