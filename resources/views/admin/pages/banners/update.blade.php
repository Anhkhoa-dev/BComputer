@extends('admin.elements.master')

@section('title')
    Edit Banner | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Banner</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="modal-header bg-info text-white">
                <div class="phuc-text-ban">&nbsp;Update Banner</div>
                <div style="text-align: right">
                    <a class="btn-close btn-lg" href="{{ route('admin/banner') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('admin/banner/update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <input type="hidden" name="id" value="{{ $banner->id }}" />

                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 39%">
                        {{-- // Title --}}
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="ban_title"
                                value="{{ $banner->title }}">
                            @error('ban_title')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- // Categories --}}
                        <div class="mb-3 form-select" multiple aria-label="link">
                            <label for="link" class="form-label">Categories</label>
                            <select id='link' name="ban_link" aria-label="Default select example" class="form-control">
                                <option selected>{{ old('ban_link') == '' ? $banner->link : old('ban_link') }}
                                </option>
                                {{-- <option selected>{{ $banner->link }}</option> --}}
                                @foreach ($fillCatagoryAll as $item)
                                    <option value="{{ $item->slug }}" class="side-box">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- // Status --}}
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="statusBan" class="form-label">Status</label>
                            <select id='statusBan' name="ban_status" aria-label="Default select example"
                                class="form-control btn {{ $banner->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">
                                @if ($banner->status == '1')
                                    <option class="btn btn-light" selected value="1">Active</option>
                                    <option class="btn btn-light" value="0">Clocked</option>
                                @else
                                    <option class="btn btn-light" selected value="0">Clocked</option>
                                    <option class="btn btn-light" value="1">Actived</option>
                                @endif
                            </select>
                        </div>
                        {{-- // Description --}}
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" rows="7" id="description" name="ban_description">{{ $banner->description }}</textarea>
                            @error('ban_description')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- // cột bên phai --}}
                    <div style="width: 59%">
                        {{-- // Image --}}
                        <div class="mb-3 form-select" multiple aria-label="name">
                            <label for="file-ban" class="form-label">Image Banner</label>
                            <div class="mb-3">
                                <div class="image-ban-div">
                                    <div class="image-ban">
                                        <img class="img-ban" id="img-ban"
                                            src="{{ asset('image/banner/' . $banner->image) }}" />
                                    </div>
                                </div>
                            </div>
                            @error('ban_image')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                            <div class="mb-3">
                                <label class="form-control btn-primary text-center cursor-pointer" for="file-ban">Upload
                                    Image</label>
                                <input accept="image/*" type="file" id="file-ban" multiple class="d-none"
                                    name="ban_image" />
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
        const input = document.getElementById("file-ban");
        const image = document.getElementById("img-ban");

        input.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
        // PHUC-HIENTHI-STATUS-BANNER
        $('#statusBan').change(function() {
            var current = $('#statusBan').val();
            if (current === '1') {
                $('#statusBan').css('background-color', '#CC9933');
            } else {
                $('#statusBan').css('background-color', 'gray');
            }
        });
    </script>
@endsection
