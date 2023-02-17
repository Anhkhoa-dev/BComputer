@extends('admin.elements.master')

@section('title')
    Product | Admin bComputer
@endsection
@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin/product/create') }}" class="btn btn-primary">Create</a>

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
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%"> ID</th>
                            <th style="text-align: center"> Image</th>
                            <th style="width: 30%"> Name</th>
                            <th> Price ($) </th>
                            <th style="width: 10%; text-align: center"> Quanity </th>
                            <th> Discount</th>
                            <th style="text-align: center"> Featured</th>
                            <th style="text-align: center"> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($productAll != null)
                            @foreach ($productAll as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <div class="phuc-product">
                                            <div class="product-image">
                                                <img src="{{ asset('image/product/' . $item->image) }}" class="img_product"
                                                    alt="User Image">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>$ {{ $item->price }}</td>

                                    <td style="text-align: center">{{ $item->quantity }}</td>
                                    <td style="text-align: center">{{ $item->discount }} %</td>
                                    <td style="text-align: center">
                                        <a class="btn {{ $item->featured == 1 ? 'btn-warning' : 'btn-secondary' }} btn-mg">
                                            {{ $item->featured == 1 ? 'Outstanding' : 'Normal' }}</a>
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }} btn-mg">
                                            {{ $item->status == 1 ? 'On sale' : 'Stop selling' }}</a>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin/product/show', $item->slug) }}" title="Detail product">
                                            <i class="fas fa-folder">
                                            </i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin/product/edit', $item->id) }}"
                                            title="Edit product">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin/product/destroy', $item->id) }}" title="Delete product">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No products.<a href="#">Add new products</a></p>
                        @endif

                    </tbody>
                </table>
                {{ $productAll->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>


@endsection
@section('myjs-amin')
    <script>
        var modalId = document.getElementById('modalId');
        modalId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');
            // Use above variables to manipulate the DOM
        });
    </script>
@endsection
