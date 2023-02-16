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
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">ID</th>
                            <th style="width: 18%%">User name</th>
                            <th style="width: 10%">Date Order </th>
                            <th style="width: 25%">Address</th>
                            <th style="width:">Cod</th>
                            <th style="width: ">Payment</th>
                            <th style="text-align: center"> Status Order </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                            {{-- @php
                                $user = $item['username'];
                            @endphp --}}
                            <tr class="align-items-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item['username']->fullname }}</td>
                                <td>{{ $item->date_order }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->cod }}</td>
                                <td>{{ $item->payment == 0 ? 'Payment on delivery' : 'Transfer payments' }}</td>
                                <td class="project-actions text-center">
                                    {{ $item->statusOrder }}
                                </td>
                                <td>
                                    {{-- Status --}}

                                    @if ($item->statusOrder == 'Đã tiếp nhận')
                                        <a href="{{ route('admin/order/update', $item->id) }}"
                                            class="btn btn-primary btn-mg">
                                            <i class="fa-solid fa-file-circle-check"></i>
                                        </a>
                                    @elseif($item->statusOrder == 'Confirmed')
                                        <a href="{{ route('admin/order/update', $item->id) }}"
                                            class="btn btn-success btn-mg">
                                            <i class="fa-solid fa-box"></i>
                                        </a>
                                    @elseif($item->statusOrder == 'Complete')
                                        <button type="button" hidden></button>
                                    @else
                                        <button type="button" disabled class="btn btn-danger btn-mg">
                                            <i class="fa-solid fa-xmark fa-lg"></i>
                                        </button>
                                    @endif
                                    {{-- Info --}}
                                    <button type="button" class="btn btn-info btn-mg" data-bs-toggle="modal"
                                        data-bs-target="#order_detail{{ $item->id }}">
                                        <i class="fa-solid fa-info"></i>
                                    </button>
                                    {{-- Delete --}}
                                    @if ($item->statusOrder == 'Cancelled'|| $item->statusOrder == 'Complete')
                                        <button type="button" hidden></button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-mg" data-bs-toggle="modal"
                                            data-bs-target="#delete_order{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($order) > 7)
                    <div class="col-md-12 mt-3">
                        <nav aria-label="Page navigation example pagination-lg">
                            <ul class="pagination justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->



        <!-- Modal show OrderDetails-->
        @foreach ($order as $item)
            <div class="modal fade" id="order_detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <div class="phuc-text-ban">&emsp;Order Detail: #&nbsp;{{ $item->id }}</div>
                            <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
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
                                                            src="{{ $item['username']->image != null ? asset('image/user/' . $item['username']->image) : asset('image/user/avatar-default.png') }}"
                                                            alt="" class="img_create" />
                                                    </div>
                                                    <br>
                                                    <div style="text-align: center">
                                                        <button class="btn btn-tool text bg-light" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            <b class="phuc-text-ban">{{ $item['username']->fullname }}</b>
                                                        </button>
                                                    </div>
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="card card-body">
                                                            <b>Email</b>
                                                            <p>{{ $item['username']->email }}</p>
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
                                                                {{ $item->cod }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Payment --}}
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title" style="text-align: left">
                                                                &nbsp;<b>Payment:</b>
                                                                &nbsp;{{ $item->payment == 0 ? 'Payment on delivery' : 'Transfer payments' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Phone --}}
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title" style="text-align: left">
                                                                &nbsp;<b>Phone:</b>
                                                                &nbsp;{{ $item['useraddress']->phone }}
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
                                                        <div class="card-title">&nbsp;{{ $item->address }}</div>
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
                                                    {{ $item->date_order }}
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
                                                    @if ($item->statusOrder == 'Đã tiếp nhận')
                                                        <input type="text"class="form-control btn btn-primary"
                                                            value="{{ $item->statusOrder }}">
                                                    @elseif($item->statusOrder == 'Confirmed')
                                                        <input type="text"class="form-control btn btn-success"
                                                            value="{{ $item->statusOrder }}">
                                                    @elseif($item->statusOrder == 'Complete')
                                                        <input type="text"class="form-control btn btn-info"
                                                            value="{{ $item->statusOrder }}">
                                                    @else
                                                        <input type="text"class="form-control btn btn-danger"
                                                            value="{{ $item->statusOrder }}">
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
                                                        <tr>
                                                            <td><b>Total:</b></td>
                                                            <td>
                                                                {{-- {{ $orderDetails->sum($item->totalItem) }} --}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Discount:</b></td>
                                                            <td>-
                                                                {{-- {{ floatval(($item->discount / 100) * $orderDetails > sum($item->totalItem)) }} --}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>Total amount</b></td>
                                                            {{-- <td> {{ floatval($orderDetails->sum($item->totalItem) - ($item->discount / 100) * $orderDetails->sum($item->totalItem)) }} --}}
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
                                            @foreach ($orderDetails as $item)
                                                <tr class="align-items-center">
                                                    <td style="padding-top:50px">
                                                        {{ $item->id_pro }}
                                                    </td>
                                                    <th scope="row">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <img src="{{ asset('image/product/Asus_VivoBook_14_M413IA_EK481T_01.PNG') }}"
                                                                    alt="" class="img-account-order"
                                                                    width="100px">
                                                            </div>
                                                            <div class="col-9">
                                                                <div style="text-align: center;padding-top:40px">
                                                                    {{ $item['product']->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td></td>
                                                    <td style="text-align: center;padding-top:50px">
                                                        {{ $item->price }}</td>
                                                    <td>
                                                        <div style="text-align: center;padding-top:40px">
                                                            {{ $item->qty }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="text-align: center;padding-top:40px">
                                                            {{ $item->totalItem }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        <!-- Modal delete -->

        @foreach ($order as $item)
            <div class="modal fade" id="delete_order{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centere">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i style="color: #00CC66" class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                            &emsp;<h1 style="color: red" class="modal-title fs-5" id="exampleModalLabel">Please
                                confirm
                                your action!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete Order "<b>{{ $item->id }}</b>" of the user
                            "<b>{{ $item['username']->fullname }}</b>" with Email
                            "<b>{{ $item['username']->email }}</b>" ? This action cannot be
                            undone!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ route('admin/order/destroy', $item->id) }}" class="btn btn-primary">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection

@section('myjs-admin')
    <script>
        // //Phuc-Image-Banner
        // const input = document.getElementById("file-acc");
        // const image = document.getElementById("img-acc");

        // input.addEventListener("change", (e) => {
        //     if (e.target.files.length) {
        //         const src = URL.createObjectURL(e.target.files[0]);
        //         image.src = src;
        //     }
        // });
        // // PHUC-HIENTHI-STATUS-Account-create
        // $('#statusAcc').change(function() {
        //     var current = $('#statusAcc').val();
        //     if (current === '1') {
        //         $('#statusAcc').css('background-color', '#CC9933');
        //     } else {
        //         $('#statusAcc').css('background-color', 'gray');
        //     }
        // });
        // // PHUC-HIENTHI-STATUS-Account-update
        // $('#statusAccu').change(function() {
        //     var current = $('#statusAccu').val();
        //     if (current === '1') {
        //         $('#statusAccu').css('background-color', '#CC9933');
        //     } else {
        //         $('#statusAccu').css('background-color', 'gray');
        //     }
        // });
    </script>
@endsection
