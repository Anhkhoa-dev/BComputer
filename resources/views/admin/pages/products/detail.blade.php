@extends('admin.elements.master')

@section('title')
    Product detail | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin/product') }}" class="btn btn-primary">Back Product</a>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-5">
                <h4 class="text-blue font-medium mb-3">Product detail: #{{ $proShow->id }} - {{ $proShow->name }}</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="pro_name" value="{{ $proShow->name }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Price</label>
                                                <input type="text" class="form-control" name="pro_price"
                                                    value="{{ $proShow->price }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Quanity</label>
                                                <input type="number" class="form-control" min="1"
                                                    name="pro_quantity" value="{{ $proShow->quantity }}" readonly>
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
                                                <select name="pro_category" id="" class="form-select" readonly>
                                                    <option value="{{ $proShow->category->id }}" selected>
                                                        {{ $proShow->category->name }}
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Brands</label>
                                                <select name="pro_brand" id="" class="form-select" readonly>
                                                    <option value="{{ $proShow->brand->id }}" selected>
                                                        {{ $proShow->brand->name }}</option>
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
                                                <select name="pro_supplier" id="" class="form-select" readonly>
                                                    <option value="{{ $proShow->supplier->id }}" selected>
                                                        {{ $proShow->supplier->name }}</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Discount</label>
                                                <input type="number" name="pro_discount" class="form-control"
                                                    value="{{ $proShow->discount }}" readonly>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="pro_desc" id="productdesc" rows="5" class="form-control" readonly>{{ $proShow->description }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Image product</label>
                                    <b id="qty-image">({{ count($proImage) }} image)</b>
                                    <div class="image-preview-div">
                                        <div class="row">
                                            @foreach ($proImage as $item)
                                                <div class="image-preview col-md-4 col-6">
                                                    <img src="{{ asset('image/product/' . $item->image) }}"
                                                        alt="" class="img-preview">
                                                    <div class="bg-image-hover">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Featured</label>
                                            <select name="pro_featured" id="" class="form-select" readonly>
                                                <option value="1" selected>
                                                    {{ $proShow->featured == 1 ? 'Sản phẩm nổi bật' : 'San phẩm thường' }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Hoạt động</label>
                                            <select name="pro_active" id="" class="form-select" readonly>
                                                <option value="1" selected>
                                                    {{ $proShow->status == 1 ? 'Đang kinh doanh' : 'Ngừng kinh doanh' }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="form-control btn-primary">Thêm mới</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="form-control btn-danger">Thoát</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
