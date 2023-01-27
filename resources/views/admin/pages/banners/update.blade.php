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
                <div class="card-tools">
                    <a class="btn btn-tool" href="{{ route('admin/banner') }}">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('admin/banner/update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <input type="hidden" name="id" value="{{ $banner->id }}"/>
                <div class="card-body">
                    <div style="text-align: center">
                        @if ($banner->image != null && $banner->image != '')
                          <img src="{{ asset('image/banner/'.$banner->image) }}" alt="{{ $banner->name }}"  class="img_acount">
                        @endif
                    </div>
                    <br>
                    {{-- <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="image">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="image">
                                <label class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </div>
                    </div>
                    {{-- <div style="text-align: center">
                        <input style="display:none" type="file" name="photo" id="image" />
                        <label for="image" id="image" style="margin-top: 20px">
                            <span class="file-box"></span>
                            <span class="file-button">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Choose image
                            </span>
                        </label>
                    </div> --}}
                </div>
                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 48%">
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $banner->title }}">
                        </div>
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Description" value="{{ $banner->description }}">
                        </div>
                    </div>
                    {{-- // cột bên phai --}}
                    <div style="width: 48%">
                        {{-- <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link">
                        </div> --}}
                        <div class="mb-3 form-select" multiple aria-label="link"">
                            <label for="link" class="form-label">Link</label>
                            <select id='link' name="link" aria-label="Default select example" class="form-control" value="{{ $banner->link }}">
                                <option selected>Choose link Banner</option>
                                    @foreach ($fillCatagoryAll as $item)
                                    <option value="{{ route('/products', $item->slug) }}" class="side-box"
                                        data-id="{{ $item->slug }}" style="background-image:url({{ asset('image/icon/' . $item->imageIcon) }})">
                                        <div>
                                            <span><img src="{{ asset('image/icon/' . $item->imageIcon) }}"
                                            width="25" alt="{{ $item->name }}"></span></div>
                                        <div>
                                            {{ $item->name }}
                                        </div>
                                     </option>
                                    @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="status:1 or 0">
                        </div> --}}
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="status" class="form-label">Status</label>
                            <select id='status' name="status" aria-label="Default select example" class="form-control" value="{{ $banner->status }}">
                                <option value="1">Actived</option>
                                <option value="0">Clocked</option>
                            </select>
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

