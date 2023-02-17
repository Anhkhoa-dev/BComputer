@extends('admin.elements.master')

@section('title')
    User_address | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User_address manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="route('admin/dashboard')">Home</a></li>
                        <li class="breadcrumb-item active">User_address</li>
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
                        <i class="fas fa-minus fa-xl"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%"> ID</th>
                            <th style="width: 1%"> ID_TK</th>
                            <th style="width: 10%">Full Name </th>
                            <th> Phone </th>
                            <th style="width: 15%"> Address </th>
                            <th> Wards </th>
                            <th> District </th>
                            <th style="width: 5%"> Province </th>
                            <th style="text-align: center"> Status </th>
                            <th style="text-align: center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userAddress as $item)
                            <tr>
                                <td style="text-align: center">{{ $item->id }}</td>
                                <td style="text-align: center">{{ $item->id_tk }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->wards }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->province }}</td>
                                <td style="text-align: center">
                                    <a class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">
                                        {{ $item->status == 1 ? 'Actived' : 'Clocked' }}
                                    </a>
                                </td>
                                <td class="project-actions text-center">
                                    {{-- View --}}
                                    <button type="button" class="btn btn-info btn-mg" data-bs-toggle="modal"
                                        data-bs-target="#userAddress{{ $item->id }}">
                                        <i class="fa-regular fa-address-card fa-lg"></i>
                                    </button>
                                    {{-- <a class="btn btn-info btn-mg" href="{{ route('admin/banner/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $userAddress->links("vendor.pagination.bootstrap-5") }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal show -->

        @foreach ($userAddress as $item)
            <div class="modal fade" id="userAddress{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <div class="phuc-text-ban">User Address: {{ $item->fullname }}</div>
                            <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body d-flex justify-content-between">
                                {{-- // cột bên trai --}}
                                <div style="width: 48%">
                                    {{-- // Full Name --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control bg-light text-dark" id="fullname"
                                            name="" value="{{ $item->fullname }}" disabled>
                                    </div>
                                    {{-- // Id_TK --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="id" class="form-label">Id_TK</label>
                                        <input type="text" class="form-control bg-light text-dark" id="id_tk"
                                            name="" value="{{ $item->id_tk }}" disabled>
                                    </div>
                                    {{-- // Status --}}
                                    <div class="mb-3 form-select" multiple aria-label="status">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text"
                                            class="form-control btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg""
                                            id="id_tk" name=""
                                            value="{{ $item->status == 1 ? 'Actived' : 'Clocked' }}" disabled>
                                    </div>
                                </div>
                                {{-- // cột bên phai --}}
                                <div style="width: 48%">
                                    {{-- // Phone --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="phone " class="form-label">Phone</label>
                                        <input type="text" class="form-control bg-light text-dark" id="phone"
                                            name="" value="{{ $item->phone }}" disabled>
                                    </div>
                                    {{-- // Address --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                            id="address" name="" disabled>{{ $item->address }}, {{ $item->wards }}, {{ $item->district }}, {{ $item->province }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection
