@extends('admin.elements.master')

@section('title')
    Catelory | BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Catelory manager</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Catelory</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%"> ID</th>
                            <th style="width: 19%"> Name </th>
                            <th style="width: 20%"> Slug </th>
                            <th style="width: 20%"> Description </th>
                            <th style="width: 20%" > Image </th>
                            <th style="width: 10%"> Status </th>
                            <th style="width: 10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prods as $item)
                            <tr class="align-items-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <!-- kiểm tra trong db có image thì mới hiển thị -->
                                    @if ($item->imageIcon != null && $item->imageIcon != '')
                                        <img src="{{ asset('image/category/' . $item->imageIcon) }}" alt=""
                                            style="width:70px; height:auto;">
                                    @endif
                                </td>
                                <td>
                                    <p class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} btn-sm">
                                        {{ $item->status == 1 ? 'Actived' : 'Clocked' }}
                                    </p>
                                </td>
                                <td class="project-actions text-left">
                                    <a class="btn btn-info" href="{{ route('category/edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>

                                    </a>
                                    {{-- @if($item->status == 1)
                                    <a class="btn btn-danger" href="{{ route('category/destroy', $item->id) }}">
                                        <i class="fa fa-trash">
                                        </i>
                                    </a>
                                    @else
                                    <button class="btn btn-danger" disabled >
                                        <i class="fa fa-trash">
                                        </i>
                                    </button>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
