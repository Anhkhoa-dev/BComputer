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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#order_detail">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>
                {{-- <a class="btn btn-primary" href="{{ route('admin/acount/create') }}">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
                {{-- Create --}}
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
                            <th style="width: 15%">User name</th>
                            <th style="width: ">Date Order </th>
                            <th style="width: ">Address</th>
                            <th style="width: ">Ship</th>
                            <th style="width:">Cod</th>
                            <th style="width: ">Payment</th>
                            {{-- <th style="width: ">Code voucher</th> --}}
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
                                <td>{{ $item->payment }}</td>
                                {{-- <td>{{ $item['voucher']->code }}</td> --}}
                                <td style="text-align: center"><a
                                        class="btn {{ $item->statusOrder == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">{{ $item->status == 1 ? 'Confirmed' : 'Unconfimred' }}</a>
                                </td>
                                <td class="project-actions text-center">
                                    {{-- View --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#show_account{{ $item->id }}"><i class="fa fa-user"
                                            aria-hidden="true"></i></button>
                                    {{-- Edit --}}
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#edit_account{{ $item->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    {{-- Delete --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_account{{ $item->id }}"
                                        {{ $item->level == 2 ? '' : 'hidden' }}>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @if (count() > 0) --}}
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
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                {{-- @endif --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->






        <!-- Modal show OrderDetails-->
        {{-- @foreach ($order as $item) --}}
        <div class="modal fade" id="order_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        {{-- <div class="phuc-text-ban">&nbsp;Account: &nbsp;{{ $item->id }} --}}
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit_account">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        {{-- </div> --}}
                        <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- // cột bên trai --}}
                        <div class="row">
                            <div class="col-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="phuc-text-ban">&nbsp;Shipment Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row container">
                                            <div class="col-4">
                                                <div class="phuc-acount">
                                                    <img id="image" width="15%" {{-- src="{{ $item->image != null ? asset('image/user/' . $item->image) : asset('image/user/avatar-default.png') }}" --}}
                                                        src="{{ asset('image/user/avatar-default.png') }}" alt=""
                                                        class="img_create" />
                                                </div>
                                                <p class="phuc-text-ban">Card title</p>
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body" style="margin:auto">
                                                    <b class="card-title">Card title</b>
                                                    <p class="card-text">Some quick example text to build on the card title
                                                        and
                                                        make up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="row ">
                                    <div class="card" style="width: 48%">
                                        <div class="card-header">
                                            <div class="card-title">&nbsp;<b>Status Order</b></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">&nbsp;Da xac nhan</div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 48%">
                                        <div class="card-header">
                                            <div class="card-title">&nbsp;<b>Date Order</b></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">&nbsp;20/02/2023</div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">&nbsp;<b>Payment</b></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">&nbsp;Online</div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                    {{-- // cột bên phai --}}
                    <div style="width: 48%">
                        {{-- <div class="card w-100" style="margin:auto">

                                </div> --}}
                    </div>

                    <div class="card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="40%">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">
                                        <div class="card" style="width: 25rem;">
                                            <div class="row container">
                                                <div class="col-5">
                                                    <img src="{{ asset('image/user/avatar-default.png') }}"
                                                        class="img-thumbnail" style="margin:20px" alt="">
                                                </div>
                                                <div class="col-7">
                                                    <div class="card-body" style="margin:auto">
                                                        <h5 class="card-title">Card title</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <td style="margin:auto">Price</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        {{-- @endforeach --}}



        <!-- Modal delete -->

        @foreach ($order as $item)
            <div class="modal fade" id="delete_account{{ $item->id }}" tabindex="-1"
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
                            Are you sure you want to delete Account "<b>{{ $item->fullname }}</b>" with Email
                            "<b>{{ $item->email }}</b>" ? This action cannot be
                            undone!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ route('admin/voucher/destroy', $item->id) }}" class="btn btn-primary">
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
