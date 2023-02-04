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
            <div class="card-header">
                <h2 class="card-title"><b>Edit Banner</b></h2>
                <div style="text-align: right">
                    <a class="btn btn-tool" href="{{ route('admin/banner') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('admin/banner/update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <input type="hidden" name="id" value="{{ $banner->id }}" />
                <div class="card-body">
                    <div style="text-align: center">
                        @if ($banner->image != null && $banner->image != '')
                            <img src="{{ asset('image/banner/' . $banner->image) }}" alt="{{ $banner->name }}"
                                class="img_acount" style="text-align: center; max-width:100%">
                        @endif
                    </div>
                    <br>
                    {{-- <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="image">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                    </div> --}}
                    {{--  --}}
                    <div class="card-body">
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Small file input example</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="ban_image">
                            </div>
                        </div>
                        @error('ban_image')
                            <span class="errorMsg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 48%">
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
                                <option selected>{{ $banner->link }}</option>
                                @foreach ($fillCatagoryAll as $item)
                                    <option value="{{ $item->slug }}" class="side-box">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- // Status --}}
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="status" class="form-label">Status</label>
                            <select id='status' name="ban_status" aria-label="Default select example"
                                class="form-control">
                                @if ($banner->status == '1')
                                    <option selected value="1">Active</option>
                                    <option value="0">Clocked</option>
                                @else
                                    <option selected value="0">Clocked</option>
                                    <option value="1">Actived</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    {{-- // cột bên phai --}}
                    <div style="width: 48%">
                        {{-- // Description --}}
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" style="margin-bottom: 5px" rows="9" id="description"
                                name="ban_description">{{ $banner->description }}</textarea>
                            @error('ban_description')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
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
