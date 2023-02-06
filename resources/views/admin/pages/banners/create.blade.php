@extends('admin.elements.master')

@section('title')
    Create Banner | Admin BComputer
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
                        <li class="breadcrumb-item active">Create Banner</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><b>Create Banner</b></h2>
                <div style="text-align: right">
                    <a class="btn btn-tool" href="{{ route('admin/banner') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('admin/banner/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}

                <div class="input-group">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Small file input example</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="ban_image">
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3 form-select" multiple aria-label="name">
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
                                <input type="file" name="ban_image" id="image_inp" multiple class="d-none"
                                    value="{{ old('ban_image') }}">
                                <label class="form-control btn-info btn-lg text-center cursor-pointer" for="image_inp">
                                    Choose image Banner</label>
                                @error('ban_image')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 48%">
                        {{-- // Title --}}
                        <div class="mb-3 form-select" multiple aria-label="name">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="ban_title" placeholder="Title"
                                value="{{ old('ban_title') }}">
                            @error('ban_title')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- // Categories --}}
                        <div class="mb-3 form-select" multiple aria-label="link">
                            <label for="link" class="form-label">Categories</label>
                            <select name="ban_link" id="link" class="form-select">
                                <option value="" selected disabled>Select category</option>
                                @foreach ($fillCatagoryAll as $item)
                                    <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('ban_link')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- // Status --}}
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="status" class="form-label">Status</label>
                            <select id='status' name="ban_status" aria-label="Default select example"
                                class="form-control">
                                @if ('ban_status' == null)
                                    <option selected value="old('ban_status')">
                                        @if ($banner->status == '1')
                                            Active
                                        @else
                                            Clocked
                                        @endif
                                    </option>
                                    <option value="0">Clocked</option>
                                @else
                                    <option value="0">Clocked</option>
                                    <option value="1">Actived</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    {{-- // cột bên phai --}}
                    <div style="width: 48%">
                        {{-- // Description --}}
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="description" class="form-label" style="margin-bottom: 10px">Description</label>
                            <textarea type="text" class="form-control" style="margin-bottom: 5px" rows="9" id="description"
                                name="ban_description">{{ old('ban_description') }}</textarea>
                            @error('ban_description')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="card-footer" style="text-align: right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('custom-scripts')
    <script>
        const input = document.getElementById('file-input');
        const image = document.getElementById('img-preview');

        input.addEventListener('change', (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
    </script>
@endsection
