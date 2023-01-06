<div class="col-md-12">
    <div class="row">
        <div class="col-3">
            @include('guest.pages.accounts.sec-slidebar')
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="row">
                    <div class="account-box mx-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-12 align-items-center">
                                    <div class="tk-image">
                                        <img src="{{ asset('image/'.$user->image) }}" alt="{{$user->fullname}}" width="200" class="image-img">   
                                        <div class="image-hover">
                                            <input type="file" class="input-change" id="change-avt-inp" data-modal='avt' accept="image/*">
                                            <div class="change-image" id="btn-change-avt">Change image</div>
                                        </div>
                                    </div>
                                    <div class="tk-information">
                                        <div class="dropdown">
                                            <a href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                                                {{$user->fullname}} 
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <div class="dropdown-menu border-0 mt-2">
                                            <form action="#" method="POST" class="d-inline ">
                                                <input type="text" class="change-name" name="tk-user" placeholder="Enter your full name" />
                                                <button class="btn-change">Update</button>
                                            </form>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="shipment-details">
                                    <h5>Thông tin giao hàng</h5>
                                    <div class="box-address">
                                        <p class="title">You don't have a shipping address yet? <span class="add" data-bs-toggle="modal" data-bs-target="#add-address">Add address</span></p> 
                                        {{-- <div class="address-info-active">
                                            <div class="user-info">
                                                <div class="info-left">
                                                    <div class="name">Nguyễn Anh Khoa</div>
                                                    <div class="using">
                                                        <i class="fa-regular fa-circle-check"></i>
                                                        <div>Đang sử dụng</div>
                                                    </div>
                                                </div>
                                                <div class="edit-address" data-bs-toggle="modal" data-bs-target="#edit-address">Chỉnh sửa</div>
                                            </div>
                                            <div class="address-info mt-2">
                                                <div class="address"><b>Address:</b> Hẻm 64, Đường 79, Phường Tân Quy, Quận 7, Thành phố Hồ Chí Minh</div>
                                            </div>
                                            <div class="phone-info mt-2">
                                                <div class="phone"><b>Phone:</b> 086577010</div>
                                            </div>
                                        </div> --}}
                                        
                                    </div>
                                    <div class="change-password">
                                        <i class="fa-solid fa-key"></i>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#change-pass">Thay đổi password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal thêm địa chỉ mới --}}
<div class="modal fade" id="add-address" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new address</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" class="khoa-add-address">
             <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="fw-bold mb-3" >Full name</label>
                        <input type="text" name="address-fullname-inp" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                      <label for="" class="fw-bold mb-3" >Delivery phone</label>
                      <input type="text" name="address-phone-inp" class="form-control">
                  </div>
              </div>
              <div class="col-md-12">
                <h5>Address</h5>
              </div>
              
              <div class="col-md-6">
                    <div class="mb-3">
                        <select id="address-city" class="form-select">
                            <option value="" selected>Chọn Tỉnh / Thành Phố</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <select name="" id="address-ward" class="form-select">
                        <option value="" selected>Chọn Phường / Xã</option>
                      </select>
                    </div>
              </div>
              <div class="col-md-6">
                    <div class="mb-3">
                      <select name="" id="address-district" class="form-select">
                         <option value="" selected>Chọn Quận / Huyện</option>
                      </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address-phone-inp" class="form-control" placeholder="Enter house number, street name">
                    </div>
              </div>
              <div class="col-md-12">
                 <input type="checkbox" name="check-address-default" id="checkaddress">
                 <label for="checkaddress">Set as default address</label>
              </div>

             </div>


          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  {{-- modal chỉnh sửa địa chỉ mới --}}
<div class="modal fade" id="edit-address" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit address</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>



{{-- modal thay đổi password --}}

<div class="modal fade" id="change-pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content px-4 py-3">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Change password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password old</label>
                <input type="password" class="form-control" name="pass_old" id="exampleFormControlInput1" placeholder="Enter password old">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password new</label>
                <input type="password" class="form-control" name="pass_new" id="exampleFormControlInput1" placeholder="Password form 6-16 character">
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" name="cpass_new" id="exampleFormControlInput1" placeholder="Enter password confirm new">
              </div>
              <div>
                <button class="btn btn-primary form-control">Update</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

