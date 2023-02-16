@extends('admin.elements.master')

@section('title')
    Update Account | Admin BComputer
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
                        <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Account</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="card">
            <!-- Default box -->
            <br>
            <div class="card w-75" style="margin:auto">
                <div class="modal-header bg-info text-white">
                    <div class="phuc-text-ban">&nbsp;
                        &nbsp;Update Account: #{{ $account->id }}
                    </div>
                    <div style="text-align: right">
                        <a class="btn-close btn-lg" href="{{ route('admin/account') }}">
                            <i class="fas fa-times fa-lg"></i>
                        </a>
                    </div>
                </div>
                <form
                    action="{{ $account->level == 2 ? route('admin/account/update', $account->id) : route('admin/account/updateUser', $account->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input id='id' hidden>
                        <div class="">
                            <div class="form-group">
                                <div class="phuc-acount">
                                    <img class="img_create" id="img-accu" src="{{ $account->image != null ? asset('image/user/' . $account->image) : asset('image/user/avatar-default.png') }}" />
                                </div>
                            </div>
                            <div style="text-align:center; margin:auto">
                                @if ($account->level == 2)
                                    <input type="file" multiple class="d-none" accept="image/*" name="image"
                                        id="file-accu" />
                                    <label for="file-accu" id="file-name" {{ $account->level == 2 ? '' : 'disabled' }}>
                                        <span class="file-button">
                                            <i class="fa fa-upload"></i>
                                        </span>&nbsp;
                                        Upload image</label>
                                @else
                                @endif
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            {{-- // cột bên trai --}}
                            <div style="width: 48%">
                                {{-- // Full name --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="fullname" class="form-label">Full name</label>
                                    <input type="text" class="form-control bg-light text-dark" id="fullname"
                                        name="fullname" value="{{ $account->fullname }}"
                                        {{ $account->level == 2 ? '' : 'disabled' }}>
                                    @error('fullname')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // Birthday --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control bg-light text-dark" id="birthday"
                                        name="birthday" value="{{ $account->birthday }}"
                                        {{ $account->level == 2 ? '' : 'disabled' }}>
                                    @error('birthday')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // Phone --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control bg-light text-dark" id="phone"
                                        name="phone" value="{{ $account->phone }}"
                                        {{ $account->level == 2 ? '' : 'disabled' }}>
                                    @error('phone')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // email --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control bg-light text-dark" id="email"
                                        name="email" value="{{ $account->email }}"
                                        {{ $account->level == 2 ? '' : 'disabled' }}>
                                    @error('email')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            {{-- // cột bên phai --}}
                            <div style="width: 48%">
                                {{-- // Address --}}
                                <div class="mb-3 form-select" multiple aria-label="">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                        id="address" name="address" {{ $account->level == 2 ? '' : 'disabled' }}>{{ $account->address }}</textarea>
                                    @error('address')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // Status --}}
                                <div class="mb-3 form-select" multiple aria-label="status">
                                    <label for="statusAccu" class="form-label">Status</label>
                                    <select id='statusAccu' name="status" aria-label="Default select example"
                                        class="form-control btn {{ $account->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">
                                        @if ($account->status == '1')
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
                                        name="level" value="{{ $account->level == 2 ? 'Admin' : 'User' }}" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top:-10px">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <br>
        </div>
    </section>
@endsection

@section('myjs-admin')
    <script>
        //Phuc-Image-ACCOUNT
        const input = document.getElementById("file-accu");
        const image = document.getElementById("img-accu");

        input.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.UpdateObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
        // PHUC-HIENTHI-STATUS-Account-Update
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
