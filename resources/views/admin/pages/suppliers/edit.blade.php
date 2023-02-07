@extends('admin.elements.master')

@section('title')
    Edit Supplier | BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Supplier</h3>
        </div>
        <div class="modal-body">
            <form action="{{ route('supplier/update', $prod->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-between">
                    {{-- // cột bên trái --}}
                    <input type="hidden" name="sup_id" value="{{ $prod->id }}">
                    <div style="width: 48%">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="texe" class="form-control" name="sup_name" id="exampleFormControlInput1"
                                value="{{ $prod->name }}">
                            @error('sup_name')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                            <input type="text" class="form-control" name="sup_address" id="exampleFormControlInput1"
                                value="{{ $prod->address }}">
                            @error('sup_address')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" class="form-control" name="sup_email" id="exampleFormControlInput1"
                                value="{{ $prod->email }}">
                            @error('sup_email')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="sup_phone" id="exampleFormControlInput1"
                                value="{{ $prod->phone }}">
                            @error('sup_phone')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
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
                                        if(image != 0){
                                        <img src="" alt="">
                                        }
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="file" name="photo" id="image_sup" multiple class="d-none"
                                    value="{{ $prod->image }}">
                                <label class="form-control btn-primary text-center cursor-pointer " for="image_sup">
                                    Choose image</label>
                                <p>* Kích thước hình ảnh: 600x600 (px) - Tỉ lệ hình ảnh: 1:1</p>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select id='loai_tk' name="loai_tk" aria-label="Default select example" class="form-select">
                                @if ($prod->status == '1')
                                    <option selected value="1">Active</option>
                                    <option value="0">Clocked</option>
                                @else
                                    <option selected value="0">Clocked</option>
                                    <option value="1">Actived</option>
                                @endif
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        {{-- @endif --}}
        </section>
    @endsection
