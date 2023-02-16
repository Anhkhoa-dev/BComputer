{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
@section('title')
    Acitive tài khoản | BComputer
@endsection

@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">Active</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">Xác thực tài khoản</a>
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')
<div class="container-md">
    <div class="row">
        <div class="col-md-12 mt-5 pt-8 bg-white text-center">
            Đăng ký tài khoản thành công. Vui lòng xác thực tài khoản của bạn bằng gmail của bạn đã đăng ký
        </div>
    </div>
</div>
@endsection
