@extends('admin.elements.master')

@section('title')
    Brand | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="route('admin/dashboard')">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        @if (\Session::get('Success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong>&nbsp;{{ \Session::get('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <a class="btn btn-tool" href="{{ route('admin/brand/create') }}">
                    <img src="{{ asset('image/icon/brand_icon.png') }}" width="50px">
                    &nbsp;<i class="fas fa-plus fa-lg" aria-hidden="true"></i>
                    {{-- Create --}}
                </a>
                <div class="card-tools">

                    {{-- <span style="text-align: right"> --}}
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus fa-xl"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                    {{-- </span> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 2%"> ID</th>
                            <th style="text-align: center; width: 25%"> Name </th>
                            <th style="text-align: center"> Image </th>
                            <th style="text-align: center"> Status </th>
                            <th style="text-align: center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td style="text-align: center">{{ $item->name }}</td>
                                <td>
                                    <div class="phuc-brand">
                                        <div class="brand-image">
                                            <img src="{{ asset('image/brand/' . ($item->image != null ? $item->image : 'logo03.png')) }}"
                                                class="img_brand" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center"><a
                                        class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-mg">{{ $item->status == 1 ? 'Actived' : 'Clocked' }}</a>
                                </td>
                                <td class="project-actions text-center">
                                    {{-- View --}}
                                    {{-- <button type="button" class="btn btn-primary btn-mg" data-bs-toggle="modal"
                                        data-bs-target="#show_banner{{ $item->id }}">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button> --}}
                                    {{-- Edit --}}
                                    <a class="btn btn-info btn-mg" href="{{ route('admin/brand/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    {{-- Delete --}}
                                    {{-- Delete --}}
                                    @if ($item->status == 0)
                                        <button type="button" class="btn btn-danger btn-mg" disabled>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-mg"" data-bs-toggle="modal"
                                            data-bs-target="#delete_brand{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        {{-- <!-- Modal show image -->

        @foreach ($prods as $item)
            <div class="modal fade" id="show_banner{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-bottom: 5px">
                            <a style="align-self: center" class="btn btn-light btn-mg"
                                href="{{ route('admin/banner/edit', $item->id) }}">
                                <i class="fa-regular fa-pen-to-square fa-lg"></i></a>&emsp;
                            <div class="phuc-text-ban">{{ $item->title }}</div>
                            <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="show-image">
                                <div style="text-align: center">
                                    <img src="{{ asset('image/banner/' . $item->image) }}" alt=""
                                        class="img_acount" style="text-align: center; max-width:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}

        <!-- Modal delete -->

        @foreach ($brand as $item)
            <div class="modal fade" id="delete_brand{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centere">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i style="color: #00CC66" class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                            &emsp;<h1 style="color: red" class="modal-title fs-5" id="exampleModalLabel">Please confirm
                                your
                                action!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete Brand "<b>{{ $item->name }}</b>" ? This action cannot be
                            undone!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ route('admin/brand/destroy', $item->id) }}" class="btn btn-primary">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection
