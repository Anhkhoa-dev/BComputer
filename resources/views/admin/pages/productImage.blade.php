@extends('admin.elements.master')

@section('title')
    Product Image | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Image Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="route('admin/dashboard')">Home</a></li>
                        <li class="breadcrumb-item active">Product Image</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus fa-xl"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 10%; text-align: center">ID Product</th>
                            <th style="width: 50%">Name</th>
                            {{-- <th style="width: 1%">Product</th> --}}
                            <th style="text-align: center, width:15%">Image</th>
                            <th style="text-align: center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodImg as $item)
                            <tr>
                                <td style="text-align: center">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                {{-- <td>{{ $prodName->name }}</td> --}}
                                <td><b>{{ $item->image }}</b>&nbsp; images</td>
                                <td class="project-actions text-center">
                                    {{-- View --}}
                                    <button type="button" class="btn btn-tool btn-mg" data-bs-toggle="modal"
                                        data-bs-target="#imageProduct{{$item->id}}">
                                        <i style="color: #483D8B" class="fa-regular fa-image fa-2x"></i>
                                    </button>
                                    {{-- <a class="btn btn-info btn-mg" href="{{ route('admin/banner/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $prodImg->links('vendor.pagination.bootstrap-5') }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal show -->

        @foreach ($prodImg as $item)
            <div class="modal fade" id="imageProduct{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-bottom: 5px">
                            <a style="align-self: center" class="btn btn-light btn-mg"
                                href="{{ route('admin/product/edit', $item->id) }}
                            ">
                                <i class="fa-regular fa-pen-to-square fa-2x"></i></a>&emsp;
                            <div class="phuc-text-ban">{{ $item->name }} - &nbsp;( {{ $item->image }} images)</div>
                            <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-md">
                                <div class="image-product-div">
                                    <div class="row">
                                        @foreach ($prodImg as $item)
                                            <div class="image-product col-md-4 col-6">
                                                <img src="{{ asset('image/product/' . $item->nameImg) }}" alt=""
                                                    class="img-product">
                                                <div class="bg-image-hover">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            </div>
        @endforeach

    </section>
@endsection
