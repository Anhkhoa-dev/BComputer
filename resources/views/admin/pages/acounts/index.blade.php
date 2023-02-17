@extends('admin.elements.master')

@section('title')
    Account | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Account manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        @if (\Session::get('Success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;
                <strong>Success!</strong>&nbsp;{{ \Session::get('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_acount">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button> --}}
                <a class="btn btn-primary" href="{{ route('admin/account/create') }}">
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
                            <th style="width: 1%"> ID</th>
                            <th style="width: 20%"> Full name </th>
                            {{-- <th> Birthday </th> --}}
                            <th> Email</th>
                            {{-- <th> Phone</th>
                            <th> Address </th> --}}
                            <th style="text-align: center"> Image </th>
                            <th> Role </th>
                            <th style="text-align: center"> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prods as $item)
                            <tr class="align-items-center">
                                <td>{{ $item->id }}</td>
                                <td style="text-align: justify">
                                    <span>{{ $item->fullname }}</span>
                                </td>
                                {{-- <td>{{ date('d-m-Y', strtotime($item->birthday)) }}</td> --}}
                                <td>{{ $item->email }}</td>
                                {{-- <td>{{ $item->phone ?? 'null' }}</td>
                                <td>{{ $item->address ?? 'null' }}</td> --}}
                                <td>
                                    <div class="phuc-acount">
                                        <div class="acount-image">
                                            <img src="{{ $item->image != null ? asset('image/user/' . $item->image) : asset('image/user/avatar-default.png') }}"
                                                class="img_acount" alt="User Image">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->level == 2 ? 'Admin' : 'User' }}</td>
                                <td style="text-align: center"><a
                                        class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">{{ $item->status == 1 ? 'Actived' : 'Closed' }}</a>
                                </td>
                                <td class="project-actions text-left">
                                    {{-- View --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#show_account{{ $item->id }}"><i class="fa fa-user"
                                            aria-hidden="true"></i></button>
                                    {{-- Edit --}}
                                    <a class="btn btn-info" href="{{ route('admin/account/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit_account{{ $item->id }}"><i class="fa fa-user"
                                            aria-hidden="true"></i></button> --}}
                                    {{-- Delete --}}
                                    @if ($item->status == 0)
                                        <button type="button" class="btn btn-danger btn-mg" hidden>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-mg" data-bs-toggle="modal"
                                            data-bs-target="#delete_account{{ $item->id }}"
                                            {{ $item->level == 2 ? '' : 'hidden' }}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $prods->links("vendor.pagination.bootstrap-5") }}

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>


    <!-- Modal show -->
    @foreach ($prods as $item)
        <div class="modal fade" id="show_account{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <div class="phuc-text-ban">&nbsp;Account: &nbsp;#{{ $item->id }}
                            <a type="button" class="btn btn-info" href="{{ route('admin/account/edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
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
                            <div style="width: 48%">
                                {{-- // Full name --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="" class="form-label">Full name</label>
                                    <input type="text" class="form-control bg-light text-dark" id="fullname"
                                        name="" value="{{ $item->fullname }}" disabled>
                                </div>
                                {{-- // Birthday --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="" class="form-label">Birthday</label>
                                    <input type="text" class="form-control bg-light text-dark" id="birthday"
                                        name=""
                                        value="{{ $item->birthday != null ? date('d-m-Y', strtotime($item->birthday)) : '' }}"
                                        disabled>
                                </div>
                                {{-- // Phone --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control bg-light text-dark" id="phone"
                                        name="" value="{{ $item->phone }}" disabled>
                                </div>
                                {{-- // email --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control bg-light text-dark" id="email"
                                        name="" value="{{ $item->email }}" disabled>
                                </div>

                            </div>
                            {{-- // cột bên phai --}}
                            <div style="width: 48%">
                                {{-- // Address --}}
                                <div class="mb-3 form-select" multiple aria-label="">
                                    <label for="" class="form-label">Address</label>
                                    <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                        id="address" disabled>{{ $item->address }}</textarea>
                                </div>
                                {{-- // Status --}}
                                <div class="mb-3 form-select" multiple aria-label="status">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text"
                                        class="form-control btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg""
                                        id="id_tk" name=""
                                        value="{{ $item->status == 1 ? 'Actived' : 'Clocked' }}" disabled>
                                </div>
                                {{-- // Role --}}
                                <div class="mb-3 form-select" multiple aria-label="">
                                    <label for="level" class="form-label">Role Acount</label>
                                    <input type="text" class="form-control bg-light text-dark" id="level"
                                        name="" value="{{ $item->level == 2 ? 'Admin' : 'User' }}" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal Create -->


    <!-- Modal Edit -->

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
                    <form action="{{ route('admin/account/update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input id='id' hidden>
                            <div class="">
                                <div class="form-group">
                                    <div class="phuc-acount">
                                        <img class="img_create" id="img-acc"
                                            src="{{ $item->image != null ? asset('image/user/' . $item->image) : asset('image/user/avatar-default.png') }}" />
                                    </div>
                                </div>
                                <div style="text-align:center; margin:auto">
                                    <input type="file" multiple class="d-none" accept="image/*" name="image"
                                        id="file-acc" />
                                    <label for="file-acc" id="file-name">
                                        <span class="file-button">
                                            <i class="fa fa-upload"></i>
                                        </span>&nbsp;
                                        Upload image</label>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                {{-- // cột bên trai --}}
                                <div style="width: 48%">
                                    {{-- // Full name --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="fullname" class="form-label">Full name</label>
                                        <input type="text" class="form-control bg-light text-dark" id="fullname"
                                            name="fullname" value="{{ $item->fullname }}"
                                            {{ $item->level == 2 ? '' : 'disabled' }}>
                                    </div>
                                    {{-- // Birthday --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="text" class="form-control bg-light text-dark" id="birthday"
                                            name="birthday"
                                            value="{{ $item->birthday != null ? date('d-m-Y', strtotime($item->birthday)) : '' }}"
                                            {{ $item->level == 2 ? '' : 'disabled' }}>
                                    </div>
                                    {{-- // Phone --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control bg-light text-dark" id="phone"
                                            name="phone" value="{{ $item->phone }}"
                                            {{ $item->level == 2 ? '' : 'disabled' }}>
                                    </div>
                                    {{-- // email --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control bg-light text-dark" id="email"
                                            name="email" value="{{ $item->email }}"
                                            {{ $item->level == 2 ? '' : 'disabled' }}>
                                    </div>

                                </div>
                                {{-- // cột bên phai --}}
                                <div style="width: 48%">
                                    {{-- // Address --}}
                                    <div class="mb-3 form-select" multiple aria-label="">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                            id="address" {{ $item->level == 2 ? '' : 'disabled' }}>{{ $item->address }}</textarea>
                                    </div>
                                    {{-- // Status --}}
                                    <div class="mb-3 form-select" multiple aria-label="status">
                                        <label for="statusAccu" class="form-label">Status</label>
                                        <select id='statusAccu' name="ban_status" aria-label="Default select example"
                                            class="form-control btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">
                                            @if ($item->status == '1')
                                                <option class="btn btn-light" selected value="1">Active</option>
                                                <option class="btn btn-light" value="0">Clocked</option>
                                            @else
                                                <option class="btn btn-light" selected value="0">Clocked</option>
                                                <option class="btn btn-light" value="1">Actived</option>
                                            @endif
                                        </select>
                                    </div>
                                    {{-- // Role --}}
                                    <div class="mb-3 form-select" multiple aria-label="">
                                        <label for="level" class="form-label">Role Acount</label>
                                        <input type="text" class="form-control bg-light text-dark" id="level"
                                            name="" value="{{ $item->level == 2 ? 'Admin' : 'User' }}" disabled>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer" style="margin-top:-10px">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal delete -->

    @foreach ($prods as $item)
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
                        Are you sure you want to delete Account "<b>{{ $item->fullname }}</b>" with Email
                        "<b>{{ $item->email }}</b>" ? This action cannot be
                        undone!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="{{ route('admin/account/destroy', $item->id) }}" class="btn btn-primary">
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
        //Phuc-Image-Banner
        const input = document.getElementById("file-acc");
        const image = document.getElementById("img-acc");

        input.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
        // PHUC-HIENTHI-STATUS-Account-create
        $('#statusAcc').change(function() {
            var current = $('#statusAcc').val();
            if (current === '1') {
                $('#statusAcc').css('background-color', '#CC9933');
            } else {
                $('#statusAcc').css('background-color', 'gray');
            }
        });
        // PHUC-HIENTHI-STATUS-Account-update
        $('#statusAccu').change(function() {
            var current = $('#statusAccu').val();
            if (current === '1') {
                $('#statusAccu').css('background-color', '#CC9933');
            } else {
                $('#statusAccu').css('background-color', 'gray');
            }
        });
    </script>
@endsection
