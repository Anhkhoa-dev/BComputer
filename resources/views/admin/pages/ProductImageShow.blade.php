@extends('admin.elements.master')

@section('title')
    Product Image | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Image manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Image</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="modal-header">
                <div class="phuc-text-ban">
                    <a style="align-self: center" class="btn btn-light btn-mg"
                        href="{{ route('admin/product/edit', $prod->id) }}">
                        <i class="fa-regular fa-pen-to-square fa-2x"></i></a>
                    {{ $prod->name }} - &nbsp;( {{ count($productImg) }} images)
                </div>
                <div style="text-align: right">
                    <a class="btn-close btn-lg" href="{{ route('admin/proImage') }}">
                        <i class="fas fa-times fa-lg"></i>
                    </a>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-md">
                    <div class="image-product-div">
                        <div class="row">
                            @foreach ($productImg as $item)
                                <div class="image-product col-md-4 col-6">
                                    <img src="{{ asset('image/product/' . $item->image) }}" alt=""
                                        class="img-product">
                                    <div class="bg-image-hover">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
    </section>
@endsection
