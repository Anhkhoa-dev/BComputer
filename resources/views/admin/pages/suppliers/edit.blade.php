  @extends('admin.elements.master')

  @section('title')
     Edit Supplier | BComputer
  @endsection
  
  @section('admin-main')
      <div class="content-header">
          <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
              <h1 class="m-0">Edit supplier</h1>
              </div>
              <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Supplier</li>
              </ol>
              </div>
          </div>
          </div>
      </div>    

      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Supplier</h3>
        </div>
        @if ($supplierEdit != null)
            <div class="modal-body">
                <form action="#" method="post">
                <div class="d-flex justify-content-between">
                    {{-- // cột bên trái --}}
                    <div style="width: 48%">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="texe" class="form-control" id="exampleFormControlInput1" placeholder="Name" value = "{{$supplierEdit->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" value="{{ $supplierEdit->address }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email"value="{{ $supplierEdit->email }}">
                        </div>
                        
                    </div>
    
                    {{-- cột bên phải  --}}
                    <div style="width: 48%">
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
                            <label for="exampleFormControlInput1" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone" value="{{ $supplierEdit->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select id='loai_tk' name="loai_tk" aria-label="Default select example" class="form-control"value="{{ $supplierEdit->status }}">
                                <option value="0">Actived</option>
                                <option value="1">Clocked</option>
                            </select>
                        </div>
                    </div>   
                </div>   
                </form>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
        @endif
</section>
@endsection 