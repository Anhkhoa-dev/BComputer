@extends('admin.elements.master')

@section('title')
    Oder | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="modal-header bg-info text-white">
                <div class="phuc-text-ban">&nbsp;Order manager # {{ $orderList->id }}</div>
                <div style="text-align: right">
                    <a class="btn-close btn-lg" href="{{ route('admin/order') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>

            {{-- <form action="{{ route('admin/orderDatils/store') }}" method="POST" enctype="multipart/form-data"> --}}
            {{-- @method('put') --}}

            <div class="modal-body">
                <div class="row">
                    <div class="col-7">
                        <div class="card" style="width: 96%">
                            <div class="card-header">
                                <div class="phuc-text-ban" style="text-align: left">&nbsp;Shipment Details
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row container">
                                    {{-- Shippperment Details --}}
                                    <div class="col-5">
                                        <div class="phuc-acount">
                                            <img id="image" width="15%"
                                                src="{{ asset('image/user/' . ($orderList->User['image'] != null ? $orderList->User['image'] : 'avatar-default.png')) }}"
                                                alt="" class="img_create" />
                                        </div>
                                        <br>
                                        <div style="text-align: center">
                                            <button class="btn btn-tool text bg-light" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                <b class="phuc-text-ban">{{ $orderList['Acount_Add']->fullname }}</b>
                                            </button>
                                        </div>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <b>Email</b>
                                                <p>{{ $orderList->User['email'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Ben phai --}}
                                    <div class="col-7">
                                        {{-- Cod --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" style="text-align: left">
                                                    &nbsp;<b>Cod:</b>&nbsp;
                                                    {{ $orderList->cod }}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Payment --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" style="text-align: left">
                                                    &nbsp;<b>Payment:</b>
                                                    &nbsp;{{ $orderList->payment == 0 ? 'Payment on delivery' : 'Transfer payments' }}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Phone --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" style="text-align: left">
                                                    &nbsp;<b>Phone:</b>
                                                    &nbsp;{{ $orderList->Acount_Add['phone'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                {{-- Address --}}
                                <div class="row container">
                                    <div class="card" style="width: 99%">
                                        <div class="card-header">
                                            <div class="card-title">&nbsp;<b>Address</b></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">&nbsp;{{ $orderList->address }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row ">
                            {{-- Date order --}}
                            <div class="card" style="width: 97%">
                                <div class="card-header">
                                    <div class="card-title" style="text-align: left">
                                        &nbsp;<b>Date Order:</b>&nbsp;
                                        {{ $orderList->date_order }}
                                    </div>
                                </div>
                            </div>
                            {{-- Status order --}}
                            <div class="card" style="width: 97%">
                                <div class="card-header">
                                    <div class="card-title">&nbsp;<b>Status Order</b></div>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        {{-- &nbsp;{{ $item->statusOrder }} --}}
                                        @if ($orderList->statusOrder == 'Received')
                                            <input type="text"class="form-control btn btn-primary"
                                                value="{{ $orderList->statusOrder }}">
                                        @elseif($orderList->statusOrder == 'Confirmed')
                                            <input type="text"class="form-control btn btn-success"
                                                value="{{ $orderList->statusOrder }}">
                                        @elseif($orderList->statusOrder == 'Complete')
                                            <input type="text"class="form-control btn btn-info"
                                                value="{{ $orderList->statusOrder }}">
                                        @else
                                            <input type="text"class="form-control btn btn-danger"
                                                value="{{ $orderList->statusOrder }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Total --}}
                        <div class="row ">
                            <div class="card" style="width: 97%">
                                <div class="card-header">
                                    <div class="card-title">&nbsp;<b>Invoice</b></div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        {{-- @foreach ($orderDetails as $item) --}}
                                        @php
                                            $discount = $orderList['DiscountVoucher'] / 100;
                                        @endphp
                                        <tr>
                                            <td><b>Total:</b></td>
                                            <td>
                                                {{ number_format($orderList->TotalSum, 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Discount:</b></td>
                                            <td>-{{ number_format($orderList->TotalSum * $discount, 2) }}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Total amount</b></td>
                                            <td> {{ number_format($orderList->TotalSum - $orderList->TotalSum * $discount, 2) }}
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- bang order --}}
                <div class="row">
                    <div class="card" style="width: 98%; margin:auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:5%;text-align: center">ID</th>
                                    <th style="width:50%; padding-left:30px">Product</th>
                                    <th></th>
                                    <th style="width:15%;text-align: center ">Price</th>
                                    <th style="width:15%;text-align: center">Quantity</th>
                                    <th style="width:15%;text-align: center">Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($orderList->Detail as $pro)
                                    <tr class="align-items-center">
                                        <td style="padding-top:50px">
                                            {{ $pro->id_pro }}
                                        </td>
                                        <th scope="row">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="{{ asset('image/product/' . $pro->image) }}" alt=""
                                                        class="img-account-order" width="100px">
                                                </div>
                                                <div class="col-9">
                                                    <div style="text-align: center;padding-top:40px">
                                                        {{ $pro->namePro }}
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <td></td>
                                        <td style="text-align: center;padding-top:50px">
                                            {{ number_format($pro->price * ((100 - $pro->discount) / 100), 2) }}</td>
                                        <td>
                                            <div style="text-align: center;padding-top:40px">
                                                {{ $pro->qty }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;padding-top:40px">
                                                {{ number_format($pro->qty * $pro->price * ((100 - $pro->discount) / 100), 2) }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="card-footer" style="text-align: right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div> --}}
            </form>
        </div>
    </section>
@endsection
