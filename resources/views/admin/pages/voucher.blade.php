@extends('admin.elements.master')

@section('title')
    Voucher | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Voucher manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="route('admin/dashboard')">Home</a></li>
                        <li class="breadcrumb-item active">Voucher</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            @if (\Session::get('Success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>&nbsp;{{ \Session::get('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                {{-- <a class="btn btn-primary" href="{{ route('admin/voucher/create') }}">
                    <img src="{{ asset('image/icon/voucher.png') }}" width="30px"><i class="fas fa-plus" aria-hidden="true"></i></a>  --}}
                {{-- Create --}}
                <button type="button" class="btn btn-tool" id="create-btn">
                    <img src="{{ asset('image/icon/voucher_4.png') }}" width="60px">
                    &nbsp;<i class="fas fa-plus fa-lg" aria-hidden="true"></i>
                </button>
                {{-- <div class="col-md-7">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div> --}}
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus fa-xl"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%, text-align: center"> ID</th>
                            <th style="width:"> Code </th>
                            <th style="text-align: center"> Content </th>
                            <th style="text-align: center"> Discount </th>
                            <th style="text-align: center"> Condition </th>
                            <th> Date Start </th>
                            <th> Date End </th>
                            <th style="text-align: center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voucher as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->content }}</td>
                                <td style="text-align: center">{{ $item->discount * 100 }}</td>
                                <td style="text-align: center">{{ $item->condition }}</td>
                                <td>{{ $item->dateStart }}</td>
                                <td>{{ $item->endStart }}</td>
                                <td class="project-actions text-center">
                                    {{-- Edit --}}
                                    @if ($item->condition == 0 || strtotime($item->endStart) < strtotime(date('Y-m-d')))
                                        <button type="button" class="btn btn-info btn-mg"" data-bs-toggle="modal"
                                            data-bs-target="#voucher_edit{{ $item->id }}" disabled>
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info btn-mg"" data-bs-toggle="modal"
                                            data-bs-target="#voucher_edit{{ $item->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    @endif
                                    {{-- Delete --}}
                                    <button type="button" class="btn btn-danger btn-mg"" data-bs-toggle="modal"
                                        data-bs-target="#delete_banner{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal create -->

        <div class="modal fade" id="voucher_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <div class="phuc-text-ban">&nbsp;Create Voucher</div>
                        <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="card-body d-flex justify-content-between">
                                {{-- // cột bên trai --}}
                                <div style="width: 48%">
                                    {{-- // Code --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control" id="code" name="vou_code"
                                            placeholder="Code">
                                    </div>
                                    {{-- // Discount --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="discount" class="form-label">Discount (%)</label>
                                        <input type="number" step="0.1" class="form-control" id="Discount"
                                            name="vou_discount" placeholder="Please input the number percent">

                                    </div>
                                    <div class="d-flex justify-content-between">
                                        {{-- // Date Start --}}
                                        <div class="mb-3 form-select" style="width: 48%" multiple
                                            aria-label="description">
                                            <label for="dateStart" class="form-label">Date Start</label>
                                            <input type="date" class="form-control" id="dateStart"
                                                name="vou_dateStart">

                                        </div>
                                        {{-- // Date End --}}
                                        <div class="mb-3 form-select" style="width: 48%" multiple
                                            aria-label="description">
                                            <label for="endStart" class="form-label">Date End</label>
                                            <input type="date" class="form-control" id="endStart"
                                                name="vou_endStart">

                                        </div>
                                    </div>
                                </div>
                                {{-- // cột bên phai --}}
                                <div style="width: 48%">
                                    {{-- // Condition --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="condition" class="form-label">Condition</label>
                                        <input type="number" class="form-control" id="condition" name="vou_condition"
                                            placeholder="Please input the number">
                                    </div>
                                    {{-- // Content --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                            id="content" name="vou_content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button id="create-submit" class="btn btn-primary btn-submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal edit -->

        @foreach ($voucher as $item)
            <div class="modal fade" id="voucher_edit{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <div class="phuc-text-ban">&nbsp;Edit voucher: {{ $item->code }}</div>
                            <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form action="{{ route('admin/voucher/update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="card-body d-flex justify-content-between">
                                    {{-- // cột bên trai --}}
                                    <div style="width: 48%">
                                        {{-- // Code --}}
                                        <div class="mb-3 form-select" multiple aria-label="description">
                                            <label for="code" class="form-label">Code</label>
                                            <input type="text" class="form-control bg-light text-dark" id="code"
                                                name="vou_code" value="{{ $item->code }}" disabled>
                                        </div>
                                        {{-- // Discount --}}
                                        <div class="mb-3 form-select" multiple aria-label="description">
                                            <label for="discount" class="form-label">Discount (%)</label>
                                            <input type="number" class="form-control" id="Discount"
                                                name="vou_discount" value="{{ $item->discount * 100.0 }}"
                                                placeholder="Please input the number">
                                            @error('vou_discount')
                                                <span class="errorMsg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            {{-- // Date Start --}}
                                            <div class="mb-3 form-select" style="width: 48%" multiple
                                                aria-label="description">
                                                <label for="dateStart" class="form-label">Date Start</label>
                                                <input type="date" class="form-control" id="dateStart"
                                                    name="vou_dateStart" value="{{ $item->dateStart }}">
                                                @error('vou_dateStart')
                                                    <span class="errorMsg">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- // Date End --}}
                                            <div class="mb-3 form-select" style="width: 48%" multiple
                                                aria-label="description">
                                                <label for="endStart" class="form-label">Date End</label>
                                                <input type="date" class="form-control" id="endStart"
                                                    name="vou_endStart" value="{{ $item->endStart }}">
                                                @error('vou_endStart')
                                                    <span class="errorMsg">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- // cột bên phai --}}
                                    <div style="width: 48%">
                                        {{-- // Condition --}}
                                        <div class="mb-3 form-select" multiple aria-label="description">
                                            <label for="condition" class="form-label">Condition</label>
                                            <input type="number" class="form-control" id="fullname"
                                                name="vou_condition" placeholder="Please input the number"
                                                value="{{ $item->condition }}">
                                            @error('vou_condition')
                                                <span class="errorMsg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- // Content --}}
                                        <div class="mb-3 form-select" multiple aria-label="description">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                                id="content" name="vou_content">{{ $item->content }}</textarea>
                                            @error('vou_content')
                                                <span class="errorMsg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal delete -->

        @foreach ($voucher as $item)
            <div class="modal fade" id="delete_banner{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centere">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i style="color: #00CC66" class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                            &emsp;<h1 style="color: red" class="modal-title fs-5" id="exampleModalLabel">Please confirm
                                your action!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete Voucher "<b>{{ $item->code }}</b>" ? This action cannot be
                            undone!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ route('admin/voucher/destroy', $item->id) }}" class="btn btn-primary">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection

@section('myjs-admin')
    
@endsection


{{-- @include('admin.pages.test') --}}
