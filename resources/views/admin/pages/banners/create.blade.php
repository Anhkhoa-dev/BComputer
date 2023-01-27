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
                <div class="card-tools">
                    <a class="btn btn-tool" href="{{ route('admin/banner') }}">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('admin/banner/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                {{-- <div class="card-body">
                    <input id='id' value="" hidden>
                    <div class="phuc-banner">
                        <div class="banner-image">
                            <img src="{{ asset('image/logo.png') }}" alt="" class="img_banner">
                        </div>
                    </div>
                    <input style="display:none" type="file" name="photo" id="image" />
                    <div style="text-align: center">
                        <label for="image" id="image" style="margin-top: 20px">
                            <span class="file-box"></span>
                            <span class="file-button">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Choose image
                            </span>
                        </label>
                    </div>
                </div> --}}
                {{-- @if ($product->image != null && $product->image != '')
                <div class="form-group">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:300px; height:auto;">
                </div>
                @endif --}}
                {{-- <div class="form-group">
                    <div class="file-loading">
                        <input id="image" type="file" name="photo">
                        <div class="preview-upload">
                            <img id='sp_hinh-upload' class="img_acount"/>
                        </div>
                    </div>
                </div> --}}
                <div class="card-body">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="image">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                        {{-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> --}}
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 48%">
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Description">
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
                            <select id='link' name="link" aria-label="Default select example" class="form-control" value="">
                                <option selected>Choose link Banner</option>
                                    @foreach ($fillCatagoryAll as $item)
                                    <option value="{{ route('/products', $item->slug) }}" class="side-box"
                                        data-id="{{ $item->slug }}" style="background-image:url({{ asset('image/icon/' . $item->imageIcon) }})">
                                        <div style="background-image:url(https://www.google.com/search?q=image&oq=im&aqs=edge.1.69i57j0i512j0i131i433i512j0i433i512j0i512j0i433i512l2j69i60j69i61.3421j0j1&sourceid=chrome&ie=UTF-8#imgrc=22LfYBs93BDCLM)">
                                            <span><img src="{{ asset('image/icon/' . $item->imageIcon) }}"
                                            width="25" alt="{{ $item->name }}"></span></div>
                                        <div>
                                            {{ $item->name }}
                                        </div>
                                     </option>
                                    @endforeach
                            </select>
                            <div style="background-image:url({{ asset('image/icon/' . $item->imageIcon) }})"></div>
                        </div>
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="status" class="form-label">Status</label>
                            <select id='status' name="status" aria-label="Default select example" class="form-control">
                                <option value="1">Actived</option>
                                <option value="0">Clocked</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="text-align: right">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </section>
@endsection

{{-- @section('custom-scripts')
<script>
    // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#sp_hinh-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
    $("#image").change(function(){
        readURL(this);
    });
</script>
@endsection --}}
