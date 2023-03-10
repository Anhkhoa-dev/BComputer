@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp
@endif

@extends('guest.elements.master')

@section('user-contents')
@section('breadcrumb')
    <a href="{{ route('user/taikhoan') }}" class="bc-items">Acount</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    @switch($page)
        @case('sec-thongbao')
            @section('title')Notify | BComputer @stop
            <a href="#" class="bc-item active text-decoration-none">Notify</a>
        @break

        @case('sec-chitietdonhang')
            @section('title')Order | BComputer @stop
            <a href="#" class="bc-item active text-decoration-none">Order</a>
        @break

        @case('sec-diachi')
            @section('title')Address | BComputer @stop
            <a href="{{ route('user/address') }}" class="bc-item active text-decoration-none">Address</a>
        @break

        @case('sec-yeuthich')
            @section('title')Like | BComputer @stop
            <a href="#" class="bc-item active text-decoration-none">Product like</a>
        @break

        @case('sec-voucher')
            @section('title')Voucher | BComputer @stop
            <a href="#" class="bc-item active text-decoration-none">Voucher</a>
        @break

        @default
            @section('title')
                {{ $user->fullname }} | BComputer
            @endsection
            <a href="#" class="bc-item active text-decoration-none pl-2"> Account information</a>
    @endswitch
@endsection

@include('guest.pages.section.sec-thanhdieuhuong')

<div class="bg-white">
    <div class="container-md">
        <div class="row">
            @include('guest.pages.accounts.' . $page)
        </div>
    </div>
</div>


@endsection

{{-- @section('myjs')
 {{-- Phần xử lý thông tin địa chỉ, tỉnh, quận, phường --}}
{{-- <script>
    var citis = document.getElementById("address-city");
    var districts = document.getElementById("address-district");
    var wards = document.getElementById("address-ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {

        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }
        citis.onchange = function() {
            districts.length = 1;
            wards.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Name === this.value);

                for (const k of result[0].Districts) {
                    districts.options[districts.options.length] = new Option(k.Name, k.Name);
                }
            }
        };
        districts.onchange = function() {
            wards.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name);
                }
            }
        };
    }
</script> --}}
{{-- @endsection  --}}
