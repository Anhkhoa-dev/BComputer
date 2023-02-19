{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
@section('title')
    Acitive Account | BComputer
@endsection

@section('user-contents')
@section('breadcrumb')
    <a href="#" class="bc-items">Active</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">Account Verification</a>
@endsection
@include('guest.pages.section.sec-thanhdieuhuong')
<div class="container-md">
    <div class="row">
        <div class="col-md-12 mt-5 pt-8 bg-white text-center">
            Successful account registration. Please verify your account with your registered gmail
        </div>
    </div>
</div>
@endsection
