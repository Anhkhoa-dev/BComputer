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
      <div class="card-body p-0">
            <form action="#" method="post" class="mt-2 px-5" enctype="multipart/form-data">
                <h4 class="text-blue font-medium mb-3">Add new product</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Price</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Quanity</label>
                                                <input type="number" class="form-control" min="1">
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
                                                <select name="" id="" class="form-select">
                                                    <option value="" selected>Select category</option>
                                                    <option value="">Laptop</option>
                                                    <option value="">PC Intel</option>
                                                    <option value="">PC AMD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Brands</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="" selected>Select brands</option>
                                                    <option value="">Acer</option>
                                                    <option value="">Asus</option>
                                                    <option value="">Dell</option>
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
                                                <select name="" id="" class="form-select">
                                                    <option value="" selected>Select supplier</option>
                                                    <option value="">Dell Việt Nam</option>
                                                    <option value="">Asus Việt Nam</option>
                                                    <option value="">Acer Việt Nam</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="">Discount</label>
                                                <input type="number" class="form-control" min="10" max="30">
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
                                    <textarea name="" id="productdesc" rows="8" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="">Image product</label>
                                        <div class="image-preview-div">
                                            <div class="row">
                                                <div class="col-md-4 col-6">
                                                    <div class="image-preview">
                                                        <img src="{{ asset('image/product/Asus_ROG_Gladius_II_01.PNG') }}" alt="" class="img-preview">
                                                        <div class="bg-image-hover">
                                                            <div class="delete-icon">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="file" id="image_inp" class="d-none" multiple accept="image/*">
                                        <div class="form-control btn-primary text-center cursor-pointer " id="choose_image">Choose image</div>
                                        <p>* Kích thước hình ảnh: 600x600 (px) - Tỉ lệ hình ảnh: 1:1</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="">Featured</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="1" selected>Nổi bật</option>
                                                    <option value="0">Thường</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="">Hoạt động</label>
                                                <select name="" id="" class="form-select">
                                                    <option value="" selected>Đang kinh doanh</option>
                                                    <option value="">Ngừng kinh doanh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="form-control btn-primary">Thêm mới</button>
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
@endsection
{{-- @section('myjs-admin') 
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    $(function(){
        
        // show dialog chọn hình ảnh
        

    });
       
    </script>
@endsection --}}