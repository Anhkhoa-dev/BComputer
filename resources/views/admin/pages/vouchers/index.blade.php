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
                {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;
                    <strong>Success!</strong>&nbsp;{{ \Session::get('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> --}}
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                        {{-- d-flex justify-content-center align-items-center w-100 --}}
                        <div class="toast-header">
                            <img src="..." class="rounded me-2" alt="...">
                            <strong class="me-auto">BComputer</strong>
                            {{-- <small>11 mins ago</small> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;
                            <strong>Success!</strong>&nbsp;{{ \Session::get('Success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-header">
                {{-- Create --}}
                <a href="{{ route('admin/voucher/create') }}" class="btn btn-tool">
                    <img src="{{ asset('image/icon/voucher_4.png') }}" width="60px">
                    &nbsp;<i class="fas fa-plus fa-lg" aria-hidden="true"></i>
                </a>
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
                            <th style="text-align: center"> Quantity </th>
                            <th style="text-align: center"> Condition </th>
                            <th> Date Start </th>
                            <th> Date End </th>
                            <th style="text-align: center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody id="voucher_data">
                        @foreach ($voucher as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->content }}</td>
                                <td style="text-align: center">{{ $item->discount }}</td>
                                <td style="text-align: center">{{ $item->quanity }}</td>
                                <td style="text-align: center">{{ $item->condition }}</td>
                                <td>{{ $item->dateStart }}</td>
                                <td>{{ $item->endStart }}</td>
                                <td class="project-actions text-center">
                                    {{-- Edit --}}
                                    @if ($item->condition == 0 || strtotime($item->endStart) < strtotime(date('Y-m-d')))
                                        <button type="button" class="btn btn-info btn-mg"" data-bs-toggle="modal" disabled>
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    @else
                                        <a class="btn btn-info btn-mg" href="{{ route('admin/voucher/edit', $item->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    <script>
        var myToastEl = document.getElementById('myToast')
        myToastEl.addEventListener('hidden.bs.toast', function() {
            // do something...
        })
    </script>
@endsection


{{-- @include('admin.pages.test') --}}
