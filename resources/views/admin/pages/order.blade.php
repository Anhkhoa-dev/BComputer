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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_acount">
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
                            <th style="width: ">ID_Voucher</th>
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
                                <td>{{ $item['username']->fullname  }}</td>
                                <td>{{ $item->date_order }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->ship }}</td>
                                <td>{{ $item->cod }}</td>
                                <td>{{ $item->payment }}</td>
                                <td>{{ $item->id_voucher }}</td>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>




    <!-- Modal show OrderDetails-->
    {{-- @foreach ($order as $item)
        <div class="modal fade" id="show_account{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <div class="phuc-text-ban">&nbsp;Account: &nbsp;{{ $item->id }}
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#edit_account{{ $item->id }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                        <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <input id='id' hidden>
                            <div class="form-group">
                                <div class="phuc-acount">
                                    <img id="image" width="15%"
                                        src="{{ $item->image != null ? asset('image/user/' . $item->image) : asset('image/user/avatar-default.png') }}"
                                        alt="" class="img_create" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            {{-- // cột bên trai --}}
                            {{-- <div style="width: 48%">


                            </div> --}}
                            {{-- // cột bên phai --}}
                            {{-- <div style="width: 48%">

                                {{-- // Status --}}
                                {{-- <div class="mb-3 form-select" multiple aria-label="status">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text"
                                        class="form-control btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg""
                                        id="id_tk" name=""
                                        value="{{ $item->status == 1 ? 'Actived' : 'Clocked' }}" disabled>
                                </div> --}}
{{--
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- @endforeach --}}


    <!-- Modal Edit Order-->
{{--
    @foreach ($prods as $item)
        <div class="modal fade" id="edit_account{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <div class="phuc-text-ban">&nbsp;Account: &nbsp;{{ $item->id }}
                        </div>
                        <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin/acount/update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input id='id' hidden>
                            <div class="card-body d-flex justify-content-between">
                                {{-- // cột bên trai --}}
                                {{-- <div style="width: 48%">


                                </div> --}}
                                {{-- // cột bên phai --}}
                                {{-- <div style="width: 48%">

                                </div> --}}
{{--
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-top:-10px">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}

    <!-- Modal delete -->

    @foreach ($order as $item)
        <div class="modal fade" id="delete_account{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centere">
                <div class="modal-content">
                    <div class="modal-header">
                        <i style="color: #00CC66" class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                        &emsp;<h1 style="color: red" class="modal-title fs-5" id="exampleModalLabel">Please confirm
                            your action!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete Account "<b>{{ $item->fullname }}</b>" with Email "<b>{{ $item->email }}</b>" ? This action cannot be
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
