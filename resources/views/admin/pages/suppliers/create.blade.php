@extends('admin.elements.master')

@section('title')
    Create Supplier | BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Supplier</h3>
        </div>

        <form action="{{ Route('supplier/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="d-flex justify-content-between">

                        {{-- // cột bên trái --}}
                        <div style="width: 48%">
                            <div class="mb-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="sup_name" name="sup_name"
                                    placeholder="Name">
                                @error('sup_name')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="sup_email" name="sup_email"
                                    placeholder="Email">
                                @error('sup_email')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="sup_phone" name="sup_phone"
                                    placeholder="Phone">
                                @error('sup_phone')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Address</label>
                                    <textarea name="sup_address" id="productdesc" rows="5" class="form-control">{{ old('sup_address') }}</textarea>
                                    @error('sup_address')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- cột bên phải  --}}
                        <div style="width: 48%">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Image Supplier</label>
                                    <b id="image"></b>
                                    @error('image')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                    <div class="image-sup-div">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="image-preview-div">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="file" name="photo" id="image_inp" value="{{ old('photo') }}">
                                    <label class="form-control btn-primary text-center cursor-pointer " for="image_inp">
                                        Choose image</label>
                                    <p>* Kích thước hình ảnh: 600x600 (px) - Tỉ lệ hình ảnh: 1:1</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="loai_tk" name="loai_tk" aria-label="Default select example"
                                    class="form-control">
                                    <option value="1">Actived</option>
                                    <option value="0">Clocked</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    </div>
@endsection
