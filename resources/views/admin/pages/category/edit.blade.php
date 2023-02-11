@extends('admin.elements.master')

@section('title')
    Edit Category | BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Category</h3>
        </div>
        <div class="modal-body">
            <form action="{{ route('category/update', $prod->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-between">
                    {{-- // cột bên trái --}}
                    <input type="hidden" name="cate_id" value="{{ $prod->id }}">
                    <div style="width: 48%">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="texe" class="form-control" name="cate_name" id="exampleFormControlInput1"
                                value="{{ $prod->name }}">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="cate_slug" id="exampleFormControlInput1"
                                value="{{ $prod->slug }}">
                            
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="cate_description" id="catedesc" rows="5" class="form-control">{{ $prod->description }} </textarea>
                                
                            </div>
                        </div>
                    </div>

                    {{-- cột bên phải  --}}
                    <div style="width: 48%">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="">Image Category</label>
                                <b id="image"></b>
                                @error('image')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                                <div class="image-sup-div">
                                    <div class="row">
                                        {{-- if(image != 0){
                                        <img src="" alt="">
                                        } --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="file" name="photo" id="image_sup" multiple class="d-none"
                                    value="{{ $prod->image }}">
                                <label class="form-control btn-primary text-center cursor-pointer " for="image_sup">
                                    Choose image</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select id='loai_tk' name="loai_tk" aria-label="Default select example" class="form-select">
                                @if ($prod->status == '1')
                                    <option selected value="1">Active</option>
                                    <option value="0">Clocked</option>
                                @else
                                    <option selected value="0">Clocked</option>
                                    <option value="1">Actived</option>
                                @endif
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        {{-- @endif --}}
        </section>
    @endsection
