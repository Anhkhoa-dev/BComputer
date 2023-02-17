@extends('admin.elements.master')

@section('title')
    Supplier | BComputer
@endsection


@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Supplier manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="{{ route('supplier/create') }}" class="btn btn-primary">Create</a>

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
                            <th style="width: 13%"> Full name </th>
                            <th style="text-align:center"> Image </th>
                            <th style="width: 20%"> Address </th>
                            <th> Phone</th>
                            <th> Email</th>
                            <th style="text-align:center"> Status</th>
                            <th style="text-align:center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prods as $item)
                            <tr class="align-items-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td style="text-align:center">
                                    <!-- kiểm tra trong db có image thì mới hiển thị -->
                                    @if ($item->image != null && $item->image != '')
                                        <img src="{{ asset('image/supplier/' . $item->image) }}" alt=""
                                            style="width:100px; height:auto;">
                                    @endif
                                </td>
                                <td>{{ $item->address ?? 'null' }}</td>
                                <td>{{ $item->phone ?? 'null' }}</td>
                                <td>{{ $item->email }}</td>
                                <td style="text-align:center">
                                    <a class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">{{ $item->status == 1 ? 'Actived' : 'Closed' }}</a>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info" href="{{ route('supplier/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    @if($item->status == 1)
                                    <a class="btn btn-danger" href="{{ route('supplier/destroy', $item->id) }}">
                                        <i class="fa fa-trash">
                                        </i>
                                    </a>
                                    @else
                                    <button class="btn btn-danger" disabled >
                                        <i class="fa fa-trash">
                                        </i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $prods->links("vendor.pagination.bootstrap-5") }}
            </div>
        </div>
    </section>
@endsection
