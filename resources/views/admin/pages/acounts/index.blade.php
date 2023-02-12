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
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_acount">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>
                {{-- <a class="btn btn-primary" href="{{ route('admin/acount/create') }}">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </a> --}}
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
                            <th style="width: 25%"> Full name </th>
                            {{-- <th> Birthday </th> --}}
                            <th> Email</th>
                            {{-- <th> Phone</th>
                            <th> Address </th> --}}
                            <th style="text-align: center"> Image </th>
                            <th> Role </th>
                            <th style="text-align: center"> Status </th>
                            <th style="text-align: center"> Action </th>
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
                                        class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">{{ $item->status == 1 ? 'Actived' : 'Clocked' }}</a>
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


    <!-- Modal show -->
    @foreach ($prods as $item)
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

    <div class="modal fade" id="create_acount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <div class="phuc-text-ban">&nbsp;<img src="{{ asset('image/icon/admin_icon.png') }}" width="50px">
                        &nbsp;Create Admin
                    </div>
                    <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin/acount/store', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input hidden id="level" name="" value="2">
                        <div class="">
                            <div class="form-group">
                                <div class="phuc-acount">
                                    <img class="img_create" id="img-acc"
                                        src="{{ asset('image/user/avatar-default.png') }}" />
                                </div>
                            </div>
                            <div style="text-align:center; margin:auto">
                                <input type="file" multiple class="d-none" accept="image/*" name="image"
                                    id="file-acc" />
                                <label for="file-acc" id="file-name">
                                    <span class="file-button">
                                        <i class="fa fa-upload"></i>
                                    </span>&nbsp;
                                    Choose image</label>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            {{-- // cột bên trai --}}
                            <div style="width: 48%">
                                {{-- // Full name --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="fullname" class="form-label">Full name</label>
                                    <input type="text" class="form-control bg-light text-dark" id="fullname"
                                        name="fullname" value="">
                                </div>
                                {{-- // Phone --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control bg-light text-dark" id="phone"
                                        name="phone" value="">
                                </div>
                                {{-- // Address --}}
                                <div class="mb-3 form-select" multiple aria-label="">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                        id="address"></textarea>
                                </div>
                            </div>
                            {{-- // cột bên phai --}}
                            <div style="width: 48%">
                                {{-- // email --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control bg-light text-dark" id="email"
                                        name="email" value="">
                                </div>
                                <div class="d-flex justify-content-between">
                                    {{-- // Birthday --}}
                                    <div class="mb-3 form-select" multiple aria-label="description" style="width: 49%">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" class="form-control bg-light text-dark" id="birthday"
                                            name="birthday" value="">
                                    </div>
                                    {{-- // Status --}}
                                    <div class="mb-3 form-select" multiple aria-label="status" style="width: 49%">
                                        <label for="statusAcc" class="form-label">Status</label>
                                        <select id='statusAcc' name="status" aria-label="Default select example"
                                            class="form-control btn btn-success btn-mg">
                                            <option class="btn btn-light" selected value="1">Actived</option>
                                            <option class="btn btn-light" value="0">Clocked</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- // password --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control bg-light text-dark" id="password"
                                        name="password" value="">
                                </div>
                                {{-- // Confirm password --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control bg-light text-dark" id="confirmPassword"
                                        name="confirmPassword" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-top:-10px">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button id="" class="btn btn-primary btn-submit">Create</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

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
                    <form action="{{ route('admin/acount/update', $item->id) }}" method="POST"
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
