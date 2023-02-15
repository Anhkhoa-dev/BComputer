@extends('admin.elements.master')

@section('title')
    Create Brand | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Brand</li>
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
                    <div class="phuc-text-ban">&nbsp;Create Brand</div>
                    <div style="text-align: right">
                        <a class="btn-close btn-lg" href="{{ route('admin/brand') }}">
                            <i class="fas fa-times fa-lg"></i>
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin/brand/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('put') --}}
                    <div class="card-body d-flex justify-content-between">
                        {{-- // cột bên trai --}}
                        <div style="width: 48%">
                            {{-- // Title --}}
                            <div class="mb-3 form-select" multiple aria-label="name">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control" id="name" name="brand_name"
                                    placeholder="Name" value="{{ old('brand_name') }}">
                                @error('brand_name')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- // Status --}}
                            <div class="mb-3 form-select" multiple aria-label="status">
                                <label for="statusBrand" class="form-label">Status</label>
                                @if (old('brand_status') == '0')
                                    <select id='statusBrand' name="brand_status" aria-label="Default select example"
                                        class="form-control btn btn-secondary btn-mg">
                                        <option class="btn btn-light" selected value="0">Clocked</option>
                                        <option class="btn btn-light" value="1">Actived</option>
                                    </select>
                                @else
                                    <select id='statusBrand' name="brand_status" aria-label="Default select example"
                                        class="form-control btn btn-success btn-mg">
                                        <option class="btn btn-light" selected value="1">Actived</option>
                                        <option class="btn btn-light" value="0">Clocked</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        {{-- // cột bên phai --}}
                        <div style="width: 48%">
                            {{-- // Image --}}
                            <div class="mb-3 form-select" style="display:inline-block" multiple aria-label="name">
                                <label for="file-brand" class="form-label">Image Brand</label>
                                <div class="mb-3">
                                    <div class="image-brand-div">
                                        <div class="image-brand">
                                            <img class="img-brand" id="img-brand" src="" />
                                        </div>
                                    </div>
                                </div>
                                @error('brand_image')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-control btn-primary text-center cursor-pointer"
                                        for="file-brand">Choose
                                        Image</label>
                                    <input accept="image/*" type="file" id="file-brand" multiple class="d-none"
                                        name="brand_image" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Create</button>
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
        const input = document.getElementById("file-brand");
        const image = document.getElementById("img-brand");

        input.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
        // PHUC-HIENTHI-STATUS-BRAND
        $('#statusBrand').change(function() {
            var current = $('#statusBrand').val();
            if (current === '1') {
                $('#statusBrand').css('background-color', '#CC9933');
            } else {
                $('#statusBrand').css('background-color', 'gray');
            }
        });
    </script>
@endsection
