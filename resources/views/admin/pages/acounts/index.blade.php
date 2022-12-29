@extends('admin.elements.master')

@section('title')
    Acount | Admin BComputer
@endsection

@section('admin-main')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Acount manager</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Acount</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_acount">Create</button>

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
                    <th> Birthday </th>
                    <th> Email</th>
                    <th> Phone</th>
                    <th> Address </th>
                    <th> Image </th>
                    <th> Role </th>
                    <th> Status </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prods as $item)
                <tr class="align-items-center">
                    <td>{{$item->empId}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{date('d-m-Y', strtotime($item->birthday))}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone ?? 'null'}}</td>
                    <td>{{$item->address ?? 'null'}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->role == 2 ? 'admin' : 'user'}}</td>
                    <td><p class="btn {{$item->status == 1 ? 'btn-success' : 'btn-secondary'}} btn-sm">{{$item->status == 1 ? 'Actived' : 'Clocked'}}</p></td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
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
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>


 {{-- modal thêm | sửa acount --}}
  <div class="modal fade" id="create_acount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="title-modal-acount"></h1>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <center>
                <div class="mb-3">
                    <input id='idAccount' hidden>
                    <input id='idAccountCurrent' value="" hidden>
                    <div class="form-group">
                        <img id="imgPre" width="15%" src="{{ asset('image/user/avatar-default.png') }}" alt="no img" class="img-thumbnail" />
                    </div>
                    <input style="margin-left:220px; margin-top:18px;display:none" type="file" name="anhdaidien" id="ful" />
                    <label for="ful" id="file-name" style="margin-top:18px">
                        <span class="file-box"></span>
                        <span class="file-button">
                          <i class="fa fa-upload" aria-hidden="true"></i>
                          Choose image
                        </span>
                      </label>
                </div>
                </center>
            <div class="d-flex justify-content-between">
                {{-- // cột bên trái --}}
                <div style="width: 48%">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Full name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Full name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                    </div>
                    <div class="mb-3 d-block">
                        <label for="exampleFormControlInput1" class="form-label">Role Acount</label>
                        <select id='loai_tk' name="loai_tk" aria-label="Default select example" class="form-control">
                            <option value="0">user</option>
                            <option value="1">admin</option>
                        </select>
                    </div>

                </div>

                {{-- cột bên phải  --}}
                <div style="width: 48%">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password confirm</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Password confirm">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <select id='loai_tk' name="loai_tk" aria-label="Default select example" class="form-control">
                            <option value="0">Actived</option>
                            <option value="1">Clocked</option>
                        </select>
                    </div>

                </div>


            </div>

          </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Create</button>
        </div>
      </div>
    </div>
  </div>

@endsection