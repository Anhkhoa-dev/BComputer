@extends('admin.elements.master')

@section('title')
    Banner | Admin BComputer
@endsection

@section('admin-main')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Banner manager</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="route('admin/dashboard')">Home</a></li>
            <li class="breadcrumb-item active">Banner</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <a class="btn btn-primary" href="{{ route('admin/banner/create') }}">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
           {{-- Create --}}
        </a>
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
                      <th> Title </th>
                      <th style="width: 13%"> Description </th>
                      <th style="text-align: center"> Image </th>
                      <th> Link </th>
                      <th style="text-align: center"> Status </th>
                      <th style="text-align: center"> Actions </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($prods as $item)
                  <tr class="align-items-center">
                      <td>{{$item->id}}</td>
                      <td>
                        <span>{{$item->title}}</span>
                      </td>
                      <td>{{$item->description}}</td>
                      <td>
                        <div class="phuc-acount">
                          <div class="acount-image">
                            {{-- <img src="{{ asset('image/'. (Auth::user()->image != null ? Auth::user()->image : 'user/avatar-default.png')) }}" class="img_admin" alt="User Image"> --}}
                            @if ($item->image != null && $item->image != '')
                            <img src="{{ asset('image/banner/'.$item->image) }}" alt=""  class="img_acount">
                            @else
                            <img src="{{ asset('image/banner/logo03.png') }}" alt=""  class="img_acount">
                            @endif
                          </div>
                        </div>
                      </td>
                      <td>{{$item->link}}</td>
                      <td style="text-align: center"><a class="btn {{$item->status == 1 ? 'btn-success' : 'btn-secondary'}} btn-sm">{{$item->status == 1 ? 'Actived' : 'Clocked'}}</a></td>
                      <td class="project-actions text-center">
                            {{-- Edit --}}
                            <a class="btn btn-info btn-sm" href="{{ route('admin/banner/edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {{-- Delete --}}
                            <a href="{{ route('admin/banner/destroy', $item->id) }}" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                            </a>
                      </td>
                  </tr>
                  @endforeach

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

@endsection
