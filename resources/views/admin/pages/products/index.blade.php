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
                            <th> ID</th>
                            <th> Name</th>
                            <th> Price ($) </th>
                            <th> Quanity </th>
                            <th> Discount</th>
                            <th> Featured</th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($productAll != null)
                            @foreach ($productAll as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>$ {{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->discount }} %</td>
                                    <td>{{ $item->featured == 1 ? 'Nổi bật' : 'Bình thường' }}</td>
                                    <td>{{ $item->status == 1 ? 'Đang kinh doanh' : 'Ngừng kinh doanh' }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin/product/show', $item->slug) }}" title="Detail product">
                                            <i class="fas fa-folder">
                                            </i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin/product/edit', $item->id) }}" title="Edit product">
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
                            <p>Không có sản phẩm nào. <a href="#">Thêm mới sản phẩm</a></p>
                        @endif

                    </tbody>
                </table>
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
