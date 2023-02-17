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
                            <th style="width: 1%"> ID</th>
                            <th style="width: 1%">ID_Pro</th>
                            {{-- <th style="width: 1%">Product</th> --}}
                            <th style="text-align: center, width: 15%">Image</th>
                            <th style="text-align: center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodImg as $item)
                            <tr>
                                <td style="text-align: center">{{ $item->id }}</td>
                                <td style="text-align: center">{{ $item->id_pro }}</td>
                                {{-- <td>{{ $prodName->name }}</td> --}}
                                <td>{{ $item->image }}</td>
                                <td class="project-actions text-center">
                                    {{-- View --}}
                                    <button type="button" class="btn btn-info btn-mg" data-bs-toggle="modal"
                                        data-bs-target="#userAddress{{ $item->id }}">
                                        <i class="fa-regular fa-address-card fa-lg"></i>
                                    </button>
                                    {{-- <a class="btn btn-info btn-mg" href="{{ route('admin/banner/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $prodImg->links("vendor.pagination.bootstrap-5") }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal show -->



    </section>
@endsection
