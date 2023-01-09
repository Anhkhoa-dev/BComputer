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
                    <th style=auto> Image </th>
                    <th> Address </th>
                    <th> Phone</th>
                    <th> Email</th>
                    <th> Status </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prods as $item)
                <tr class="align-items-center">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->address ?? 'null'}}</td>
                    <td>{{$item->phone ?? 'null'}}</td>
                    <td>{{$item->email}}</td>
                    <td><p class="btn {{$item->status == 1 ? 'btn-success' : 'btn-secondary'}} btn-sm">
                      {{$item->status == 1 ? 'Actived' : 'Clocked'}}
                      </p>
                    </td>
                    {{-- <td>{{date('d-m-Y',$item->create_at)}}</td>
                    <td>{{date('d-m-Y',$item->update_at)}}</td> --}}
                    {{-- <td>{{$item->role == 2 ? 'admin' : 'user'}}</td> --}}
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('supplier/edit', $item->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
      </div>
    </div>
  </section>


    
@endsection