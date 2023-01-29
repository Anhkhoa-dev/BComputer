@extends('admin.elements.master')

@section('title')
    Create Supplier | BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Supplier</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ Route('supplier/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="d-flex justify-content-between">

                        {{-- // cột bên trái --}}
                        <div style="width: 48%">
                            <div class="mb-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo" id="image">
                                        <label class="custom-file-label" for="image">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>

                        {{-- cột bên phải  --}}
                        <div style="width: 48%">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Phone">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id='abc' name="staabctus" aria-label="Default select example"
                                    class="form-control">
                                    <option value="1">Actived</option>
                                    <option value="0">Clocked</option>

                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    </div>
@endsection
