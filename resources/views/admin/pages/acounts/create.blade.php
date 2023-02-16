@extends('admin.elements.master')

@section('title')
    Create Account | Admin BComputer
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
                        <li class="breadcrumb-item active">Create Account</li>
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
                    <div class="phuc-text-ban">&nbsp;<img src="{{ asset('image/icon/admin_icon.png') }}" width="50px">
                        &nbsp;Create Admin
                    </div>
                    <div style="text-align: right">
                        <a class="btn-close btn-lg" href="{{ route('admin/account') }}">
                            <i class="fas fa-times fa-lg"></i>
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin/account/store') }}" method="POST" enctype="multipart/form-data">
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
                                        name="fullname" value="{{ old('fullname') }}">
                                    @error('fullname')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // Phone --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control bg-light text-dark" id="phone"
                                        name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // Address --}}
                                <div class="mb-3 form-select" multiple aria-label="">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                        id="address" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- // cột bên phai --}}
                            <div style="width: 48%">
                                {{-- // email --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control bg-light text-dark" id="email"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between">
                                    {{-- // Birthday --}}
                                    <div class="mb-3 form-select" multiple aria-label="description" style="width: 49%">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" class="form-control bg-light text-dark" id="birthday"
                                            name="birthday" value="{{ old('birthday') }}">
                                        @error('birthday')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- // Status --}}
                                    <div class="mb-3 form-select" multiple aria-label="status" style="width: 49%">
                                        <label for="statusAcc" class="form-label">Status</label>
                                        @if (old('status') == '0')
                                            <select id='statusAcc' name="status" aria-label="Default select example"
                                                class="form-control btn btn-secondary btn-mg">
                                                <option class="btn btn-light" selected value="0">Clocked</option>
                                                <option class="btn btn-light" value="1">Actived</option>
                                            </select>
                                        @else
                                            <select id='statusAcc' name="status" aria-label="Default select example"
                                                class="form-control btn btn-success btn-mg">
                                                <option class="btn btn-light" selected value="1">Actived</option>
                                                <option class="btn btn-light" value="0">Clocked</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                {{-- // password --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control bg-light text-dark" id="password"
                                        name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- // Confirm password --}}
                                <div class="mb-3 form-select" multiple aria-label="description">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control bg-light text-dark" id="cpassword"
                                        name="cpassword" value="{{ old('cpassword') }}">
                                    @error('cpassword')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-top:-10px">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button id="" type="submit" class="btn btn-primary btn-submit">Create</button>
                        </div>
                </form>
            </div>
            <br>
        </div>
    </section>
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
    </script>
@endsection
