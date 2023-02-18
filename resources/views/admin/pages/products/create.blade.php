@extends('admin.elements.master')

@section('title')
    Create product | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add new product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                {{-- <a class="btn btn-primary">Add new product</a> --}}
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body py-2">
                <form action="{{ route('admin/product/store') }}" method="post" class="mt-2 px-5"
                    enctype="multipart/form-data">
                    {{-- <h4 class="text-blue font-medium mb-3">Add new product</h4>
                    <hr> --}}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="">Product Name</label>
                                        <input type="text" class="form-control" name="pro_name"
                                            value="{{ old('pro_name') }}">
                                        @error('pro_name')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="">Price</label>
                                                    <input type="text" class="form-control" name="pro_price"
                                                        value="{{ old('pro_price') }}">
                                                    @error('pro_price')
                                                        <span class="errorMsg">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="">Quanity</label>
                                                    <input type="number" class="form-control" min="1"
                                                        name="pro_quantity" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="">Category</label>
                                                    <select name="pro_category" id="" class="form-select">
                                                        <option value="" selected>Select category</option>
                                                        @foreach ($category as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="">Brands</label>
                                                    <select name="pro_brand" id="" class="form-select">
                                                        <option value="" selected>Select brands</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="">Supplier</label>
                                                    <select name="pro_supplier" id="" class="form-select">
                                                        <option value="" selected>Select supplier</option>
                                                        @foreach ($supplier as $sup)
                                                            <option value="{{ $sup->id }}">{{ $sup->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="">Discount</label>
                                                    <input type="number" name="pro_discount" class="form-control"
                                                        min="10" max="40" value="{{ old('pro_discount') }}">
                                                    @error('pro_discount')
                                                        <span class="errorMsg">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="">Image product</label>
                                        <b id="qty-image"></b>
                                        @error('pro_image')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                        <div class="image-preview-div">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="file" name="pro_image[]" id="image_inp" multiple class="d-none"
                                            value="{{ old('pro_image[]') }}">
                                        <label class="form-control btn-primary text-center cursor-pointer "
                                            for="image_inp">
                                            Choose image</label>
                                        <p>* Kích thước hình ảnh: 600x600 (px) - Tỉ lệ hình ảnh: 1:1</p>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea name="pro_desc" id="productdesc" rows="5" class="form-control">{{ old('pro_desc') }}</textarea>
                                        @error('pro_desc')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="">Featured</label>
                                                <select name="pro_featured" id="" class="form-select">
                                                    <option value="1" selected>Nổi bật</option>
                                                    <option value="0">Thường</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="">Hoạt động</label>
                                                <select name="pro_active" id="" class="form-select">
                                                    <option value="1" selected>Đang kinh doanh</option>
                                                    <option value="0">Ngừng kinh doanh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 d-flex align-items-center gap-3">
                                        <h4>Create product configuration:</h4>
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">CPU</label>
                                    <input type="text" class="form-control" name="cauhinh_cpu">
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">RAM</label>
                                    <input type="text" class="form-control" name="cauhinh_ram">
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Storage
                                        drive</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_Storage"> --}}
                                    <textarea name="cauhinh_Storage" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Graphics
                                        card</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_graphic_card"> --}}
                                    <textarea name="cauhinh_graphic_card" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Screen
                                        display</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_screen"> --}}
                                    <textarea name="cauhinh_screen" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Bàn phím</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_keyboard"> --}}
                                    <textarea name="cauhinh_keyboard" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Audio</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_Audio"> --}}
                                    <textarea name="cauhinh_Audio" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Kết nối không
                                        dây</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_wireless"> --}}
                                    <textarea name="cauhinh_wireless" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Webcam</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_webcam"> --}}
                                    <textarea name="cauhinh_webcam" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Cổng giao
                                        tiếp</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_usb"> --}}
                                    <textarea name="cauhinh_usb" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label class="form-label" style="width:200px">Hệ điều
                                        hành</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_window"> --}}
                                    <textarea name="cauhinh_window" class="form-control" rows="1"></textarea>
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <label for="exampleFormControlInput1" class="form-label"
                                        style="width:200px">Nguồn</label>
                                    {{-- <input type="text" class="form-control" name="cauhinh_power"> --}}
                                    <textarea name="cauhinh_power" class="form-control" rows="1"></textarea>
                                </div>
                            </div>


                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="form-control btn-primary" id="btn-themmoi">Thêm
                                            mới</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="form-control btn-danger">Thoát</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        </div>
        </div>
    </section>

    {{-- @include('admin.pages.products.create-cauhinh') --}}
@endsection
