@extends('admin.elements.master')

@section('title')
    Edit Product | BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Product</h3>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin/product/update', $prod->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-between">
                    {{-- // cột bên trái --}}
                    <input type="hidden" name="pro_id" value="{{ $prod->id }}">
                    <div style="width: 48%">
                        {{-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="texe" class="form-control" name="sup_name" id="exampleFormControlInput1"
                                value="{{ $prod->name }}">
                            @error('sup_name')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="pro_name" value="{{ $prod->name }}">
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
                                                value="{{ $prod->price }}">
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
                                            <input type="number" class="form-control" min="1" name="pro_quantity"
                                                value="{{ $prod->quantity }}">
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
                                                <option value="{{ $proShow->brand->id }}" selected>
                                                    {{ $proShow->brand->name }}
                                                </option>
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
                                                <option value="{{ $proShow->supplier->id }}" selected>
                                                    {{ $proShow->supplier->name }}
                                                </option>
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
                                            <input type="number" name="pro_discount" class="form-control" min="10"
                                                max="40" value="{{ $prod->discount }}">
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
                                <label for="">Tạo file cấu hình</label>
                                <div class="form-control btn-primary text-center">Tạo cấu hình sản phẩm</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="pro_desc" id="productdesc" rows="5" class="form-control">{{ $prod->description }}</textarea>
                                @error('pro_desc')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- cột bên phải  --}}
                    <div style="width: 48%">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="">Image product</label>
                                <b id="qty-image">({{ count($proImage) }} image)</b>
                                <div class="image-preview-div">
                                    <div class="row">
                                        @foreach ($proImage as $item)
                                            <div class="image-preview col-md-4 col-6">
                                                <img src="{{ asset('image/product/' . $item->image) }}" alt=""
                                                    class="img-preview">
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
                                        <select name="pro_featured" id="" class="form-select">
                                            @if ($prod->featured == '1')
                                                <option selected value="1">Nổi bật</option>
                                                <option value="0">Thường</option>
                                            @else
                                                <option selected value="0">Thường</option>
                                                <option value="1">Nổi bật</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="">Hoạt động</label>
                                        <select name="pro_active" id="" class="form-select">
                                
                                            @if ($prod->status == '1')
                                                <option selected value="1">Đang kinh doanh</option>
                                                <option value="0">Ngừng kinh doanh</option>
                                            @else
                                                <option selected value="0">Ngừng kinh doanh</option>
                                                <option value="1">Đang kinh doanh</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="form-control btn-primary">Save</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="form-control btn-danger">Thoát</button>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div> --}}
            </form>
        </div>
        {{-- @endif --}}
        </section>
    @endsection
