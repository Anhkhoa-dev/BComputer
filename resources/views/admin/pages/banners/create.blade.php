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

            <div class="modal-header bg-info text-white">
                <div class="phuc-text-ban">&nbsp;Create Banner</div>
                <div style="text-align: right">
                    <a class="btn-close btn-lg" href="{{ route('admin/banner') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('admin/banner/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <div class="card-body d-flex justify-content-between">
                    {{-- // cột bên trai --}}
                    <div style="width: 39%">
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
                                @if (old('ban_link') == '')
                                    <option selected disabled>Select category</option>
                                    @foreach ($fillCatagoryAll as $item)
                                        <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                    @endforeach
                                @else
                                    <option class="btn btn-light" selected value="0">Clocked</option>
                                    <option selected>{{ old('ban_link') }}</option>
                                    @foreach ($fillCatagoryAll as $item)
                                        @if ($item->status == '0')
                                            <option disabled value="{{ $item->slug }}">{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('ban_link')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- // Status --}}
                        <div class="mb-3 form-select" multiple aria-label="status">
                            <label for="statusBan" class="form-label">Status</label>
                            @if (old('ban_status') == '0')
                                <select id='statusBan' name="ban_status" aria-label="Default select example"
                                    class="form-control btn btn-secondary btn-mg">
                                    <option class="btn btn-light" selected value="0">Clocked</option>
                                    <option class="btn btn-light" value="1">Actived</option>
                                </select>
                            @else
                                <select id='statusBan' name="ban_status" aria-label="Default select example"
                                    class="form-control btn btn-success btn-mg">
                                    <option class="btn btn-light" selected value="1">Actived</option>
                                    <option class="btn btn-light" value="0">Clocked</option>
                                </select>
                            @endif
                        </div>
                        {{-- // Description --}}
                        <div class="mb-3 form-select" multiple aria-label="description">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" rows="7" id="description" name="ban_description">{{ old('ban_description') }}</textarea>
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
                                        <img class="img-ban" id="img-ban" src="" />
                                    </div>
                                </div>
                            </div>
                            @error('ban_image')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                            <div class="mb-3">
                                <label class="form-control btn-primary text-center cursor-pointer" for="file-ban">Choose
                                    Image</label>
                                <input accept="image/*" type="file" id="file-ban" multiple class="d-none"
                                    name="ban_image" />
                            </div>
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
