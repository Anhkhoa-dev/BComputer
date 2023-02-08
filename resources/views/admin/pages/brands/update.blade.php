@extends('admin.elements.master')

@section('title')
    Edit Brand | Admin BComputer
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
                        <li class="breadcrumb-item active">Edit Brand</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><b>Edit Brand</b></h2>
                <div style="text-align: right">
                    <a class="btn btn-tool" href="{{ route('admin/brand') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('admin/brand/update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <input type="hidden" name="id" value="{{ $brand->id }}" />

                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 48%">
                        {{-- // Title --}}
                        <div class="mb-3 form-select" multiple aria-label="name">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control bg-light text-dark" id="name" name="brand_name" placeholder="Name"
                                value="{{ $brand->name }}" disabled>
                            @error('brand_name')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- // Status --}}
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="statusBrand" class="form-label">Status</label>
                            <select id='statusBrand' name="brand_status" aria-label="Default select example"
                                class="form-control btn {{ $brand->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">
                                @if ($brand->status == '1')
                                    <option class="btn btn-light" selected value="1">Active</option>
                                    <option class="btn btn-light" value="0">Clocked</option>
                                @else
                                    <option class="btn btn-light" selected value="0">Clocked</option>
                                    <option class="btn btn-light" value="1">Actived</option>
                                @endif
                            </select>
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
                                        <img class="img-brand" id="img-brand" src="{{ asset('image/brand/' . $brand->image) }}" />
                                    </div>
                                </div>
                            </div>
                            @error('brand_image')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                            <div class="mb-3">
                                <label class="form-control btn-primary text-center cursor-pointer" for="file-brand">Choose
                                    Image</label>
                                <input accept="image/*" type="file" id="file-brand" multiple class="d-none"
                                    name="brand_image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="text-align: right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
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
    // PHUC-HIENTHI-STATUS-BANNER
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
